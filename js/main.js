//Responsive Navigation
$(document).ready(function() {
  $('body').addClass('js');
  var $menu = $('.site-nav-container'),
    $menulink = $('.menu-link'),
    $menuTrigger = $('.menu-item-has-children > a'),
    $searchLink = $('.search-link'),
    $siteSearch = $('.search-module'),
    $siteWrap = $('.site-wrap');
    $hamburger = $('.sh-ico-menu');

  $searchLink.click(function(e) {
    e.preventDefault();
    $searchLink.toggleClass('active');
    $siteSearch.toggleClass('active');
    $('#search-site').focus();
    $('.search-module input, .search-module .search-exit').attr('tabindex', function(index, attr){
      return attr == -1 ? null : -1;
    });
  });


  $('.site-header .menu-item-has-children > a').each(function() {

    var parentHref = $(this).attr('href');
    if (parentHref == "#" || !parentHref ) {
      $(this).addClass('nonlink');
    }
  });

  $menulink.click(function(e) {
    e.preventDefault();
    // $menulink.toggleClass('active');
    $menu.toggleClass('active');
    $siteWrap.toggleClass('nav-active');
    $hamburger.toggleClass('open');
    $('html').toggleClass('no-scroll');
  });

  $("<span class='m-subnav-arrow'></span>").insertAfter(".menu-item-has-children > a");

  $('.sn-li-l1 > .m-subnav-arrow').click(function() {
    $(this).toggleClass('active');
    var $this = $(this).next(".sn-level-2");
    $(this).parent('.menu-item-has-children').toggleClass('active');
    $this.toggleClass('active').next('ul').toggleClass('active');
  });
  $('.sn-li-l2 > .m-subnav-arrow').click(function() {
    $(this).toggleClass('active');
    var $this = $(this).next(".sn-level-3");
    $(this).parent('.menu-item-has-children').toggleClass('active');
    $this.toggleClass('active').next('ul').toggleClass('active');
  });
  $('.sn-li-l3 > .m-subnav-arrow').click(function() {
    $(this).toggleClass('active');
    var $this = $(this).next(".sn-level-4");
    $(this).parent('.menu-item-has-children').toggleClass('active');
    $this.toggleClass('active').next('ul').toggleClass('active');
  });
  $('.side-nav .m-subnav-arrow').click(function() {
    //$('.side-nav .m-subnav-arrow').removeClass('active');
    $(this).toggleClass('active');
    //$('.side-nav .m-subnav-arrow').parent('.menu-item-has-children').removeClass('active');
    $(this).parent('.menu-item-has-children').toggleClass('active');
    //$('.side-nav .m-subnav-arrow').parent('.menu-item-has-children').children('ul').removeClass('active');
    $(this).parent('.menu-item-has-children').children('ul').toggleClass('active');
  });


  $('.sn-nav .menu-item-has-children > a').focus(function() {
    $(this).next('.m-subnav-arrow').trigger('click');
  })

  $('sn-level-1 li').click(function() { 
    $('li.sn-li-l1.active').removeClass("active"); 
    $(this).addClass("active"); 
  }); 
});

$(document).ready(function(){
  $(".tax_label").text("(incl. GST)");
});

$(document).ready(function(){
  $(".nextpostslink").text("→");
  $(".previouspostslink").text("←");
});

// Scroll Top
$(document).ready(function() {
  var btn = $('.scroll-btn');

  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  });

  btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '2000');
  });
});

//Magnific Popup
$(document).ready(function() {
  $('.lightbox').magnificPopup({
    type: 'image',
    removalDelay: 500, //Delaying the removal in order to fit in the animation of the popup
    mainClass: 'mfp-fade', //The actual animation
    overflowY: 'hidden',
    fixedContentPos: true,
    fixedBgPos: true,
    callbacks: {
    close: function() {
      $.each(this.items, function( index, value ) {
        if (value.el) {
          $(value.el[0]).addClass('tse-remove-border');
        } else {
          $(value).removeClass('tse-remove-border');
        }
      });
    },
    },
  });
});
$(document).ready(function() {
  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 500,
    preloader: false,
    overflowY: 'hidden',
    fixedContentPos: true,
    fixedBgPos: true,
    callbacks: {
    close: function() {
      $(this.ev).addClass('tse-remove-border');
    },
  },
    iframe: {
      patterns: {
        youtube: {
          index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
          id: 'v=', // String that splits URL in a two parts, second part should be %id%
          // Or null - full URL will be returned
          // Or a function that should return %id%, for example:
          // id: function(url) { return 'parsed id'; }

          src: '//www.youtube.com/embed/%id%?autoplay=1&rel=0' // URL that will be set as a source for iframe.
        }
      },
      srcAction: 'iframe_src', // Templating object key. First part defines CSS selector, second attribute. "iframe_src" means: find "iframe" and set attribute "src".
    }
  });
});

//Delayed Popup with localstorage to show popup only once
$(document).ready(function() {
  var findPopupId = $('#delayed-popup').length; // if #delayed-popup exists, findPopupId = 1;
  if (findPopupId > 0) { // only run when #delayed-popup exists
    var wWidth = $(window).width(); // set variable of window width
    if (wWidth >= 640) { //only trigger on tablet or larger to prevent mobile private browsers who don't allow cookies (safari)
      if (localStorage.getItem('popup_show') === null && localStorage.getItem('exitintent_show') === null ) { // check if key is present in local storage to prevent re-triggering
        setTimeout(function() {
          window.$.magnificPopup.open({
            items: {
              src: '#delayed-popup' //ID of inline element
            },
            type: 'inline',
            removalDelay: 500, // delaying the removal in order to fit in the animation of the popup
            mainClass: 'mfp-fade mfp-fade-side', // The actual animation
          });
          localStorage.setItem('popup_show', 'true'); // set the key in local storage
        }, 11000); // delay in millliseconds until the modal triggers
      }
    }
  }
});

// Exit-Intent Modal
$(document).ready(function() {
  // Exit intent
  function addEvent(obj, evt, fn) {
    if (obj.addEventListener) {
      obj.addEventListener(evt, fn, false);
    } else if (obj.attachEvent) {
      obj.attachEvent("on" + evt, fn);
    }
  }
  // Exit intent trigger
  var findExitId = $('#exit-popup').length; // if #exit-popup exists, findExitId will contain a value of 1 (or more);
    if(findExitId > 0){ // if findExitId is greater than 0, it means that element exits on the page, therefore execute this code;
    addEvent(document, 'mouseout', function(evt) {
      if (evt.toElement === null && evt.relatedTarget === null && !localStorage.getItem('exitintent_show')) {
      //alert('test');
        window.$.magnificPopup.open({
          items: {
            src: '#exit-popup' //ID of inline element
          },
          type: 'inline',
          removalDelay: 500, //Delaying the removal in order to fit in the animation of the popup
          mainClass: 'mfp-fade mfp-fade-side', //The actual animation
        });
        localStorage.setItem('exitintent_show', 'true'); // Set the flag in localStorage
      }
    });
  }
});

//Show More
$(document).ready(function() {
  $(".showmore").after("<p><a href='#' class='show-more-link'>More</a></p>");
  var $showmorelink = $('.showmore-link');
  $showmorelink.click(function() {
    var $this = $(this);
    var $showmorecontent = $('.showmore');
    $this.toggleClass('active');
    $showmorecontent.toggleClass('active');
    return false;
  });
});

//Click to Expand
$(document).ready(function() {
  var $expandlink = $('.ce-header');
  $expandlink.click(function() {
    var $this = $(this);
    var $showmorecontent = $('.showmore');


    $this.parent().toggleClass('active'); 
    $showmorecontent.toggleClass('active');
    return false;
  });
  
  $($expandlink).keyup(function(e){
    if(e.which === 13){ //13 is the char code for Enter
      $(this).click();
    }
  });
});

//Click to Expand on Focus
$(window).load(function() {
 $('.aof-title-wrap').on('click', function() {

  var target = $(this).parent().children('.aof-content');
    var targetStatus = target.css('display');
    if(targetStatus == 'none'){
      $('.aof-item').children('.aof-content').slideUp(500);
      $('.aof-title-wrap').removeClass('active');
      target.slideDown(500);
      $(this).addClass('active');
    }
    else{
      target.slideUp(500);
      $(this).removeClass('active');
    }
 });

});

// Accordion Tabs
$(document).ready(function () {
  $('.accordion-tabs').each(function(index) {
    $(this).children('li').first().children('a').addClass('is-active').next().addClass('is-open').show();
  });
  $('.accordion-tabs').on('click focus', 'li > a.tab-link', function(event) {
    if (!$(this).hasClass('is-active')) {
      event.preventDefault();
      var accordionTabs = $(this).closest('.accordion-tabs');
      accordionTabs.find('.is-open').removeClass('is-open').hide();

      $(this).next().toggleClass('is-open').toggle();
      accordionTabs.find('.is-active').removeClass('is-active');
      $(this).addClass('is-active');
    } else {
      event.preventDefault();
    }
  });
});

//Flexslider    
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    animationLoop: true,
    controlNav: false
  });
});

//destination page slider    
$(document).ready(function(){
  // store the slider in a local variable
  var $window = $(window),
    flexslider = { vars: {} };

  function getGridSize() {
    return (window.innerWidth < 640) ? 1 :
      (window.innerWidth > 639 && window.innerWidth < 959) ? 2 :
      (window.innerWidth > 959) ? 3 : 3 ;
  }

  $('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#carousel",
    directionNav: false
  });

  $('#carousel').flexslider({
    animation: "slide",
    controlNav: true,
    animationLoop: true,
    slideshow: false,
    //itemWidth: 143,
    //itemMargin: 5,
    //itemWidth: getGridSize(),
    asNavFor: '#slider',
    minItems: 4,
    maxItems: 4,
    directionNav: true,
    itemMargin: 10,
    itemWidth: 120
  });

  // check grid size on resize event
  $window.resize(function() {
    var gridSize = getGridSize();

    flexslider.vars.minItems = gridSize;
    flexslider.vars.maxItems = gridSize;
  });
});

//Sticky Nav
$(function() {

  var findEl = $('.sh-sticky-wrap').length;
  if (findEl <= 0) {
    // do nothing
  } else {
    //Set the height of the sticky container to the height of the nav
    //var navheight = $('.site-nav-container').height();
    // grab the initial top offset of the navigation 
    //var sticky_navigation_offset_top = $('.sh-sticky-wrap').offset().top;
    var sticky_navigation_offset_top = $('.sh-sticky-wrap').outerHeight();
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var sticky_navigation = function(){
      var scroll_top = $(window).scrollTop(); // our current vertical position from the top
      // if we've scrolled more than the navigation, change its position to fixed to stick to top,
      // otherwise change it back to relative
      if (scroll_top > sticky_navigation_offset_top) { 
        $('.sh-sticky-wrap').addClass('stuck');
        $('footer').css('padding-bottom',sticky_navigation_offset_top+'px');
        //$('.sh-sticky-inner-wrap').css('height', '187px');
      } else if(scroll_top <= sticky_navigation_offset_top) {
        $('.sh-sticky-wrap').removeClass('stuck'); 
        $('footer').css('padding-bottom','0');
        // $('.site-header').css('height', 'auto');
      }   
    };
    // run our function on load
    sticky_navigation();
    // and run it again every time you scroll
    $(window).scroll(function() {
      sticky_navigation();
    });
  }
});

// ipad hover issue
$(document).ready(function() {
  if (!("ontouchstart" in document.documentElement)) {
    document.documentElement.className += " no-touch";
  }

  $(window).on('load orientationchange', function() {
    var wWidth = $(window).width();
    if (wWidth > 960) {
      /*make filters hover behavior switch to tap/clcik on touch screens*/
      if (!$('html').hasClass('no-touch')) { /*Execute code only on a touch screen device*/
        // console.log('toucheee');
       
        /*hide  drop-down if it was open*/
        $('.sn-level-1 .menu-item-has-children').bind('touchstart', function(e) {
          $(".sn-level-1 .menu-item-has-children .sub-menu").hide();
          $(this).children(".sub-menu").toggle();
          e.stopPropagation(); //Make all touch events stop at the  container element
        });

          
        $(document).bind('touchstart', function(e) {
          $(".sn-level-1 .menu-item-has-children .sub-menu").fadeOut(300); /*Close filters drop-downs if user taps ANYWHERE in the page*/
        }); 
          
        $('.sn-level-1 .menu-item-has-children .sub-menu').bind('touchstart', function(event){
          event.stopPropagation(); /*Make all touch events stop at the #filter1 ul.children container element*/
        });
       
      }
    }
  });
});

//Smooth Scroll - Detects a #hash on-page link and will smooth scroll to that position. Will not affect regular links.
$(function() {
  $('.smooth-scroll').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

//Slide in CTA
$(function() {
  var findEl = $('#slidebox').length;
  if (findEl <= 0) {
    // do nothing
  } else {
    var slidebox = $('#slidebox');
    if (slidebox) {
      $(window).scroll(function() {
        var distanceTop = $('#last').offset().top - $(window).height();
        if ($(window).scrollTop() > distanceTop)
          slidebox.animate({
            'right': '0px'
          }, 300);
        else
          slidebox.stop(true).animate({
            'right': '-430px'
          }, 100);
      });
      $('#slidebox .close').on('click', function() {
        $(this).parent().remove();
      });
    }
  }
});

// include span tags around all navigation elements
$("#hs_menu_wrapper_primary_nav ul li a").each(function( index ) {
  var navText = $( this ).html(); $( this ).html("<span>" + navText + "</span>");
});

//Styles
// $(document).ready(function() {
//  $('.site-content *').removeAttr("style");
// });

$('.main-content').addClass('more height');

var wWidth = $(window).width();
if(wWidth <= 639 ){
  $( ".main-content" ).after( "<div class='link'><a id='readmore' href='javascript:changeheight()'>Show More</a></div>" );
}

$(window).resize(function() {
  var wWidth = $(window).width();
  if (wWidth < 640) {
    var addedDiv = $(".link");
    var length1= addedDiv.length;
    if (addedDiv.length == 0) {
      $(".link").remove();
      $( ".main-content" ).after( "<div class='link'><a id='readmore' href='javascript:changeheight()'>Show More</a></div>" );
    }
  }
  else if (wWidth > 639){
    $(".link").remove();
  }
   $(function() {
       var curHeight = $('.more').height();
       if (curHeight == 250)
           $('#readmore').show();
       else
           $('#readmore').hide();
   });
});
$(function() {
   var curHeight = $('.more').height();
   if (curHeight == 250)
       $('#readmore').show();
   else
       $('#readmore').hide();
});
$(window).on('resize', function() {
   $(function() {
       var curHeight = $('.more').height();
       if (curHeight == 250)
           $('#readmore').show();
       else
           $('#readmore').hide();
   });
});

function changeheight() {
   var readmore = $('#readmore');
   if (readmore.text() == 'Show More') {
       readmore.text("Show Less");
   } else {
       readmore.text("Show More");
   }

   $('.height').toggleClass("heightAuto");
};

// Hero Slider
$(document).on('ready', function() {
  $('.si-slider').slick({
    dots: true,
    infinite: true,
    speed: 800,
    arrows: false,
    fade: true,
    cssEase: 'linear'
  });
  $('.si-slider .slick-slide:not(:last-child) .si-content a:last-of-type').blur(function() {
    $('.si-slider .slick-next').trigger('click');
    setTimeout(function() {
      $('.si-slider .slick-current').find('a').focus();
    }, 500);
  });

  //$('.si-slider .slick-dots li button').attr('tabindex', -1);

  $('.si-slider .slick-dots li button').on('click contextmenu drag auxclick',function() {
       $('a, button, input').removeClass('tse-remove-border');
       $(this).addClass('tse-remove-border');
     }).on('blur', function() {
       $(this).removeClass('tse-remove-border');
  });
});

// ========================================================================================================

// Meals per Day
$(document).ready(function(){ 
  var limit;
  $("#pa_meals-per-day").change(function (event) {
    limit = $(this).val();
    $('.checkbox-group input[type="checkbox"]').prop('checked', false);
  });

  $('.checkbox-group input[type="checkbox"]').on('change', function(event) {
    if($('.checkbox-group input[type="checkbox"]:checked').length > limit) {
      $(this).prop('checked', false);
    }
  });
}); 

// Disable dates

$(document).ready(function() {
  var currentDay = new Date();
  var month = currentDay.getMonth() + 1;
  var day = currentDay.getDate() + 1;
  var year = currentDay.getFullYear();

  var hours = currentDay.getHours();
  if(hours >= 16) {
    day = day + 1;
  }

  if(month < 10)
    month = '0' + month.toString();
  if(day < 10)
    day = '0' + day.toString();

  var newDate = year + '-' + month + '-' + day;
  var today = newDate;
  $('.wcpa_form_item input[type="date"]').attr('min', today);
});


$(document).ready(function() {
    $("#search-submit.search-text").click(function() {
        $("#search-site, #search-submit").removeClass("search-text");
        $("#search-site").focus();
        window.setTimeout(submittize,1000);
    });
    
    $("#search-site").blur(function() {
        $("#search-site, #search-submit").addClass("search-text");
        window.setTimeout(buttonize,1000);
    })
    
    function buttonize() {
        $("#search-submit").attr("type","button");
    }
    
    function submittize() {
        $("#search-submit").attr("type","submit");
    }
});

// Testimonials Slider
$(document).ready(function (){
  $('.tm-slider').slick({
    dots: false,
    arrows: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: true,
    responsive: [
    {
      breakpoint: 960,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: true,
        arrows: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false
      }
    },
    {
      breakpoint: 400,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false
      }
    }
    ]
  });

  $('.tm-slider .slick-slide.slick-active:not(:last-of-type) a:last-of-type').blur(function() {
    $('.slick-next').trigger('click');
  });
});

// InstagramSlider
$(document).ready(function (){
  $('#sbi_images').slick({
    dots: false,
    arrows: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: true,
    responsive: [
    {
      breakpoint: 960,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: true,
        arrows: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false
      }
    },
    {
      breakpoint: 400,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false
      }
    }
    ]
  });

  $('#sbi_images .slick-slide.slick-active:not(:last-of-type) a:last-of-type').blur(function() {
    $('.slick-next').trigger('click');
  });
});


// Gallery Module Lightbox
$(document).ready(function() {
	$('.cm-list').magnificPopup({
		delegate: 'a',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
		
	});
});

// Bakery List Slider
$(document).ready(function (){
  $('.bm-slider').slick({
    dots: false,
    arrows: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: true,
    responsive: [
    {
      breakpoint: 960,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: true,
        arrows: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false
      }
    },
    {
      breakpoint: 400,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false
      }
    }
    ]
  });

  $('.bm-slider .slick-slide.slick-active:not(:last-of-type) a:last-of-type').blur(function() {
    $('.slick-next').trigger('click');
  });
});

// Meals List Slider
$(document).ready(function (){
  $('.mm-slider').slick({
    dots: false,
    arrows: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: true,
    responsive: [
    {
      breakpoint: 960,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: true,
        arrows: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false
      }
    },
    {
      breakpoint: 400,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false
      }
    }
    ]
  });

  $('.mm-slider .slick-slide.slick-active:not(:last-of-type) a:last-of-type').blur(function() {
    $('.slick-next').trigger('click');
  });
});

// =====================================================================================================
//Solution Module Slider
$(document).ready(function (){
$('#sm-content-wrap').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  autoplay: false,
  dots: true,
  accessibility: true,
  asNavFor: '#sm-tabs'
});
$('#sm-tabs').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  asNavFor: '#sm-content-wrap',
  dots: false,
  autoplay: false,
  focusOnSelect: true,
  infinite: true,
  arrows: true,
  accessibility: true,
  responsive: [
  {
      breakpoint: 1280,
      settings: {
        slidesToShow: 3,
        infinite: true,
        // autoplay: true,
      }
    },
   {
      breakpoint: 766,
      settings: {
        slidesToShow: 1,
        infinite: true,
        // autoplay: true,
      }
    }
  ]
});

$('.sm-tab-title').on('click focus', function() {
  $('.sm-tab-title').attr('tabindex', '-1');
    $(this).attr('tabindex', '0');
});

$('.sm-wrap .slick-slide:not(:last-of-type) .sm-txt  a:last-of-type').blur(function() {
  $('#sm-tabs .slick-current').next('.slick-slide').find('.sm-tab-title').trigger('click');
  $('.sm-wrap .slick-current a:first-of-type').focus();
});

$('.sm-wrap .slick-dots li button').attr('tabindex', -1);

});

//Multiple Item Slider
$(document).ready(function (){
  $('.mis-slider').slick({
    arrows: true,
    dots: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: true,
    responsive: [
    {
      breakpoint: 960,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
       breakpoint: 400,
       settings: {
          slidesToShow: 1,
          slidesToScroll: 1
       }
    }
    ]
  });

  $('.mis-slider .slick-slide.slick-active:not(:last-of-type) a:last-of-type').blur(function() {
       $('.slick-next').trigger('click');
   });
});

//Buckets Hover/Focus
$(document).ready(function() {
  $('.bhf-item').hover(function(){
    $('.bhf-item').removeClass('active-col');
    $('.bhf-item').addClass('deactive-col');
    $(this).removeClass('deactive-col');
    $(this).addClass('active-col');
  }, function(){
    $('.bhf-item').removeClass('active-col');
    $('.bhf-item').removeClass('deactive-col');
  });
  //Hero SLider That expand on focus
    $('.bhf-item').focus(function() {
    $('.bhf-item').removeClass('active-col');
    $('.bhf-item').addClass('deactive-col');
    $(this).removeClass('deactive-col');
    $(this).addClass('active-col');
}).
blur(function() {
    $('.bhf-item').removeClass('active-col');
    $('.bhf-item').removeClass('deactive-col');
});
});

// Accessible Website
/*============== Focus on tab =============*/
(function($) {
  $(document).on('keyup keydown', function(e) {
    var code = e.keyCode || e.which;
    if (code == '9') {

      //Click to Expand on Focus
      $('.aof-title-wrap > a').focus(function(){
          var target = $(this).parent('.aof-title-wrap').parent().children('.aof-content');
          target.slideDown(500);
          $(this).parent('.aof-title-wrap').addClass('active');
         // $(this).parent('.aof-title-wrap').parent().addClass('active');
      }); 

      $('.aof-content li:last-of-type > a').blur(function(){
        var target = $(this).closest('.aof-item');
        target.children('.aof-title-wrap').removeClass('active');
        target.children('.aof-content').slideUp();
      });
         
        $('.site-nav .menu-item-has-children > a').focus(function(){
            $(this).parent('.menu-item-has-children').children('.sub-menu').show();
        });

       $('.site-nav .menu-item-has-children > .sub-menu li:last-of-type > a').blur(function(){

          if (!$(this).parent().children().hasClass('sub-menu') && $(this).parent().is(':last-child')) {
            $(this).parent().parent('.sub-menu').hide();
            if ($(this).parent('li').parent('.sub-menu').parent('li').next().length <= 0) {
                $(this).parent('li').parent('.sub-menu').parent('li').parent('.sub-menu').hide();
            }
            
            if ($(this).parent().next().length <= 0 && $(this).parent('li').parent('.sub-menu').parent('li').next().length <= 0 && $(this).parent('li').parent('.sub-menu').hasClass('sn-level-3')) {
              $('.sub-menu').hide();
            }
          }
          
       });

       if (code == '9' && e.shiftKey) {
         if ($(document.activeElement).parent().hasClass('menu-item-has-children')) {
           $(document.activeElement).parent().children('.sub-menu').hide();
         }
         $('.site-nav .menu-item-has-children > .sub-menu li:last-of-type a').blur(function(){
           $(this).closest('.sub-menu').show();
         });
   
       }

       $(document).click(function(e) {
          if (!$(e.target).is('.site-nav .menu-item-has-children a')) {
            $('.site-nav .sub-menu').hide();
          }
          if (!$(e.target).is('a') || !$(e.target).is('button') || !$(e.target).is('input')) {

            $('a, button, input').removeClass('tse-remove-border');
          }
       });
    }
  });

  
  $(document).ready(function () {
    $("#skipToContent").on('click', function(e){
      $('body').toggleClass('changeCursor');
      e.stopPropagation();
      e.preventDefault();
        $('.site-header').after('<a href="javascript:void(0)" tabindex="-1" id="siteContentFocusable"></a>');
        $(this).blur();
        if ( window.location.pathname == '/' ){
          $('html, body').animate({
              scrollTop: $("#siteContentFocusable").offset().top
          }, 1000);
        } else {
            $('html, body').animate({
              scrollTop: 0
          }, 1000);
        }
        $('#siteContentFocusable').trigger('focus');
    });

    $('body').on('click contextmenu drag auxclick', 'a, button, input, select', function() {
      $('a, button, input, select, [tabindex="0"]').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    }).on('blur', function(e) {
      $(this).removeClass('tse-remove-border');
      if (e.which == 2) {
        $(this).addClass('tse-remove-border');
      } 
    });

    $('[tabindex="0"]').on('click contextmenu drag auxclick', function() {
      $('a, button, input, select, [tabindex="0"]').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    }).on('blur', function(e) {
      $(this).removeClass('tse-remove-border');
      if (e.which == 2) {
        $(this).addClass('tse-remove-border');
      } 
    });

    $('select, button, input').on('mousemove', function(event) {
      //$('a, button, input, select').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    });

    $("a[href*='tel'], [href*='mailto']").on('click contextmenu drag auxclick', function() {
      $('a, button, input').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    }).on('blur', function() {
      $(this).addClass('tse-remove-border');
    });

    $("a:not([href*='tel']), a:not([href*='mailto'])").on('blur', function() {
      $("[href*='mailto'], [href*='tel']").removeClass('tse-remove-border');
    });

    // Dynamically Generated buttons
    $('.flexslider .flex-control-nav a').attr('href', 'javascript:void(0)');

    $('.flexslider').on('click', '.flex-control-nav a, .flex-direction-nav a',function() {
      $('a, button, input, select').removeClass('tse-remove-border');
      $(this).addClass('tse-remove-border');
    }).on('blur', function() {
      $(this).removeClass('tse-remove-border');
    }).on('mousemove', '.flex-control-nav a, .flex-direction-nav a', function(event) {
      $(this).addClass('tse-remove-border');
    });

    $('.flexslider .flex-control-nav li').each(function(index, value) {
      $(this).children('a').attr('aria-lable', 'Slide Dot ' + (index+1));
    });

    // Dynamically Generated buttons
    // $('.owl-carousel').on('click', '.owl-prev, .owl-next, .owl-dot',function() {
    //   $('a, button, input').removeClass('tse-remove-border');
    //   $(this).addClass('tse-remove-border');
    // }).on('blur', function() {
    //   $(this).removeClass('tse-remove-border');
    // }); 

  });

  // Flex slider accessibility
  setTimeout(function() {
      // $('.flexslider .flex-viewport li').attr('tabindex', 0);
      $('.flexslider .clone a').attr('tabindex', '-1');
  }, 500);
  $(document.documentElement).on('keyup', function(event) {
    if ($(".flexslider a, .flexslider li, .flex-direction-nav a").is(":focus")) {

      var flexslider = $(document.activeElement).closest(".flexslider");
      // flexslider.flexslider("play") //Play slideshow
      // flexslider.flexslider("pause") //Pause slideshow
      flexslider.flexslider("stop") //Stop slideshow
      
      
      // handle cursor keys
      if (event.keyCode == 37) {
        // go left
        flexslider.flexslider("prev") //Go to previous slide
        // flexslider.find('.flex-prev').trigger('click');

      } else if (event.keyCode == 39) {
        // go right
        flexslider.flexslider("next") //Go to next slide
        // flexslider.find('.flex-next').trigger('click');
      }
    }
  });

  // Owl carousel ADA
  // setTimeout(function() {
  //   $('.owl-carousel .owl-item.cloned a').attr('tabindex', '-1');
  // }, 1000);
  // $(document.documentElement).on('keyup', function (event) {
  //   if ($(".owl-carousel a, .owl-nav button, .owl-dots button").is(":focus")) {

  //     var owlCarousel = $(document.activeElement).closest(".owl-carousel");
  // owlCarousel.trigger('stop.owl.autoplay');
  //     // handle cursor keys
  //     if (event.keyCode == 37) {
  //        // go left
  //       owlCarousel.trigger('prev.owl.carousel');

  //     } else if (event.keyCode == 39) {
  //        // go right
  //        owlCarousel.trigger('next.owl.carousel');
  //     }
  //   }
  // });


  // Screen Reveal Effects
  $(document).ready(function (){
    window.sr = ScrollReveal({
      origin: 'bottom',
      distance: '80px',
      duration: 2000,
      reset: false
    })

    // Home page reveals
    sr.reveal('.pm-img', { duration: 900 });
    sr.reveal('.fadeLeft', {origin:'left',interval: 200, delay: 400});
    sr.reveal('.fadeRight', {origin:'right',interval: 200, delay: 400});
    // sr.reveal('.mm-item', {interval: 200, delay: 200});
    // sr.reveal('.bm-item', {interval: 200, delay: 200});
  });

  $(window).on('blur', function() {
    $(document.activeElement).addClass('tse-remove-border');
  });


  //Pricing page js starts
  $(document).ready(function(){
    $(".checkbox").change(function() {
      var check = document.querySelectorAll('.pricing_page input[type="checkbox"]:checked').length; 
      if(check == 1){
        $("#1meal_day + label").addClass('active');
        $("#1meal_day").addClass('one_meal_perday');
        $("#2meal_day + label").removeClass('active');
        $("#2meal_day").removeClass('two_meal_perday');
        $("#3meal_day + label").removeClass('active');
        $("#3meal_day").removeClass('three_meal_perday');
        $("#4meal_day + label").removeClass('active');
        $("#4meal_day").removeClass('four_meal_perday');
      }
      else if(check == "2"){
        $("#1meal_day + label").removeClass('active');
        $("#1meal_day").removeClass('one_meal_perday');
        $("#2meal_day + label").addClass('active');
        $("#2meal_day").addClass('two_meal_perday');
        $("#3meal_day + label").removeClass('active');
        $("#3meal_day").removeClass('three_meal_perday');
        $("#4meal_day + label").removeClass('active');
        $("#4meal_day").removeClass('four_meal_perday');
      }
      else if(check == "3"){
        $("#1meal_day + label").removeClass('active');
        $("#1meal_day").removeClass('one_meal_perday');
        $("#2meal_day + label").removeClass('active');
        $("#2meal_day").removeClass('two_meal_perday');
        $("#3meal_day + label").addClass('active');
        $("#3meal_day").addClass('three_meal_perday');
        $("#4meal_day + label").removeClass('active');
        $("#4meal_day").removeClass('four_meal_perday');
      }
      else if(check == "4"){
        $("#1meal_day + label").removeClass('active');
        $("#1meal_day").removeClass('one_meal_perday');
        $("#2meal_day + label").removeClass('active');
        $("#2meal_day").removeClass('two_meal_perday');
        $("#3meal_day + label").removeClass('active');
        $("#3meal_day").removeClass('three_meal_perday');
        $("#4meal_day + label").addClass('active');
        $("#4meal_day").addClass('four_meal_perday');
      }
      else{
        $("#1meal_day + label").addClass('active');
        $("#1meal_day").addClass('one_meal_perday');
        $("#2meal_day + label").removeClass('active');
        $("#2meal_day").removeClass('two_meal_perday');
        $("#3meal_day + label").removeClass('active');
        $("#3meal_day").removeClass('three_meal_perday');
        $("#4meal_day + label").removeClass('active');
        $("#4meal_day").removeClass('four_meal_perday');
      }
    });
    
    $("input[name='Meal_plan']").change(function(){
      if($('#Keto_Meal').is(':checked')){
        if($('#Keto_Meal').addClass("checked")){
          
          $("input[name='no_of_meal']").change(function(){
            if($('#no_meal1').hasClass('tse-remove-border')){
                if($('#1meal_day').hasClass('one_meal_perday')) {
                  $(".price").text("Rs. 0/-");
                }
                else if($('#2meal_day').hasClass('two_meal_perday')) {
                  $(".price").text("Rs. 600/-");
                }
                else if($('#3meal_day').hasClass('three_meal_perday')) {
                  $(".price").text("Rs. 800/-");
                }
                else if($('#4meal_day').hasClass('four_meal_perday')) {
                  $(".price").text("Rs. 1000/-");
                }
            }
            else if($('#no_meal3').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 1800/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 2400/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 3000/-");
              }
            }
            else if($('#no_meal5').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 3000/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 4000/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 5000/-");
              }
            }
            else if($('#no_meal10').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 6000/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 8000/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 10,000/-");
              }
            }
            else if($('#no_meal30').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 16,500/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 21,000/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 25,000/-");
              }
            }
            else if($('#no_meal60').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 32,000/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 40,500/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 48,000/-");
              }
            }
          });
        }   
          $('#Keto_Meal + label').addClass("active");
          $('#Balanced_Meal + label').removeClass("active");
          $('#Vegan_Meal + label').removeClass("active");
          $('#Low_Carb_Meal + label').removeClass("active");
          $("#btn_get_started").attr('href', 'https://newactiveat.bridgekash.net/wp/product/keto-meal-plan/');
      }
      else if($('#Balanced_Meal').is(':checked')){

        if($('#Keto_Meal').addClass("checked")){
          
          $("input[name='no_of_meal']").change(function(){
            if($('#no_meal1').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 600/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 800/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 1000/-");
              }
            }
            else if($('#no_meal3').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 1800/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 2400/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 3000/-");
              }
            }
            else if($('#no_meal5').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 3000/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 4000/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 5000/-");
              }
            }
            else if($('#no_meal10').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 6000/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 8000/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 10,000/-");
              }
            }
            else if($('#no_meal30').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 16,500/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 21,000/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 25,000/-");
              }
            }
            else if($('#no_meal60').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 32,000/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 40,500/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 48,000/-");
              }
            }
          });
        }

        $('#Keto_Meal + label').removeClass("active");
        $('#Balanced_Meal + label').addClass("active");
        $('#Vegan_Meal + label').removeClass("active");
        $('#Low_Carb_Meal + label').removeClass("active");
        $("#btn_get_started").attr('href', 'https://newactiveat.bridgekash.net/wp/product/balanced-meal-plan//');
      }
      else if($('#Vegan_Meal').is(':checked')){
        if($('#Keto_Meal').addClass("checked")){
          
          $("input[name='no_of_meal']").change(function(){
            if($('#no_meal1').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 600/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 800/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 1000/-");
              }
            }
            else if($('#no_meal3').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 1800/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 2400/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 3000/-");
              }
            }
            else if($('#no_meal5').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 3000/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 4000/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 5000/-");
              }
            }
            else if($('#no_meal10').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 6000/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 8000/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 10,000/-");
              }
            }
            else if($('#no_meal30').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 16,500/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 21,000/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 25,000/-");
              }
            }
            else if($('#no_meal60').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 32,000/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 40,500/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 48,000/-");
              }
            }
          });
        }

        $('#Keto_Meal + label').removeClass("active");
        $('#Balanced_Meal + label').removeClass("active");
        $('#Vegan_Meal + label').addClass("active");
        $('#Low_Carb_Meal + label').removeClass("active");
        $("#btn_get_started").attr('href', 'https://newactiveat.bridgekash.net/wp/product/vegan-meal-plan/');
      }
      else if($('#Low_Carb_Meal').is(':checked')){
        if($('#Keto_Meal').addClass("checked")){
          
          $("input[name='no_of_meal']").change(function(){
            if($('#no_meal1').hasClass('tse-remove-border')){
                if($('#1meal_day').hasClass('one_meal_perday')) {
                  $(".price").text("Rs. 0/-");
                }
                else if($('#2meal_day').hasClass('two_meal_perday')) {
                  $(".price").text("Rs. 600/-");
                }
                else if($('#3meal_day').hasClass('three_meal_perday')) {
                  $(".price").text("Rs. 800/-");
                }
                else if($('#4meal_day').hasClass('four_meal_perday')) {
                  $(".price").text("Rs. 1000/-");
                }
            }
            else if($('#no_meal3').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 1800/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 2400/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 3000/-");
              }
            }
            else if($('#no_meal5').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 3000/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 4000/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 5000/-");
              }
            }
            else if($('#no_meal10').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 6000/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 8000/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 10,000/-");
              }
            }
            else if($('#no_meal30').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 16,500/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 21,000/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 25,000/-");
              }
            }
            else if($('#no_meal60').hasClass('tse-remove-border')){
              if($('#1meal_day').hasClass('one_meal_perday')) {
                $(".price").text("Rs. 0/-");
              }
              else if($('#2meal_day').hasClass('two_meal_perday')) {
                $(".price").text("Rs. 32,000/-");
              }
              else if($('#3meal_day').hasClass('three_meal_perday')) {
                $(".price").text("Rs. 40,500/-");
              }
              else if($('#4meal_day').hasClass('four_meal_perday')) {
                $(".price").text("Rs. 48,000/-");
              }
            }
          });
        }
          $('#Keto_Meal + label').removeClass("active");
          $('#Balanced_Meal + label').removeClass("active");
          $('#Vegan_Meal + label').removeClass("active");
          $('#Low_Carb_Meal + label').addClass("active");
          $("#btn_get_started").attr('href', 'https://newactiveat.bridgekash.net/wp/product/low-carb-meal-plan/');
        }
        else {

          if($('#no_meal1').hasClass('tse-remove-border')){
            if($('#1meal_day').hasClass('one_meal_perday')) {
              $(".price").text("Rs. 0/-");
            }
            else if($('#2meal_day').hasClass('two_meal_perday')) {
              $(".price").text("Rs. 600/-");
            }
            else if($('#3meal_day').hasClass('three_meal_perday')) {
              $(".price").text("Rs. 800/-");
            }
            else if($('#4meal_day').hasClass('four_meal_perday')) {
              $(".price").text("Rs. 1000/-");
            }
          }
          else if($('#no_meal3').hasClass('tse-remove-border')){
            if($('#1meal_day').hasClass('one_meal_perday')) {
              $(".price").text("Rs. 0/-");
            }
            else if($('#2meal_day').hasClass('two_meal_perday')) {
              $(".price").text("Rs. 1800/-");
            }
            else if($('#3meal_day').hasClass('three_meal_perday')) {
              $(".price").text("Rs. 2400/-");
            }
            else if($('#4meal_day').hasClass('four_meal_perday')) {
              $(".price").text("Rs. 3000/-");
            }
          }
          else if($('#no_meal5').hasClass('tse-remove-border')){
            if($('#1meal_day').hasClass('one_meal_perday')) {
              $(".price").text("Rs. 0/-");
            }
            else if($('#2meal_day').hasClass('two_meal_perday')) {
              $(".price").text("Rs. 3000/-");
            }
            else if($('#3meal_day').hasClass('three_meal_perday')) {
              $(".price").text("Rs. 4000/-");
            }
            else if($('#4meal_day').hasClass('four_meal_perday')) {
              $(".price").text("Rs. 5000/-");
            }
          }
          else if($('#no_meal10').hasClass('tse-remove-border')){
            if($('#1meal_day').hasClass('one_meal_perday')) {
              $(".price").text("Rs. 0/-");
            }
            else if($('#2meal_day').hasClass('two_meal_perday')) {
              $(".price").text("Rs. 6000/-");
            }
            else if($('#3meal_day').hasClass('three_meal_perday')) {
              $(".price").text("Rs. 8000/-");
            }
            else if($('#4meal_day').hasClass('four_meal_perday')) {
              $(".price").text("Rs. 10,000/-");
            }
          }
          else if($('#no_meal30').hasClass('tse-remove-border')){
            if($('#1meal_day').hasClass('one_meal_perday')) {
              $(".price").text("Rs. 0/-");
            }
            else if($('#2meal_day').hasClass('two_meal_perday')) {
              $(".price").text("Rs. 16,500/-");
            }
            else if($('#3meal_day').hasClass('three_meal_perday')) {
              $(".price").text("Rs. 21,000/-");
            }
            else if($('#4meal_day').hasClass('four_meal_perday')) {
              $(".price").text("Rs. 25,000/-");
            }
          }
          else if($('#no_meal60').hasClass('tse-remove-border')){
            if($('#1meal_day').hasClass('one_meal_perday')) {
              $(".price").text("Rs. 0/-");
            }
            else if($('#2meal_day').hasClass('two_meal_perday')) {
              $(".price").text("Rs. 32,000/-");
            }
            else if($('#3meal_day').hasClass('three_meal_perday')) {
              $(".price").text("Rs. 40,500/-");
            }
            else if($('#4meal_day').hasClass('four_meal_perday')) {
              $(".price").text("Rs. 48,000/-");
            }
          }


        $('#Keto_Meal + label').addClass("active");
        $('#Balanced_Meal + label').removeClass("active");
        $('#Vegan_Meal + label').removeClass("active");
        $('#Low_Carb_Meal + label').removeClass("active");
        $("#btn_get_started").attr('href', 'https://newactiveat.bridgekash.net/wp/product/keto-meal-plan/');
      }
  });
  });

  // Pricing page js ends
}(jQuery));