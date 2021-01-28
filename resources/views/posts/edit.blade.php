@extends('layouts.admin')

@section('title')
The Expeditions | Admin-Update-Post
@endsection
@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <h4>Edit Post</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!--title -->
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ $post->title }}" class="@error('title') is-invalid @enderror form-control">
                    @error('title')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <!--description -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="3" class="@error('description') is-invalid @enderror form-control">
                    {{ $post->description }}
                    </textarea>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <!--Content -->
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" rows="5" class="@error('content') is-invalid @enderror form-control">
                        {!! $post->content !!}
                    </textarea style="height:400px!important">
                    @error('content')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <!--Category -->
                <div class="form-group">
                    <label for="content">Category</label>
                    <select name="category" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                    <!--tags-->
                <div class="form-group">
                    @if($tags->count() > 0)
                    <label for="tags">Tags</label>
                    <select name="tags[]" id="tags" class="form-control tags" multiple>
                        @foreach($tags as $tag)
                        <option value="{{$tag->id}}"                        
                                @if(isset($post))
                                    @if($post->hasTag($tag->id))
                                        selected="selected"
                                    @endif
                                @endif
                        >
                            {{ $tag->name}}
                        </option>
                        @endforeach
                    </select>
                    @endif
                </div>

                <!--published_at -->
                <div class="form-group">
                    <label for="published_at">Published at</label>
                    <input type="text" name="published_at" id="published_at" value="{{ $post->published_at }}" class="@error('published_at') is-invalid @enderror form-control">
                    @error('published_at')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <!--image -->
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror form-control">
                    <div class="text-center mt-2">
                        <img src="{{ asset('/storage/'. $post->image) }}" class="img-fluid shadow" style="width:600px">
                    </div>
                   
                </div>
                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <!--button -->
                <div class="form-group d-flex justify-content-end">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .ck.ck-editor__editable_inline {
        height: 300px!important;
        overflow: hidden;
    }
</style>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
    });

    flatpickr("#published_at", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        enableSeconds: true,
    });
    $(document).ready(function() {
        $('.tags').select2();
    });
</script>

@endsection