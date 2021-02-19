@extends('website.template.admin', compact('title'))

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            Edit Category
                            <a href="{{ route('categories.index') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.update', $category->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="thumbnail">Thumbnail</label>
                                <input type="text" name="thumbnail" class="form-control" value="{{ old('thumbnail') ?? $category->thumbnail }}">
                                @error('name')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') ?? $category->name }}">
                                @error('name')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                            <div class="form-group">
                                <label for="is_published">Published</label>
                                <select name="is_published" class="form-control">
                                    <option value="1" {{ $category->is_published == '1' ? 'selected' : '' }}>Publish</option>
                                    <option value="0" {{ $category->is_published == '0' ? 'selected' : '' }}>Draft</option>
                                </select>
                                @error('name')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
