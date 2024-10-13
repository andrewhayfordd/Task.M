@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Task Management</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Task</a>

    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark bg-white">
            <tr>
                <th class="px-4 py-2 border text-center">ID</th>
                <th class="px-4 py-2 border text-center">Title</th>
                <th class="px-4 py-2 border text-center">Content</th>
                <th class="px-4 py-2 border text-center">Status</th>
                <th class="px-4 py-2 border text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td class="px-4 py-2 border text-center">{{ $post->id }}</td>
                <td class="px-4 py-2 border text-center">{{ $post->title }}</td>
                <td class="px-4 py-2 border text-center">{{ Str::limit($post->content, 50) }}</td> <!-- Optional: Limits content to 50 characters -->
                <td class="px-4 py-2 border text-center">
                    <span style="color: #fff; background-color: {{ $post->status == 'completed' ? 'green' : 'red' }}; border-radius: 5px; padding: 3px 5px;">
                        {{ ucfirst($post->status) }}
                    </span>
                </td>
                <td class="px-4 py-2 border text-center">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
