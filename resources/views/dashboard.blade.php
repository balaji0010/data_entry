@extends('layouts.head')

@section('content')

<div class="top-bar">
    admin
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger ms-2">Logout</button>
                </form>
</div>

<div class="search-bar d-flex justify-content-between align-items-center">
    <input type="text" class="search-input" placeholder="Search for users">

    <div>
        <button class="btn-action btn-add">Add User</button>
        <button class="btn-action btn-delete">Delete</button>
    </div>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Users</th>
                <th>Form A</th>
                <th>Form B</th>
                <th>Form C</th>
                <th>Form D</th>
                <th>Form E</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 6; $i++)
                <tr>
                    <td>Vikram</td>
                    @foreach (['A', 'B', 'C', 'D', 'E'] as $form)
                        <td>
                            <div class="form-card">
                                <strong>Form {{ $form }}</strong>
                                <a href="#">Download</a>
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endfor
        </tbody>
    </table>
</div>
@endsection
