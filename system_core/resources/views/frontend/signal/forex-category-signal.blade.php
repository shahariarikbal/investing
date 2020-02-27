@extends('frontend.layouts.master')


@section('footer-script')
    <script src="{{ asset('/assets/') }}/js/moment.js"></script>
    <script src="{{ asset('/assets/') }}/js/moment-timezone.js"></script>
    <script type="text/javascript">
        /***********************************************
         * Local Time script- By Dynamic Drive (http://www.dynamicdrive.com)
         * Please keep this notice intact
         * Visit http://www.dynamicdrive.com/ for this script and 100s more.
         ***********************************************/
        function showLocalTime(container, zoneString, formatString) {
            var thisobj = this
            this.container = document.getElementById(container)
            this.localtime = moment.tz(new Date(), zoneString)
            this.formatString = formatString
            this.container.innerHTML = this.localtime.format(this.formatString)
            setInterval(function () {
                thisobj.updateContainer()
            }, 1000) //update container every second
        }

        showLocalTime.prototype.updateContainer = function () {
            this.localtime.second(this.localtime.seconds() + 1)
            this.container.innerHTML = this.localtime.format(this.formatString)
        }

    </script>
    <script type="text/javascript">
        new showLocalTime("sydney", "Australia/Sydney", "hh:mm:ss A (ddd)")
        new showLocalTime("tokyo", "Asia/Tokyo", "hh:mm:ss A (ddd)")
        new showLocalTime("london", "Europe/London", "hh:mm:ss A (ddd)")
        new showLocalTime("newyork", "America/New_York", "hh:mm:ss A (ddd)")
    </script>
@endsection

@section('content')
    @include('frontend.layouts.includes.trading-ticker')
    <section class="fx_tri">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3" id="fistDiv">
                    <div class="drop-shadow">
                        <div class="mb-1-half card card-forex-head">
                            <div class="card-header conurl" align="center">
                                <h4 class="card-title">
                                    <a role="button ">
                                        <span class="text-white">
                                            <span class="text-uppercase">Signal Category</span>
                                        </span>
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div id="accordion" class="faq_content left_menu">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h6 class="mb-0"><a class="collapse" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Main Category1</a></h6>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <ul>
                                            <li class="active"><a href="{{ url('forex-signal') }}">All Signals</a></li>
                                            @foreach($category_signals as $key => $category)
                                                <li><a href="{{ url('forex-signal/'.$category->slug) }}">{{ $category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h6 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Signal Guide</a></h6>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <ul>
                                            <li><a href="signal-instructions.html" target="_blank">Signal Instructions</a></li>
                                            <li><a href="signal-risk.html" target="_blank">High Risk & Warning</a></li>
                                            <li><a href="signal-privacy.html" target="_blank">Privacy & Policy</a></li>
                                            <li><a href="signal-faq.html" target="_blank">Signal Faq</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="side-advertise d-none d-sm-none d-md-block">
                            <a href="javascript:void(0)"><img src="../assets/images/advertise.png" alt=""></a>
                        </div>
                        <!-- Analysis -->
                        <div class="position-relative d-none d-sm-none d-md-block">
                            <h4 class="trading-session-header mt-2">Latest Analysis</h4>
                            <div class="">
                                <ul class="custum-nav-indicator master-upper nav nav-tabs nav-tabs-transparent indicator-primary market-panal-bg"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link withoutripple active" href="#recent" aria-controls="cat1"
                                           role="tab" data-toggle="tab">
                                            <span>Recent Analysis</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link withoutripple" href="#popular" aria-controls="cat1"
                                           role="tab" data-toggle="tab">
                                            <span>Recent Comments</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="panel-body  ">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active show fade" id="recent">
                                            <div class="recent-analysis-container" data-simplebar>
                                                <ul class="profile-list">
                                                    <li>
                                                        <div class="analysis-icon">
                                                            <img src="../assets/images/city.jpg" alt="..." class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a href="analysis-detail.html" target="_blank">Forex Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading system. It has become very popular.</p><p class="vc-num">
                                                                <span class="bp-view">
                                                                    <i class="fa fa-comments mr10"></i>
                                                                    <span id="ip_view"> 2,461</span>
                                                                </span>
                                                                <span class="bp-view">
                                                                    <i class="fa fa-eye mr10"></i>
                                                                    <span id="ip_view"> 2453</span>
                                                                </span>
                                                                <span class="bp-view">
                                                                    <i class="fa fa-thumbs-up mr10"></i>
                                                                    <span id="ip_view"> 2453</span>
                                                                </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="analysis-icon"><img src="../assets/images/city.jpg" alt="..." class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a href="analysis-detail.html" target="_blank">Forex Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading system. It has become very popular.</p>
                                                                <p class="vc-num">
                                                                <span class="bp-view">
                                                                    <i class="fa fa-comments mr10"></i>
                                                                    <span id="ip_view"> 2,461</span>
                                                                </span>
                                                                <span class="bp-view">
                                                                    <i class="fa fa-eye mr10"></i>
                                                                    <span id="ip_view"> 2453</span>
                                                                </span>
                                                                <span class="bp-view">
                                                                    <i class="fa fa-thumbs-up mr10"></i>
                                                                    <span id="ip_view"> 2453</span>
                                                                </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="analysis-icon"><img src="../assets/images/city.jpg" alt="..." class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a href="analysis-detail.html" target="_blank">Forex Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading system. It has become very popular.</p>
                                                                <p class="vc-num">
                                                                <span class="bp-view">
                                                                    <i class="fa fa-comments mr10"></i>
                                                                    <span id="ip_view"> 2,461</span>
                                                                </span>
                                                                <span class="bp-view">
                                                                    <i class="fa fa-eye mr10"></i>
                                                                    <span id="ip_view"> 2453</span>
                                                                </span>
                                                                <span class="bp-view">
                                                                    <i class="fa fa-thumbs-up mr10"></i>
                                                                    <span id="ip_view"> 2453</span>
                                                                </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="analysis-icon"><img src="../assets/images/city.jpg" alt="..." class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a href="analysis-detail.html" target="_blank">Forex Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading system. It has become very popular.</p>
                                                                <p class="vc-num">
                                                                <span class="bp-view">
                                                                    <i class="fa fa-comments mr10"></i>
                                                                    <span id="ip_view"> 2,461</span>
                                                                </span>
                                                                <span class="bp-view">
                                                                    <i class="fa fa-eye mr10"></i>
                                                                    <span id="ip_view"> 2453</span>
                                                                </span>
                                                                <span class="bp-view">
                                                                    <i class="fa fa-thumbs-up mr10"></i>
                                                                    <span id="ip_view"> 2453</span>
                                                                </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="analysis-icon">
                                                            <img src="../assets/images/city.jpg" alt="..."
                                                                 class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a
                                                                        href="analysis-detail.html" target="_blank">Forex
                                                                        Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading
                                                                    system. It has become very popular.</p>
                                                                <p class="vc-num">
                                                                <span class="bp-view">
                                                                <i class="fa fa-comments mr10"></i>
                                                                <span id="ip_view"> 2,461</span>
                                                                </span>
                                                                <span class="bp-view">
                                                                <i class="fa fa-eye mr10"></i>
                                                                <span id="ip_view"> 2453</span>
                                                                </span>
                                                                 <span class="bp-view">
                                                                <i class="fa fa-thumbs-up mr10"></i>
                                                                <span id="ip_view"> 2453</span>
                                                                </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="analysis-icon">
                                                            <img src="../assets/images/city.jpg" alt="..."
                                                                 class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a
                                                                        href="analysis-detail.html" target="_blank">Forex
                                                                        Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading
                                                                    system. It has become very popular.</p>
                                                                <p class="vc-num">
                                                                <span class="bp-view">
                                                                <i class="fa fa-comments mr10"></i>
                                                                <span id="ip_view"> 2,461</span>
                                                                </span>
                                                                    <span class="bp-view">
                                                                <i class="fa fa-eye mr10"></i>
                                                                <span id="ip_view"> 2453</span>
                                                                </span>
                                                                    <span class="bp-view">
                                                                <i class="fa fa-thumbs-up mr10"></i>
                                                                <span id="ip_view"> 2453</span>
                                                                </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="popular">
                                            <div class="recent-analysis-container" data-simplebar>
                                                <ul class="profile-list">
                                                    <li>
                                                        <div class="analysis-icon">
                                                            <img src="../assets/images/city.jpg" alt="..."
                                                                 class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a href="analysis-detail.html" target="_blank">Forex Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading system. It has become very popular.</p>
                                                                <p class="vc-num">
                                                                    <span class="bp-view">
                                                                    <i class="fa fa-thumbs-up mr10"></i>
                                                                    <span id="ip_view"> 2,461</span>
                                                                    </span>
                                                                     <span class="bp-view">
                                                                    <i class="fa fa-thumbs-down mr10"></i>
                                                                    <span id="ip_view"> 2453</span>
                                                                    </span>
                                                                     <span class="bp-view">
                                                                    <i class="fa fa-comments mr10"></i>
                                                                    <span id="ip_view"> 2453</span>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="analysis-icon">
                                                            <img src="../assets/images/city.jpg" alt="..."
                                                                 class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a href="analysis-detail.html" target="_blank">Forex Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading system. It has become very popular.</p>
                                                                <p class="vc-num">
                                                                <span class="bp-view">
                                                                <i class="fa fa-thumbs-up mr10"></i>
                                                                <span id="ip_view"> 2,461</span>
                                                                </span>
                                                                <span class="bp-view">
                                                                <i class="fa fa-thumbs-down mr10"></i>
                                                                <span id="ip_view"> 2453</span>
                                                                </span>
                                                                <span class="bp-view">
                                                                <i class="fa fa-comments mr10"></i>
                                                                <span id="ip_view"> 2453</span>
                                                                </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="analysis-icon">
                                                            <img src="../assets/images/city.jpg" alt="..."
                                                                 class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a
                                                                        href="analysis-detail.html" target="_blank">Forex
                                                                        Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading
                                                                    system. It has become very popular.</p>
                                                                <p class="vc-num">
                                                                    <span class="bp-view">
                                                                    <i class="fa fa-thumbs-up mr10"></i>
                                                                    <span id="ip_view"> 2,461</span>
                                                                    </span>
                                                                     <span class="bp-view">
                                                                    <i class="fa fa-thumbs-down mr10"></i>
                                                                    <span id="ip_view"> 2453</span>
                                                                    </span>
                                                                     <span class="bp-view">
                                                                    <i class="fa fa-comments mr10"></i>
                                                                    <span id="ip_view"> 2453</span>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="analysis-icon">
                                                            <img src="../assets/images/city.jpg" alt="..."
                                                                 class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a href="analysis-detail.html" target="_blank">Forex Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading system. It has become very popular.</p>
                                                                <p class="vc-num">
                                                                    <span class="bp-view">
                                                                    <i class="fa fa-thumbs-up mr10"></i>
                                                                    <span id="ip_view"> 2,461</span>
                                                                    </span>
                                                                    <span class="bp-view">
                                                                    <i class="fa fa-thumbs-down mr10"></i>
                                                                    <span id="ip_view"> 2453</span>
                                                                    </span>
                                                                    <span class="bp-view">
                                                                    <i class="fa fa-comments mr10"></i>
                                                                    <span id="ip_view"> 2453</span>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Analysis END -->
                        <div class="side-advertise d-none d-sm-none d-md-block">
                            <a href="javascript:void(0)"><img src="../assets/images/advertise.png" alt=""></a>
                        </div>
                        <!-- User Online Table -->
                        <div class="position-relative online-visit d-none d-sm-none d-md-block">
                            <h4 class="trading-session-header border-radius-top-3">Visitors</h4>
                            <div class="dropdown-new show-rows">
                                <div class="select">
                                <span class="holder">
                                    Show Rows
                                </span>
                                    <i class="fa fa-chevron-left"></i>
                                </div>
                                <input type="hidden" name="sort">
                                <ul class="dropdown-menu-new show-rows-new">
                                    <div data-simplebar>
                                        <li>Show All</li>
                                        <li>1</li>
                                        <li>2</li>
                                        <li>3</li>
                                        <li>4</li>
                                        <li>5</li>
                                        <li>6</li>
                                        <li>7</li>
                                        <li>8</li>
                                        <li>9</li>
                                        <li>10</li>
                                        <li>11</li>
                                        <li>12</li>
                                        <li>13</li>
                                        <li>14</li>
                                        <li>15</li>
                                        <li>16</li>
                                        <li>17</li>
                                        <li>18</li>
                                        <li>19</li>
                                        <li>20</li>
                                        <li>21</li>
                                        <li>22</li>
                                        <li>23</li>
                                        <li>24</li>
                                        <li>25</li>
                                        <li>26</li>
                                        <li>27</li>
                                        <li>28</li>
                                        <li>29</li>
                                        <li>30</li>
                                        <li>31</li>
                                        <li>32</li>
                                        <li>33</li>
                                        <li>34</li>
                                        <li>35</li>
                                        <li>36</li>
                                        <li>37</li>
                                        <li>38</li>
                                        <li>39</li>
                                        <li>40</li>
                                        <li>41</li>
                                        <li>42</li>
                                        <li>43</li>
                                        <li>44</li>
                                        <li>45</li>
                                    </div>
                                </ul>
                            </div>
                            <div class="user-online-container">
                                <div class="visitor-detail">
                                    <ul>
                                        <li>Today : <span id="visit-today">0</span></li>
                                        <li>Month : <span id="visit-month">0</span></li>
                                        <li>Total : <span id="visit-total">0</span></li>
                                    </ul>
                                </div>
                                <div data-simplebar>
                                    <table class="user-online-table">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/ad.png" alt="">
                                                    <span>ad</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/af.png" alt="">
                                                    <span>af</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/ai.png" alt="">
                                                    <span>ai</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/al.png" alt="">
                                                    <span>al</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/am.png" alt="">
                                                    <span>am</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/ao.png" alt="">
                                                    <span>ao</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/ar.png" alt="">
                                                    <span>ar</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/as.png" alt="">
                                                    <span>as</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/at.png" alt="">
                                                    <span>at</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/au.png" alt="">
                                                    <span>au</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/aw.png" alt="">
                                                    <span>aw</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/ax.png" alt="">
                                                    <span>ax</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/az.png" alt="">
                                                    <span>az</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/bb.png" alt="">
                                                    <span>bb</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/bd.png" alt="">
                                                    <span>bd</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/be.png" alt="">
                                                    <span>be</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/bf.png" alt="">
                                                    <span>bf</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/bg.png" alt="">
                                                    <span>bg</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/bi.png" alt="">
                                                    <span>bi</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/bj.png" alt="">
                                                    <span>bj</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/bm.png" alt="">
                                                    <span>bm</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/bn.png" alt="">
                                                    <span>bn</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/br.png" alt="">
                                                    <span>br</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/bs.png" alt="">
                                                    <span>bs</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/bt.png" alt="">
                                                    <span>bt</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/bv.png" alt="">
                                                    <span>bv</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/bw.png" alt="">
                                                    <span>bw</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/by.png" alt="">
                                                    <span>by</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/bz.png" alt="">
                                                    <span>bz</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/ca.png" alt="">
                                                    <span>ca</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/cc.png" alt="">
                                                    <span>cc</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/cd.png" alt="">
                                                    <span>cd</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/cf.png" alt="">
                                                    <span>cf</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/cg.png" alt="">
                                                    <span>cg</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/ci.png" alt="">
                                                    <span>ci</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/ck.png" alt="">
                                                    <span>ck</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/cl.png" alt="">
                                                    <span>cl</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/cm.png" alt="">
                                                    <span>cm</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/cn.png" alt="">
                                                    <span>cn</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/co.png" alt="">
                                                    <span>co</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/cr.png" alt="">
                                                    <span>cr</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/cu.png" alt="">
                                                    <span>cu</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/cv.png" alt="">
                                                    <span>cv</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/cx.png" alt="">
                                                    <span>cx</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/cy.png" alt="">
                                                    <span>cy</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/cz.png" alt="">
                                                    <span>cz</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/de.png" alt="">
                                                    <span>de</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/dk.png" alt="">
                                                    <span>dk</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/dm.png" alt="">
                                                    <span>dm</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/do.png" alt="">
                                                    <span>do</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/dz.png" alt="">
                                                    <span>dz</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/ec.png" alt="">
                                                    <span>ec</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/ee.png" alt="">
                                                    <span>ee</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/eg.png" alt="">
                                                    <span>eg</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/er.png" alt="">
                                                    <span>er</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/et.png" alt="">
                                                    <span>et</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/fi.png" alt="">
                                                    <span>fi</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/fj.png" alt="">
                                                    <span>fj</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/fo.png" alt="">
                                                    <span>fo</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/fr.png" alt="">
                                                    <span>fr</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/ga.png" alt="">
                                                    <span>ga</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/gd.png" alt="">
                                                    <span>gd</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/ge.png" alt="">
                                                    <span>ge</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/gf.png" alt="">
                                                    <span>gf</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/gg.png" alt="">
                                                    <span>gg</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/gh.png" alt="">
                                                    <span>gh</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/gl.png" alt="">
                                                    <span>gl</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/gm.png" alt="">
                                                    <span>gm</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/gn.png" alt="">
                                                    <span>gn</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/gp.png" alt="">
                                                    <span>gp</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/gq.png" alt="">
                                                    <span>gq</span>
                                                    <span class="visit-count">
                                                    <i class="fa fa-user"></i>20
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/gr.png" alt="">
                                                    <span>gr</span>
                                                    <span class="visit-count">
                <i class="fa fa-user"></i>20
                </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/gt.png" alt="">
                                                    <span>gt</span>
                                                    <span class="visit-count">
                <i class="fa fa-user"></i>20
                </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/gu.png" alt="">
                                                    <span>gu</span>
                                                    <span class="visit-count">
                <i class="fa fa-user"></i>20
                </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/gw.png" alt="">
                                                    <span>gw</span>
                                                    <span class="visit-count">
                <i class="fa fa-user"></i>20
                </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/hm.png" alt="">
                                                    <span>hm</span>
                                                    <span class="visit-count">
                <i class="fa fa-user"></i>20
                </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/hn.png" alt="">
                                                    <span>hn</span>
                                                    <span class="visit-count">
                <i class="fa fa-user"></i>20
                </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/ht.png" alt="">
                                                    <span>ht</span>
                                                    <span class="visit-count">
                <i class="fa fa-user"></i>20
                </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/hu.png" alt="">
                                                    <span>hu</span>
                                                    <span class="visit-count">
                <i class="fa fa-user"></i>20
                </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/io.png" alt="">
                                                    <span>io</span>
                                                    <span class="visit-count">
                <i class="fa fa-user"></i>20
                </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/jp.png" alt="">
                                                    <span>jp</span>
                                                    <span class="visit-count">
                <i class="fa fa-user"></i>20
                </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/kh.png" alt="">
                                                    <span>kh</span>
                                                    <span class="visit-count">
                <i class="fa fa-user"></i>20
                </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/km.png" alt="">
                                                    <span>km</span>
                                                    <span class="visit-count">
                <i class="fa fa-user"></i>20
                </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/ky.png" alt="">
                                                    <span>ky</span>
                                                    <span class="visit-count">
                <i class="fa fa-user"></i>20
                </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/sv.png" alt="">
                                                    <span>sv</span>
                                                    <span class="visit-count">
                <i class="fa fa-user"></i>20
                </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/td.png" alt="">
                                                    <span>td</span>
                                                    <span class="visit-count">
                <i class="fa fa-user"></i>20
                </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='123'
                                                     data-visit-month='12301' data-visit-total='1231210'>
                                                    <img src="../assets/images/flag/country/tf.png" alt="">
                                                    <span>tf</span>
                                                    <span class="visit-count">
                <i class="fa fa-user"></i>20
                </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="country-flag" data-visit-today='12' data-visit-month='1401'
                                                     data-visit-total='15210'>
                                                    <img src="../assets/images/flag/country/us.png" alt="">
                                                    <span>us</span>
                                                    <span class="visit-count">
                <i class="fa fa-user"></i>20
                </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="country-flag" data-visit-today='' data-visit-month=''
                                                     data-visit-total=''>
                                                    <img src="../assets/images/flag/country/va.png" alt="">
                                                    <span>va</span>
                                                    <span class="visit-count">
                <i class="fa fa-user"></i>20
                </span>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="side-advertise d-none d-sm-none d-md-block">
                            <a href="javascript:void(0)"><img src="../assets/images/advertise.png" alt=""></a>
                        </div>
                        <!-- MARKET SENTIMENT -->
                        <div class="position-relative mt-2 mb-2 d-none d-sm-none d-md-block">
                            <h4 class="trading-session-header border-radius-top-3">Market Sentiment</h4>
                            <div class="toggleWrapper">
                                <input type="checkbox" name="forex-cross-rates" data-value="new"
                                       class="mobileToggle user-toggle" id="forex-cross-rates-new" checked="checked">
                                <label for="forex-cross-rates-new"></label>
                            </div>
                            <div class="sentiment-container hide-new" data-simplebar>
                                <table class="percent-table">
                                    <tr>
                                        <td><img src="../assets/images/flag.png" alt="flag"></td>
                                        <td>EUR/USD</td>
                                        <td>
                                            <div class="persentige-view">
                                                <div class="progress">
                                                    <div class="progress-bar grade-success" role="progressbar"
                                                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                         style="width: 80%">80%
                                                    </div>
                                                    <span class="right-space grade-danger" style="width: 20%">20%</span>
                                                </div>
                                                <div class="percent-def">
                                                    <ul>
                                                        <li>Buy</li>
                                                        <li>Sell</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="../assets/images/flag.png" alt="flag"></td>
                                        <td>EUR/USD</td>
                                        <td>
                                            <div class="persentige-view">
                                                <div class="progress">
                                                    <div class="progress-bar grade-success" role="progressbar"
                                                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                         style="width: 80%">80%
                                                    </div>
                                                    <span class="right-space grade-danger" style="width: 20%">20%</span>
                                                </div>
                                                <div class="percent-def">
                                                    <ul>
                                                        <li>Buy</li>
                                                        <li>Sell</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="../assets/images/flag.png" alt="flag"></td>
                                        <td>EUR/USD</td>
                                        <td>
                                            <div class="persentige-view">
                                                <div class="progress">
                                                    <div class="progress-bar grade-success" role="progressbar"
                                                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                         style="width: 80%">80%
                                                    </div>
                                                    <span class="right-space grade-danger" style="width: 20%">20%</span>
                                                </div>
                                                <div class="percent-def">
                                                    <ul>
                                                        <li>Buy</li>
                                                        <li>Sell</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="../assets/images/flag.png" alt="flag"></td>
                                        <td>EUR/USD</td>
                                        <td>
                                            <div class="persentige-view">
                                                <div class="progress">
                                                    <div class="progress-bar grade-success" role="progressbar"
                                                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                         style="width: 80%">80%
                                                    </div>
                                                    <span class="right-space grade-danger" style="width: 20%">20%</span>
                                                </div>
                                                <div class="percent-def">
                                                    <ul>
                                                        <li>Buy</li>
                                                        <li>Sell</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="../assets/images/flag.png" alt="flag"></td>
                                        <td>EUR/USD</td>
                                        <td>
                                            <div class="persentige-view">
                                                <div class="progress">
                                                    <div class="progress-bar grade-success" role="progressbar"
                                                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                         style="width: 80%">80%
                                                    </div>
                                                    <span class="right-space grade-danger" style="width: 20%">20%</span>
                                                </div>
                                                <div class="percent-def">
                                                    <ul>
                                                        <li>Buy</li>
                                                        <li>Sell</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="../assets/images/flag.png" alt="flag"></td>
                                        <td>EUR/USD</td>
                                        <td>
                                            <div class="persentige-view">
                                                <div class="progress">
                                                    <div class="progress-bar grade-success" role="progressbar"
                                                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                         style="width: 80%">80%
                                                    </div>
                                                    <span class="right-space grade-danger" style="width: 20%">20%</span>
                                                </div>
                                                <div class="percent-def">
                                                    <ul>
                                                        <li>Buy</li>
                                                        <li>Sell</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="../assets/images/flag.png" alt="flag"></td>
                                        <td>EUR/USD</td>
                                        <td>
                                            <div class="persentige-view">
                                                <div class="progress">
                                                    <div class="progress-bar grade-success" role="progressbar"
                                                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                         style="width: 80%">80%
                                                    </div>
                                                    <span class="right-space grade-danger" style="width: 20%">20%</span>
                                                </div>
                                                <div class="percent-def">
                                                    <ul>
                                                        <li>Buy</li>
                                                        <li>Sell</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="../assets/images/flag.png" alt="flag"></td>
                                        <td>EUR/USD</td>
                                        <td>
                                            <div class="persentige-view">
                                                <div class="progress">
                                                    <div class="progress-bar grade-success" role="progressbar"
                                                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                         style="width: 80%">80%
                                                    </div>
                                                    <span class="right-space grade-danger" style="width: 20%">20%</span>
                                                </div>
                                                <div class="percent-def">
                                                    <ul>
                                                        <li>Buy</li>
                                                        <li>Sell</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- Advertisment -->
                        <div class="position-relative d-none d-sm-none d-md-block">
                            <h4 class="trading-session-header border-radius-top-3">Advertisement</h4>
                            <div class="toggleWrapper">
                                <input type="checkbox" name="forex-cross-rates" data-value="6"
                                       class="mobileToggle user-toggle" id="forex-cross-rates-1" checked="checked">
                                <label for="forex-cross-rates-1"></label>
                            </div>
                            <div class="hide-6">
                                <table class="ad-table">
                                    <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <a href="javascript:void(0)" target="_blank">
                                                <img src="../assets/images/add/best-fxvps.png">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:void(0)" target="_blank">
                                                <img src="../assets/images/add/fxsvps.png">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" target="_blank">
                                                <img src="../assets/images/add/fxvpspro.png">
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" id="seconddiv">
                    <div class="mid-content position-relative drop-shadow">
                        <div class="title-container">
                            <h2 class="forex-header-second"><span>FX Signal</span></h2>
                            <Div class="float-right">
                                <a href="javascript:void(0)" class="btn btn-default time-zone-btn sm-append"><span>Set Time Zone</span></a>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#subscribe-modal"
                                   class="btn btn-default sub-btn all-sub sm-append"><span>Subscribe</span></a>
                            </div>
                        </div>
                        <div class="sm-btn-holder"></div>
                        <div class="time-toggle">
                            <div class="time-setting">
                                <div class="dropdown-new time-extra">
                                    <div class="select">
                                        <span class="holder">
                                            Set Formate
                                        </span>
                                        <i class="fa fa-chevron-left"></i>
                                    </div>
                                    <input type="hidden" name="sort">
                                    <ul class="dropdown-menu-new time-extra-new">
                                        <li value="-12" class="">Reset Setting</li>
                                        <li value="-12" class="">24 Hours</li>
                                        <li value="-11" class="">am/pm</li>
                                    </ul>
                                </div>
                                <div class="dropdown-new time-extra">
                                    <div class="select">
                                        <span class="holder">
                                            Set DST
                                        </span>
                                        <i class="fa fa-chevron-left"></i>
                                        <div class="dst-explain">
                                            With 'DST On' your time will be shifted one hour forward to correspond with
                                            Daylight Savings Time. If your country does not observe Daylight Savings
                                            Time, set this to ‘DST Off.’
                                        </div>
                                    </div>
                                    <input type="hidden" name="sort">
                                    <ul class="dropdown-menu-new time-extra-new">
                                        <li value="-12" class="">Reset Setting</li>
                                        <li value="-12" class="">DST on</li>
                                        <li value="-11" class="">DST off</li>
                                    </ul>
                                </div>
                                <div class="dropdown-new sig-drop">
                                    <div class="select">
                                        <span class="holder">
                                            Set Time zone
                                        </span>
                                        <i class="fa fa-chevron-left"></i>
                                    </div>
                                    <input type="hidden" name="sort">
                                    <ul class="dropdown-menu-new sig-drop-new">
                                        <li value="-12" class="">Reset Setting</li>
                                        <li value="-12" class="">(GMT -12:00) Eniwetok, Kwajalein</li>
                                        <li value="-11" class="">(GMT -11:00) Midway Island</li>
                                        <li value="-10" class="">(GMT -10:00) Hawaii</li>
                                        <li value="-9" class="">(GMT -9:00) Alaska</li>
                                        <li value="-8" class="">(GMT -8:00) Pacific Time (US &amp; Canada)</li>
                                        <li value="-7" class="">(GMT -7:00) Mountain Time (US &amp; Canada)</li>
                                        <li value="-6" class="">(GMT -6:00) Central Time (US &amp; Canada), Mexico
                                            City
                                        </li>
                                        <li value="-5" class="" selected="selected">(GMT -5:00) Eastern Time (US &amp;
                                            Canada), Bogota, Lima
                                        </li>
                                        <li value="-4.5" class="">(GMT -4:30) Caracas</li>
                                        <li value="-4" class="">(GMT -4:00) Atlantic Time (Canada), La Paz, Santiago
                                        </li>
                                        <li value="-3.5" class="">(GMT -3:30) Newfoundland</li>
                                        <li value="-3" class="">(GMT -3:00) Brazil, Buenos Aires, Georgetown</li>
                                        <li value="-2" class="">(GMT -2:00) Mid-Atlantic</li>
                                        <li value="-1" class="">(GMT -1:00 hour) Azores, Cape Verde Islands</li>
                                        <li value="0" class="">(GMT) Western Europe Time, London, Lisbon, Casablanca
                                        </li>
                                        <li value="1" class="">(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</li>
                                        <li value="2" class="">(GMT +2:00) South Africa, Jerusalem, Kaliningrad</li>
                                        <li value="3" class="">(GMT +3:00) Baghdad, Riyadh, Moscow</li>
                                        <li value="3.5" class="">(GMT +3:30) Tehran</li>
                                        <li value="4" class="">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</li>
                                        <li value="4.5" class="">(GMT +4:30) Kabul</li>
                                        <li value="5" class="">(GMT +5:00) Islamabad, Karachi, Tashkent, Yekaterinburg
                                        </li>
                                        <li value="5.5" class="">(GMT +5:30) Mumbai, Kolkata, Colombo, New Delhi</li>
                                        <li value="5.75" class="">(GMT +5:45) Kathmandu</li>
                                        <li value="6" class="">(GMT +6:00) Almaty, Dhaka</li>
                                        <li value="6.5" class="">(GMT +6:30) Yangon, Cocos Islands</li>
                                        <li value="7" class="">(GMT +7:00) Bangkok, Hanoi, Jakarta</li>
                                        <li value="8" class="">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</li>
                                        <li value="9" class="">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</li>
                                        <li value="9.5" class="">(GMT +9:30) Adelaide, Darwin</li>
                                        <li value="10" class="">(GMT +10:00) Eastern Australia, Guam, Vladivostok</li>
                                        <li value="11" class="">(GMT +11:00) Solomon Islands</li>
                                        <li value="12" class="">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</li>
                                    </ul>
                                </div>
                                <a href="javascript:void(0)" class="btn btn-default submit-flat w-20"><span>Save Settings</span></a>
                            </div>
                        </div>
                        <div class="col-12 p-0 analysis-section">
                            <div class="panel-body">
                                <!-- Our Top Courses panes -->
                                <signals :signals="{{ $signals }}" :premium="false"></signals>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3" id="thirddiv">
                    <div class="drop-shadow">
                        <div class="row signal-table">
                            <div class="col-md-12 ">
                                <div class="position-relative mb-2 d-none d-sm-none d-md-block">
                                    <h4 class="trading-session-header text-center border-radius-top-3">TRADING
                                        SESSION</h4>
                                    <div class="toggleWrapper">
                                        <input type="checkbox" name="toggle1" data-value="1"
                                               class="mobileToggle user-toggle" id="toggle1" checked>
                                        <label for="toggle1"></label>
                                    </div>
                                    <div class="hide-1">
                                        <table class="trading-session">
                                            <tr>
                                                <td>
                                                    <img src="../assets/images/flag/aud.jpg" class="banglaimg">Sydeny
                                                </td>
                                                <td>
                                                    <span class="badge badge-danger badge-edit">Closed</span>
                                                </td>
                                                <td class="clocktable text-center p-0"><span id="sydney"></span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="../assets/images/flag/tokyo.png" class="banglaimg">Tokyo
                                                </td>
                                                <td>
                                                    <span class="badge badge-danger badge-edit">Closed</span>
                                                </td>
                                                <td class="clocktable text-center p-0"><span id="tokyo"></span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="../assets/images/flag/london.png" class="banglaimg">London
                                                </td>
                                                <td>
                                                    <span class="badge badge-success badge-edit">Open</span>
                                                </td>
                                                <td class="clocktable text-center p-0"><span id="london"></span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="../assets/images/flag/newyork.png" class="banglaimg">New
                                                    York
                                                </td>
                                                <td>
                                                    <span class="badge badge-warning badge-edit">Closing</span>
                                                </td>
                                                <td class="clocktable text-center p-0"><span id="newyork"></span></td>
                                            </tr>
                                            
                                        </table>
                                    </div>
                                </div>
                                <div class="side-advertise d-none d-sm-none d-md-block">
                                    <a href="javascript:void(0)"><img src="assets/images/advertise.png" alt=""></a>
                                </div>
                                
                                @include('frontend.partials.forexSignal.recent-closed-trades')
                            </div>
                        </div>
                        <!-- Analysis -->
                        <div class="side-advertise d-none d-sm-none d-md-block">
                            <a href="javascript:void(0)"><img src="../assets/images/advertise.png" alt=""></a>
                        </div>
                        <div class="position-relative d-none d-sm-none d-md-block">
                            <h4 class="trading-session-header mt-2">Latest Blog</h4>
                            <div class="">
                                <ul class="custum-nav-indicator master-upper nav nav-tabs nav-tabs-transparent indicator-primary market-panal-bg"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link withoutripple active" href="#recent1" aria-controls="cat1"
                                           role="tab" data-toggle="tab">
                                            <span>Recent Post</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link withoutripple" href="#popular2" aria-controls="cat1"
                                           role="tab" data-toggle="tab">
                                            <span>Recent Comments</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="panel-body  ">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active show fade" id="recent1">
                                            <div class="recent-analysis-container" data-simplebar>
                                                <ul class="profile-list">
                                                    <li>
                                                        <div class="analysis-icon">
                                                            <img src="../assets/images/city.jpg" alt="..."
                                                                 class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a
                                                                        href="analysis-detail.html" target="_blank">Forex
                                                                        Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading
                                                                    system. It has become very popular.</p>
                                                                <p class="vc-num">
                <span class="bp-view">
                <i class="fa fa-comments mr10"></i>
                <span id="ip_view"> 2,461</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-eye mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-thumbs-up mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="analysis-icon">
                                                            <img src="../assets/images/city.jpg" alt="..."
                                                                 class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a
                                                                        href="analysis-detail.html" target="_blank">Forex
                                                                        Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading
                                                                    system. It has become very popular.</p>
                                                                <p class="vc-num">
                <span class="bp-view">
                <i class="fa fa-comments mr10"></i>
                <span id="ip_view"> 2,461</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-eye mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-thumbs-up mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="analysis-icon">
                                                            <img src="../assets/images/city.jpg" alt="..."
                                                                 class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a
                                                                        href="analysis-detail.html" target="_blank">Forex
                                                                        Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading
                                                                    system. It has become very popular.</p>
                                                                <p class="vc-num">
                <span class="bp-view">
                <i class="fa fa-comments mr10"></i>
                <span id="ip_view"> 2,461</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-eye mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-thumbs-up mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="analysis-icon">
                                                            <img src="../assets/images/city.jpg" alt="..."
                                                                 class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a
                                                                        href="analysis-detail.html" target="_blank">Forex
                                                                        Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading
                                                                    system. It has become very popular.</p>
                                                                <p class="vc-num">
                <span class="bp-view">
                <i class="fa fa-comments mr10"></i>
                <span id="ip_view"> 2,461</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-eye mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-thumbs-up mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="analysis-icon">
                                                            <img src="../assets/images/city.jpg" alt="..."
                                                                 class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a
                                                                        href="analysis-detail.html" target="_blank">Forex
                                                                        Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading
                                                                    system. It has become very popular.</p>
                                                                <p class="vc-num">
                <span class="bp-view">
                <i class="fa fa-comments mr10"></i>
                <span id="ip_view"> 2,461</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-eye mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-thumbs-up mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="analysis-icon">
                                                            <img src="../assets/images/city.jpg" alt="..."
                                                                 class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a
                                                                        href="analysis-detail.html" target="_blank">Forex
                                                                        Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading
                                                                    system. It has become very popular.</p>
                                                                <p class="vc-num">
                <span class="bp-view">
                <i class="fa fa-comments mr10"></i>
                <span id="ip_view"> 2,461</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-eye mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-thumbs-up mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="popular2">
                                            <div class="recent-analysis-container" data-simplebar>
                                                <ul class="profile-list">
                                                    <li>
                                                        <div class="analysis-icon">
                                                            <img src="../assets/images/city.jpg" alt="..."
                                                                 class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a
                                                                        href="analysis-detail.html" target="_blank">Forex
                                                                        Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading
                                                                    system. It has become very popular.</p>
                                                                <p class="vc-num">
                <span class="bp-view">
                <i class="fa fa-thumbs-up mr10"></i>
                <span id="ip_view"> 2,461</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-thumbs-down mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-comments mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="analysis-icon">
                                                            <img src="../assets/images/city.jpg" alt="..."
                                                                 class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a
                                                                        href="analysis-detail.html" target="_blank">Forex
                                                                        Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading
                                                                    system. It has become very popular.</p>
                                                                <p class="vc-num">
                <span class="bp-view">
                <i class="fa fa-thumbs-up mr10"></i>
                <span id="ip_view"> 2,461</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-thumbs-down mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-comments mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="analysis-icon">
                                                            <img src="../assets/images/city.jpg" alt="..."
                                                                 class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a
                                                                        href="analysis-detail.html" target="_blank">Forex
                                                                        Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading
                                                                    system. It has become very popular.</p>
                                                                <p class="vc-num">
                <span class="bp-view">
                <i class="fa fa-thumbs-up mr10"></i>
                <span id="ip_view"> 2,461</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-thumbs-down mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-comments mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="analysis-icon">
                                                            <img src="../assets/images/city.jpg" alt="..."
                                                                 class="pro-img">
                                                        </div>
                                                        <div class="analysis-discription">
                                                            <div class="right-info-container">
                                                                <h4 class="profile-name conurl"><a
                                                                        href="analysis-detail.html" target="_blank">Forex
                                                                        Research</a></h4>
                                                                <p class="discription">Forex is a signal based trading
                                                                    system. It has become very popular.</p>
                                                                <p class="vc-num">
                <span class="bp-view">
                <i class="fa fa-thumbs-up mr10"></i>
                <span id="ip_view"> 2,461</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-thumbs-down mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                    <span class="bp-view">
                <i class="fa fa-comments mr10"></i>
                <span id="ip_view"> 2453</span>
                </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="side-advertise d-none d-sm-none d-md-block">
                            <a href="javascript:void(0)"><img src="../assets/images/advertise.png" alt=""></a>
                        </div>
                        <!-- Analysis END -->
                        <div class="position-relative mt-2 d-none d-sm-none d-md-block">
                            <h4 class="trading-session-header mt-1-half border-radius-top-3">Top Forex Brokers</h4>
                            <div class="toggleWrapper">
                                <input type="checkbox" name="forex-brokers" data-value="l1"
                                       class="mobileToggle user-toggle" id="forex-brokers" checked="checked">
                                <label for="forex-brokers"></label>
                            </div>
                            <div class="hide-l1">
                                <table class="top-broker-table left-tab">
                                    <tbody>
                                    <tr>
                                        <td class="width-50 normal">
                                            <div class="position-relative-align">
                                                <span>1</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-broker-img glass">
                                                <img src="../assets/images/broker/FXCC_FXBNP.png" alt="FXCC_FXBNP">
                                                <span class="premium-tag">premium</span>
                                            </div>
                                        </td>
                                        <td class="review"><a href="review-detail.html" target="_blank">Review</a></td>
                                        <td class="signup"><a href="javascript:void(0)" target="_blank">Sign Up</a></td>
                                    </tr>
                                    <tr>
                                        <td class="width-50 normal">
                                            <div class="position-relative-align">
                                                <span>2</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-broker-img glass">
                                                <img src="../assets/images/broker/ironfx-logo.jpg" alt="ironfx-logo">
                                                <span class="premium-tag">premium</span>
                                            </div>
                                        </td>
                                        <td class="review"><a href="review-detail.html" target="_blank">Review</a></td>
                                        <td class="signup"><a href="javascript:void(0)" target="_blank">Sign Up</a></td>
                                    </tr>
                                    <tr>
                                        <td class="width-50 normal">
                                            <div class="position-relative-align">
                                                <span>3</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-broker-img glass">
                                                <img src="../assets/images/broker/Pepperstone.png" alt="Pepperstone">
                                                <span class="premium-tag">premium</span>
                                            </div>
                                        </td>
                                        <td class="review"><a href="review-detail.html" target="_blank">Review</a></td>
                                        <td class="signup"><a href="javascript:void(0)" target="_blank">Sign Up</a></td>
                                    </tr>
                                    <tr>
                                        <td class="width-50 normal">
                                            <div class="position-relative-align">
                                                <span>4</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-broker-img glass">
                                                <img src="../assets/images/broker/FXCC_FXBNP.png" alt="FXCC_FXBNP">
                                            </div>
                                        </td>
                                        <td class="review"><a href="review-detail.html" target="_blank">Review</a></td>
                                        <td class="signup"><a href="javascript:void(0)" target="_blank">Sign Up</a></td>
                                    </tr>
                                    <tr>
                                        <td class="width-50 normal">
                                            <div class="position-relative-align">
                                                <span>5</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-broker-img glass">
                                                <img src="../assets/images/broker/Pepperstone.png" alt="Pepperstone">
                                            </div>
                                        </td>
                                        <td class="review"><a href="review-detail.html" target="_blank">Review</a></td>
                                        <td class="signup"><a href="javascript:void(0)" target="_blank">Sign Up</a></td>
                                    </tr>
                                    <tr>
                                        <td class="normal width-50">
                                            <div class="position-relative-align">
                                                <span>6</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-broker-img glass">
                                                <img src="../assets/images/broker/Pepperstone.png" alt="Pepperstone">
                                            </div>
                                        </td>
                                        <td class="review"><a href="review-detail.html" target="_blank">Review</a></td>
                                        <td class="signup"><a href="javascript:void(0)" target="_blank">Sign Up</a></td>
                                    </tr>
                                    <tr>
                                        <td class="normal width-50">
                                            <div class="position-relative-align">
                                                <span>7</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-broker-img glass">
                                                <img src="../assets/images/broker/Pepperstone.png" alt="Pepperstone">
                                            </div>
                                        </td>
                                        <td class="review"><a href="review-detail.html" target="_blank">Review</a></td>
                                        <td class="signup"><a href="javascript:void(0)" target="_blank">Sign Up</a></td>
                                    </tr>
                                    <tr>
                                        <td class="normal width-50">
                                            <div class="position-relative-align">
                                                <span>8</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-broker-img glass">
                                                <img src="../assets/images/broker/Pepperstone.png" alt="Pepperstone">
                                            </div>
                                        </td>
                                        <td class="review"><a href="review-detail.html" target="_blank">Review</a></td>
                                        <td class="signup"><a href="javascript:void(0)" target="_blank">Sign Up</a></td>
                                    </tr>
                                    <tr>
                                        <td class="normal width-50">
                                            <div class="position-relative-align">
                                                <span>9</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-broker-img glass">
                                                <img src="../assets/images/broker/Pepperstone.png" alt="Pepperstone">
                                            </div>
                                        </td>
                                        <td class="review"><a href="review-detail.html" target="_blank">Review</a></td>
                                        <td class="signup"><a href="javascript:void(0)" target="_blank">Sign Up</a></td>
                                    </tr>
                                    <tr>
                                        <td class="normal width-50">
                                            <div class="position-relative-align">
                                                <span>10</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-broker-img glass">
                                                <img src="../assets/images/broker/Pepperstone.png" alt="Pepperstone">
                                            </div>
                                        </td>
                                        <td class="review"><a href="review-detail.html" target="_blank">Review</a></td>
                                        <td class="signup"><a href="javascript:void(0)" target="_blank">Sign Up</a></td>
                                    </tr>
                                    <tr class="footer">
                                        <td colspan="4"><a href="broker-review.html" target="_blank">Read More Broker
                                                Review</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
