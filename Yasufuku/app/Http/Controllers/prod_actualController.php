<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\prod_actual;
use Illuminate\Http\Request;
use Session;
use DB;

class prod_actualController extends Controller
{
       /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\View\View
       */

       public function __construct()
       {
           $this->middleware('auth');
       }

       public function index(Request $request)
       {

              $itemPerPage = 10;
              $prod_actual = prod_actual::join('prod_plans as pp', 'pp.idprod_plans', '=', 'prod_actuals.idprod_plans');
              $order = $request->get('order'); // Order by what column?
              $dir = $request->get('dir'); // Order direction: asc or desc
              $date1 = $request->get('date1');
              $date2 = $request->get('date2');
              $machine_no = $request->get('machine_no');
              $mold_no = $request->get('mold_no');
              $shift = $request->get('shift');

              if ($request->get('reset')) {
                     $date1 = '';
                     $date2 = '';
                     $machine_no = '';
                     $mold_no = '';
                     $shift = '';
              }

              $page_appends = [
                     'order' => $order,
                     'dir' => $dir,
                     'date1' => $date1,
                     'date2' => $date2,
                     'machine_no' => $machine_no,
                     'mold_no' => $mold_no,
                     'shift' => $shift
              ];

              //Search
              $prod_actual = $date1 ? $prod_actual->where('pp_date', '>=',date("Y-m-d", strtotime($date1))) : $prod_actual;
              $prod_actual = $date2 ? $prod_actual->where('pp_date', '<=',date("Y-m-d", strtotime($date2))) : $prod_actual;
              $prod_actual = $machine_no ? $prod_actual->where('machine_no', $machine_no) : $prod_actual;
              $prod_actual = $mold_no ? $prod_actual->where('mold_no', $mold_no) : $prod_actual;
              $prod_actual = $shift ? $prod_actual->where('shift', $shift) : $prod_actual;

              //untuk item per-page disimpan di session
              if ($request->get('itemPerPage')){
                     $temp = $request->get('itemPerPage');
                     session(['pagint_act' => $temp]);
              }
              $valueSs = session('pagint_act');
              if ($valueSs!=null) {
                     $itemPerPage = $valueSs;
              }

              //sorting
              if ($order && $dir) {
                     $prod_actual = $prod_actual->orderBy($order, $dir);
              }
              $prod_actual = $prod_actual->paginate($itemPerPage);

              $cek = $itemPerPage;
              $dir = $dir == 'asc' ? 'desc' : 'asc';
              return view('prod_actual.index', compact('prod_actual', 'cek', 'dir', 'order', 'page_appends'));
       }

       /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\View\View
       */
       public function create()
       {
              return view('prod_actual.create');
       }

       /**
       * Store a newly created resource in storage.
       *
       * @param \Illuminate\Http\Request $request
       *
       * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
       */
       public function store(Request $request)
       {

              $requestData = $request->all();

              prod_actual::create($requestData);

              Session::flash('flash_message', 'prod_actual added!');

              return redirect('prod_actual');
       }

       /**
       * Display the specified resource.
       *
       * @param  int  $id
       *
       * @return \Illuminate\View\View
       */
       public function show($id)
       {
              $prod_actual = prod_actual::join('prod_plans as pp', 'pp.idprod_plans', '=', 'prod_actuals.idprod_plans');
              $prod_actual = $prod_actual->findOrFail($id);

              return view('prod_actual.show', compact('prod_actual'));
       }

       /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       *
       * @return \Illuminate\View\View
       */
       public function edit($id)
       {
              $prod_actual = prod_actual::findOrFail($id);

              return view('prod_actual.edit', compact('prod_actual'));
       }

       /**
       * Update the specified resource in storage.
       *
       * @param  int  $id
       * @param \Illuminate\Http\Request $request
       *
       * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
       */
       public function update($id, Request $request)
       {

              $requestData = $request->all();

              $prod_actual = prod_actual::findOrFail($id);
              $prod_actual->update($requestData);

              Session::flash('flash_message', 'prod_actual updated!');

              return redirect('prod_actual');
       }

       /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       *
       * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
       */
       public function destroy($id)
       {
              prod_actual::destroy($id);

              Session::flash('flash_message', 'prod_actual deleted!');

              return redirect('prod_actual');
       }

       public function exportCsv(Request $request)
       {
              $prod_actual = prod_actual::join('prod_plans as pp', 'pp.idprod_plans', '=', 'prod_actuals.idprod_plans');

              $url = $request->server('HTTP_REFERER');
              $query = isset(parse_url($url)["query"]) ? parse_url($url)["query"] : '' ; //FRAGMENT QUERY
              $fragment = explode("&",$query);
              foreach ($fragment as $value) {
                     $tempGet = explode("=", $value);
                     $get[$tempGet[0]] = isset($tempGet[1]) ? $tempGet[1] : '';
              }

              //Search
              if (array_key_exists("date1", $get)) {
                     $prod_actual = $get['date1'] != '' ? $prod_actual->where('pp_date', '>=',date("Y-m-d", strtotime($get['date1']))) : $prod_actual;
                     $prod_actual = $get['date2'] != '' ? $prod_actual->where('pp_date', '<=',date("Y-m-d", strtotime($get['date2']))) : $prod_actual;
                     $prod_actual = $get['machine_no'] != '' ? $prod_actual->where('machine_no', $get['machine_no']) : $prod_actual;
                     $prod_actual = $get['mold_no'] != '' ? $prod_actual->where('mold_no', $get['mold_no']) : $prod_actual;
                     $prod_actual = $get['shift'] != '' ? $prod_actual->where('shift', $get['shift']) : $prod_actual;
              }
              //sorting
              if (array_key_exists("order", $get)) {
                     $prod_actual = $prod_actual->orderBy($order, $dir);
              }
              $allData = $prod_actual->get();

              $folder = 'file';
              $fileName = "\Prod_Actual_Data.csv";

              $destinationPath = public_path($folder);
              $csv = $destinationPath.$fileName;
              $file = fopen($csv,"w");

              $head = [
                     'order_id','prod_date','day_shift','machine_no','mold_no','item_code','item_desc',
                     'shot_times','operator','leader','cavity','prod_hour','loss_hour',
                     'tot_hour','ok_qty','ng_qty', 'tot_qty','plan_hour','target_qty','material_lot',
                     // 'loss1_hour','loss2_hour','loss3_hour','loss4_hour','loss5_hour','loss6_hour',
                     // 'ng01_qty','ng02_qty','ng03_qty','ng04_qty','ng05_qty','ng06_qty',
                     // 'ng07_qty','ng08_qty','ng09_qty','ng10_qty','ng11_qty','ng12_qty'
              ];
              $stoplossR = DB::table('stoploss_masters')->lists('reason', 'idsl_master');
              $head = array_merge($head, $stoplossR);
              $ngR = DB::table('ng_masters')->lists('reason', 'idng_master');
              $head = array_merge($head, $ngR);

              fputcsv($file, $head);

              foreach ($allData as $item) {
                     $oneRow = [
                            $item->order_id, $item->pp_date, $item->shift, $item->machine_no, $item->mold_no ,$item->part_no ,$item->item_desc ,
                            $item->aprod_shot ,$item->operator_no , $item->leader_no , $item->cav_no , $item->aplan_time , $item->stop_loss ,
                            $item->total_hours , $item->aprod_qty , $item->ng , $item->total_qty ,$item->schedule_tm ,$item->pp_qty , $item->material_lot ,
                     ];
                     foreach ($stoplossR as $idsl_master => $reason){
                            $tempData = $item->stopLoss()->where('idsl_master', $idsl_master)->first();
                            array_push($oneRow, ($tempData ? $tempData->sl_duration : 0));
                     }
                     foreach ($ngR as $idng_master => $reason){
                            $tempData = $item->NGs()->where('idng_master', $idng_master)->first();
                            array_push($oneRow, ($tempData ? $tempData->ng_qty : 0));
                     }

                     fputcsv($file,$oneRow);
              }
              fclose($file);

              return $folder.$fileName;
              // return response()->download($csv);
       }
}
