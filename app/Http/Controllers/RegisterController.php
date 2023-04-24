<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;

use App\Mail\Welcomemail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    //create user
    public function store()
    {
        $validation = request()->validate([
            'name'     => 'required|max:255|min:2',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'phone'    => 'required',
            'address'  => 'required',
            'city'     => 'required',
            'pin_code' => 'required',
            'terms'    => 'required'
        ]);
        $user = User::create($validation);
        // Mail::to($user->email)->send(new Welcomemail($user));
        return redirect('/login ');
    }
    //display data
    public function show()
    {
        $users = User::all();
        return view('show', ['users' => $users]);
    }
    function edit($id){
        $user= User::findOrFail($id);
        return view('update',['user'=>$user]);
        }
    //update
    public function update(Request $request)
    {

        $validation = request()->validate([
            'name'     => 'required|max:255|min:2',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'phone'    => 'required',
            'address'  => 'required',
            'city'     => 'required',
            'pin_code' => 'required',
            'terms'    => 'required'
        ]);
    $user =User::findOrFail($request->id);
    $user->update($validation);
    return redirect('show');
}
//delete data
 public function delete($id){
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->back()->with("message",'Data Deleted successfully');
 }
        
}