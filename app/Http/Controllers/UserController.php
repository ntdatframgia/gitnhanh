<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $listusers = User::whereNotNull('password')->get();

        return view('list',['listusers'=>$listusers]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/home'; 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit',['user'=>$user]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'username' => 'required|max:255|unique:users',
            'birthday' => 'required',
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'address' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            
            'img'   =>  'image|max:5000',
            ]);  
            
            $update = new User;
            $update->username = $request->username;
            $update->email = $request->email; 
            $update->birthday = $request->birthday; 
            $update->address = $request->address; 
            $update->fname = $request->fname; 
            $update->lname = $request->lname;
            $update->password = $request->lname;
            $update->gender = $request->gender;
            $file = $request->file('avatar');
            

            $image = User::where('id',$id)->first();
            Storage::delete($image->avatar);
            $file->storeAs('avatar/',$request->input('username').'.'.$file->extension());
            $update->gender = $request->gender;
            $user = $this->create($request->all());
            redirect($this->redirectPath());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
