<!-- resources/views/admin/comments/approved.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Approved Comments</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if ($approvedComments->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Comment</th>
                <th>Article</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($approvedComments as $index => $comment)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $comment->username }}</td>
                <td>{{ $comment->content }}</td>
                <td>{{ $comment->article->title }}</td>
                <td>
                    <span class="badge badge-success">Approved</span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No approved comments found.</p>
    @endif
</div>
@endsection
