 <!-- ========== Left Sidebar Start ========== -->
 <div class="vertical-menu">

     <div data-simplebar class="h-100">

         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li class="menu-title" key="t-menu">Menu</li>

                 <li>
                     <a href="javascript: void(0);" class="waves-effect">
                         <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right">04</span>
                         <span key="t-dashboards">Dashboards</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="index.html" key="t-default">Default</a></li>
                         <li><a href="dashboard-saas.html" key="t-saas">Saas</a></li>
                         <li><a href="dashboard-crypto.html" key="t-crypto">Crypto</a></li>
                         <li><a href="dashboard-blog.html" key="t-blog">Blog</a></li>
                     </ul>
                 </li>


                 <li>
                     <a href="javascript: void(0);" class="waves-effect">
                         <span class="badge badge-pill badge-success float-right" key="t-new">New</span>
                         <i class="bx bx-detail"></i>
                         <span key="t-blog">Blog</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('posts.index') }}" key="t-blog-list">Blog List</a></li>
                         <li><a href="{{ route('posts.create') }}" key="t-blog-grid">Add Post</a></li>
                         <li><a href="{{ route("posts.archive") }}">Archive Posts</a></li>
                         <li><a href="{{ route("categories.create") }}">Add Catgory</a></li>
                         <li><a href="{{ route("categories.index") }}">Category List</a></li>
                     </ul>
                 </li>

             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
 <!-- Left Sidebar End -->
