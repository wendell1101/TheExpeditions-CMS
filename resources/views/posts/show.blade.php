@extends('layouts.admin')

@section('title')
The Expeditions | Admin-Update-Post
@endsection
@section('content')

<div class="container">
    <div class="card shadow">
        <a href="{{ route('categories.show', $post->category->slug)}}" 
            class="ml-4 mt-2 text-primary"><i class="fas fa-long-arrow-alt-left" style="font-size:2rem"></i></a>
        <div class="card-header text-center">
            
            <h1>{{ $post->title }}</h1>
            <p>by: {{ $post->user->name}}</p>
            <p class="font-italic">{{ $post->description }}</p>
            <div class="image-container text-center" >
                <img src="{{ '/storage/'.$post->image }}" class="img-fluid" alt="post_image"style="width:600px">
            </div>
        </div>
        <div class="card-body">
            <p>{!! $post->content !!}</p>
        </div>
    </div>
</div>



@endsection



