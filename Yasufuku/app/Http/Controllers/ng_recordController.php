<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ng_record;
use Illuminate\Http\Request;
use Session;

class ng_recordController extends Controller
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
     
    public function index()
    {
        $ng_record = ng_record::paginate(25);

        return view('ng_record.index', compact('ng_record'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('ng_record.create');
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

        ng_record::create($requestData);

        Session::flash('flash_message', 'ng_record added!');

        return redirect('ng_record');
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
        $ng_record = ng_record::findOrFail($id);

        return view('ng_record.show', compact('ng_record'));
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
        $ng_record = ng_record::findOrFail($id);

        return view('ng_record.edit', compact('ng_record'));
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

        $ng_record = ng_record::findOrFail($id);
        $ng_record->update($requestData);

        Session::flash('flash_message', 'ng_record updated!');

        return redirect('ng_record');
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
        ng_record::destroy($id);

        Session::flash('flash_message', 'ng_record deleted!');

        return redirect('ng_record');
    }
}
