<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\stoploss_master;
use Illuminate\Http\Request;
use Session;

class stoploss_masterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $stoploss_master = stoploss_master::paginate(25);

        return view('stoploss_master.index', compact('stoploss_master'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('stoploss_master.create');
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
        
        stoploss_master::create($requestData);

        Session::flash('flash_message', 'stoploss_master added!');

        return redirect('stoploss_master');
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
        $stoploss_master = stoploss_master::findOrFail($id);

        return view('stoploss_master.show', compact('stoploss_master'));
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
        $stoploss_master = stoploss_master::findOrFail($id);

        return view('stoploss_master.edit', compact('stoploss_master'));
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
        
        $stoploss_master = stoploss_master::findOrFail($id);
        $stoploss_master->update($requestData);

        Session::flash('flash_message', 'stoploss_master updated!');

        return redirect('stoploss_master');
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
        stoploss_master::destroy($id);

        Session::flash('flash_message', 'stoploss_master deleted!');

        return redirect('stoploss_master');
    }
}
