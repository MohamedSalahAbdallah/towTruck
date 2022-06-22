<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userInfo=request();
        $user=new User;
        $user->name=$userInfo->name;
        $user->email=$userInfo->email;
        $user->phone_number=$userInfo->phone_number;
        $user->profile_pic=$userInfo->profile_pic;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::where('id',request()->id)->first();

        response(200,$user);
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
        //
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

    public function login (Request $request){
        $rules = array(
            'email' => 'required|email',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response()->json(['status' => 'failure', 'message' => 'errors', 'errors' => $validator->getMessageBag()->toArray()]);
        }
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(array('email' => $email, 'password' => $password, 'status_id' => 1))) {
                $userDetails = array(
                    'user_id' => Auth::id(),
                    'name' => Auth::User()->name,
                    'email' => Auth::User()->email,
                    'phone_number' => Auth::User()->phone_number,
                );
            return Response()->json(['status' => 'success', 'message' => 'Successful..!', 'userDetails' => $userDetails]);
        }else{
            return Response()->json(['status' => 'failure', 'message' => 'Invalid username or password']);
        }
    }

}

