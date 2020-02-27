(function($) {
    'use strict';

    /*===================================*
    01. LOADING JS
    /*===================================*/
    $(window).on('load', function() {
        var preLoder = $(".preloader");
        preLoder.delay(700).fadeOut(500);
    });

    /*===================================*
    02. SMOOTH SCROLLING JS
    *===================================*/
    // Select all links with hashes
    $('a.page-scroll').on('click', function(event) {
        // On-page links
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            // Figure out element to scroll to
            var target = $(this.hash),
                speed = $(this).data("speed") || 800;
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 60
                }, speed);
            }
        }
    });

    /*===================================*
    03. MENU JS
    *===================================*/
    //Main navigation scroll spy for shadow
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 110) {
            $('header').addClass('nav-fixed');
            $('section.slider_section').addClass('slider-after-top-fix');
        } else {
            $('header').removeClass('nav-fixed');
            $('section.slider_section').removeClass('slider-after-top-fix');
        }

    });

    //Hide Navbar Dropdown After Click On Links
    var navBar = $(".header_wrap");
    var navbarLinks = navBar.find(".navbar-collapse ul li a");

    $.each(navbarLinks, function(i, val) {

        var navbarLink = $(this);

        navbarLink.on('click', function() {
            navBar.find(".navbar-collapse").collapse('hide');
        });

    });

    //Main navigation Active Class Add Remove
    $('.navbar-toggler').on('click', function() {
        $("header").toggleClass("active");
    });

    /*===================================*
    04. BACKGROUND ANIMATION JS
    *===================================*/
    var $particles_js = $('#banner_bg_effect');
    if ($particles_js.length > 0) {
        particlesJS('banner_bg_effect',
            // Update your personal code.
            {
                "particles": {
                    "number": {
                        "value": 80,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#26B6D4"
                    },
                    "shape": {
                        "type": "polygon",
                        "stroke": {
                            "width": 0,
                            "color": "#000000"
                        },
                        "polygon": {
                            "nb_sides": 5
                        },
                        "image": {
                            "src": "img/github.svg",
                            "width": 100,
                            "height": 100
                        }
                    },
                    "opacity": {
                        "value": 0.4,
                        "random": false,
                        "anim": {
                            "enable": false,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 3,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 40,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": "#26B6D4",
                        "opacity": 0.1,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 6,
                        "direction": "none",
                        "random": false,
                        "straight": false,
                        "out_mode": "out",
                        "bounce": false,
                        "attract": {
                            "enable": false,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "repulse"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 400,
                            "line_linked": {
                                "opacity": 1
                            }
                        },
                        "bubble": {
                            "distance": 400,
                            "size": 40,
                            "duration": 2,
                            "opacity": 8,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 200,
                            "duration": 0.4
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true
            }

        );
    }


    /*===================================*
	05. BACKGROUND ANIMATION JS
	*===================================*/

    /*===================================*
     06.COUNTDOWN JS
    *===================================*/
    $('.tk_countdown_time').each(function() {
        var endTime = $(this).data('time');
        $(this).countdown(endTime, function(tm) {
            $(this).html(tm.strftime('<span class="counter_box"><span class="tk_counter days">%D </span><span class="tk_text">Days</span></span><span class="counter_box"><span class="tk_counter hours">%H</span><span class="tk_text">Hours</span></span><span class="counter_box"><span class="tk_counter minutes">%M</span><span class="tk_text">Minutes</span></span><span class="counter_box"><span class="tk_counter seconds">%S</span><span class="tk_text">Seconds</span></span>'));
        });
    });

    /*===================================*
     07. VIDEO JS
    *===================================*/
    // $('.video').magnificPopup({
    //     type: 'iframe'
    // });

    /*===================================*
    08. CONTACT FORM JS
    *===================================*/
    // $("#submitButton").on("click", function(event) {
    //     event.preventDefault();
    //     var mydata = $("form").serialize();
    //     $.ajax({
    //         type: "POST",
    //         dataType: "json",
    //         url: "contact.php",
    //         data: mydata,
    //         success: function(data) {
    //             if (data.type === "error") {
    //                 $("#alert-msg").removeClass("alert-msg-success");
    //                 $("#alert-msg").addClass("alert-msg-failure");
    //             } else {
    //                 $("#alert-msg").addClass("alert-msg-success");
    //                 $("#alert-msg").removeClass("alert-msg-failure");
    //                 $("#first-name").val("Enter Name");
    //                 $("#email").val("Enter Email");
    //                 $("#subject").val("Enter Subject");
    //                 $("#description").val("Enter Message");

    //             }
    //             $("#alert-msg").html(data.msg);
    //             $("#alert-msg").show();
    //         },
    //         error: function(xhr, textStatus) {
    //             alert(textStatus);
    //         }
    //     });
    // });


    /*===================================*
    09. SCROLLUP JS
    *===================================*/
    $(window).scroll(function() {
        if ($(this).scrollTop() > 150) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $(".scrollup").on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 600);
        return false;
    });


    /*===================================*
    10. POPUP JS
    *===================================*/
    // $('.content-popup').magnificPopup({
    //     type: 'inline',
    //     preloader: true,
    //     mainClass: 'mfp-zoom'
    // });

    /*===================================*
    11. ANIMATION JS
    *===================================*/
    // $(function() {

    // 	function ckScrollInit(items, trigger) {
    // 		items.each(function() {
    // 			var ckElement = $(this),
    // 				AnimationClass = ckElement.attr('data-animation'),
    // 				AnimationDelay = ckElement.attr('data-animation-delay');

    // 			ckElement.css({
    // 				'-webkit-animation-delay': AnimationDelay,
    // 				'-moz-animation-delay': AnimationDelay,
    // 				'animation-delay': AnimationDelay
    // 			});

    // 			var ckTrigger = (trigger) ? trigger : ckElement;

    // 			ckTrigger.waypoint(function() {
    // 				ckElement.addClass("animated").css("visibility", "visible");
    // 				ckElement.addClass('animated').addClass(AnimationClass);
    // 			}, {
    // 				triggerOnce: true,
    // 				offset: '90%'
    // 			});
    // 		});
    // 	}

    // 	ckScrollInit($('.animation'));
    // 	ckScrollInit($('.staggered-animation'), $('.staggered-animation-wrap'));

    // });

    /*===================================*
    12. SHOW HIDE PASSWORD
    *===================================*/

    $(".toggle-password").on('click', function() {

        $(this).toggleClass("ion-eye ion-eye-disabled");
        var input = $($(this).attr("data-toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });


})(jQuery);

// Custom  JS

// Ticker Initialize

$(".carouselTicker").carouselTicker({
    // animation speed
    speed: 2,
    // animation delay
    delay: 30,
    // RTL or LTR
    reverse: true
});

// Service OWL Carousel

var checkWidth = $(window).width();
var cus_item;
if (checkWidth <= 600) {
    cus_item = 1;
} else if (checkWidth > 600 && checkWidth < 1000) {
    cus_item = 2;
} else {
    cus_item = 4;

}

$('.pic-carousel').owlCarousel({
    items: cus_item,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    nav: true,
    navText: ['<i class="ion-ios-arrow-back"></i>', '<i class="ion-ios-arrow-forward"></i>'],
    responsive: {
        0: {
            items: 1,

        },
        380: {
            items: 1,
        },
        600: {
            items: 2
        },
        800: {
            items: 2
        },
        1000: {
            items: 3
        },
        1200: {
            items: 4
        }
    }

});

$('.carousel-main').owlCarousel({
    items: 3,
    loop: true,
    autoplay: true,
    autoplayTimeout: 2500,
    margin: 5,
    nav: true,
    dots: false,
    navText: ['<span class="fas fa-chevron-left fa-2x"></span>','<span class="fas fa-chevron-right fa-2x"></span>'],
    responsive: {
        0: {
        items: 1
        },
  
        576: {
        items: 2
        },
  
        768: {
        items: 2
        },
  
        992: {
        items: 3
        },
  
        1200: {
        items: 3
        }
    }
  })

// Related OWL Carousel

$('.related').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    navText: ['<i class="ion-ios-arrow-back"></i>', '<i class="ion-ios-arrow-forward"></i>'],
    responsive: {
        0: {
            items: 1,

        },
        380: {
            items: 1,
        },
        600: {
            items: 1
        }

    }
});

// Performance OWL Carousel


var mini_item;
if (checkWidth <= 600) {
    mini_item = 1;
} else if (checkWidth > 600 && checkWidth < 1000) {
    mini_item = 3;
} else {
    mini_item = 5;

}


$('.performance').owlCarousel({
    items: mini_item,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    nav: true,
    navText: ['<i class="ion-ios-arrow-back"></i>', '<i class="ion-ios-arrow-forward"></i>'],
    responsive: {
        0: {
            items: 1,

        },
        380: {
            items: 1,
        },
        600: {
            items: 2
        },
        800: {
            items: 3
        },
        1000: {
            items: 4
        },
        1200: {
            items: 5
        }
    }

});

// Testimonial OWL Carousel

$('.testimonial').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    navText: ['<i class="ion-ios-arrow-back"></i>', '<i class="ion-ios-arrow-forward"></i>'],
    responsive: {
        0: {
            items: 1,

        },
        380: {
            items: 1,
        },
        900: {
            items: 2
        }
    }
});

// Service Card Text Limit

$(".service-inner p").each(function() {
    var a = $(this).text();
    if ($(window).width() == 768) {
        if (a.length > 130) {
            var b = a.trim().substring(0, 135) + "…";
            $(this).text(b)
        }
    } else {
        if (a.length > 109) {
            var b = a.trim().substring(0, 110) + "…";
            $(this).text(b)
        }
    }
});

// Loader Delay
$(document).ready(function() {
    setTimeout(function() {
        $(".loader-delay").fadeOut();
        $('.load-time').css({ 'visibility': 'visible', 'opacity': '1', 'transition': 'all 0.5s ease-in-out' });
    }, 6000);
})



// Statement JS
$(".statement-btn").click(function() {
    var a = $(this).attr("data-link");
    $("#statementsModal").load(a)
});


// Count Animation
$('.count').each(function() {
    $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
    }, {
        duration: 5000,
        easing: 'swing',
        step: function(now) {
            $(this).text(Math.ceil(now));
        }
    });
});


//   $('.side-toggle').click(function(){
//     $('#thirddiv').fadeToggle();
//     $('#seconddiv').toggleClass('md-pr-1-half');
//     $('#seconddiv').toggleClass('col-lg-6 col-lg-9');
//     $('.toggle-adjust-left').toggleClass('col-md-3 col-md-4');
//     $('.toggle-adjust-right').toggleClass('col-md-9 col-md-8');
//   })


//       $(document).ready(function () {
//      if ($(window).width() <= 991 && $(window).width() >599) {
//         $("#thirddiv").remove().insertBefore("#seconddiv");
//      }
//      })


// $(".rating")[0] && $(".rating").each(function() {
//     var a = $(this).data("rating");
//     $(this).rateYo({
//         rating: a,
//         normalFill: "#ddd",
//         ratedFill: "#3fc0fa",
//         spacing: "3px",
//         onSet: function(rating, rateYoInstance) {

//             $(this).parent().find('.badge').html(rating);
//         },
//         onChange: function(rating, rateYoInstance) {

//             $(this).parent().find('.badge').html(rating);
//         }
//     })
// })

$('.footable-page-link').click(function(e) {
    $(".rating")[0] && $(".rating").each(function() {
        var a = $(this).data("rating");
        $(this).rateYo({
            rating: a,
            normalFill: "#ddd",
            ratedFill: "#3fc0fa",
            spacing: "3px",
            onSet: function(rating, rateYoInstance) {

                $(this).parent().find('.badge').html(rating);
            },
            onChange: function(rating, rateYoInstance) {

                $(this).parent().find('.badge').html(rating);
            }
        })
    })
})


$('.user-toggle').on('change', function() {
        var rightWidget = $(this).attr('data-value');
        $('.hide-' + rightWidget).toggleClass('mb-neg-1');
        if ($(this).is(':checked')) {
            $('.hide-' + rightWidget).slideDown();
        } else {
            $('.hide-' + rightWidget).slideUp();
        }
    })
    // Right Side Widget Toggle End


$('.liked').click(function() {
    $(this).toggleClass('active');
    if ($('.disliked').hasClass('active')) {
        $('.disliked').removeClass('active');
    }
})

$('.disliked').click(function() {
    $(this).toggleClass('active');
    if ($('.liked').hasClass('active')) {
        $('.liked').removeClass('active');
    }
})

$('.enter_comment').focus(function() {
    $(this).parent().find('.comment-avatar').addClass('scale-0');
    $(this).parent().parent().find('.sign-as-guest').slideDown();
})

// $('.sign-as-guest input').focus(function(e){
// 	$(this).parent().find('.enter_comment').trigger('focus');
// })

$(document).click(function(e) {
    if (!($(e.target).closest('.comment-box').length > 0 || $(e.target).closest('.reply-section').length > 0)) {
        $('.sign-as-guest').slideUp();
    }

})

$('.enter_comment').focusout(function() {
    $('.comment-avatar').removeClass('scale-0');
})


// $('.sign-as-guest input').focus(function(){
// 	$('.enter_comment').focus();
// })

$('.reply-btn').click(function() {
    $(this).parent().find('.reply-section').slideToggle();
})

/*Dropdown Menu*/
$('.sig-drop').click(function() {
    $(this).attr('tabindex', 1).focus();
    $(this).toggleClass('active');
    $(this).find('.dropdown-menu-new').slideToggle(300);
});

$('.sig-drop-new.dropdown-menu-new li').click(function() {
    $(this).parents('.dropdown-new').find('span').text($(this).text());
    $(this).parents('.dropdown-new').find('input').attr('value', $(this));
});
/*End Dropdown Menu*/

/*Dropdown Menu*/
$('.time-extra').click(function() {
    $(this).attr('tabindex', 1).focus();
    $(this).toggleClass('active');
    $(this).find('.dropdown-menu-new').slideToggle(300);
});

$('.time-extra-new.dropdown-menu-new li').click(function() {
    $(this).parents('.dropdown-new').find('span').text($(this).text());
    $(this).parents('.dropdown-new').find('input').attr('value', $(this));
});
/*End Dropdown Menu*/

$('.time-zone-btn').click(function() {
    $('.time-toggle').slideToggle(300);
})

/*Dropdown Menu*/
$('.show-rows').click(function() {
    $(this).attr('tabindex', 1).focus();
    $(this).toggleClass('active');
    $(this).find('.dropdown-menu-new').slideToggle(300);
});

$('.show-rows-new.dropdown-menu-new li').click(function() {
    $(this).parents('.dropdown-new').find('span').text($(this).text());
    $(this).parents('.dropdown-new').find('input').attr('value', $(this));
    var getNoRows = $(this).html();

    if ((getNoRows > $('.user-online-table tr').length) || (getNoRows == 'Show All')) {
        $('.user-online-table tr').show();
        $(this).parents('.dropdown-new').find('span').text('Show Rows');
    } else {
        $('.user-online-table tr').hide();
        $('.user-online-table tr:nth-child(-n+' + getNoRows + ')').show();
    }


});
/*End Dropdown Menu*/

$('.user-online-table tr td').hover(function() {
        // $(this).parent().find('.visitor-info-count').fadeIn(300);
        var today = $(this).find('.country-flag').data('visit-today');
        var month = $(this).find('.country-flag').data('visit-month');
        var total = $(this).find('.country-flag').data('visit-total');
        if (today || month || total) {
            $('#visit-today').text(today);
            $('#visit-month').text(month);
            $('#visit-total').text(total);
        } else {
            $('#visit-today').text('0');
            $('#visit-month').text('0');
            $('#visit-total').text('0');
        }
    },
    function() {
        // $(this).parent().find('.visitor-info-count').fadeOut(300);
        // $('#visit-today').text('0');
        // $('#visit-month').text('0');
        // $('#visit-total').text('0');
    })

$('.user-online-container').hover(function() {
        $('.visitor-detail').slideDown();
    },
    function() {
        $('.visitor-detail').slideUp();
    }
)

// $('.percent-table tr td .progress').hover(function(){
// 	$(this).parent().find('.percent-def').fadeIn();
//  },
// function(){
// 	$(this).parent().find('.percent-def').fadeOut();
// }
// )


// var er,element,li;
// for(er = 1;er<=$('.user-online-table tr').length;er++){
// 	li = document.createElement('li');
// 	element = li.innerHTML=(er);
// console.log(li);

// $('.show-rows-new').append(li);
// }

$('#View-full').click(function() {
    var img_source = $(this).find('img').attr('src');
    $('#img-full').find('img').attr('src', img_source);
})

var checkWidth = $(window).width();
var new_cus_item;
if (checkWidth <= 600) {
    new_cus_item = 2;
} else if (checkWidth > 600 && checkWidth < 1000) {
    new_cus_item = 4;
} else {
    new_cus_item = 6;

}

$('.choose-us').owlCarousel({
    items: new_cus_item,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    nav: true,
    navText: ['<i class="ion-ios-arrow-back"></i>', '<i class="ion-ios-arrow-forward"></i>'],

});

var four_box;
if (checkWidth <= 600) {
    four_box = 1;
} else if (checkWidth > 600 && checkWidth < 1000) {
    four_box = 3;
} else {
    four_box = 4;

}

$('.info-boxes').owlCarousel({
    items: four_box,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    nav: true,
    navText: ['<i class="ion-ios-arrow-back"></i>', '<i class="ion-ios-arrow-forward"></i>'],

});



$('.consult').owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    nav: true,
    navText: ['<i class="ion-ios-arrow-back"></i>', '<i class="ion-ios-arrow-forward"></i>'],
    dots: true,

});

$('.consult .owl-dot').each(function() {
    $(this).children('span').text($(this).index() + 1);
});






$('.View-invoice').click(function() {
    var parent = $(this).parent();
    if (parent.hasClass('overdue')) {
        $('#invoice-modal .modal-title').text('Overdue Invoice');
    } else {
        $('#invoice-modal .modal-title').text('Invoice');
    }
})

var probId;

$('.tickets-list li').click(function() {
    probId = $(this).find('.unique-id').text();
    $('.conversation-container').show();
    $(probId).fadeIn();
    $(probId).find('.prob-identity').text(probId);
    $(this).parent().hide();
    $('.toggle-ticket').show();
    $('.new-ticket').hide();
    $('.search-ticker-list').hide();
    $('#search-ticket').val('');
    $('.tickets-list li').show();
})

$('.toggle-ticket').click(function() {
    $('.tickets-list').show();
    $('.conversation-container').hide();
    $('.conversations').hide();
    $('.toggle-ticket').hide();
    $('.new-ticket').show();
    $('.search-ticker-list').show();
})

// $('.send-message textarea').keypress(function(event)
$('.send-reply-ticket').click(function(event) {
    var $this = $(this).parent().find('textarea');

    // if(event.keyCode == 13){
    var msg = $this.val();
    $this.val('');
    $(probId).find('.simplebar-content').append(`<div class='recievers'><p>` + msg + `</p><div class="reciever-pic">
                              <img src="../assets/images/none.png" alt="pro-image">
                            </div></div>`);
    // }
});

var oldText;
$('.ticket-toggle').click(function() {
    $('.new-ticket-container').slideToggle();
    if ($(this).text().toLowerCase() == 'cancle') {
        $(this).html(`<i class="fa fa-plus"></i> New Ticket`);
    } else {
        $(this).html('Cancle');
    }
})

$('#search-ticket').keyup(function() {
    var input, filter, li, i, txtValue;
    input = $(this).val();
    filter = input.toUpperCase();
    li = $('.tickets-list li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        txtValue = li[i].textContent || li[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
})

$('.othter-package-options .btn').click(function() {
    $(this).parent().find('ul').slideToggle();
})

$('.satisfied-btn').click(function() {
    var ratingDiv = $(this).parent().find('.rate-answer');
    $(this).fadeOut(500);
    ratingDiv.delay(1000).fadeIn();
})

$('.navbar-toggler').click(function(e) {
    $('.sb-slidebar').toggleClass('show-menu');
})



$('.sb-slidebar .menu-dropdown>a').on('touchstart', function(e, index) {
    e.preventDefault();
    $(this).toggleClass('showed');
    $(this).parent().find('.dropdown-menu').toggleClass('expanded');
})

$('.close-menu').click(function(e) {
    $('.sb-slidebar').removeClass('show-menu');
});

if ($(window).width() < 480) {
    $('.sm-append').appendTo('.sm-btn-holder');
}

// JS Social

// $(".right-inner .social-shares").jsSocials({
//     shares: ["twitter", "facebook", "linkedin"]
// });

// $(".like-share-page .social-shares").jsSocials({
//     shares: ["twitter", "facebook", "linkedin"]
// });

// $(".floating-share .social-shares").jsSocials({
//     shares: ["facebook", "twitter", "linkedin"],
//     showLabel: false,
//     showCount: "inside",
// });


// if ($('.jssocials-share-facebook .jssocials-share-count').text() == '') {
//     $('.jssocials-share-facebook .jssocials-share-count').text(0);
// }


// Review Logo
$('.browse-btn').click(function() {
    var target = $(this).attr('data-target');
    $(target).click();
})

$('.upfile-hidden').change(function() {
    var filePath = $(this).val();
    var fileName = filePath.replace(/.*[\/\\]/, '');
    var inputField = $(this).attr('id');
    $('.' + inputField).val(fileName);
})

//Tab Next

$('.tab-click').click(function(e) {
    e.preventDefault();
    $($(this).data('click')).click();
})

//Name Valid

$('.nama-valid').keyup(function() {
    if ($(this).val().length > 140) {
        $('.tab-click').addClass('pointer-none');
        $('#step-2').addClass('pointer-none');
        toastr["warning"]("You hava exceeded 140 characters");
    } else {
        $('.tab-click').removeClass('pointer-none');
        $('#step-2').removeClass('pointer-none');
    }
})

// Pro Pic

//  function readURL(input) {

//   if (input.files && input.files[0]) {
//     var reader = new FileReader();

//     reader.onload = function(e) {
//       $('.profile-img-container img').attr('src', e.target.result);
//     }

//     reader.readAsDataURL(input.files[0]);
//   }
// }

$('.edit-propic').click(function() {
    $('#pro-pic-input').click();
    $('.propic-options').hide();
})

// Profile Croppie
var $uploadCrop,
    tempFilename,
    rawImg,
    imageId;

function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.upload-demo').addClass('ready');
            $('#profile-pic-modal').modal('show');
            rawImg = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        swal("Sorry - you're browser doesn't support the FileReader API");
    }
}

$('#pro-pic-input').change(function() {
    readFile(this);
})

// $uploadCrop = $('#upload-demo').croppie({
//     viewport: {
//         width: 200,
//         height: 180,
//     },
//     enforceBoundary: false,
//     enableExif: true
// });




$('.update-proimg').click(function() {
    $('.propic-options').hide();
    $('#profile-pic-modal').modal('show');
    rawImg = $('#pro-image-orginal').data('src').val();
})

$('#profile-pic-modal').on('shown.bs.modal', function() {
    // alert('Shown pop');
    $uploadCrop.croppie('bind', {
        url: rawImg
    }).then(function() {
        console.log('jQuery bind complete');
    });
})

$('#cropImageBtn').on('click', function(ev) {
    $uploadCrop.croppie('result', {
        type: 'base64',
        format: 'jpeg',
        size: { width: 100, height: 100 }
    }).then(function(resp) {
        $('.profile-img-container img').attr('src', resp);
        $('#profile-pic-modal').modal('hide');
    });
});


$('.input-file').click(function() {
    $('.propic-options').fadeToggle();
})