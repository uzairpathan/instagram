<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Form extends Controller
{
    function index(Request $request){

    	$request->validate([
    		'name'=>'required|min:3|max:8',
    		'email'=>'required|email',
    		//'document'=>'required|mimes:jpeg,png|max:59'
    	]);

    	//echo $request->file('document')->store('media');
    	//echo "formcompletd";
    	echo $request->post('name');
    }
}
