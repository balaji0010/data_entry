@extends('layouts.head')

@section('content')
<div id="FormUsers">

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
            <button @click="openModal" class="btn-action btn-add">Add User</button>
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
                <tr v-for="user in users" :key="user.id">
                    <td>@{{ user.name }}</td>
                    <td v-for="form in ['A','B','C','D','E']" :key="form">
                        <div class="form-card">
                            <strong>Form @{{ form }}</strong>
                            <a href="#">Download</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Modal --}}
    <div v-if="showModal" class="modal-overlay">
        <div class="modal-box">
            <h2>Add User</h2>
            <form @submit.prevent="storeUser">
                <label>Name:</label>
                <input type="text" v-model="form.name" required>
                <br>
                <label>Email:</label>
                <input type="email" v-model="form.email" required>
                <br>
                <button type="submit">Save</button>
                <button type="button" @click="closeModal">Cancel</button>
            </form>
        </div>
    </div>

</div>
@endsection
