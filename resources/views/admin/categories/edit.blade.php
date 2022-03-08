@extends('layouts.admin')

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
                <h1>
                    Modify Category: {{ $category->name }}
                </h1>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('admin.categories.update', $category) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value=" {{ old('name', $category->name) }}">
                    @error('name')
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}"> --}}

                <input class="btn btn-primary" type="submit" value="Save">
            </form>
        </div>
    </div>
@endsection