<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\stoploss_record;
use Illuminate\Http\Request;
use Session;

class stoploss_recordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $stoploss_record = stoploss_record::paginate(25);

        return view('stoploss_record.index', compact('stoploss_record'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('stoploss_record.create');
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
        
        stoploss_record::create($requestData);

        Session::flash('flash_message', 'stoploss_record added!');

        return redirect('stoploss_record');
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
        $stoploss_record = stoploss_record::findOrFail($id);

        return view('stoploss_record.show', compact('stoploss_record'));
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
        $stoploss_record = stoploss_record::findOrFail($id);

        return view('stoploss_record.edit', compact('stoploss_record'));
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
        
        $stoploss_record = stoploss_record::findOrFail($id);
        $stoploss_record->update($requestData);

        Session::flash('flash_message', 'stoploss_record updated!');

        return redirect('stoploss_record');
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
        stoploss_record::destroy($id);

        Session::flash('flash_message', 'stoploss_record deleted!');

        return redirect('stoploss_record');
    }
}
