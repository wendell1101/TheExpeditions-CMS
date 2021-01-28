@extends('layouts.admin')

@section('title')
The Expeditions | Admin-Tags
@endsection
@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <h4>{{ $tag->name }} - Posts</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    @if($tag->posts->count() > 0)
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $tag->posts as $post)
                        <tr>
                            <th scope="row">{{ ++$loop->index}}</th>
                            <td><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></td>
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
<script>
    function handleDelete(id) {
        let form = document.getElementById('deleteForm');
        form.action = '/tags/' + id + '/delete';
        $('#deleteModal').modal('show');
    }
</script>
@endsection