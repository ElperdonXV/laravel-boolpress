@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col">
                
            </div>
        </div>
        <div class="row">
            <div class="col">
                <img class="img-fluid" src="{{ asset('storage/' . $post->image) }}" alt="">
            </div>
            <div class="col">
                <h1>
                    {{ $post->title }}
                </h1>
                <p>
                    {{ $post->content }}
                </p>
            </div>
        </div>
    </div>
@endsection