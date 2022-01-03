@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ asset('storage/' . $user->profile->image)  }}" class="rounded-circle w-100">
        </div>
        <div class="col-9">
            <div class="d-flex justify-content-between align-items-basline">
                <h1>{{ $user->username }}</h1>
                <a href="{{ url('p/create') }}">Add Post</a>
            </div>
            @can('update',$user->profile)
            <a href="{{url('/profile/'. $user->id.'/edit')}}">Edit Profile</a>
            @endcan
            <div class="d-flex">
                
                <div class="pr-5"><strong>{{$user->posts->count()}}   </strong> Posts</div>
                <div class="pr-5"><strong>84.1k</strong> Followers</div>
                <div class="pr-5"><strong>316</strong> Following</div>
            </div>
            <div class="pt-4"><strong>{{$user->profile->title}}</strong></div>
            <div>{{$user->profile->description}}</div>
            <div><a href="https://www.freecodecamp.org/">{{$user->profile->url }}</a><div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="{{ url('/p/'.$post->id) }}">
                <img src="{{ asset('storage/' . $post->image)  }}" alt="jsajsa" class="w-100">
            </a>    
        </div>
        @endforeach
    </div>
</div>
@endsection
