@extends('frontend.layouts-v2.master')

@section('style')
    <style>
        .broker-catagory .custom-control-label{
            font-size: 0.9rem;
            color: #7a7a7a;
        }
        .broker-catagory .custom-control-label::before{
            top:7px;
            background-color: inherit;
            border: 1px solid #ddd;
            border-radius: 0;
        }
        .broker-catagory .custom-control-label::after {
            top:7px;
        }
        .load-more-badge {
            font-weight: 400;
            background: #04abab;
            color: #fff;
            padding: 5px;
            font-style: italic;
            font-size: 10px;
            border-radius: 3px;
            letter-spacing: 0.3px;
        }
        .reset-badge {
            font-weight: 400;
            background: #607D8B;
            color: #fff;
            padding: 5px;
            font-style: italic;
            font-size: 10px;
            border-radius: 3px;
            letter-spacing: 0.3px;
        }
        .broker-title h1 {
            text-align: center;
            font-size: 30px;
            letter-spacing: 2px;
            color: #797979;
            font-weight: 500;
            margin: 0;
            padding: 0;
        }
        .search-bar input[type="text"]{
            height: 50px;
            background: #f9f9f9;
            font-size: 16px;
        }
        .search-bar i {
            position: absolute;
            right: 16px;
            top: 14px;
            font-size: 1.5rem;
            color: hsl(0, 5%, 84%);
        }

    </style>
    <style>

        .numbers {
            position: absolute;
            color: #000;
            background: #fff;
            line-height: 18px;
            width: 18px;
            height: 18px;
            border-radius: 9px;
            top: 6px;
            left:5px;
            text-align: center;
            display: block;
        }
        .numbers-position {
            position:absolute;
            top:30%;
            left:30%;
        }
        .platform-column ul {
            padding: 0;
            margin: 0;
            line-height: 0;
        }
        .platform-column ul li {
            display: inline-block;
            font-size: 12px;
        }
        .all-btns {
            display: inline-flex;
            text-transform: capitalize;
        }
        .all-btns .btn{
            font-size: 0.7rem;
            padding: 0.33rem 0.33rem;
            margin-bottom: 7px;
            font-weight: 500;
            margin-right: 0.4rem;
        }
        .all-btns .btn + .btn:last-child {
            margin-left: 0;
        }



        .forex-broker-table td,
        .forex-broker-table th {
            border-color: rgba(0, 0, 0, 0.06);
            padding: 0.25rem;
            font-size: 13px;
            vertical-align: middle;
            text-align: center;
        }


        .link-button a div{
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 1px 4px 0px rgba(170, 170, 170, 0.4);
        }
        .link-button a div:hover {
            box-shadow: 0 4px 21px 0 rgba(0, 32, 147, 0.18);
        }
        .link-button a div span.text-btn{
            text-transform: capitalize;
            padding: .5rem 0.8rem;
            font-size: 14px;
            color: #7a7a7a;
        }
        .link-button a div span.check-btn {
            color: #fff;
            background: #212529;
            padding: .5rem 0.8rem;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        @media(min-width:1199px){
            .display-xl-none{
                display: none;
            }
        }
        @media(max-width:1199px) {
            .display-none {
                display: none;
            }
            #sidebar {
                width: 250px;
                position: fixed;
                top: 0;
                left: -250px;
                height: 100vh;
                z-index: 99999;
                background: #fff;
                color: #fff;
                transition: all 0.3s;
                overflow-x: scroll;
                box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);

            }

            #sidebar.active {
                left: 0;
            }

            #dismiss {
                width: 35px;
                height: 35px;
                line-height: 35px;
                text-align: center;
                background: #7386D5;
                position: absolute;
                top: 10px;
                right: 15px;
                cursor: pointer;
                -webkit-transition: all 0.3s;
                -o-transition: all 0.3s;
                transition: all 0.3s;
            }

            #dismiss:hover {
                background: #7386D5;
                color: #fff;
            }

            .overlay {
                display: none;
                position: fixed;
                width: 100vw;
                height: 100vh;
                background: rgba(0, 0, 0, 0.7);
                z-index: 998;
                opacity: 0;
                transition: all 0.5s ease-in-out;
            }
            .overlay.active {
                display: block;
                opacity: 1;
            }

            #sidebar .sidebar-header {
                padding: 20px;
                background: #6d7fcc;
            }

            #sidebar ul.components {
                padding: 20px 0;
                border-bottom: 1px solid #47748b;
            }

            #sidebar ul p {
                color: #fff;
                padding: 10px;
            }

            #sidebar ul li a {
                padding: 10px;
                font-size: 1.1em;
                display: block;
            }

            #sidebar ul li a:hover {
                color: #7386D5;
                background: #fff;
            }

            #sidebar ul li.active>a,
            a[aria-expanded="true"] {
                color: #fff;
                background: #6d7fcc;
            }

            a[data-toggle="collapse"] {
                position: relative;
            }

            .dropdown-toggle::after {
                display: block;
                position: absolute;
                top: 50%;
                right: 20px;
                transform: translateY(-50%);
            }
            .broker-title h1 {
                font-size: 24px;
            }
        }
        @media screen and (max-width: 768px) {
            .padding-0 {
                padding: 0;
            }
        }
        @media(max-width:540px) {
            .all-btns {
                display: flex;
                text-transform: capitalize;
                flex-direction: column;
            }
        }

    </style>
    <style>
        .blue,
      .bluebrighter {
          background-color: #1c2855;
          color: #fff;
          font-size: 18px;
          text-align: center;
          padding-bottom: 85px
      }
      
      .bluebrighter {
          background-color: #223066;
          background-image: url(../images/dots.png);
          background-repeat: repeat-x;
          background-position: left top;
          padding: 55px 0;
          text-align: left
      }
      
      .blue a,
      .bluebrighter a {
          color: #fff;
          text-decoration: none;
          padding-bottom: 50px
      }
      
      .blue.banner a {
          padding-bottom: 0
      }
      
      .blue .content h1 {
          font-size: 60px;
          font-weight: 400;
          margin: 0;
          padding: 85px 0 10px 0;
          line-height: normal;
          letter-spacing: -1px
      }
      
      .blue .content h3 {
          font-size: 15px;
          font-weight: 400;
          margin: 0;
          padding: 0;
          line-height: normal;
          text-align: center;
          text-transform: uppercase;
          font-family: Proxima-light, Arial, Helvetica, sans-serif
      }
      
      .blue .content .flex-grid .five h3 img {
          display: block;
          margin-right: auto;
          margin-left: auto
      }
      
      .blue hr {
          background-color: #fff;
          display: block;
          height: 2px;
          border: 0;
          width: 65px;
          margin-top: 26px;
          margin-right: auto;
          margin-bottom: 23px;
          margin-left: auto
      }
      
      .blue .flex-grid {
          padding-top: 80px
      }
      
      .bluebrighter ul li {
          float: left
      }
      
      .buttonsset {
          width: 240px;
          float: right!important
      }
      
      .intro {
          width: 55%;
          font-size: 16px
      }
      
      .intro b {
          font-size: 24px;
          font-weight: 400;
          display: block;
          padding-bottom: 20px;
          font-family: proxima-regular
      }
      
      .bluebrighter .content ul .buttonsset .bluebutton.transparent,
      .bluebrighter .content ul .buttonsset .greenbutton {
          border-width: 1px;
          padding: 12px 40px 8px 40px;
          min-width: 158px;
          text-align: center
      }
      
      .bluebrighter .content ul .buttonsset .greenbutton {
          border-width: 0;
          min-width: 160px;
          margin-top: 7px
      }
      #topbar ul,
      .content {
          margin: 0 auto;
          width: 98%;
          max-width: 1200px;
          overflow: hidden
      }
      #topbar ul, .content ul {
        margin: 0 0 0 5px;
        list-style-type: none;
        display: flex;
        align-items: center;
        justify-content: space-between;
      }
      #footertop {
          background-color: #373b3f;
          border-bottom: solid 1px #43474a;
          font-family: proxima-bold;
          color: #fff;
          font-size: 15px
      }
      
      #footertop .content ul {
          display: block;
          border-right: solid 1px #43474a;
          overflow: hidden
      }
      
      #footertop .content ul li {
          display: inline-block;
          border-right: solid 1px #43474a;
          padding: 20px 4% 14px 4%;
          min-height: 34px
      }
      
      #footertop .content ul #titf {
          font-size: 18px;
          padding-left: 0
      }
      
      #footertop .content ul #emf {
          border-top-width: 0;
          border-right-width: 0;
          border-bottom-width: 0;
          border-left-width: 0
      }
      
      #footertop .content ul li img {
          vertical-align: middle;
          padding-right: 5px
      }
      
      #footertop .content ul a {
          color: #fff;
          text-decoration: none
      }
      
      #footertop .content ul #angle {
          background-image: url(../images/arrow.png);
          background-repeat: no-repeat;
          background-position: left center;
          position: relative;
          right: 2px
      }
      
      #footerlinks {
          color: #e7e8e8;
          background-color: #292d30;
          padding-top: 50px;
          padding-bottom: 20px;
          overflow: hidden
      }
      .guide-page  h2{
        padding: 1rem;
        border-radius: 4px;
        font-weight: 500;
        text-align: center;
        text-transform: uppercase;
      }
      .details p{
        text-align: justify;
      }
      .details ul {
        margin: 0;
        padding-left: 2rem;
      }
      .details ul li {
        text-align: justify;
      }
        </style>
@endsection

@section('bottom-script')
<!-- Ticker -->
<script src="{{ asset('/assets/') }}/js/jquery.carouselTicker.js"></script>
<script async src="{{ asset('/assets/') }}/js/start.js"></script>
<!-- Owl Carousel Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('/assets/') }}/js/scripts.js"></script>
@endsection


@section('content')

 <!-- Broker Filters End -->
<div class="container guide-page">
    <div class="row">
        <div class="col-md-12">
            <h2 class="bg-success">Selecting The Right Forex Broker</h2>
        </div>
        <div class="col-md-12">
            <div class="mb-5 details">
                <p>Forex is easy to learn and success can come with the very first trade. Understanding how the final analysis of profit and loss is configured is an important first step in Forex trading and a certain amount of Forex training is definitely a prudent undertaking by all traders if any money is to be made in currency trading. Understanding the technical and fundamental reasons behind currency pairs and how they affect price movements as well as knowledge of and familiarity with Forex indicators and tools, leads to a more successful trading experience.</p>
                
                <p>Forex is just one of many investment vehicles a trader can choose and like all other financial instruments, both gains and losses are part of the game. One of the best ways to boost your chances of success in Forex is to understand the ins and outs of currency trading. Setting up a demo or practice account can offer an opportunity to do trade on a live account without putting any money at risk and most Forex brokers offer this feature.</p>
                
                <h3 class="font-weight-bold">What to look for when choosing a Forex Broker?</h3>
                 
                <ul>
                    <li><strong>Secured Money :</strong> Feeling secure with a broker is of major importance to a trader and should be validated before opening a trading account. Most Forex brokers are regulated and/or licensed by international or local regulatory authorities and this entails keeping clients’ funds totally segregated from all other monies.</li>
        
                    <li><strong>Customer support :</strong> Traders often need to contact a broker representative for clarification or additional information. Contact information should be listed on the landing page and should include telephone numbers and email addresses. Live Chat offers immediate contact with an online rep and is available with most brokers.</li>
        
                    <li><strong>Account Types :</strong> Brokers usually offer their clients a choice of different trading accounts. Accounts can differ according to the amount of money required to open the account, fixed or floating spreads, varying leverages and more. Bonuses can also be contingent on the type of account opened.</li>
        
                    <li><strong>Initial Deposit :</strong> Some trading accounts can be opened with as little as $1.00 while others require a minimum deposit of $2500. Brokers tend to provide a choice of accounts and their main difference may be the amount of the initial deposit. Deposits can be made in a variety of different ways, but credit cards and bank wires are the most popular methods with online payment systems gaining popularity.</li>
        
                    <li><strong>Charges and Fees :</strong> In most cases, there are no charges for opening an account with a broker. Some companies do have a deposit or a withdrawal fee while many don’t have any charges as all. When deciding with which Forex broker to open an account, you should look carefully at all charges and fees and especially the percentage of pips included in losses and profits as this can determine the final outcome of the trade.</li>
        
                    <li><strong>Leverages :</strong> Most brokers offered traders a certain amount of leverage to enable them to increase their investment amount. These differ from broker to broker as well as from one account to another. New traders just starting out should avoid using leverage at first as it can put him at increased risk if his trades end in a loss.</li>
        
                    <li><strong>Spreads :</strong> Spreads are the difference between the buy and sell price and this is where the broker makes its money. It is important to check what type of spread-fixed or floating-is levied as well as to compare the amount of the spread with that of several brokers.</li>
        
                    <li><strong>Free demo account :</strong> Another feature to look for in a Forex broker is whether the option of a free demo account is provided. Demo accounts allow you to make trades in a real online account without putting up any money. Brokers offer this option with varying time frames and different amounts of virtual trading funds but even for a short period of time, the use of a demo account offers sufficient opportunity for you to grasp the concept of Forex trading and learn the ins and outs of currency price movements.</li>
        
                    <li><strong>Currency Pairs offered :</strong> Most Forex brokers offer trading in the major currency pairs such as USD/EUR or JPY/USD. Other brokers add on what is considered exotic pairs which are currencies from smaller or developing countries. Still others offer trading in bitcoins, a cryptocurrency.</li>
        
                    <li><strong>Trading platform :</strong> The Forex trading platform offered for use by each broker should also be seriously considered before deciding whether or not to open an account. The trading platform is used to place orders, check out Forex news, perform technical analysis, manage the trading account and much more. Sometimes the platform is a third party application but in many cases it is also a specific application created, designed or modified by the Forex broker. Comparing the features provided in the different versions of both the basic platform and those on the higher upgrades is necessary in assessing whether or not the platform works for you.</li>
        
                    <li><strong>Educational Materials :</strong> The more you know, the better trader you will be. Some brokers place a strong focus on education and provide a host of different venues such as videos, seminars, webinars and more. Most broker websites post daily—sometimes weekly—news updates and analysis and many provide additional fundamental analysis of what is happening in the markets. Economic calendars list upcoming financial events around the world and different calculators help traders calculate margin interest, pips, profits and more.</li>
        
                    <li><strong>Bonuses and Promotions :</strong> Some brokers find bonuses and promotions to be an important way to attract new clients and they offer them generously. Welcome bonuses or loyalty bonuses are common and can add significantly to a trader’s account balance. There are some brokers who come up with unique promotions such as cash prizes, electronic devices and even cars or trips.</li>
                </ul>

                <h3>In Summary</h3>
        
                <p>In today’s fast paced world, Forex trading can offer big profits in a very short time and it has been attracting lots of investors who have tired of other trading instruments and have lost interest in different financial markets. But let’s face it, with hundreds of brokers pedaling their wares, deciding on the right broker can be challenging and time consuming.</p>
        
                <p>To ease the process of selecting a Forex broker, the team at Fxsuccessbd.com has tested and reviewed dozens of the top rated Forex brokers and we have compiled our findings into thorough and honest</p>
        
                <p>Forex broker appraisals. We say it like it is and post the truth and nothing but the truth.So before making your selection and registering for an account, spend some time reading our Forex broker reviews so you have the best chance of becoming a profitable Forex trader.</p>
                   
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-0">
            <div class="bluebrighter">
                <div class="content">
                    <ul>
                        <li class="intro">
                        <b>Can't decide which broker is suitable for your trading strategy?</b>
                        Chat with our experienced support executive, who will review your requirements and guide you a suitable broker.
                        </li>
                        <li class="buttonsset">
                        <img src="{{ asset('/assets/img/man.png')}}" style="max-width:80%; height:auto;float:right;" alt="">
                        </li>
                    </ul> 
                </div>
            </div>
            <div id="footertop">
                <div class="content">
                    <ul>
                    <li id="titf"> Support Platforms</li>
                    <li id="angle">
                        <a target="_blank" href="#" class="sco">
                            <img src="{{ asset('/assets/img/chat.png')}}"  alt=""> Live Support
                        </a>
                    </li>
                    <li id="ticket">
                        <a target="_blank" href="#">
                            <img src="{{ asset('/assets/img/ticket.png')}}"  alt="">
                            <span>Submit a </span>Support Request
                        </a>
                    </li>
                    <li id="mailf">
                        <a href="#" data-container="body" data-toggle="popover" data-placement="top" data-content="tel:+16093083622">
                            <img src="{{ asset('/assets/img/call.png')}}"  alt=""> Call Us
                        </a>
                    </li>
                    <li id="emf">
                        <a href="#" data-container="body" data-toggle="popover" data-placement="top" data-content="example@gmail.com">
                            <img src="{{ asset('/assets/img/email.png')}}"  alt=""> Email Us
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
      
@endsection

         