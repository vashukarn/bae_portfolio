<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="bx bxs-dashboard"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                <li class="menu-title" key="t-apps">CMS</li>
                <li>
                    <a href="{{ route('blogs.index') }}" class="waves-effect">
                        <i class="bx bxs-quote-alt-right"></i>
                        <span key="t-chat">Blogs</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('carousel.index') }}" class="waves-effect">
                        <i class="bx bx-square-rounded"></i>
                        <span key="t-chat">Carousel</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('blogs.categories.index') }}" class="waves-effect">
                        <i class="bx bx-sitemap"></i>
                        <span key="t-chat">Blog Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('blogs.tags.index') }}" class="waves-effect">
                        <i class="bx bx-purchase-tag"></i>
                        <span key="t-chat">Blog Tags</span>
                    </a>
                </li>
{{--                <li>--}}
{{--                    <a href="{{ route('blogs.index-page') }}" class="waves-effect">--}}
{{--                        <i class="bx bx-wrench"></i>--}}
{{--                        <span key="t-chat">Blog Settings</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li>
                    <a href="{{ route('subscriptions.index') }}" class="waves-effect">
                        <i class="bx bxs-grid-alt"></i>
                        <span key="t-chat">Subscription List</span>
                    </a>
                </li>
{{--                <li>--}}
{{--                    <a href="{{ route('contact_forms.index') }}" class="waves-effect">--}}
{{--                        <i class="bx bxs-contact"></i>--}}
{{--                        <span key="t-chat">Contact Form List</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li>
                    <a href="{{ route('recommendations.index') }}" class="waves-effect">
                        <i class="bx bx-group"></i>
                        <span key="t-chat">Recommendations</span>
                    </a>
                </li>
{{--                <li class="menu-title" key="t-apps">Users</li>--}}
{{--                <li>--}}
{{--                    <a href="{{ route('users.index') }}" class="waves-effect">--}}
{{--                        <i class="bx bx-user-check"></i>--}}
{{--                        <span key="t-chat">Users</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{ route('roles.index') }}" class="waves-effect">--}}
{{--                        <i class="bx bxs-user-badge"></i>--}}
{{--                        <span key="t-chat">Roles</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
</div>
