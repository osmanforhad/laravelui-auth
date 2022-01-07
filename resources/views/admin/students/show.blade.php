@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Student Info') }}
                    <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm" style="float:right;">All Student</a>
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
                                <td>Name</td>
                                <td>Roll</td>
                                <td>Class Name</td>
                                <td>Phone</td>
                                <td>Email</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->roll }}</td>
                                <td>{{ $student->class_id }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->email }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection