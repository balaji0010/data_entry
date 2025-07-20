@extends('layouts.head')
@section('content')
    {{-- @include('includes.header')
    @include('includes.sidebar') --}}

        <!-- Main Content -->
        <div class="content-wrapper p-4">
            <div class="profile-box">
                <span>Welcome, <strong>{{ Auth::user()->first_name }}</strong> ({{ Auth::user()->username }})</span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger ms-2">Logout</button>
                </form>
            </div>

            <h2>📊 Dashboard Overview</h2>
            <p>This is your dashboard where you can view statistics, manage users, assign roles, and more.</p>

            <!-- Add widgets or sections here -->
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card text-bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text">123 users</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Projects</h5>
                            <p class="card-text">45 active</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Roles</h5>
                            <p class="card-text">5 roles defined</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

    @endsection