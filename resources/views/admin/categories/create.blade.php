@extends('website.template.admin', compact('title'))

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            Create New Category
                            <a href="{{ route('categories.index') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="thumbnail">Thumbnail</label>
                                <input type="text" name="thumbnail" class="form-control">
                                @error('name')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control">
                                @error('name')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                            <div class="form-group">
                                <label for="is_published">Published</label>
                                <select name="is_published" class="form-control">
                                    <option disabled selected>Choose</option>
                                    <option value="1">Published</option>
                                    <option value="0">Draft</option>
                                </select>
                                @error('name')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
