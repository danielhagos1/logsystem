@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <table class="table stripe">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">User Role</th>
                            <th scope="col">Company</th>
                            <th scope="col">Department</th>

                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ implode(', ', $user->roles()->pluck('name')->toArray()) }}</td>
                            <td>{{ implode(', ', $user->company()->pluck('cname')->toArray()) }}</td>
                            <td>{{ implode(', ', $user->department()->pluck('dname')->toArray()) }}</td>

                            <!--<td>{{ implode(', ', $user->department()->pluck('dname')->toArray()) }}</td>
                                <td>{{ implode(', ', $user->company()->pluck('cname')->toArray()) }}</td>-->
                            <td>
                                @can('edit-users')
                                <a href="{{route('admin.users.edit', $user->id)}}">
                                    <button type="button" class="btn btn-primary">
                                        Edit
                                    </button></a>
                                @endcan
                                @can('delete-users')
                                <form action="{{ route('admin.users.destroy', $user)}}" method="POST"
                                    class="float-left">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-warning float-left">Delete</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection