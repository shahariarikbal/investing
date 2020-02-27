<div class="header-top header-top-default border-bottom-0 bg-dark">
  <div class="container">
    <div class="header-row py-2">
      <div class="header-column justify-content-start">
        <div class="header-row">
          <nav class="header-nav-top">
            <ul class="nav nav-pills text-uppercase text-2">
              <li class="nav-item nav-item-anim-icon">
                <a class="nav-link pl-0 text-light opacity-7" href="javascript:void(0)">
                  <i class="fa fa-fax"></i>Phone: +91 8443 847147
                </a>
              </li>
              <li class="nav-item nav-item-anim-icon d-none d-sm-none d-md-none d-lg-block">
                <a class="nav-link text-light opacity-7 pr-0" href="javascript:void(0)">
                  <i class="fas fa-envelope"></i> help@investingpartner.com
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="header-column justify-content-end">
        <div class="header-row">
          <!-- <ul class="header-social-icons social-icons d-none d-sm-none d-md-block social-icons-clean social-icons-icon-light">
            <li class="text-white">SOCIAL NETWORKS</li>
            <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
            <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
            <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
            <li class="social-icons-googleplus"><a href="http://www.gmail.com/" target="_blank" title="Google Plus"><i class="fab fa-google-plus-g"></i></a></li>
            <li class="social-icons-youtube"><a href="http://www.youtube.com/" target="_blank" title="Youtube"><i class="fab fa-youtube"></i></a></li>
          </ul> -->
          <nav class="header-nav-top ml-2">
            <ul class="nav nav-pills" id="navigation">
              <auth-unauth-state-button></auth-unauth-state-button>
              <authentication-modal></authentication-modal>

              <li class="nav-item dropdown d-none d-sm-block">
                <a class="nav-link" href="#" role="button" id="dropdownLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{ asset('/assets/') }}/others/img/us-flag.png" class="flag flag-us" alt="English" /> English <i class="fas fa-angle-down"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownLanguage">
                  <a class="dropdown-item" href="#"><img src="{{ asset('/assets/') }}/others/img/us-flag.png" class="flag flag-us" alt="English" /> English</a>
                  <a class="dropdown-item" href="#"><img src="{{ asset('/assets/') }}/others/img/us-flag.png" class="flag flag-es" alt="English" /> Español</a>
                  <a class="dropdown-item" href="#"><img src="{{ asset('/assets/') }}/others/img/us-flag.png" class="flag flag-fr" alt="English" /> Française</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>