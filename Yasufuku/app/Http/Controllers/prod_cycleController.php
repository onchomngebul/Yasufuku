<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\prod_cycle;
use Illuminate\Http\Request;
use Session;
use DB;

class prod_cycleController extends Controller
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
              $prod_cycle = new prod_cycle; // Start a query
              $order = $request->get('order'); // Order by what column?
              $dir = $request->get('dir'); // Order direction: asc or desc
              $date1 = $request->get('date1');
              $date2 = $request->get('date2');
              $machine_no = $request->get('machine_no');

              if ($request->get('reset')) {
                     $date1 = '';
                     $date2 = '';
                     $machine_no = '';
              }

              $page_appends = [
                     'order' => $order,
                     'dir' => $dir,
                     'date1' => $date1,
                     'date2' => $date2,
                     'machine_no' => $machine_no,
              ];

              //Search
              $prod_cycle = $date1 ? $prod_cycle->where('cycle_date', '>=',date("Y-m-d", strtotime($date1))) : $prod_cycle;
              $prod_cycle = $date2 ? $prod_cycle->where('cycle_date', '<=',date("Y-m-d", strtotime($date2))) : $prod_cycle;
              $prod_cycle = $machine_no ? $prod_cycle->where('machine_no', $machine_no) : $prod_cycle;

              if ($request->get('itemPerPage')){
                     $temp = $request->get('itemPerPage');
                     session(['pagint_cycle' => $temp]);
              }

              $valueSs = session('pagint_cycle');

              if ($valueSs!=null) {
                     $itemPerPage = $valueSs;
              }

              if ($order && $dir) {
                     $prod_cycle = $prod_cycle->orderBy($order, $dir);
              }

              $prod_cycle = $prod_cycle->paginate($itemPerPage);

              $cek = $itemPerPage;
              $dir = $dir == 'asc' ? 'desc' : 'asc';
              return view('prod_cycle.index', compact('prod_cycle', 'cek', 'dir', 'order', 'page_appends'));
       }

       /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\View\View
       */
       public function create()
       {
              return view('prod_cycle.create');
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

              prod_cycle::create($requestData);

              Session::flash('flash_message', 'prod_cycle added!');

              return redirect('prod_cycle');
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
              $prod_cycle = prod_cycle::findOrFail($id);

              return view('prod_cycle.show', compact('prod_cycle'));
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
              $prod_cycle = prod_cycle::findOrFail($id);

              return view('prod_cycle.edit', compact('prod_cycle'));
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

              $prod_cycle = prod_cycle::findOrFail($id);
              $prod_cycle->update($requestData);

              Session::flash('flash_message', 'prod_cycle updated!');

              return redirect('prod_cycle');
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
              prod_cycle::destroy($id);

              Session::flash('flash_message', 'prod_cycle deleted!');

              return redirect('prod_cycle');
       }
       public function exportCsv(Request $request)
       {
              $prod_cycle = new prod_cycle; // Start a query

              $url = $request->server('HTTP_REFERER');
              $query = isset(parse_url($url)["query"]) ? parse_url($url)["query"] : '' ; //FRAGMENT QUERY
              $fragment = explode("&",$query);
              foreach ($fragment as $value) {
                     $tempGet = explode("=", $value);
                     $get[$tempGet[0]] = isset($tempGet[1]) ? $tempGet[1] : '';
              }

              //Search
              if (array_key_exists("date1", $get)) {
                     $prod_cycle = $get['date1'] != '' ? $prod_cycle->where('pp_date', '>=',date("Y-m-d", strtotime($get['date1']))) : $prod_cycle;
                     $prod_cycle = $get['date2'] != '' ? $prod_cycle->where('pp_date', '<=',date("Y-m-d", strtotime($get['date2']))) : $prod_cycle;
                     $prod_cycle = $get['machine_no'] != '' ? $prod_cycle->where('machine_no', $get['machine_no']) : $prod_cycle;
              }
              //sorting
              if (array_key_exists("order", $get)) {
                     $prod_cycle = $prod_cycle->orderBy($order, $dir);
              }
              $allData = $prod_cycle->get();

              $folder = 'file';
              $fileName = "\Prod_Cycle_Data.csv";

              $destinationPath = public_path($folder);
              $csv = $destinationPath.$fileName;
              $file = fopen($csv,"w");

              $head = ['cycle_date', 'machine_no', 'shot', 'start', 'end', 'duration', 'note'];

              fputcsv($file, $head);

              foreach ($allData as $item) {
                     $oneRow = [
                            $item->cycle_date ,$item->machine_no ,$item->shot ,$item->start ,$item->end ,$item->duration ,$item->note ,
                     ];

                     fputcsv($file,$oneRow);
              }
              fclose($file);

              return $folder.$fileName;
              // return response()->download($csv);
       }
}
