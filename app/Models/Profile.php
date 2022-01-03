<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{

	protected $guard = [];
	protected $fillable = ['title'];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
