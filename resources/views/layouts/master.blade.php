@include('layouts.head')
@include('layouts.nav')
@include('layouts.sidebar')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @yield('contents')
        </div>
    </div>
</div>
{{-- @yield('scripts') --}}
@include('layouts.footer')
