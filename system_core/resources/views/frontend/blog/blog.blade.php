@extends('frontend.layouts.master')

@section('content')
@include('frontend.layouts.includes.trading-ticker')

<!-- START SECTION OUR SERVICES CARDS -->
<section class="fx_tri">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 md-pr-1-half">
                <div class="mb-1-half card card-forex-head">
                    <div class="card-header conurl" align = "center">
                        <h4 class="card-title">
                            <a role="button ">
                  <span class="text-white">
                  <span class="text-uppercase">Blog Category</span>
                  </span>
                            </a>
                        </h4>
                    </div>
                </div>
                <div id="accordion" class="faq_content left_menu">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h6 class="mb-0"> <a class="collapse" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Main Category 1</a> </h6>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <ul>
                                    <li class="active"><a href="javascript:void(0)">All Post</a></li>
                                    <li><a href="fx-blog-sub.html">Sub Category 1</a></li>
                                    <li><a href="javascript:void(0)">Sub Category 2</a></li>
                                    <li><a href="javascript:void(0)">Sub Category 3</a></li>
                                    <li><a href="javascript:void(0)">Sub Category 4</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Main Category 2</a> </h6>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <ul>
                                    <li><a href="javascript:void(0)">Sub Category 1</a></li>
                                    <li><a href="javascript:void(0)">Sub Category 2</a></li>
                                    <li><a href="javascript:void(0)">Sub Category 3</a></li>
                                    <li><a href="javascript:void(0)">Sub Category 4</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Main Category 3</a> </h6>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body">
                                <ul>
                                    <li><a href="javascript:void(0)">Sub Category 1</a></li>
                                    <li><a href="javascript:void(0)">Sub Category 2</a></li>
                                    <li><a href="javascript:void(0)">Sub Category 3</a></li>
                                    <li><a href="javascript:void(0)">Sub Category 4</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Main Category 4</a> </h6>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                            <div class="card-body">
                                <ul>
                                    <li><a href="javascript:void(0)">Sub Category 1</a></li>
                                    <li><a href="javascript:void(0)">Sub Category 2</a></li>
                                    <li><a href="javascript:void(0)">Sub Category 3</a></li>
                                    <li><a href="javascript:void(0)">Sub Category 4</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="side-advertise">
                    <a href="javascript:void(0)"><img src="../assets/images/advertise.png" alt=""></a>
                </div>
                <div class="position-relative mt-2">
                    <h4 class="trading-session-header mt-1-half border-radius-top-3">Top Forex Brokers</h4>
                    <div class="toggleWrapper">
                        <input type="checkbox" name="forex-brokers" data-value="l1" class="mobileToggle user-toggle" id="forex-brokers" checked="checked">
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
                                <td colspan="4"><a href="broker-review.html" target="_blank">Read More Broker Review</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="side-advertise">
                    <a href="javascript:void(0)"><img src="../assets/images/advertise.png" alt=""></a>
                </div>
                <div class="position-relative">
                    <h4 class="trading-session-header border-radius-top-3">Advertisement</h4>
                    <div class="toggleWrapper">
                        <input type="checkbox" name="forex-cross-rates" data-value="6" class="mobileToggle user-toggle" id="forex-cross-rates-1" checked="checked">
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
            <div class="col-lg-6 col-md-12 md-pl-1-half md-pr-1-half" id="seconddiv">
                <div class="mid-content position-relative">
                    <i class="fa fa-align-justify side-toggle toggle-pos-new d-none d-lg-pro"></i>
                    <div class="title-container">
                        <h2 class="forex-header-second"><span>FX Official Blog</span></h2>
                    </div>
                    <div class="col-12 p-0 analysis-section">
                        @php
                            $data = array_chunk($blogs->toArray()['data'], 2);
                        @endphp
                        @foreach($data as $blog)
                            @foreach($blog as $row)
                        <article class="card mb-1-half strategy-card-limit">
                            <div class="card-body ">
                                <div class="card-bg-inner">
                                    <div class="row">
                                        <div class="col-md-3 md-no-pr toggle-adjust-left" align="middle">
                                            <div class="zoom-img left-inner-img">
                                                <img src="{{ url('storage/blog/220x220-'.$row['feature_image']) }}" alt="">
                                                <div class="inner-info-box">
                                                    <i class="fa fa-pencil"></i>
                                                    <span class="inner-info-month">{{ date('M', strtotime($row['created_at'])) }}</span>
                                                    <span class="inner-info-date">{{ date('j', strtotime($row['created_at'])) }}</span>
                                                    <span class="inner-info-year">{{ date('Y', strtotime($row['created_at'])) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Problem -->
                                        <div class="col-md-9 md-pl-1-half toggle-adjust-right">
                                            <div class="right-inner">
                                                <h3>
                                                    <p class="text-left"><a href="javascript:void(0)">{{ $row['title'] }}</a></p>
                                                    <span>{{ $row['first_name'] . ' ' . $row['last_name'] }} at {{ date('H:i A', strtotime($row['created_at'])) }}</span>
                                                    <span>Category: <a href="javascript:void(0)">{{ $row['category']['name'] }}</a></span>
                                                </h3>
                                                <!--Star Start-->
                                                <div align=left>
                                                    <div class="social-shares"></div>
                                                </div>
                                                <!--Star End-->
                                                <div align=left style="font-size:13px">
                                                    <p class="text-justify strategy-p-limit">
                                                        {{ strip_tags($row['body']) }}
                                                    </p>
                                                    <div class="pull-left" style="margin-top:7px">
                                                        <span class="bp-view">
                                                        <i class="fa fa-comments mr10"></i>
                                                        <span id="ip_view"> {{ $row['comments_count'] }}</span>
                                                        </span>
                                                        <span class="bp-view">
                                                        <i class="fa fa-eye mr10"></i>
                                                        <span id="ip_view"> 2453</span>
                                                        </span>
                                                        <span class="bp-view">
                                                        <i class="fa fa-thumbs-up mr10"></i>
                                                        <span id="ip_view"> {{ $row['likes_count'] }}</span>
                                                        </span>
                                                        <span class="bp-view">
                                                        <i class="fa fa-star mr10"></i>
                                                        <span id="ip_view"> 5</span>
                                                        </span>
                                                    </div>
                                                    <a href="{{ url('/blog/'.$row['slug']) }}" target="_blank" class="btn btn-footer-read pull-right"><span>Read More</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach
                        <div class="advertisement-mid">
                            <a href="javascript:void(0)" target="_blank"><img src="../assets/images/fx_vps.gif" alt="Advertisements"></a>
                        </div>
                        @endforeach
{{--                        <ul class="pagination">--}}
{{--                            <li class="page-item"><span class="page-link"><</span></li>--}}
{{--                            <li class="page-item"><span class="page-link"><<</span></li>--}}
{{--                            <li class="page-item active"><span class="page-link">1</span></li>--}}
{{--                            <li class="page-item"><span class="page-link">2</span></li>--}}
{{--                            <li class="page-item"><span class="page-link">3</span></li>--}}
{{--                            <li class="page-item"><span class="page-link">4</span></li>--}}
{{--                            <li class="page-item"><span class="page-link">5</span></li>--}}
{{--                            <li class="page-item"><span class="page-link">6</span></li>--}}
{{--                            <li class="page-item"><span class="page-link">7</span></li>--}}
{{--                            <li class="page-item"><span class="page-link">8</span></li>--}}
{{--                            <li class="page-item"><span class="page-link">9</span></li>--}}
{{--                            <li class="page-item"><span class="page-link">>></span></li>--}}
{{--                            <li class="page-item"><span class="page-link">></span></li>--}}
{{--                        </ul>--}}
                    </div>
                    {{ $blogs->links() }}
                </div>
            </div>
            <div class="col-lg-3 col-md-6 md-pl-1-half" id="thirddiv">
                <div class="row signal-table">
                    <div class="col-md-12 ">
                        <table class=" trades-table">
                            <tr>
                                <td colspan="5" class="abor3 text-center border-radius-top-3" style="font-size: 15px">Recent Closed Trades</td>
                            </tr>
                            <tr>
                                <td class="abor3 text-center">
                                    <span>Currency</span>
                                </td>
                                <td class="abor3 text-center">
                                    <span>Signal</span>
                                </td>
                                <td class="abor3 text-center">
                                    <span>Profit</span>
                                </td>
                                <td class="abor3 text-center">
                                    <span>Time</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="conurl text-center">
                                    <a href="#">
                                        <img src="../assets/images/flag.png" alt="flag">
                                    </a>
                                </td>
                                <td class="abor3 text-center">
                                    <span>BUY Limit</span>
                                </td>
                                <td class="abor3 text-center">
                                    <span>60 pips</span>
                                </td>
                                <td class="text-center">
                                    <span>5 days ago</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="conurl text-center">
                                    <a href="#">
                                        <img src="../assets/images/flag.png" alt="flag">
                                    </a>
                                </td>
                                <td class="abor3 text-center">
                                    <span>BUY Limit</span>
                                </td>
                                <td class="abor3 text-center">
                                    <span>60 pips</span>
                                </td>
                                <td class="text-center">
                                    <span>5 days ago</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="conurl text-center">
                                    <a href="#">
                                        <img src="../assets/images/flag.png" alt="flag">
                                    </a>
                                </td>
                                <td class="abor3 text-center">
                                    <span>BUY Limit</span>
                                </td>
                                <td class="abor3 text-center">
                                    <span>60 pips</span>
                                </td>
                                <td class="text-center">
                                    <span>5 days ago</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="conurl text-center">
                                    <a href="#">
                                        <img src="../assets/images/flag.png" alt="flag">
                                    </a>
                                </td>
                                <td class="abor3 text-center">
                                    <span>BUY Limit</span>
                                </td>
                                <td class="abor3 text-center">
                                    <span>60 pips</span>
                                </td>
                                <td class="text-center">
                                    <span>5 days ago</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="conurl text-center">
                                    <a href="#">
                                        <img src="../assets/images/flag.png" alt="flag">
                                    </a>
                                </td>
                                <td class="abor3 text-center">
                                    <span>BUY Limit</span>
                                </td>
                                <td class="abor3 text-center">
                                    <span>60 pips</span>
                                </td>
                                <td class="text-center">
                                    <span>5 days ago</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="conurl text-center">
                                    <a href="#">
                                        <img src="../assets/images/flag.png" alt="flag">
                                    </a>
                                </td>
                                <td class="abor3 text-center">
                                    <span>BUY Limit</span>
                                </td>
                                <td class="abor3 text-center">
                                    <span>60 pips</span>
                                </td>
                                <td class="text-center">
                                    <span>5 days ago</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="side-advertise">
                    <a href="javascript:void(0)"><img src="../assets/images/advertise.png" alt=""></a>
                </div>
                <!-- Analysis -->
                <div class="position-relative">
                    <h4 class="trading-session-header mt-2">Latest Blogs</h4>
                    <div class="">
                        <ul class="custum-nav-indicator master-upper nav nav-tabs nav-tabs-transparent indicator-primary market-panal-bg" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link withoutripple active" href="#recent" aria-controls="cat1" role="tab" data-toggle="tab">
                                    <span>Recent Posts</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link withoutripple" href="#popular"  aria-controls="cat1" role="tab" data-toggle="tab">
                                    <span>Recent Comments</span>
                                </a>
                            </li>
                        </ul>
                        <div class="panel-body  ">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active show fade" id="recent">
                                    <div class="recent-analysis-container" data-simplebar>
                                        @include('partial.blog.latest-blog')
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="popular">
                                    <div class="recent-analysis-container" data-simplebar>
                                        <ul class="profile-list">
                                            <li>
                                                <div class="analysis-icon">
                                                    <img src="../assets/images/city.jpg" alt="..." class="pro-img">
                                                </div>
                                                <div class="analysis-discription">
                                                    <div class="right-info-container">
                                                        <h4 class="profile-name conurl"><a href="analysis/blog-detail.html" target="_blank">Forex Research</a></h4>
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
                                                    <img src="../assets/images/city.jpg" alt="..." class="pro-img">
                                                </div>
                                                <div class="analysis-discription">
                                                    <div class="right-info-container">
                                                        <h4 class="profile-name conurl"><a href="analysis/blog-detail.html" target="_blank">Forex Research</a></h4>
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
                                                    <img src="../assets/images/city.jpg" alt="..." class="pro-img">
                                                </div>
                                                <div class="analysis-discription">
                                                    <div class="right-info-container">
                                                        <h4 class="profile-name conurl"><a href="analysis/blog-detail.html" target="_blank">Forex Research</a></h4>
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
                                                    <img src="../assets/images/city.jpg" alt="..." class="pro-img">
                                                </div>
                                                <div class="analysis-discription">
                                                    <div class="right-info-container">
                                                        <h4 class="profile-name conurl"><a href="analysis/blog-detail.html" target="_blank">Forex Research</a></h4>
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

                <div class="side-advertise">
                    <a href="javascript:void(0)"><img src="../assets/images/advertise.png" alt=""></a>
                </div>
                <div class="position-relative mt-2">
                    <h4 class="trading-session-header mt-1-half border-radius-top-3 bg-success">Need Help ?</h4>
                    <div class="container">
                        <div class="row helper">
                            <div class="col-md-6">
                                <a href="../broker.html" target="_blank">
                                    <i class="fa fa-university"></i>
                                    <span>Broker</span>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="../bonus.html" target="_blank">
                                    <i class="far fa-money-bill-alt"></i>
                                    <span>Bonus</span>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="../fx-consultancy.html" target="_blank">
                                    <i class="fa fa-graduation-cap"></i>
                                    <span>Training</span>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="../guideline.html" target="_blank">
                                    <i class="fa fa-info"></i>
                                    <span>Guideline</span>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="../analysis/fx-analysis.html" target="_blank">
                                    <i class="far fa-chart-bar"></i>
                                    <span>Trading</span>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="../appointment.html" target="_blank">
                                    <i class="fa fa-bullhorn"></i>
                                    <span>Expert Appointment</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="side-advertise">
                    <a href="javascript:void(0)"><img src="../assets/images/advertise.png" alt=""></a>
                </div>
                <div class="position-relative">
                    <h4 class="trading-session-header mt-2 border-radius-top-3">Advertisement</h4>
                    <div class="toggleWrapper">
                        <input type="checkbox" name="forex-cross-rates" data-value="5" class="mobileToggle user-toggle" id="forex-cross-rates" checked="checked">
                        <label for="forex-cross-rates"></label>
                    </div>
                    <div class="hide-5">
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
                <div class="side-advertise">
                    <a href="javascript:void(0)"><img src="../assets/images/advertise.png" alt=""></a>
                </div>
                <div class="position-relative mt-2">
                    <h4 class="trading-session-header mt-1-half border-radius-top-3">ARCHIVE</h4>
                    <div class="archive-select">
                        <div class="form-group">
                            <select name="" id="" class="form-control">
                                <option value="Select Month">Select Month</option>
                                <option value="Select Month">January 2019</option>
                                <option value="Select Month">December 2018</option>
                                <option value="Select Month">November 2018</option>
                                <option value="Select Month">October 2018</option>
                            </select>
                            <span class="arrow" role="presentation">
                  </span>
                        </div>
                    </div>
                </div>
                <div class="side-advertise">
                    <a href="javascript:void(0)"><img src="../assets/images/advertise.png" alt=""></a>
                </div>
                <div class="position-relative mt-2">
                    <h4 class="trading-session-header mt-1-half border-radius-top-3">Tags</h4>
                    <div class="tag-container">
                        <a href="javascript:void(0)" class="tags">Forex</a>
                        <a href="javascript:void(0)" class="tags">advisors</a>
                        <a href="javascript:void(0)" class="tags">benchmarks</a>
                        <a href="javascript:void(0)" class="tags">finance</a>
                        <a href="javascript:void(0)" class="tags">technology</a>
                        <a href="javascript:void(0)" class="tags">bitcoin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Share Float -->
<div class="floating-share">
    <div class="social-shares"></div>
</div>

@endsection
