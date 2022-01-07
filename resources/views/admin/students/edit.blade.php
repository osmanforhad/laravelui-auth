@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    {{ __('Edit Student info') }}
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

                    <form action="{{ route('students.update',$student->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Class Name</label>
                         <select class="form-control" name="class_id">
                             @foreach($classes as $class)
                             <option value="{{ $class->id }}" @if($class->id == $student->class_id) selected @endif>{{ $class->class_name }}</option>
                             @endforeach
                         </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Student Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ $student->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Student Roll <span class="text-danger">*</span> </label>
                            <input type="text" name="roll" class="form-control" value="{{ $student->roll}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Student Phone <span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control" value="{{ $student->phone}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Student Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $student->email}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection