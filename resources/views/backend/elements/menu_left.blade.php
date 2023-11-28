<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="waves-effect waves-dark" href="{{route('be_dashboard')}}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{route('categories.index')}}" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Table Categories</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{route('news.index')}}" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Table News</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{route('contacts.index')}}" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Table Contacts</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{route('blog.index')}}" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Table Blog</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{route('youtube.index')}}" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Table Youtube</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{route('icon_material')}}" aria-expanded="false"><i class="mdi mdi-emoticon"></i><span class="hide-menu">Icons</span></a>
                <li> <a class="waves-effect waves-dark" href="{{route('pages_error')}}" aria-expanded="false"><i class="mdi mdi-help-circle"></i><span class="hide-menu">Error 404</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <a href="{{ route('logout') }}" class="link" data-toggle="tooltip" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="mdi mdi-power"></i>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </a>
    </div>
    <!-- End Bottom points-->
</aside>