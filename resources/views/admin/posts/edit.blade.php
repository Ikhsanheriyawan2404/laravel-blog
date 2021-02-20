@extends('website.template.admin', compact('title'))

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            Edit Post
                            <a href="{{ route('posts.index') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="thumbnail">Thumbnail</label>
                                <input type="text" name="thumbnail" class="form-control" value="{{ old('thumbnail') ?? $post->thumbnail }}">
                                @error('thumbnail')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('thumbnail') ?? $post->thumbnail }}">
                                @error('title')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                            <div class="form-group">
                                <label for="sub_title">Sub Title</label>
                                <input type="text" name="sub_title" class="form-control" value="{{ old('thumbnail') ?? $post->thumbnail }}">
                                @error('sub_title')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                            <div class="form-group">
                                <label for="details">Details</label>
                                <textarea name="details" class="form-control" value="{{ old('thumbnail') ?? $post->thumbnail }}"></textarea>
                                @error('details')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select type="text" name="category[]" id="category" class="form-control" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $post->categories()->find($category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                            <div class="form-group">
                                <label for="is_published">Published</label>
                                <select name="is_published" class="form-control">
                                    <option value="1" {{ $category->is_published == '1' ? 'selected' : '' }}>Publish</option>
                                    <option value="0" {{ $category->is_published == '0' ? 'selected' : '' }}>Draft</option>
                                </select>
                                @error('is_published')
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
