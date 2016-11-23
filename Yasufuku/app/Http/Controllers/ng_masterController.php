<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ng_master;
use Illuminate\Http\Request;
use Session;

class ng_masterController extends Controller
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
        $ng_master = ng_master::paginate(25);

        return view('ng_master.index', compact('ng_master'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('ng_master.create');
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

        ng_master::create($requestData);

        Session::flash('flash_message', 'ng_master added!');

        return redirect('ng_master');
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
        $ng_master = ng_master::findOrFail($id);

        return view('ng_master.show', compact('ng_master'));
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
        $ng_master = ng_master::findOrFail($id);

        return view('ng_master.edit', compact('ng_master'));
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

        $ng_master = ng_master::findOrFail($id);
        $ng_master->update($requestData);

        Session::flash('flash_message', 'ng_master updated!');

        return redirect('ng_master');
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
        ng_master::destroy($id);

        Session::flash('flash_message', 'ng_master deleted!');

        return redirect('ng_master');
    }
}
