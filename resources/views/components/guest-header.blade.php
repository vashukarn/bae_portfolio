<header id="rt_header">
    <nav>
        <div class="navbar-wrapper" id="navigation">
            <div class="navbar navbar-default navbar-fixed-top reveal-menu-home" role="navigation">
                <div class="container nav-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                        data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <div class="logo">
                                    <a href="{{ route('index') }}"><img style="height: 60px;width: auto"
                                                                        src="{{ getBusinessSetting('logo') }}"
                                                                        alt="{{ getBusinessSetting('app_name') }}"></a>
                                </div>
                            </div> <!-- .navbar-header -->
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="{{ route('index') }}">About</a></li>
                                    @foreach($top_categories as $top_category)
                                        <li>
                                            <a href="{{ route('category.index', $top_category->slug) }}">{{ $top_category->title }}</a>
                                        </li>
                                    @endforeach
                                    <li><a href="mailto:{{ getBusinessSetting('email') }}">Contact</a></li>
                                </ul>
                            </div>
                        </div> <!-- .col-md-12 -->
                    </div> <!-- .row -->
                </div> <!-- .container -->
            </div> <!-- .navbar -->
        </div> <!-- .navbar-wrapper -->
    </nav>
</header>
