@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <h1 class="h1">Admin - All Posts</h1>
        </div>
        <div class="row">
            <div class="col mb-2">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-dark mb-2">Add new post</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr class="table-dark">
                            <th>Title</th>
                            <th>Content</th>
                            <th>Slug</th>
                            <th>Tags</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-black">
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>
                                @foreach($post->tags()->get() as $tag)
                                #{{ $tag->name }}
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-outline-light" href="{{ route('admin.posts.show', $post->slug) }}">View</a>
                            </td>
                            <td>
                                @if (Auth::user()->id === $post->user_id)
                                <a class="btn btn-outline-light" href="{{ route('admin.posts.edit', $post->slug) }}">Edit</a>
                                @endif
                            </td>
                            <td>
                                @if (Auth::user()->id === $post->user_id)
                                <form class="d-inline-block" action="{{ route('admin.posts.destroy', $post) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection