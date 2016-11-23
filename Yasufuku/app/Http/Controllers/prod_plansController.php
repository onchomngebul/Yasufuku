<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\prod_plan;
use Illuminate\Http\Request;
use Session;
use DB;

class prod_plansController extends Controller
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
              // $prod_plans =prod_plan::groupBy(['pp_date', 'shift', 'machine_no', 'mold_only']);
              $prod_plans = new prod_plan;
              $order = $request->get('order'); // Order by what column?
              $dir = $request->get('dir'); // Order direction: asc or desc
              $date1 = $request->get('date1');
              $date2 = $request->get('date2');
              $shift = $request->get('shift');
              $machine_no = $request->get('machine_no');
              $mold_no = $request->get('mold_no');
              $import_status = $request->get('import_status');

              // if ($request->fullUrl() == $request->url()) { //request pertama untuk ngambil default tanggal
              //        $date1 = date('d M Y');
              // }

              if ($request->get('reset')) {
                     $date1 = '';
                     $date2 = '';
                     $machine_no = '';
                     $mold_no = '';
                     $import_status = '';
                     $shift = '';
              }

              $page_appends = [
                     'order' => $order,
                     'dir' => $dir,
                     'date1' => $date1,
                     'date2' => $date2,
                     'shift' => $shift,
                     'machine_no' => $machine_no,
                     'mold_no' => $mold_no,
                     'import_status' => $import_status,
              ];

              //Search
              $prod_plans = $date1 ? $prod_plans->where('pp_date', '>=',date("Y-m-d", strtotime($date1))) : $prod_plans;
              $prod_plans = $date2 ? $prod_plans->where('pp_date', '<=',date("Y-m-d", strtotime($date2))) : $prod_plans;
              $prod_plans = $shift ? $prod_plans->where('shift', $shift) : $prod_plans;
              $prod_plans = $machine_no ? $prod_plans->where('machine_no', $machine_no) : $prod_plans;
              $prod_plans = $mold_no ? $prod_plans->where('mold_no', $mold_no) : $prod_plans;
              $prod_plans = $import_status!='' ? $prod_plans->where('import_status', $import_status) : $prod_plans;

              if ($request->get('itemPerPage')){
                     $temp = $request->get('itemPerPage');
                     session(['pagint_plans' => $temp]);
              }

              $valueSs = session('pagint_plans');
              if ($valueSs!=null) {
                     $itemPerPage = $valueSs;
              }

              if ($order && $dir) {
                     $prod_plans = $prod_plans->orderBy($order, $dir);
              }
              $prod_plans = $prod_plans->paginate($itemPerPage);

              $cek = $itemPerPage;
              $dir = $dir == 'asc' ? 'desc' : 'asc';
              return view('prod_plans.index', compact('prod_plans', 'cek', 'dir', 'order', 'page_appends'));
       }
       /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\View\View
       */
       public function create()
       {
              return view('prod_plans.create');
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

              prod_plan::create($requestData);

              Session::flash('flash_message', 'prod_plan added!');

              return redirect('prod_plans');
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
              $prod_plan = prod_plan::findOrFail($id);

              return view('prod_plans.show', compact('prod_plan'));
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
              $prod_plan = prod_plan::findOrFail($id);

              return view('prod_plans.edit', compact('prod_plan'));
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

              $prod_plan = prod_plan::findOrFail($id);
              $prod_plan->update($requestData);

              Session::flash('flash_message', 'prod_plan updated!');

              return redirect('prod_plans');
       }

       public function getApi(Request $request)
       {
              $machine_no = $request->input('machine_no');
              $prod_plans = prod_plan::where(
              [
                     ['machine_no', '=', $machine_no],
                     ['import_status','=', 0],
                     // ['machine_no', '=', $PPlan->machine_no]
              ])->get();
              return response()->json($prod_plans);
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
              prod_plan::destroy($id);

              Session::flash('flash_message', 'prod_plan deleted!');

              return redirect('prod_plans');
       }

       public function uploadFile(Request $request)
       {
              $file = $request->file('fileCSV');
              $destinationPath = public_path('file');
              $fileName = "\data.csv";

              $file->move($destinationPath, $fileName);
              $csv = $destinationPath.$fileName;

              $file = fopen($csv,"r");
              // $arr_data = fgetcsv($file);
              $count = 0;
              while(!feof($file))
              {
                     $data = fgetcsv($file);
                     // print_r($data);
                     if ($count != 0 && $data[0]!='') {
                            $PPlan = new prod_plan;
                            $PPlan->pp_date = $data[0];
                            $PPlan->shift = $data[1];
                            $PPlan->machine_no = $data[2];
                            // $PPlan->employee_no = $data[1];
                            $PPlan->order_seq = $data[3];
                            $PPlan->order_id = $data[4];
                            $PPlan->mold_no = $data[5];
                            $PPlan->mold_only = explode("-", $PPlan->mold_no)[0];
                            $PPlan->part_no = $data[6];
                            $PPlan->item_desc = $data[7];
                            $PPlan->cav_no = $data[8];
                            $PPlan->cycle_tm = $data[9];
                            $PPlan->schedule_tm = $data[10]*60;
                            $PPlan->pp_qty = $data[11];
                            $ppShot = ($PPlan->schedule_tm * 60) / $PPlan->cycle_tm;
                            $PPlan->pp_shot = $ppShot;
                            $PPlan->machine_grp = $data[12];
                            $PPlan->process_type = $data[13];
                            $PPlan->item_unit = $data[14];
                            $PPlan->paralel_process = $data[15];

                            $data = prod_plan::where([
                                   ['order_id', '=', $PPlan->order_id],
                                   // ['shift','=', $PPlan->shift],
                                   // ['machine_no', '=', $PPlan->machine_no]
                            ])->first();
                            if ($data === null) {
                                   $PPlan->save();
                            }
                     }
                     $count++;
              }//end of feof
              fclose($file);

              return "File Uploaded Successfully... \n Report: Success";
       }
}
