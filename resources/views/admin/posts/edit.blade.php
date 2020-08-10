@extends('layouts.app')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">


@section('content')
<div id="wrapper">
    <div id="page" class="container">
        <h1 class="heading has-text-weight-bold is-size-4">New Post</h1>
        <form action="{{route('admin.post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="field">
                <label class="label" for="title">Title</label>

                <div class="control">
                    <input class="input @error('title') is-danger @enderror" type="text" name="title" id="title"
                        value="{{$post->title}}">
                    @error('title')
                    <p class="help is-danger">{{$errors->first('title')}}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label" for="title">Image</label>

                <input type="file" name="image" id="image" value="{{$post->image}}">
            </div>

            <div class="field">
                <label class="label" for="body">Body</label>

                <div class="control">
                    <textarea class="textarea @error('body') is-danger @enderror" name="body"
                        id="body">{{$post->body}}</textarea>
                    @error('body')
                    <p class="help is-danger">{{$errors->first('body')}}</p>
                    @enderror
                </div>
            </div>

            <div class="field is-group">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                    <a href="{{route('admin.post.index')}}">
                        <button type="button" class="btn btn-primary float-right">
                            Back to post
                        </button>
                    </a>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection