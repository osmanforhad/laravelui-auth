@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('All Students') }}
                    <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm" style="float:right;">Add New Student</a>
                </div>

                <div class="message">

                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{session()->get('success')}}
                    </div>
                    @endif

                </div>

                <div class="card-body">

                    <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <td>SL No</td>
                                <td>Roll</td>
                                <td>Name</td>
                                <td>Phone</td>
                                <td>Class Name</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $key=>$student)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $student->roll }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->class_id }}</td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm">Edit</a>
                                    <!-- <a href="{{ url('class/delete'.$student->id) }}" class="btn btn-danger btn-sm">Delete</a> -->
                                    <a href="{{ route('students.destroy',$student->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection