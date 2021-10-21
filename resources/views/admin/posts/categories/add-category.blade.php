@extends('layouts.master')

@section('contents')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="example-text-input">
                                @error('name')
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
