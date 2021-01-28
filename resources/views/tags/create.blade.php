@extends('layouts.admin')

@section('title')
The Expeditions | Admin-Tags
@endsection
@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <h4>{{ isset($tag) ? 'Update Tag' : 'Create Tag' }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ isset($tag) ? route('tags.update', $tag->slug) :route('tags.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($tag))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" 
                        value="{{ isset($tag) ? $tag->name : '' }}"
                        class="@error('name') is-invalid @enderror form-control">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group d-flex justify-content-end">
                    <a href="{{ route('tags.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        {{ isset($tag) ? 'Update' : 'Create' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

