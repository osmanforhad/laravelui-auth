@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    {{ __('Add New Student') }}
                    <a href="{{ route('students.index') }}" class="btn btn-info btn-sm" style="float:right;">All Students</a>
                </div>

                <div class="message">

                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                    {{session()->get('success')}}
                    </div>
                    @endif

                </div>

                <div class="card-body">

                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Class Name</label>
                         <select class="form-control" name="class_id">
                             @foreach($classes as $class)
                             <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                             @endforeach
                         </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Student Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                            id="exampleInputEmail1" placeholder="Student Name" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Student Roll <span class="text-danger">*</span> </label>
                            <input type="text" name="roll" class="form-control @error('roll') is-invalid @enderror"
                             id="exampleInputEmail1" placeholder="Student Roll" value="{{ old('roll') }}">
                            @error('roll')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Student Phone <span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" 
                            id="exampleInputEmail1" placeholder="Student Phone" value="{{ old('phone') }}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Student Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Student Email" value="{{ old('email') }}">
                            @error('email')
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