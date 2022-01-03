<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

	public function __construct(Request $req){
		$this->middleware('auth');
	}


    public function create(){
    	return view('posts.create');
    }

    public function store(Request $req){

    	$req->validate([
    		'caption'=> 'required',
    		'image'=> 'required|mimes:jpg,jpeg,png',
    	]);

    	$data = array(
    		'caption' => $req->input('caption'), 
    		'image' => $req->input('caption'), 
    	);

    	$imagePath = $req->file('image')->store('uploads', 'public');

    	$image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();


    	auth()->user()->posts()->create([
    		'caption' => $req->input('caption'),
    	]);

    	$users = auth()->user()->posts()->pluck('id');

    	$lastId = $users->first();


    	$flight = Post::find($lastId);

		$flight->image = $imagePath;

		$flight->save();        

    	return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post){

    	return view('posts.show', compact('post'));
    }
}
