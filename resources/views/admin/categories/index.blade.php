@extends('website.template.admin', compact('title'))

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('website.components.alert')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            Category - List
                            <a href="{{ route('categories.create') }}" class="btn btn-primary">Create Category</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-strip">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>User</th>
                                    <th><i class="fas fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->user->name }}</td>
                                        <td>
                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger d-inline" onclick="return confirm('are you sure want to delete this?')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
