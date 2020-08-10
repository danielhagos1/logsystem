@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit company {{$company->cname}}</div>

                <div class="card-body">

                    <form action="{{route('admin.company.update', $company->id)}}" method="post">

                        <div class="form-group row">

                            <label for="cname" class="col-md-2 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control @error('cname') is-invalid @enderror"
                                    name="cname" value="{{ $company->cname }}" required>


                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        @csrf {{method_field('PUT')}} <div class="form-group row">
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