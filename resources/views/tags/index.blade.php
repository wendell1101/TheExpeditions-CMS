@extends('layouts.admin')

@section('title')
The Expeditions | Admin-Tags
@endsection
@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-header d-flex align-items-center">
            <h4>Tags</h4>
            <a href="{{ route('tags.create') }}" class="btn btn-primary ml-auto"><i class="fas fa-plus text-light"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    @if($tags->count() > 0)
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">No. of posts</th>

                            <th scope="col">Actions</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $tags as $tag)
                        <tr>
                            <th scope="row">{{ ++$loop->index}}</th>
                            <td><a href="{{ route('tags.show', $tag->slug) }}">{{ $tag->name}}</a></td>
                            <td>{{ $tag->posts->count() }}</td>
                            <td class="d-flex">
                                <a href="{{ route('tags.edit', $tag->slug) }}" class="text-warning mr-3">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="{{ route('tags.destroy', $tag->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border:none; background:none">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>

                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    @else
                    <h2 class="text-secondary text-center">No Tag Yet</h2>
                    @endif
                </table>
                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Tag</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h3>Are you sure you want to delete this tag?</h3>
                            </div>
                            <div class="modal-footer">
                                <form action="" method="POST" id="deleteForm">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Yes, Delete</button>
                                </form>
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
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