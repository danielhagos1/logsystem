@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Department Name') }}</div>
                <br>

                <form method="POST" action="{{ route('admin.department.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="dname" class="col-md-4 col-form-label text-md-right">Name:</label>

                        <div class="col-md-6 ">
                            <input type="text" class="form-control @error('dname') is-invalid @enderror" name="dname"
                                placeholder="Enter Department Name" autofocus>

                            @error('dname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection