<div class="header-nav-bar header-nav-bar-top-border bg-light">
  <div class="header-container container">
    <div class="header-row">
      <div class="header-column">
        <div class="header-row justify-content-end">
          <div class="header-nav p-0">
            <div class="header-nav header-nav-line header-nav-divisor header-nav-spaced justify-content-lg-center">
              <div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
                <nav class="collapse">
                  <ul class="nav nav-pills flex-column flex-lg-row" id="mainNav">
                    <li class="dropdown">
                      <a class="dropdown-item dropdown-toggle @yield('home-active')" href="{{ url('/') }}"><i class="fas fa-home"></i>
                      </a>
                    </li>
                    <li class="dropdown">
                      <a class="dropdown-item dropdown-toggle @yield('about-us-active')" href="{{ url('aboutus') }}">About Us</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('aboutus') }}">Why Investing Partner</a></li>
                        <li><a class="dropdown-item" href="{{ url('regulation') }}">Our Regulation</a></li>
                        <li><a class="dropdown-item" href="{{ url('newsrelease') }}">News Release</a></li>
                        <li><a class="dropdown-item" href="{{ url('career') }}">Career</a></li>
                        <li><a class="dropdown-item" href="{{ url('sitemap') }}">Sitemap</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a class="dropdown-item dropdown-toggle @yield('core-service-active')" href="javascript:void(0)">
                        Core Services
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('forex-signal-package') }}">Premium Signal</a></li>
                        <li><a class="dropdown-item" href="{{ url('copytrade') }}">CopyTrade Service</a></li>
                        <li><a class="dropdown-item" href="{{ url('fund-management') }}">Fund Management</a></li>
                        <!-- <li><a class="dropdown-item" href="{{ url('forex-consultancy') }}">FX Consultancy</a></li>
                        <li><a class="dropdown-item" href="profile/profile.html">Profile</a></li> -->
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a class="dropdown-item dropdown-toggle @yield('signal-active')" href="javascript:void(0)">
                        Signal
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('forex-signal') }}">Free Forex Signal</a></li>
                        <li><a class="dropdown-item" href="{{ url('forex-signal-package') }}">Premium Signal Packages</a></li>
                        <li><a class="dropdown-item" href="{{ url('forex-signal-report') }}">Performance Report</a></li>
                        <li><a class="dropdown-item" href="{{ url('signal-faq') }}">Signal Faq Section</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a class="dropdown-item dropdown-toggle @yield('analysis-active')" href="{{ url('/analysis') }}">
                        Analysis
                      </a>
                    </li>
                    <!-- <li class="dropdown">
                      <a class="dropdown-item dropdown-toggle @yield('blog-active')" href="{{ url('blogs') }}">
                        Official Blog
                      </a>
                    </li> -->
                    <li class="dropdown">
                      <a class="dropdown-item dropdown-toggle @yield('review-active')" href="javascript:void(0)">
                        Review Section
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('forex-brokers') }}">Forex Broker Reviews</a></li>
                        <!-- <li><a class="dropdown-item" href="{{ url('forex-vpx-review') }}">Forex VPS Reviews</a></li> -->
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a class="dropdown-item dropdown-toggle @yield('blog-active')" href="javascript:void(0)"> More
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('blog') }}">Official Blog</a></li>
                        <li><a class="dropdown-item" href="{{ url('affiliate') }}">Affiliate Programme</a></li>
                        <li><a class="dropdown-item" href="{{ url('testimonial') }}">Review Testimonial </a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a class="dropdown-item dropdown-toggle @yield('support-active')" href="javascript:void(0)"> Support
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('contact-us') }}">Contact Us</a></li>
                        <li><a class="dropdown-item" href="{{ url('/faq') }}">FAQ Section</a></li>
                        <li><a class="dropdown-item" href="{{ url('/knowledgebase') }}">Knowledgebase</a></li>
                      </ul>
                    </li>
                  </ul>
                </nav>
              </div>
              <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                <i class="fas fa-bars"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>