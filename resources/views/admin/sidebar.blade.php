<?php 
$settings = settings();

?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div
        class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top"
    >
    <a class="sidebar-brand brand-logo" href="{{ route('dashboard') }}">
        <img  src="{{ isset($settings['logo']) ? asset('public/logo/' . $settings['logo']) : asset('public/logo/logo.png') }}" alt="logo"  width="100px" />
    </a>

    <a class="sidebar-brand brand-logo-mini" href="{{ route('dashboard') }}">
        <img  src="{{ isset($settings['logo']) ? asset('public/logo/' . $settings['logo']) : asset('public/logo/logo.png') }}" alt="logo"  width="100px"  />
    </a>
    
    
    
    
    
        {{-- <a class="sidebar-brand brand-logo-mini" href="index.html"
            ><img src="{{ asset($settings->setting_value) }}" alt="logo" /></a> --}}
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img
                            class="img-xs rounded-circle"
                            src="{{asset('public/admin/assets/images/faces/face15.jpg')}}"
                            alt=""
                        />
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                            @auth
                            <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name}}</h5>
                           @endauth
                    </div>
                </div>
                <a
                    href="#"
                    id="profile-dropdown"
                    data-toggle="dropdown"
                    ><i class="mdi mdi-dots-vertical"></i
                >
            </a>
                <div
                    class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown"
                >
                    {{-- <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div
                                class="preview-icon bg-dark rounded-circle"
                            >
                                <i
                                    class="mdi mdi-settings text-primary"
                                ></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p
                                class="preview-subject ellipsis mb-1 text-small"
                            >
                                Account settings
                            </p>
                        </div>
                    </a> --}}
                
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('dashboard')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a
                class="nav-link"
                data-toggle="collapse"
                href="#ui-basic"
                aria-expanded="false"
                aria-controls="ui-basic"
            >
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('viewcategory') }}"
                            >Create Category</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('viewcategorylist') }}"
                            >Categories</a
                        >
                    </li>
                   
                </ul>
            </div>
        </li>
    
     
     
      
        <li class="nav-item menu-items">
            <a
                class="nav-link"
                data-toggle="collapse"
                href="#auth"
                aria-expanded="false"
                aria-controls="auth"
            >
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('product') }}"
                        >
                            Create Product
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('showproduct') }}"
                        >
                        Products
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('viewsettings') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-settings"></i>
                </span>
                <span class="menu-title">Settings</span>
            </a>
        </li>
        
        @if (!isset($settings['logo']))
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('uploadLogo') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">Upload Logo</span>
            </a>
        </li>
         @endif
    
    </ul>
</nav>