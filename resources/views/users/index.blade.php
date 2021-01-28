@extends('layouts.admin')

@section('title')
The Expeditions | Admin-Users
@endsection
@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <h2>Users</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    @if($users->count() > 0)
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                          


                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $users as $user)
                        <tr class="align-items-center">
                            <th scope="row">{{ ++$loop->index}}</th>
                            <td>
                                <img src="{{ Gravatar::get($user->email) }}" alt="image" class="shadow rounded-circle" style="width:60px;height:60px">
                            </td>
                            <td>
                                <a href="{{ route('users.show', $user->slug) }}">
                                    {{ $user->name}} 
                                    @if($user->isAdmin()) 
                                    <span class="text-success ml-2">- Admin</span>
                                    @endif
                                </a>
                            </td>
                            <td>{{ $user->email}}</td>
                            
                            

                        </tr>
                        @endforeach

                    </tbody>
                    @else
                    <h2 class="text-secondary text-center">No Users Yet</h2>
                    @endif
                </table>

            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')

@endsection