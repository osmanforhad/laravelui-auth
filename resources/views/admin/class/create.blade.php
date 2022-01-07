@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    {{ __('Add New Class') }}
                    <a href="{{ route('class.index') }}" class="btn btn-info btn-sm" style="float:right;">All Class</a>
                </div>

                <div class="message">

                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                    {{session()->get('success')}}
                    </div>
                    @endif

                </div>

                <div class="card-body">

                    <form action="{{ route('store.class') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Class Name</label>
                            <input type="text" name="class_name" class="form-control @error('class_name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Class Name" value="{{ old('class_name') }}">
                            @error('class_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection