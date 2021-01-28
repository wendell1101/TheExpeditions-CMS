@extends('layouts.admin')

@section('title')
The Expeditions | Admin-Personal Information
@endsection
@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <h4>Personal Information</h4>
        </div>
        <div class="card-body">
           <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td><img src="{{ Gravatar::get($user->email) }}" alt="avatar" class="rounded-circle" style="width:30px"></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        </tr>
                       
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>
</div>



@endsection
