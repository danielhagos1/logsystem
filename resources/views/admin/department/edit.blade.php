@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit department {{$department->dname}}</div>

                <div class="card-body">

                    <form action="{{route('admin.department.update', $department->id)}}" method="post">

                        <div class="form-group row">
                            <label for="dname" class="col-md-2 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('dname') is-invalid @enderror"
                                    name="dname" value="{{ $department->dname }}" required>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group row">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection