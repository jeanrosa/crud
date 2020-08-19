<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller
{
 
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(3);
        return view('user.index', compact('users'));
    }


    public function create()
    {
        return view('user.create');
    }

 
    public function store(Request $request)
    {
        $this->validate($request,[ 'name'=>'required', 'email'=>'required', 'password'=>'required']);
        User::create($request->all());
        return redirect()->route('user.index')->with('success','add User');
    }


    public function show($id)
    {
        $user=User::find($id);
        return  view('user.show',compact('user'));
    }

    public function edit($id)
    {
        $user=User::find($id);
        return view('user.edit',compact('user'));
    }


    public function update(Request $request, $id)
    {
        User::find($id)->update($request->all());
        return redirect()->route('user.index')->with('success','update User');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index')->with('success','delete User');
    }
}
