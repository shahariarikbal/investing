@extends('frontend.layouts-v2.master')

@section('review-active', 'active')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/top-forex-broker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/broker-review-details.css') }}" />
@endsection

@section('bottom-script')
<!-- Ticker -->
<script src="{{ asset('/assets/') }}/js/jquery.carouselTicker.js"></script>
<script async src="{{ asset('/assets/') }}/js/start.js"></script>
<!-- Owl Carousel Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- For Video Player Js -->
<script type="text/javascript" src="{{ asset('assets/css/video-styles/java/FWDUVPlayer.js') }}"></script>
<script type="text/javascript">
   FWDUVPUtils.onReady(function() {
      var yn;
      if ($(window).width() <= 768) {
         yn = "no";
      } else {
         yn = "yes"
      }
      new FWDUVPlayer({
         //main settings
         instanceName: "player1",
         parentId: "videoPlayerDiv",
         playlistsId: "playlists",
         mainFolderPath: "{{ env('APP_URL') . '/assets/css/video-styles' }}",
         skinPath: "classic_skin_dark",
         displayType: "responsive",
         initializeOnlyWhenVisible: "no",
         fillEntireVideoScreen: "no",
         privateVideoPassword: "428c841430ea18a70f7b06525d4b748a",
         useHEXColorsForSkin: "no",
         normalHEXButtonsColor: "#FF0000",
         selectedHEXButtonsColor: "#000000",
         useDeepLinking: "yes",
         showPreloader: "yes",
         rightClickContextMenu: "disabled",
         addKeyboardSupport: "yes",
         autoScale: "yes",
         showButtonsToolTip: "yes",
         stopVideoWhenPlayComplete: "no",
         playAfterVideoStop: "no",
         autoPlay: "no",
         loop: "no",
         shuffle: "no",
         showErrorInfo: "yes",
         maxWidth: 2000,
         maxHeight: 850,
         volume: .8,
         buttonsToolTipHideDelay: 1.5,
         backgroundColor: "#000000",
         videoBackgroundColor: "#000000",
         posterBackgroundColor: "#ffffff",
         buttonsToolTipFontColor: "#5a5a5a",
         //logo settings
         showLogo: "yes",
         hideLogoWithController: "yes",
         logoPosition: "topRight",
         logoLink: "http://www.webdesign-flash.ro/",
         logoMargins: 5,
         //playlists/categories settings
         showPlaylistsSearchInput: "no",
         usePlaylistsSelectBox: "yes",
         showPlaylistsButtonAndPlaylists: "no",
         showPlaylistsByDefault: "yes",
         thumbnailSelectedType: "opacity",
         startAtPlaylist: 0,
         buttonsMargins: 0,
         thumbnailMaxWidth: 350,
         thumbnailMaxHeight: 350,
         horizontalSpaceBetweenThumbnails: 40,
         verticalSpaceBetweenThumbnails: 40,
         inputBackgroundColor: "#333333",
         inputColor: "#999999",
         //playlist settings
         showPlaylistButtonAndPlaylist: "yes",
         playlistPosition: "right",
         showPlaylistByDefault: "yes",
         showPlaylistName: "yes",
         showSearchInput: "no",
         showLoopButton: "yes",
         showShuffleButton: "yes",
         showNextAndPrevButtons: "yes",
         showThumbnail: "yes",
         forceDisableDownloadButtonForFolder: "yes",
         addMouseWheelSupport: "yes",
         startAtRandomVideo: "yes",
         stopAfterLastVideoHasPlayed: "yes",
         folderVideoLabel: "VIDEO ",
         playlistRightWidth: 150,
         playlistBottomHeight: 599,
         startAtVideo: 0,
         maxPlaylistItems: 50,
         thumbnailWidth: 350,
         thumbnailHeight: 350,
         spaceBetweenControllerAndPlaylist: 2,
         spaceBetweenThumbnails: 2,
         scrollbarOffestWidth: 10,
         scollbarSpeedSensitivity: .5,
         playlistBackgroundColor: "#000000",
         playlistNameColor: "#FFFFFF",
         thumbnailNormalBackgroundColor: "#C0C0C0",
         thumbnailHoverBackgroundColor: "#C0C0C0",
         thumbnailDisabledBackgroundColor: "#C0C0C0",
         searchInputBackgroundColor: "#000000",
         searchInputColor: "#bdbdbd",
         youtubeAndFolderVideoTitleColor: "#FFFFFF",
         folderAudioSecondTitleColor: "#999999",
         youtubeOwnerColor: "#bdbdbd",
         youtubeDescriptionColor: "#bdbdbd",
         mainSelectorBackgroundSelectedColor: "disable",
         mainSelectorTextNormalColor: "#FFFFFF",
         mainSelectorTextSelectedColor: "#FFFFFF",
         mainButtonBackgroundNormalColor: "#212021",
         mainButtonBackgroundSelectedColor: "#212021",
         mainButtonTextNormalColor: "#FFFFFF",
         mainButtonTextSelectedColor: "#FFFFFF",
         //controller settings
         showController: "yes",
         showControllerWhenVideoIsStopped: "yes",
         showNextAndPrevButtonsInController: "no",
         showPlaybackRateButton: "yes",
         showVolumeButton: "yes",
         showTime: "yes",
         showQualityButton: "yes",
         showInfoButton: "no",
         showDownloadButton: "no",
         showShareButton: "no",
         showEmbedButton: "no",
         showFullScreenButton: "yes",
         disableVideoScrubber: "no",
         repeatBackground: "no",
         controllerHeight: 37,
         controllerHideDelay: 3,
         startSpaceBetweenButtons: 10,
         spaceBetweenButtons: 10,
         scrubbersOffsetWidth: 2,
         mainScrubberOffestTop: 16,
         timeOffsetLeftWidth: 2,
         timeOffsetRightWidth: 3,
         timeOffsetTop: 0,
         volumeScrubberHeight: 80,
         volumeScrubberOfsetHeight: 12,
         timeColor: "#bdbdbd",
         youtubeQualityButtonNormalColor: "#bdbdbd",
         youtubeQualityButtonSelectedColor: "#FFFFFF",
         //advertisement on pause window
         aopwTitle: "Advertisement",
         aopwWidth: 400,
         aopwHeight: 240,
         aopwBorderSize: 6,
         aopwTitleColor: "#FFFFFF",
         //subtitle
         subtitlesOffLabel: "Subtitle off",
         //popup add windows
         showPopupAdsCloseButton: "yes",
         //embed window and info window
         embedAndInfoWindowCloseButtonMargins: 0,
         borderColor: "#333333",
         mainLabelsColor: "#FFFFFF",
         secondaryLabelsColor: "#bdbdbd",
         shareAndEmbedTextColor: "#5a5a5a",
         inputBackgroundColor: "#000000",
         inputColor: "#FFFFFF",
         //loggin
         isLoggedIn: "yes",
         playVideoOnlyWhenLoggedIn: "yes",
         loggedInMessage: "Please login to view this video.",
         //audio visualizer
         audioVisualizerLinesColor: "#0099FF",
         audioVisualizerCircleColor: "#FFFFFF",
         //playback rate / speed
         defaultPlaybackRate: 1, //0.25, 0.5, 1, 1.25, 1.2, 2
         //cuepoints
         executeCuepointsOnlyOnce: "no",
         //annotations
         showAnnotationsPositionTool: "no",
         //ads
         openNewPageAtTheEndOfTheAds: "no",
         adsButtonsPosition: "left",
         skipToVideoText: "You can skip to video in: ",
         skipToVideoButtonText: "Skip Ad",
         adsTextNormalColor: "#bdbdbd",
         adsTextSelectedColor: "#FFFFFF",
         adsBorderNormalColor: "#444444",
         adsBorderSelectedColor: "#FFFFFF"
      });
   });
</script>
<script src="{{ asset('/assets/') }}/js/scripts.js"></script>
<script>
   $(function() {
      $('[data-toggle="popover"]').popover()
   });
</script>
<script>
   function topForexBroker() {
      var x = document.getElementById("topForexBroker");
      if (x.style.display === "none") {
         x.style.display = "block";
      } else {
         x.style.display = "none";
      }
   }
</script>
@endsection
@section('content')
<div id="app">
   <section class="broker-review-details">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-9 offset-md-2">
               <div class="row broker-intro">
                  <div class="col-md-12 text-center">
                     <div class="broker-review-image">
                        <img src="{{ url('/broker/logo/190x65-'.$broker->logo) }}" alt="logo of">
                     </div>
                  </div>
                  <div class="col-md-12 text-center">
                     <div class="brok-review-header">
                        @if($broker->premium == 1)
                        <span class="badge premium-badge">Premium</span>
                        @else
                        <span class="badge danger-badge">Free</span>
                        @endif
                        <span class="title">{{ $broker->name }} Brokers</span>
                     </div>
                  </div>
                  <div class="col-md-12 text-center">
                     <div class="brok-review-rating">

                     </div>
                  </div>
               </div>

               <div class="row broker-info">
                  <div class="col-xl-3 img-custom" id="view-full" data-toggle="modal" data-target="#img-full">
                     <img src="{{ url('/broker/screenshot/445x261-'.$broker->screenshot) }}" class="img-fluid img-thumbnail" alt="Screenshot of {{ $broker->name }}">
                  </div>
                  <div class="col-xl-5 margin-bottom-10">
                     <div class="row custom-row">
                        <div class="col-md-12 padding-0">
                           <span class="title">Broker Information</span>
                        </div>
                     </div>
                     <div class="row custom-row">
                        <div class="col padding-0">
                           <table class="table table-bordered">
                              <tbody>
                                 <tr>
                                    <td><strong>Website :</strong></td>
                                    <td>
                                       <a href="{{ $broker->website_url }}" target="_blank" class="websitelink">
                                          {{ $broker->website_title }}
                                       </a>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><strong>founded in:</strong></td>
                                    <td> {{ $broker->founded_in }} </td>
                                 </tr>
                                 <tr>
                                    <td><strong>broker name :</strong></td>
                                    <td>ICMarkets Pty Ltd</td>
                                 </tr>
                                 <tr>
                                    <td><strong>Review Date :</strong></td>
                                    <td>
                                       2019-10-24
                                    </td>
                                 </tr>
                                 <tr>
                                    <td colspan="2">
                                       <a class="btn btn-sm btn-block btn-success text-uppercase" href="#">open real account <i class="fas fa-angle-right"></i></a>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <div class="col padding-0">
                           <table class="table table-bordered">
                              <tbody>
                                 <tr>
                                    <td><strong>Regulation :</strong></td>
                                    <td>
                                       <span class="line-clamp-1">
                                          @foreach($broker->regulatory_authorities as $regulating_authority)
                                          <span>{{ $regulating_authority->name }}</span>
                                          @endforeach
                                       </span>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><strong>Country :</strong></td>
                                    <td>{{ $broker->country['name'] }}</td>
                                 </tr>
                                 <tr>
                                    <td><strong>Reviewed By :</strong></td>
                                    <td>FXSUCCESSBD</td>
                                 </tr>
                                 <tr>
                                    <td><strong>Rating :</strong></td>
                                    <td></td>
                                 </tr>
                                 <tr>
                                    <td colspan="2">
                                       <a target="_blank" class="btn btn-sm btn-block btn-primary text-uppercase" href="#">open demo account <i class="fas fa-angle-right"></i></a>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4">
                     @include('frontend.partials.signals.topForexBroker')
                  </div>
               </div>

               <div class="row addImage text-center">
                  <div class="col">
                     <a href="javascript:void(0)" target="_blank">
                        <img src="{{ asset('/assets/images/fx_vps.gif') }}" alt="Advertisements" class="img-fluid">
                     </a>
                  </div>
                  <div class="col">
                     <a href="javascript:void(0)" target="_blank">
                        <img src="{{ asset('/assets/images/fx_vps.gif') }}" alt="Advertisements" class="img-fluid">
                     </a>
                  </div>
               </div>

               <div class="row video-section">
                  <div class="col-xl-12">
                     <div id="videoPlayerDiv"></div>
                  </div>
                  <!-- <div class="col-xl-4 news-section">
                     <div class="card">
                        <div class="card-header bg-dark text-white">
                           <i class="far fa-list-alt"></i> RECENT PRESS RELEASE
                        </div>
                        <div class="card-body">
                           <div class="scrollBoxFundManagement">
                              <ul class="list-group">
                                 @foreach ($broker->press_releases as $item)
                                 <li class="list-group-item news-item">
                                    <span>date('M.j,Y'),strtotime($item->created_at) }}</span>
                                    <i class="far fa-clock color-info ml-1 mr-1"></i>
                                    <span>{{ date('h:ia'),strtotime($item->created_at) }}</span>
                                    <span class="color-info">source : </span>
                                    <a href="{{ $item->tag_url }}" class="font-weight-bold text-secondary mr-1" target="_blank">{{ $item->tag }}</a>
                                    <a href="{{$item->url}}" target="_blank">
                                       {{ str_limit($item->title, $limit = 100, $end = ' ') }}
                                    </a>
                                 </li>
                                 @endforeach
                              </ul>
                           </div>
                        </div>
                        <div class="card-footer text-muted bg-dark">
                           
                        </div>
                     </div>
                  </div> -->
               </div>

               <div class="row addImage text-center">
                  <div class="col">
                     <a href="javascript:void(0)" target="_blank">
                        <img src="{{ asset('/assets/images/fx_vps.gif') }}" alt="Advertisements" class="img-fluid">
                     </a>
                  </div>
                  <div class="col">
                     <a href="javascript:void(0)" target="_blank">
                        <img src="{{ asset('/assets/images/fx_vps.gif') }}" alt="Advertisements" class="img-fluid">
                     </a>
                  </div>
               </div>

               <div class="row broker-review-tabs">
                  <div class="col-md-12 mb-0">
                     <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item">
                           <a class="nav-link active text-uppercase font-weight-bold" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-exclamation-circle"></i> FXTM at a glance</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link text-uppercase font-weight-bold" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-certificate"></i> Review Details</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link text-uppercase font-weight-bold" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fab fa-deviantart"></i> Pros & Cons </a>
                        </li>

                        <!-- <li class="nav-item">
                           <a class="nav-link text-uppercase font-weight-bold" id="user-reviews-tab" data-toggle="tab" href="#user-reviews" role="tab" aria-controls="contact" aria-selected="false"><i class="fab fa-deviantart"></i> User Reviews </a>
                        </li> -->
                     </ul>
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                           <div class="row mb-2">
                              <div class="col-xl-6 paddingRight-0">
                                 <div class="drop-shadow">
                                    <div class="table-responsive">
                                       <table class="table table-bordered mb-0">
                                          <tbody class="">
                                             <tr>
                                                <td colspan="2" class="text-center text-uppercase table-title-bg border-right-0">company information</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Broker Name</td>
                                                <td class="bg-white border-right-0">{{ $broker->name }}</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Website</td>
                                                <td class="bg-white border-right-0">
                                                   <a href="{{ $broker->website_url }}" target="_blank">{{ $broker->website_title }}</a>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Headquartered In</td>
                                                <td class="bg-white border-right-0">{{$broker->headquarter}}</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Founded In</td>
                                                <td class="bg-white border-right-0">{{$broker->founded_in}}</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Regulating Authority</td>
                                                <td class="bg-white border-right-0">
                                                   @foreach($broker->regulatory_authorities as $regulating_authority)
                                                   {{ $regulating_authority->name }},
                                                   @endforeach

                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">US Clinets Accepted</td>
                                                <td class="bg-white border-right-0">
                                                   @if($broker->us_client == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Broker Status</td>
                                                <td class="bg-white border-right-0">{{$broker->meta['broker_status']}}</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Broker Type</td>
                                                <td class="bg-white border-right-0">
                                                   @foreach ($broker->broker_types as $broker_type)
                                                   {{ $broker_type->name }},
                                                   @endforeach
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Telephone Number</td>
                                                <td class="bg-white border-right-0">{{ $broker->meta['telephone'] }}</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Fax Number</td>
                                                <td class="bg-white border-right-0">{{ $broker->meta['fax'] }}</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Email Support</td>
                                                <td class="bg-white border-right-0">{{ $broker->meta['email_support'] }}</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">International Office</td>
                                                <td class="bg-white border-right-0">{{ $broker->meta['international_office'] }}</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights border-bottom-0">Web Site Language</td>
                                                <td class="bg-white border-right-0 border-bottom-0">{{ $broker->meta['web_language'] }}</td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                    <div class="table-responsive">
                                       <table class="table table-bordered mb-0">
                                          <tbody class="">
                                             <tr>
                                                <td colspan="2" class="text-center text-uppercase table-title-bg border-right-0">account information</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Free Demo Account</td>
                                                <td class="bg-white border-right-0">
                                                   @if($broker->meta['demo_account'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Min. Deposit</td>
                                                <td class="bg-white border-right-0">{{ $broker->min_deposit }}</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">ECN Deposit</td>
                                                <td class="bg-white border-right-0">
                                                   @if($broker->ecn_deposit == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Account Currency</td>
                                                <td class="bg-white border-right-0">{{ $broker->meta['acc_currency'] }}</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Maximum Leverage</td>
                                                <td class="bg-white border-right-0">{{ $broker->meta['max_leverage'] }}</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights border-bottom-0">Minimul Order Vol.</td>
                                                <td class="bg-white border-right-0 border-bottom-0">{{ $broker->meta['min_order_vol'] }}</td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                    <div class="table-responsive">
                                       <table class="table table-bordered mb-0">
                                          <tbody class="">
                                             <tr>
                                                <td colspan="2" class="text-center text-uppercase table-title-bg border-right-0">trading terms</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Interest on Margin</td>
                                                <td class="bg-white border-right-0">
                                                   @if($broker->meta['interest_margin'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">OS Compatibility</td>
                                                <td class="bg-white border-right-0">{{ $broker->meta['os_compatibility'] }}</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Streaming News Feed</td>
                                                <td class="bg-white border-right-0">
                                                   @if($broker->meta['news_feed_stream'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Charting Package</td>
                                                <td class="bg-white border-right-0">
                                                   @if($broker->meta['charting_pack'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Trading Signal</td>
                                                <td class="bg-white border-right-0">
                                                   @if($broker->meta['trading_signal'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights border-bottom-0">Market Commentary</td>
                                                <td class="bg-white border-right-0 border-bottom-0">
                                                   @if($broker->meta['market_commentary'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                    <div class="table-responsive">
                                       <table class="table table-bordered mb-0">
                                          <tbody class="">
                                             <tr>
                                                <td colspan="2" class="text-center text-uppercase table-title-bg border-right-0">customer support</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Customer Service Hours</td>
                                                <td class="bg-white border-right-0">
                                                   {{ $broker->meta['customer_service_time'] }}
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights border-bottom-0">Place Trades Over the Phone</td>
                                                <td class="bg-white border-right-0 border-bottom-0">
                                                   @if($broker->meta['trade_over_phone'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                    <div class="table-responsive">
                                       <table class="table table-bordered mb-0">
                                          <tbody class="">
                                             <tr>
                                                <td colspan="2" class="text-center text-uppercase table-title-bg border-right-0">promotion</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">No Deposit Bonus</td>
                                                <td class="bg-white border-right-0">
                                                   @if($broker->deposit_bonus == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Bonus for First Deposit</td>
                                                <td class="bg-white border-right-0">
                                                   @if($broker->first_deposite_bonus == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Free VPS</td>
                                                <td class="bg-white border-right-0">
                                                   @if($broker->free_vps == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xl-6 paddingLeft-0">
                                 <div class="drop-shadow">
                                    <div class="table-responsive">
                                       <table class="table table-bordered mb-0">
                                          <tbody class="">
                                             <tr>
                                                <td colspan="2" class="text-center text-uppercase table-title-bg border-left-0">account information</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Segregated Account</td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->meta['segregeted_acc'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Islamic Account</td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->islamic_acc == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>

                                             <tr>
                                                <td class="text-uppercase bg-lights">Institutional Account </td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->meta['institutional_acc'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">VIP Service</td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->meta['vip_service'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">PAMM / MAM Account</td>
                                                <td class="bg-white border-left-0">{{ is_null($broker->pamm_mam) ? 'N/a' : $broker->pamm_mam  }}</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Depoist Option</td>
                                                <td class="bg-white border-left-0">
                                                   @foreach ($broker->payment_options as $payment_option)
                                                   @if ($payment_option->pivot->type==='deposit')
                                                   {{ $payment_option->name }},
                                                   @endif
                                                   @endforeach
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights border-bottom-0">Withdrawal Option</td>
                                                <td class="bg-white border-left-0 border-bottom-0">
                                                   @foreach ($broker->payment_options as $payment_option)
                                                   @if ($payment_option->pivot->type==='withdraw')
                                                   {{ $payment_option->name }},
                                                   @endif
                                                   @endforeach
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                    <div class="table-responsive">
                                       <table class="table table-bordered mb-0">
                                          <tbody class="">
                                             <tr>
                                                <td colspan="2" class="text-center text-uppercase table-title-bg border-left-0">trading terms</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Trading Platform</td>
                                                <td class="bg-white border-left-0">
                                                   @foreach ($broker->trading_platforms as $trading_platform)
                                                   {{ $trading_platform->name }},
                                                   @endforeach
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Precision Pricing</td>
                                                <td class="bg-white border-left-0">{{ $broker->meta['precision_pricing'] }}</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Type of Spread</td>
                                                <td class="bg-white border-left-0">
                                                   @foreach ($broker->spread_types as $spread_type)
                                                   {{ $spread_type->name }},
                                                   @endforeach
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Commission</td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->meta['commission'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Scalping</td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->scalping == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Hedging</td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->hedging == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Expert Advisors</td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->expert_advisors == 1)
                                                   <i class="fa fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fa fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Lowest spread</td>
                                                <td class="bg-white border-left-0">{{ $broker->meta['lowest_spread'] }}</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Trading Instruments</td>
                                                <td class="bg-white border-left-0">
                                                   @foreach ($broker->trading_instruments as $trading_instrument)
                                                   {{ $trading_instrument->name }},
                                                   @endforeach
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">One Click Execution</td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->meta['one_click_execution'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">OCO Orders</td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->meta['oco_orders'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Managed Account</td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->meta['managed_acc'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Email Alerts</td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->meta['email_alerts'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Mobile Alerts</td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->meta['mobile_alerts'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Trailing Stops</td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->meta['trailing_stops'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Mobile Trading</td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->meta['mobile_trading'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="border-bottom-0 text-uppercase bg-lights">Web Based Trading</td>
                                                <td class="border-bottom-0 bg-white border-left-0">
                                                   @if($broker->meta['web_based_trading'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                    <div class="table-responsive">
                                       <table class="table table-bordered mb-0">
                                          <tbody class="">
                                             <tr>
                                                <td colspan="2" class="text-center text-uppercase table-title-bg border-left-0">customer support</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Customer Support Lang</td>
                                                <td class="bg-white border-left-0">
                                                   {{ $broker->meta['customer_support_lang'] }}
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Email+Phone support</td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->meta['email_phone_support'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Personal Account Manager</td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->meta['personal_acc_manager'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights border-bottom-0">Email Response time</td>
                                                <td class="bg-white border-left-0 border-bottom-0">
                                                   {{ $broker->meta['customer_service_time'] }}
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                    <div class="table-responsive">
                                       <table class="table table-bordered mb-0">
                                          <tbody class="">
                                             <tr>
                                                <td colspan="2" class="text-center text-uppercase table-title-bg border-left-0">promotion</td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Trading Tools</td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->meta['trading_tools'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">Other Promotion</td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->meta['other_promotion'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-uppercase bg-lights">
                                                   Close trade over the phone
                                                </td>
                                                <td class="bg-white border-left-0">
                                                   @if($broker->meta['trade_close_over_phone'] == 1)
                                                   <i class="fas fa-check-circle text-success"></i> Yes
                                                   @else
                                                   <i class="fas fa-times-circle text-danger"></i> No
                                                   @endif
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row mb-2">
                              <div class="col-md-12">
                                 <rate-overview :broker="{{$broker}}" />
                              </div>
                           </div>
                           <div class="card rating-cards mb-2 p-5">
                              <rate-broker :broker="{{$broker}}" />
                           </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="card" id="review-con">
                              <div class="card-body">
                                 <h2>{{ $broker->name }} Review</h2>
                                 <p>{!! $broker->review !!}</p>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                           @if($broker->pros !== NULL && $broker->cons !== NULL)
                           <table class="table table-bordered" id="procon">
                              <thead class="text-center">
                                 <tr class="bg-dark text-uppercase text-white font-weight-bold">
                                    <th>Pros</th>
                                    <th>Cons</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>
                                       <p>{!!$broker->pros!!}</p>
                                    </td>
                                    <td>
                                       <p>{!!$broker->cons!!}</p>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>

            <div>
         </div>
      </div>
   </section>
</div>
<div id="playlists" style="display:none;">
   <li data-source="playlist1" data-playlist-name="BROKER VIDEOS" data-thumbnail-path="assets/css/video-styles/thumbnails/large1.jpg">
      <p class="minimalDarkCategoriesTitle"><span class="minimialDarkBold">Title: </span>Broker Videos</p>
      <p class="minimalDarkCategoriesType"><span class="minimialDarkBold">Type: </span>HTML</p>
      <p class="minimalDarkCategoriesDescription"><span class="minimialDarkBold">Description: </span>Created using html elements, videos are loaded and played from the server.</p>
   </li>
</div>
<!--  HTML playlist -->
<ul id="playlist1" style="display:none;">
   @if(count($broker->videos) > 0)
   @foreach ($broker->videos as $video)
   <li data-thumb-source="https://img.youtube.com/vi/{{ $video->code }}/0.jpg" data-video-source="https://www.youtube.com/embed/{{ $video->code }}" data-poster-source="https://img.youtube.com/vi/{{ $video->code }}/0.jpg" data-start-at-time="00:00:10" data-stop-at-time="00:00:40">
      <div data-video-short-description="">
         <div>
            <p class="minimalDarkThumbnailTitle">START / STOP AT TIME EXAMPLE</p>
            <p class="minimalDarkThumbnailDesc">{!! $video->description !!}</p>
         </div>
      </div>
   </li>
   @endforeach
   @endif
</ul>

<!--Broker Modal Start -->
<div class="modal" id="img-full" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog modal-xl animated zoomIn animated-3x" role="document">
      <div class="modal-content modal1-bg">
         <div class="modal-header modal-header-bg-signal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">
                  <i class="fa fa-close"></i>
               </span>
            </button>
         </div>
         <div class="modal-body p-1">
            <img src="{{ asset('/broker/screenshot/1200x630-'.$broker->screenshot) }}" alt="Full Page View">
         </div>
      </div>
   </div>
</div>
<!-- Broker Modal End -->
@endsection