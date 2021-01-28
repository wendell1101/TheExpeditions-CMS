@extends('layouts.admin')

@section('title')
The Expeditions | Admin-Posts
@endsection
@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-header d-flex align-items-center">
            <h2>Posts</h2>
            <a href="{{ route('posts.create') }}" class="btn btn-primary ml-auto"><i class="fas fa-plus text-light"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    @if($posts->count() > 0)
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col"></th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $posts as $post)
                        <tr>
                            <th scope="row">{{ ++$loop->index}}</th>
                            <td>
                                <img src="{{ asset('/storage/' . $post->image) }}" alt="image" class="shadow" style="width:80px;height:80px">
                            </td>
                            <td>{{ $post->title}}</td>
                            <td class="d-flex">
                                @if(!$post->trashed())
                                <a href="{{ route('posts.edit', $post->slug) }}" class="text-warning mr-3">
                                    <i class="fas fa-pen"></i>
                                </a>
                                @else
                                <form action="{{ route('post.restore', $post->slug) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-primary mr-5" style="border:none">
                                        Restore
                                    </button>
                                </form>
                                @endif
                                <form action="{{ route('posts.destroy', $post->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    @if(!$post->trashed())
                                    <button type="submit" class="btn text-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    @else
                                    <button type="submit" class="text-danger" style="border:none">Permanently Delete</button>
                                    @endif
                                    
                                </form>


                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    @else
                    <h2 class="text-secondary text-center">No Post Yet</h2>
                    @endif
                </table>

            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')

@endsection