<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>united podcast dashboard | @yield('title')</title>
  @yield('styles')
  <link rel="stylesheet" href="{{ asset('/dashboard/css/styles.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('/libs/swiper.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800&display=swap"
    rel="stylesheet">
  <style>
    * {
      font-family: 'Cairo', sans-serif !important;
    }
    .left-sidebar {
      border-left: 1px solid rgb(229,234,239);
    }
    img {
      max-width: 300px
    }
    .pop-up {
      margin: auto;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      max-width: 500px;
      z-index: 99999999;
    }
    .hide-content {
      width: 100vw;
      height: 100vh;
      background-color: #0000004d;
      position: fixed;
      top: 0;
      left: 0;
      z-index: calc(99999993 - 1);
    }
    #errors {
      position: fixed;
      top: 1.25rem;
      right: 1.25rem;
      display: flex;
      flex-direction: column;
      max-width: calc(100% - 1.25rem * 2);
      gap: 1rem;
      z-index: 99999999999999999999;

    }
    #errors >* {
      width: 100%;
      color: #fff;
      font-size: 1.1rem;
      padding: 1rem;
      border-radius: 1rem;
      box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    #errors .error {
      background: #e41749;
    }
    #errors .success {
      background: #12c99b;
    }
    .loader {
      width: 100vw;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      justify-content: center;
      align-items: center;
      z-index: 9999999999999999999999999999999999 !important;
      background: #fafafa !important;
      backdrop-filter: blur(1px);
      display: flex
    }
    .custom-loader {
      --d:22px;
      width: 4px;
      height: 4px;
      border-radius: 50%;
      color: #365FA0;
      box-shadow:
        calc(1*var(--d))      calc(0*var(--d))     0 0,
        calc(0.707*var(--d))  calc(0.707*var(--d)) 0 1px,
        calc(0*var(--d))      calc(1*var(--d))     0 2px,
        calc(-0.707*var(--d)) calc(0.707*var(--d)) 0 3px,
        calc(-1*var(--d))     calc(0*var(--d))     0 4px,
        calc(-0.707*var(--d)) calc(-0.707*var(--d))0 5px,
        calc(0*var(--d))      calc(-1*var(--d))    0 6px;
      animation: s7 1s infinite steps(8);
    }

    @keyframes s7 {
      100% {transform: rotate(1turn)}
    }

    .show {
      display: block !important;
    }

  </style>
</head>

<body dir="rtl">
  <div id="errors"></div>
  <div class="loader">
    <div class="custom-loader"></div>
  </div>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="/admin" class="text-nowrap logo-img">
            <h4>united podcast daahboard</h4>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">الاخبار</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link @yield('articles_preview_active')" href="{{ route('article.prev') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-file-text"></i>
                </span>
                <span class="hide-menu">عرض جميع الاخبار</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link @yield('articles_add_active')" href="{{ route('articles.add') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-file-plus"></i>
                </span>
                <span class="hide-menu">اضافة خبر</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">البرامج</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link @yield('channels_preview_active')" href="{{ route('channel.prev') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-category"></i>
                </span>
                <span class="hide-menu">عرض جميع البرامج</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link @yield('channels_add_active')" href="{{ route('channels.add') }}" aria-expanded="false">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-plus" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4h6v6h-6zm10 0h6v6h-6zm-10 10h6v6h-6zm10 3h6m-3 -3v6" /></svg>
                </span>
                <span class="hide-menu">اضافة برنامج</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">المزيعين</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link @yield('authors_preview_active')" href="{{ route('author.prev') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">عرض جميع المزيعين</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link @yield('authors_add_active')" href="{{ route('authors.add') }}" aria-expanded="false">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-plus" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4c.96 0 1.84 .338 2.53 .901" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M16 19h6" /><path d="M19 16v6" /></svg>
                </span>
                <span class="hide-menu">اضافة مزيع</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">الاعدادات</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link @yield('about_update_active')" href="{{ route('update.about') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-info-circle"></i>
                </span>
                <span class="hide-menu">من نحن</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link @yield('contact_update_active')" href="{{ route('update.contact') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-address-book"></i>
                </span>
                <span class="hide-menu">اتصل بنا</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li> --}}
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        @yield('content')
      </div>
    </div>
  </div>
  <script src="{{ asset('/dashboard/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('/dashboard/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/dashboard/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('/dashboard/js/app.min.js') }}"></script>
  <script src="{{ asset('/dashboard/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('/libs/vue.js') }}"></script>
  <script src="{{ asset('/libs/jquery.js') }}"></script>
  <script src="{{ asset('/libs/swiper.js') }}"></script>
  <script src="{{ asset('/libs/axios.js') }}"></script>

  @yield('scripts')
</body>

</html>
