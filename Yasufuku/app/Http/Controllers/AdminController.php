<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\ng_master;
use App\User;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
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

              $User = new User;
              $order = $request->get('order'); // Order by what column?
              $dir = $request->get('dir'); // Order direction: asc or desc
              $email = $request->get('email');
              $name = $request->get('name');

              if ($request->get('reset')) {
                     $email = '';
                     $name = '';
              }

              $page_appends = [
                     'order' => $order,
                     'dir' => $dir,
                     'email' => $email,
                     'name' => $name,
              ];

              //Search
              $User = $email ? $User->where('email', 'like', '%'.$email.'%') : $User;
              $User = $name ? $User->where('name', 'like', '%'.$name.'%') : $User;

              if ($request->get('itemPerPage')){
                     $temp = $request->get('itemPerPage');
                     session(['pagint_adm' => $temp]);
              }

              $valueSs = session('pagint_adm');
              if ($valueSs!=null) {
                     $itemPerPage = $valueSs;
              }

              if ($order && $dir) {
                     $User = $User->orderBy($order, $dir);
              }
              $User = $User->paginate($itemPerPage);

              $cek = $itemPerPage;
              $dir = $dir == 'asc' ? 'desc' : 'asc';

              return view('Admin.index', compact('User', 'cek', 'dir', 'order', 'page_appends'));
       }

       /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\View\View
       */
       public function create()
       {
              return view('Admin.create');
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
              $validator = Validator::make($request->all(), [
                     'name' => 'required|max:255',
                     'email' => 'required|email|max:255|unique:users',
                     'password' => 'required|min:6|confirmed',
              ]);
              // $errors = $validator->errors();
              if ($validator->fails()) {
                     return redirect('admin/create')
                     ->withErrors($validator)
                     ->withInput();
              }

              $newUser = new User;

              $newUser->email = $request->get('email');
              $newUser->name = $request->get('name');
              $newUser->employee_no = $request->get('employee_no');
              $newUser->role = $request->get('role');
              $newUser->password = bcrypt($request->get('password'));

              $newUser->save();

              Session::flash('flash_message', 'User added!');

              return redirect('admin');
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
              $User = User::findOrFail($id);

              return view('Admin.edit', compact('User'));
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

              // $requestData = $request->all();

              $User = User::findOrFail($id);
              // $User->update($requestData);
              $User->email = $request->get('email');
              $User->name = $request->get('name');
              $User->employee_no = $request->get('employee_no');
              $User->role = $request->get('role');
              $User->password = bcrypt($request->get('password'));
              $User->save();

              Session::flash('flash_message', 'User updated!');

              return redirect('admin');
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
              User::destroy($id);

              Session::flash('flash_message', 'User deleted!');

              return redirect('admin');
       }
}
