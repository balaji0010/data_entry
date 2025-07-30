@extends('layouts.head')

@section('content')
<div class="container login-container">
    <div class="login-card">
        <h5 class="login-title">DATA_entry</h5>

        @if ($errors->any())
            <div class="alert alert-danger text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">admin name</label>
                <input type="text" name="username" value="{{ old('username') }}" class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            
            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-green px-4">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
