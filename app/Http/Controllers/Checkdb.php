<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;

class Checkdb extends Controller
{
	function database(){

		//return UserProfile::where('id','1')->get();  
		//$res = new UserProfile;
//
//		//$res->name='pathansaa';
//		//$res->email='khanaha@jhaha.com';
		//$res->save();

		UserProfile::where('id',5)->update(['name'=>'pfizer', 'email'=>'pfizer@hdee.com']);

		return UserProfile::all();

	}


}


