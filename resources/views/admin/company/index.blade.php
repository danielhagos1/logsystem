@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Company</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                        <tr>
                            <th scope="row">{{ $company->id}}</th>

                            <td>{{ implode(', ' , $company
                            ->user()->get()->pluck('name')->toArray())}}</td>
                            <td>{{ implode(', ' , $company
                            ->user()->get()->pluck('email')->toArray())}}</td>
                            <td>{{ $company->cname}}</td>
                            <td>
                                <a href="{{route('admin.company.edit', $company->id)}}">
                                    <button type="button" class="btn btn-primary float-left">
                                        Edit
                                    </button></a>

                                <form action="{{ route('admin.company.destroy', $company) }}" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}

                                    <button type="submit" class="btn btn-danger float-left">
                                        Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('admin.company.create')}}">
                    <button type="button" class="btn btn-primary">
                        Create
                    </button></a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection