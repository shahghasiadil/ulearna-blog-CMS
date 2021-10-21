@extends('layouts.master')

@section('contents')
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Title</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="title" id="example-text-input">
                                @error('title')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Body</label>
                            <div class="col-md-10">
                                <textarea id="textarea" name="body" class="form-control" maxlength="225" rows="3"
                                    placeholder="This textarea has a limit of 225 chars."></textarea>
                                @error('body')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Category</label>
                            <div class="col-md-10">
                                <select class="form-control" name="category_id">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">File Upload</label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="file" id="example-text-input">
                                @error('file')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </div>


                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </form>

    <!-- end row -->
@endsection
