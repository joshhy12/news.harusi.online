@extends('layouts.home')

@section('content')
<div class="container">
    <h2 class="mb-4">User Details</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ Auth::user()->name }}</td>
                <td>{{ Auth::user()->email }}</td>
                <td>
                    <a href="{{ route('user.edit', Auth::user()->id) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
