@extends('layouts.layout')
@section('title', 'Ideas | Admin Dashboard')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-sidebar')
        </div>
        <div class="col-9">
            <h1>Users</h1>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Content</th>
                        <th>Created At</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($ideas as $idea)
                    <tr>
                        <td>{{$idea->id}}</td>
                        <td>{{$idea->user->name}}</td>
                        <td>{{$idea->content}}</td>
                        <td>{{$idea->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('ideas.show', $idea->id)}}">View</a>
                            <a href="{{route('ideas.edit', $idea->id)}}">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{$ideas->withQueryString()->links()}}
            </div>
        </div>
    </div>
@endsection