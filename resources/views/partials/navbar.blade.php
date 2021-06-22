<nav class="navbar navbar-expand-lg bg-white fixed-top scrolling-navbar">
    <div class="container">
      <div
        class="navbar-header d-flex justify-content-between align-items-center"
      >
        <div class="d-flex align-items-center">
          <button
            class="navbar-toggler pl-0"
            type="button"
            data-toggle="collapse"
            data-target="#main-navbar"
            aria-controls="main-navbar"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="lni-menu"></span>
          </button>
          @if(auth()->guard('user')->user())
          <div class="dropdown profile mx-3 desktop-hidden">
            <button
              class="btn p-0 btn-secondary bg-transparent border-0 dropdown-toggle"
              type="button"
              id="dropdownMenuButton"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <img src="{{auth()->guard('user')->user()->photo}}" style="width: 30px;height:30px"/>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item text-bold" href="{{route('frontend.dashboard.all')}}"
                >{{__('frontend.nav.dashboard')}}</a
              >
              <a class="dropdown-item color-danger" href="{{route('frontend.logout')}}"
                >{{__('frontend.nav.logout')}}</a
              >
            </div>
          </div>
          <div class="notification desktop-hidden">
            <a href="{{route('frontend.dashboard.notifications')}}"
              ><div class="icon">
                <div class="circle">{{auth()->guard('user')->user()->unreadNotifications()->count()}}</div>
                <i class="fa fa-bell"></i>
              </div>
            </a>
          </div>
          @endif
        </div>
        <a href="{{route('frontend.home')}}" class="navbar-brand">{{config('app.name')}}</a>
      </div>
      <div class="collapse navbar-collapse" id="main-navbar">
        <ul class="navbar-nav mr-auto w-100 justify-content-center">
          <li class="nav-item">
            <a class="nav-link" href="{{route('frontend.home')}}"> {{__('frontend.nav.home')}} </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('frontend.categories')}}"> {{__('frontend.nav.categories')}} </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('frontend.ads')}}"> {{__('frontend.nav.ads')}} </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('frontend.contact')}}"> {{__('frontend.nav.contact_us')}} </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('frontend.about')}}"> {{__('frontend.nav.who_are_we')}} </a>
          </li>
        </ul>
        <div class="post-btn d-flex align-items-center">
          @if(auth()->guard('user')->user())
          <div class="dropdown profile mx-3 mobile-hidden">
            <button
              class="btn p-0 btn-secondary bg-transparent border-0 dropdown-toggle"
              type="button"
              id="dropdownMenuButton"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <img src="{{auth()->guard('user')->user()->photo}}" style="width: 30px;height:30px"/>
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item text-bold" href="{{route('frontend.dashboard.all')}}"
                >{{__('frontend.nav.dashboard')}}</a
              >
              <a class="dropdown-item color-danger" href="{{route('frontend.logout')}}"
                >{{__('frontend.nav.logout')}}</a
              >
            </div>
          </div>
          <div class="notification mobile-hidden ml-3">
            <a href="{{route('frontend.dashboard.notifications')}}"
              ><div class="icon">
                <div class="circle">{{auth()->guard('user')->user()->unreadNotifications()->count()}}</div>
                <i class="fa fa-bell"></i>
              </div>
            </a>
          </div>
          @endif
          <a class="btn btn-common mx-2 text-white" href="{{route('frontend.ad.create')}}"
            ><i class="lni-pencil-alt"></i> {{__('frontend.nav.post_ad')}}</a
          >
          @if(!auth()->guard('user')->user())
          <a href="{{route('frontend.login')}}" class="btn btn-border"
            ><i class="lni-lock"></i> {{__('frontend.nav.login')}}</a
          >
          @endif
        </div>
      </div>
    </div>
  </nav>