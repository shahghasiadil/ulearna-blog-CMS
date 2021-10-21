@extends('layouts.master')

@section('contents')
<div class="card card-body">
    <h3 class="card-title mt-0 text-center">{{ $user->name }}</h3>
    <div class="d-flex justify-content-between">
        <h3 class="card-title mt-0 text-left"> Posted  {{ $user->posts->count()  }}  {{ Str::plural('post', $user->posts->count()) }}</h3>
        <h3 class="card-title mt-0 text-left"> Recieved   {{ $user->recievedLikes->count()  }}  {{ Str::plural('like', $user->recievedLikes->count()) }}</h3>
    </div>
   
</div>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Blog List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
                    <li class="breadcrumb-item active">Blog List</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-9 col-lg-8">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom justify-content-center pt-2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#all-post" role="tab">
                        All Post
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#archive" role="tab">
                        Archive
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-4">
                <div class="tab-pane active" id="all-post" role="tabpanel">
                    <div>
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <div>
                                    <div class="row align-items-center">
                                        <div class="col-4">
                                            <div>
                                                <h5 class="mb-0">Blog List</h5>
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <div class="float-right">

                                                <ul class="nav nav-pills">
                                                    <li class="nav-item">
                                                        <a class="nav-link disabled" href="#" tabindex="-1"
                                                            aria-disabled="true">View :</a>
                                                    </li>
                                                    <li class="nav-item" data-toggle="tooltip"
                                                        data-placement="top" title="List">
                                                        <a class="nav-link active" href="blog-list.html">
                                                            <i class="mdi mdi-format-list-bulleted"></i>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" data-toggle="tooltip"
                                                        data-placement="top" title="Grid">
                                                        <a class="nav-link" href="blog-grid.html">
                                                            <i class="mdi mdi-view-grid-outline"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <hr class="mb-4">
                                    @if ($user->posts->count())
                                        @foreach ($user->posts as $post)
                                            <x-post :post="$post"/>
                                        @endforeach

                                    @endif


                                    <hr class="my-5">

                                    <div class="text-center">
                                        <ul class="pagination justify-content-center pagination-rounded">
                                           {{-- {{ $user->posts->links() }} --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="archive" role="tabpanel">
                    <div>
                        <div class="row justify-content-center">
                            <div class="col-xl  -8">
                                <h5>Archive</h5>

                                <div class="mt-5">
                                    <div class="d-flex flex-wrap">
                                        <div class="mr-2">
                                            <h4>2020</h4>
                                        </div>
                                        <div class="ml-auto">
                                            <span
                                                class="badge badge-soft-success badge-pill float-right ml-1 font-size-12">03</span>
                                        </div>
                                    </div>
                                    <hr class="mt-2">

                                    <div class="list-group list-group-flush">
                                        <a href="blog-details.html" class="list-group-item text-muted"><i
                                                class="mdi mdi-circle-medium mr-1"></i> Beautiful Day with Friends</a>

                                        <a href="blog-details.html" class="list-group-item text-muted"><i
                                                class="mdi mdi-circle-medium mr-1"></i> Drawing a sketch</a>

                                        <a href="blog-details.html" class="list-group-item text-muted"><i
                                                class="mdi mdi-circle-medium mr-1"></i> Project discussion with
                                            team</a>

                                    </div>
                                </div>

                                <div class="mt-5">
                                    <div class="d-flex flex-wrap">
                                        <div class="mr-2">
                                            <h4>2019</h4>
                                        </div>
                                        <div class="ml-auto">
                                            <span
                                                class="badge badge-soft-success badge-pill float-right ml-1 font-size-12">06</span>
                                        </div>
                                    </div>
                                    <hr class="mt-2">

                                    <div class="list-group list-group-flush">
                                        <a href="blog-details.html" class="list-group-item text-muted"><i
                                                class="mdi mdi-circle-medium mr-1"></i> Coffee with Friends</a>

                                        <a href="blog-details.html" class="list-group-item text-muted"><i
                                                class="mdi mdi-circle-medium mr-1"></i> Neque porro quisquam est</a>

                                        <a href="blog-details.html" class="list-group-item text-muted"><i
                                                class="mdi mdi-circle-medium mr-1"></i> Quis autem vel eum iure</a>

                                        <a href="blog-details.html" class="list-group-item text-muted"><i
                                                class="mdi mdi-circle-medium mr-1"></i> Cras mi eu turpis</a>

                                        <a href="blog-details.html" class="list-group-item text-muted"><i
                                                class="mdi mdi-circle-medium mr-1"></i> Drawing a sketch</a>

                                        <a href="blog-details.html" class="list-group-item text-muted"><i
                                                class="mdi mdi-circle-medium mr-1"></i> Project discussion with
                                            team</a>

                                    </div>
                                </div>

                                <div class="mt-5">
                                    <div class="d-flex flex-wrap">
                                        <div class="mr-2">
                                            <h4>2018</h4>
                                        </div>
                                        <div class="ml-auto">
                                            <span
                                                class="badge badge-soft-success badge-pill float-right ml-1 font-size-12">03</span>
                                        </div>
                                    </div>
                                    <hr class="mt-2">

                                    <div class="list-group list-group-flush">
                                        <a href="blog-details.html" class="list-group-item text-muted"><i
                                                class="mdi mdi-circle-medium mr-1"></i> Beautiful Day with Friends</a>

                                        <a href="blog-details.html" class="list-group-item text-muted"><i
                                                class="mdi mdi-circle-medium mr-1"></i> Drawing a sketch</a>

                                        <a href="blog-details.html" class="list-group-item text-muted"><i
                                                class="mdi mdi-circle-medium mr-1"></i> Project discussion with
                                            team</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-xl-3 col-lg-4">
        <div class="card">
            <div class="card-body p-4">
                <div class="search-box">
                    <p class="text-muted">Search</p>
                    <div class="position-relative">
                        <input type="text" class="form-control rounded bg-light border-light" placeholder="Search...">
                        <i class="mdi mdi-magnify search-icon"></i>
                    </div>
                </div>

                <hr class="my-4">

                <div>
                    <p class="text-muted">Categories</p>

                    <ul class="list-unstyled font-weight-medium">
                        <li><a href="#" class="text-muted py-2 d-block"><i class="mdi mdi-chevron-right mr-1"></i>
                                Design</a></li>
                        <li><a href="#" class="text-muted py-2 d-block"><i class="mdi mdi-chevron-right mr-1"></i>
                                Development <span
                                    class="badge badge-soft-success badge-pill float-right ml-1 font-size-12">04</span></a>
                        </li>
                        <li><a href="#" class="text-muted py-2 d-block"><i class="mdi mdi-chevron-right mr-1"></i>
                                Business</a></li>
                        <li><a href="#" class="text-muted py-2 d-block"><i class="mdi mdi-chevron-right mr-1"></i>
                                Project</a></li>
                        <li><a href="#" class="text-muted py-2 d-block"><i class="mdi mdi-chevron-right mr-1"></i>
                                Travel<span
                                    class="badge badge-soft-success badge-pill ml-1 float-right font-size-12">12</span></a>
                        </li>
                    </ul>
                </div>

                <hr class="my-4">

                <div>
                    <p class="text-muted">Archive</p>

                    <ul class="list-unstyled font-weight-medium">
                        <li><a href="#" class="text-muted py-2 d-block"><i class="mdi mdi-chevron-right mr-1"></i>
                                2020 <span
                                    class="badge badge-soft-success badge-pill float-right ml-1 font-size-12">03</span></a>
                        </li>
                        <li><a href="#" class="text-muted py-2 d-block"><i class="mdi mdi-chevron-right mr-1"></i>
                                2019 <span
                                    class="badge badge-soft-success badge-pill float-right ml-1 font-size-12">06</span></a>
                        </li>
                        <li><a href="#" class="text-muted py-2 d-block"><i class="mdi mdi-chevron-right mr-1"></i>
                                2018 <span
                                    class="badge badge-soft-success badge-pill float-right ml-1 font-size-12">05</span></a>
                        </li>
                    </ul>
                </div>

                <hr class="my-4">

                <div>
                    <p class="text-muted mb-2">Popular Posts</p>

                    <div class="list-group list-group-flush">

                        <a href="#" class="list-group-item text-muted py-3 px-2">
                            <div class="media align-items-center">
                                <div class="mr-3">
                                    <img src="assets/images/small/img-7.jpg" alt=""
                                        class="avatar-md h-auto d-block rounded">
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h5 class="font-size-13 text-truncate">Beautiful Day with Friends</h5>
                                    <p class="mb-0 text-truncate">10 Apr, 2020</p>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="list-group-item text-muted py-3 px-2">
                            <div class="media align-items-center">
                                <div class="mr-3">
                                    <img src="assets/images/small/img-4.jpg" alt=""
                                        class="avatar-md h-auto d-block rounded">
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h5 class="font-size-13 text-truncate">Drawing a sketch</h5>
                                    <p class="mb-0 text-truncate">24 Mar, 2020</p>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="list-group-item text-muted py-3 px-2">
                            <div class="media align-items-center">
                                <div class="mr-3">
                                    <img src="assets/images/small/img-6.jpg" alt=""
                                        class="avatar-md h-auto d-block rounded">
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h5 class="font-size-13 text-truncate">Project discussion with team</h5>
                                    <p class="mb-0 text-truncate">11 Mar, 2020</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <hr class="my-4">

                <div>
                    <p class="text-muted mb-1">Tags</p>

                    <ul class="list-inline widget-tag">
                        <li class="list-inline-item"><a href="#"
                                class="badge badge-light font-size-12 mt-2">Design</a></li>
                        <li class="list-inline-item"><a href="#"
                                class="badge badge-light font-size-12 mt-2">Development</a></li>
                        <li class="list-inline-item"><a href="#"
                                class="badge badge-light font-size-12 mt-2">Business</a></li>
                        <li class="list-inline-item"><a href="#"
                                class="badge badge-light font-size-12 mt-2">Project</a></li>
                        <li class="list-inline-item"><a href="#"
                                class="badge badge-light font-size-12 mt-2">Travel</a></li>
                        <li class="list-inline-item"><a href="#"
                                class="badge badge-light font-size-12 mt-2">Lifestyle</a></li>
                        <li class="list-inline-item"><a href="#"
                                class="badge badge-light font-size-12 mt-2">Photography</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
</div>

@endsection