@extends('layouts.app')

@section('content')
    <br>
    <h1>{{$post->title}}</h1>
    <img class="img-responsive" src="/storage/cover_images/{{$post->cover_image}}" alt="image">
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}}</small>
    <hr>

    <div class="row">
        <div class="col-2 col-lg-1">
            <a href="/posts" class="btn btn-primary">Go back</a>
        </div>
        <div class="col-4 col-lg-2">
            @if (!Auth::guest())
                @if (Auth::user()->id == $post->user_id)
                    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'  ]) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!! Form::close() !!}
                @endif
            @endif
        </div>
    </div>
@endsection
