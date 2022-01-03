<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class ProfilesController extends Controller
{
    public function index($user)
    {
    	$user = User::find($user);
        return view('profiles.index', ['user' => $user,]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));

    }

    public function update(User $user){

        $this->authorize('update', $user->profile);

        request()->validate([
            'title'=> 'required',
            'description'=> 'required',
            'url'=> 'url',
            'image'=> '',
        ]);

        $data = array(
            'title'=> request('title'),
            'description'=> request('description'),
            'url'=> request('url'),
            'image'=> request('image'),
        );

        if (request('image')) {

            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
        }

        auth()->user()->profile()->update(array_merge(
            $data,
            ['image'=>$imagePath],
        ));

        return redirect('profile/'.$user->id);
    }

    /*
    public function home(Request $request)
    {
      if ($request->session()->has('name')){
          return view('newsite.home');
      }else{
        $request->session()->flash('error', 'NO Access');
            return redirect('usercheck');
        }
    }
    public function about()
    {
    	return view('newsite.about');
    }
    function session_set(Request $request)
    {
        $request->session()->put('name','Uzair');
    }
    function session_get(Request $request)
    {
        echo $request->session()->get('name');
    }

    function session_remove(Request $request)
    {
        echo $request->session()->forget('name');
    }

    function session_check(Request $request)
    {
        if ($request->session()->has('name')){
            echo "ha hai";
        }else{
        echo "nahi hai";
        }
    }

    // session check function
    function userformSubmit(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'Password'=>'required|'
        ]);

        $email=$request->input('email');
        $password=$request->input('Password');

        if ($email == 'ab@cd.com' && $password == '1234') {
            $request->session()->put('name','uzair');
            return redirect('home');            
        }else{
            $request->session()->flash('error', 'please enter corret deatail');
            return redirect('usercheck');
        }
    }

    function mastan(){

        DB::table('user_profiles')->insert([
            ['name'=>'khasna', 'email'=>'abs@hashsa.com'],
            ['name'=>'pathan', 'email'=>'pathan@hashsa.com'],
        ]);

        

        //echo "<pre>";
        //print_r($data);
    }

    */
}
 