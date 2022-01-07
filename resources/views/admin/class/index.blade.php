@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('All Class') }}
                    <a href="{{ route('create.class') }}" class="btn btn-primary btn-sm" style="float:right;">Add New</a>
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
                                <td>Class Name</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($class as $key=>$row)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $row->class_name }}</td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm">Edit</a>
                                    <!-- <a href="{{ url('class/delete'.$row->id) }}" class="btn btn-danger btn-sm">Delete</a> -->
                                    <a href="{{ route('class.delete', $row->id) }}" class="btn btn-danger btn-sm">Delete</a>
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