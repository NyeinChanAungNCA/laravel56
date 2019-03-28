<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRegister;
use App\User;
use App\Http\Resources\UserResource;

class UserRegisterController extends Controller
{
    public function register(UserRegister $request){
    	$user=new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->save();

    	// $u = User::all();
    	// return $u;
        return new UserResource($user);
    }

    public function delete(Request $request){
    	// $user = new User;
   		// $user->destroy($request->id);
   		User::destroy($request->id);
   		// User::findOrFail($request->id)->delete();
    }

    public function update_user(UserRegister $request){
    	$user = User::find($request->id);
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->save();
    }

    public function show(){
    	$users = User::all();
  //   	foreach ($users as $user) {
  //   		echo $user->email."<br/>";
		// 	foreach ($user->artical as $a) {
		// 		echo $a->title."<br/>";
		// 	}
		// }
    	// return response()->json($users);

        return UserResource::collection(User::all());
        // return new UserResource(User::find(1));
    }
}
