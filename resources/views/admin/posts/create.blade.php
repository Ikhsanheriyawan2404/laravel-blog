@extends('website.template.admin', compact('title'))

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            Create New Post
                            <a href="{{ route('posts.index') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="thumbnail">Thumbnail</label>
                                <input type="text" name="thumbnail" class="form-control">
                                @error('name')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control">
                                @error('title')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                            <div class="form-group">
                                <label for="sub_title">Sub Title</label>
                                <input type="text" name="sub_title" class="form-control">
                                @error('sub_title')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                            <div class="form-group">
                                <label for="details">Details</label>
                                <textarea name="details" class="form-control"></textarea>
                                @error('details')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select type="text" name="category[]" id="category" class="form-control" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
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

@section('custom-styles')
    <link rel="stylesheet" href="{{ asset('select2/dist/css/select2.min.css') }}">
@endsection
@section('custom-scripts')
    <script src="{{ asset('select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('details');

            $('#category').select2({
                placeholder: 'Choose Category'
            });
        });
    </script>
@endsection
