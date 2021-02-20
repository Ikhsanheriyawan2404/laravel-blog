@extends('website.template.admin', compact('title'))

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('website.components.alert')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            Post - List
                            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-strip">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th><i class="fas fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->categories()->get()->implode('name', ',') }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger d-inline" onclick="return confirm('are you sure want to delete this?')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
