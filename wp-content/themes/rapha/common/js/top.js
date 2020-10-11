/* LOADER */
var t;
var timer_is_on = 0;

function timedCount() {
    $('.loading').toggleClass('anim');
    t = setTimeout(function(){timedCount()}, 1000);
}
if (!timer_is_on) {
    timer_is_on = 1;
    timedCount();
}
/* END LOADER */
const APP_ASSETS = 'https://teddycoder.com/projects/rapha-tea/wp-content/themes/rapha/common/';
$(window).load(function(){
	setTimeout(function() {
		$('.loading-inner').addClass('anim');
	}, 200);
	setTimeout(function() {
		$('.loading').fadeOut(600);
        $('#main-visual').append('<img src="'+ APP_ASSETS + 'img/top/text_animated.svg" class="txt-draw">');
        $('#main-visual .txt-love').css('opacity',1).css('transform','translateY(0)');
        $('#main-visual .main-cup-tea').css('opacity',1).css('transform','translateY(0)');
	}, 400);

});


document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

$(window).scroll(function() {
        var offset_about = $('#about-us').offset().top;
        var offset_menu = $('#menu-section').offset().top;
        var offset_location = $('#location-section').offset().top;
        var offset_contact = $('#contact-section').offset().top;
    if ($(this).scrollTop() >= 600) {
        $('#pageTop').css('opacity', 1);
        $('#pageTop').css('bottom', '30px');
        $('.dot-navi').css('opacity', 1);
    } else {
        $('#pageTop').css('opacity', 0);
        $('.dot-navi').css('opacity', 0);
        $('#pageTop').css('bottom', '50px');
    }
    if ($(this).scrollTop() >= 100) {
        $('#header').addClass('fix-header');
    } else {
        $('#header').removeClass('fix-header');
    }
    var scroll = $(window).scrollTop() + 80;
    if((scroll >= offset_about)&&(scroll < offset_menu)) {
        $('.dot-navi li').removeClass('active');
        $('#dot_about').addClass('active');
    } else if((scroll >= offset_menu)&&(scroll < offset_location)) {
        $('#dot_about').removeClass('active');
        $('.dot-navi li').removeClass('active');
        $('#dot_menu').addClass('active');
    } else if((scroll >= offset_location)&&(scroll < offset_contact)) {
        $('#dot_menu').removeClass('active');
        $('.dot-navi li').removeClass('active');
        $('#dot_location').addClass('active');
    } else if(scroll >= offset_contact) {
        $('#dot_location').removeClass('active');
        $('.dot-navi li').removeClass('active');
        $('#dot_contact').addClass('active');
    } else if(scroll < offset_about) {
        $('.dot-navi li').removeClass('active');
    }
});
$('#pageTop').click(function() { $('body,html').animate({ scrollTop: 0 }, 800); });

$('.dot-navi li a').click(function() {
    $('.dot-navi li').removeClass('active');
    $(this).parent().addClass('active');
});

jQuery(document).ready(function($){
    var wow = new WOW(
        {
          boxClass:     'wow',      // animated element css class (default is wow)
          animateClass: 'animated', // animation css class (default is animated)
          offset:       100,          // distance to the element when triggering the animation (default is 0)
          mobile:       true,       // trigger animations on mobile devices (default is true)
          live:         true,       // act on asynchronously loaded content (default is true)
          callback:     function(box) {
            // the callback is fired every time an animation is started
            // the argument that is passed in is the DOM node being animated
          },
          scrollContainer: null // optional scroll container selector, otherwise use window
        }
      );
    wow.init();
    $('.slide-container').slick({
      prevArrow : '<div class="slide-btn slide-btn-previous"></div>',
      nextArrow : '<div class="slide-btn slide-btn-next"></div>',
      dots : false,
      // dotsClass : 'slides-btn-dot-container',
      slidesToShow: 1,
      autoplay: true,
      autoplaySpeed: 6000,
      speed: 1000,
      dots: true,
      infinite: true,
      arrows: false,
    });
  
    $('#cat_flavored-tea').slick({
      dots : false,
      slidesToShow: 3,
      autoplay: false,
      autoplaySpeed: 4000,
      speed: 600,
      infinite: true,
      arrows: true,
      responsive: [
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
      ]
    });
    $('.js-tab-item').click(function() {
        let tabName = $(this).attr('data-tab');
        $('.menu-section-list li').removeClass('active');
        $('.menu-section-tab').fadeOut(200);
        $('#'+tabName).fadeIn(200);
        $(this).parent().addClass('active');
    });

    let numbItemMenu = $('.js-tab-item').length;
    const itemW = 180; 
    let widthTabLength =  itemW * numbItemMenu;
    $('.menu-section-list').css('width',widthTabLength);

    $('.lang-menu li a').click(function() {
		var lang = $(this).attr('data-attribute');
		var parent = $(this).parent();
		parent.addClass('active');
		eraseCookie('lang_web');
		createCookie('lang_web', lang, 24);
		location.reload(); 
	});
});