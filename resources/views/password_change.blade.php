@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Your Password') }}</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    @if(session()->has('success'))
                       <strong class="text-success">{{session()->get('success')}}</strong>
                    @endif

                    @if(session()->has('error'))
                       <strong class="text-danger">{{session()->get('error')}}</strong>
                    @endif

                    <form method="POST" action="{{ route('update.password') }}">
                        @csrf
                        <div>
                            <label>Current Password</label>
                            <input type="password" name="currecnt_password" value="{{old('currecnt_password')}}" class="form-control" required>
                        </div><br>
                        <div>
                            <label>New Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div><br>
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
