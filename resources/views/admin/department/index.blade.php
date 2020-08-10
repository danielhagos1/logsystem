@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Departments') }}</div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Dept</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departments as $department)
                        <tr>
                            <th scope="row">{{$department->id}}</th>

                            <td>{{ implode(', ' , $department
                            ->user()->get()->pluck('name')->toArray())}}</td>
                            <td>{{ implode(', ' , $department
                            ->user()->get()->pluck('email')->toArray())}}</td>


                            <td>{{$department->dname}}</td>
                            <td>

                                <a href="{{route('admin.department.edit', $department->id)}}">
                                    <button type="button" class="btn btn-primary">
                                        Edit
                                    </button></a>

                                <form action="{{ route('admin.department.destroy', $department) }}" method="post"
                                    class="float-left">
                                    @csrf
                                    {{method_field('DELETE')}}

                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>

                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
                <a href="{{route('admin.department.create')}}">
                    <button type="button" class="btn btn-primary">
                        Create
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection