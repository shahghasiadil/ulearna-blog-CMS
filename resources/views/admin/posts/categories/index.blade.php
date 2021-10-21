@extends('layouts.master')

@section('contents')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-center">Categories Table</h4>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Created</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <div class="pagination d-flex justify-content-center pagination-rounded">
                {{ $categories->links() }}
            </div>

        </div>
    </div>
@endsection
