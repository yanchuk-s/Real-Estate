
<header class="header-default">
    <div class="top-bar">
    <div class="container">
        <div class="top-bar-left left">
            <ul class="top-bar-item right social-icons">
                @if($static_data['site_settings']['social_facebook']) <li><a href="{{ $static_data['site_settings']['social_facebook'] }}" target="_blank"><i class="fa fa-facebook"></i></a></li> @endif
                @if($static_data['site_settings']['social_twitter']) <li><a href="{{ $static_data['site_settings']['social_twitter'] }}"  target="_blank"><i class="fa fa-twitter"></i></a></li>@endif
                @if($static_data['site_settings']['social_youtube'])  <li><a href="{{ $static_data['site_settings']['social_youtube'] }}"  target="_blank"><i class="fa fa-youtube"></i></a></li>@endif
                @if($static_data['site_settings']['social_instagram'])  <li><a href="{{ $static_data['site_settings']['social_instagram'] }}" target="_blank"><i class="fa fa-instagram"></i></a></li>@endif
                @if($static_data['site_settings']['social_google_plus'])  <li><a href="{{ $static_data['site_settings']['social_google_plus'] }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>@endif
                @if($static_data['site_settings']['social_pinterest'])  <li><a href="{{ $static_data['site_settings']['social_pinterest'] }}" target="_blank"><i class="fa fa-pinterest"></i></a></li>@endif
                @if($static_data['site_settings']['social_linkedin'])  <li><a href="{{ $static_data['site_settings']['social_linkedin'] }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>@endif
                @if($static_data['site_settings']['social_tripadvisor'])  <li><a href="{{ $static_data['site_settings']['social_tripadvisor'] }}" target="_blank"><i class="fa fa-tripadvisor"></i></a></li>@endif            
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    </div>

    <div class="container">

    <!-- navbar header -->
    <div class="navbar-header">

        <div class="header-details">
        <div class="header-item header-phone mobile-phone left">
            <table>
            <tr>
                <td><i class="fa fa-phone"></i></td>
                <td class="header-item-text mobile-phone-text">
                Call us anytime<br/>
                <span class="firs-phone">{{ $static_data['site_settings']['contact_tel1'] }}</span>
                <span>{{ $static_data['site_settings']['contact_tel2'] }}</span>
                <span>{{ $static_data['site_settings']['contact_tel3'] }}</span>
                <span>{{ $static_data['site_settings']['contact_tel4'] }}</span>
                <span>{{ $static_data['site_settings']['contact_tel5'] }}</span>
                </td>
            </tr>
            </table>
        </div>
        <div class="header-item header-phone mobile-mail left">
            <table>
            <tr>
                <td><i class="fa fa-envelope"></i></td>
                <td class="header-item-text mail-phone-text">
                Drop us a line<br/>
                <span class="header-mail">{{ $static_data['site_settings']['contact_email'] }}</span>
                </td>
            </tr>
            </table>
        </div>
        <div class="clear"></div>
        </div>

        <a class="navbar-brand" href="/"><img src="{{ URL::asset('assets/images/home').'/'.get_setting('site_logo', 'site') }}" alt="Logo" /></a>

        <!-- nav toggle -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>

    </div>

    <!-- main menu -->
    <div class="navbar-collapse collapse">
        <div class="main-menu-wrap">
        <div class="container-fixed">
        <ul class="nav navbar-nav right">
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="{{ route('sale') }}">Sale</a>
            </li>
            <li>
                <a href="{{ route('rent') }}">Rent</a>
            </li>
            <li>
                <a href="{{ route('commercial') }}">Сommercial</a>
            </li>
            <li>
                <a href="{{ route('blog') }}">Blogs</a>
            </li>
            <li>
                <a href="{{ route('contact') }}">Contact Us</a>
            </li>
            @if(isset($pages) && count($pages) > 0)
                @foreach($pages as $page)
                    <li>
                        <a href="{{ route('page', ['alias' => $page->alias] ) }}">
                            {{ $page->contentDefault->title }}
                        </a>
                    </li>
                @endforeach
            @endif

        </ul>
        <div class="clear"></div>

        </div>

        </div><!-- end main menu wrap -->
    </div><!-- end navbar collaspe -->

    </div><!-- end container -->
</header>