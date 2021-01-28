@extends('layouts.admin')

@section('title')
The Expeditions | Admin-Categories
@endsection
@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <h4>{{ isset($category) ? 'Update Category' : 'Create Category' }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ isset($category) ? route('categories.update', $category->slug) :route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" 
                        value="{{ isset($category) ? $category->name : '' }}"
                        class="@error('name') is-invalid @enderror form-control">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group d-flex justify-content-end">
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        {{ isset($category) ? 'Update' : 'Create' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

