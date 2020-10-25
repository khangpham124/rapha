/* LOADER */
var t;
var timer_is_on = 0;

function timedCount() {
    // $('.loading').toggleClass('anim');
    t = setTimeout(function(){timedCount()}, 1000);
}
if (!timer_is_on) {
    timer_is_on = 1;
    timedCount();
}
/* END LOADER */
const APP_ASSETS = 'http://raphatea.org/wp-content/themes/rapha/common/';
$(window).load(function(){
	setTimeout(function() {
		$('.loading-inner').addClass('anim');
	}, 200);
	setTimeout(function() {
		$('.loading').fadeOut(600);
        $('#slide_default').append('<img src="'+ APP_ASSETS + 'img/top/text_animated.svg" class="txt-draw">');
        $('#main-visual .txt-love').css('opacity',1).css('transform','translateY(0)');
        $('#main-visual .main-cup-tea').css('opacity',1).css('transform','translateY(0)');
    $('.slide-container').slick({
      prevArrow : '<div class="slide-btn slide-btn-previous"></div>',
      nextArrow : '<div class="slide-btn slide-btn-next"></div>',
      dots : false,
      // dotsClass : 'slides-btn-dot-container',
      slidesToShow: 1,
      autoplay: true,
      fade: true,
      autoplaySpeed: 4500,
      speed: 800,
      dots: true,
      infinite: true,
      arrows: false,
      pauseOnHover:false,
      pauseOnFocus:false,
    });    
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

$(".nav-menu-button").click(function(){
  $(".nav-menu").slideToggle();
  $(".nav-menu-button").toggleClass("active");
  $("body").toggleClass("fixed");
});

var vW = $(window).width();
if(vW < 768) {
  $('.nav-menu a').click(function() {
    $(".nav-menu").slideUp(200);
  });
}

$(window).scroll(function() { 
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
});
$('#pageTop').click(function() { $('body,html').animate({ scrollTop: 0 }, 800); });


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
            slidesToShow: 1,
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
    const itemW = 220; 
    let widthTabLength =  itemW * numbItemMenu;
    $('.menu-section-list').css('width',widthTabLength);
    $('.menu-section-list li:first-child').addClass('active');

    $('.lang-menu li a').click(function() {
		var lang = $(this).attr('data-attribute');
		var parent = $(this).parent();
		parent.addClass('active');
		eraseCookie('lang_web');
		createCookie('lang_web', lang, 24);
		location.reload(); 
	});
});


$('.js-send-contact').click(function() {
  var isThis = $(this);
  isThis.html('<i class="fa fa-spinner fa-spin"></i> Loading...');
  var actionURL = $('#actionURL').val(); 
  var fullname = $('#fullname').val();
  var emailAgency = $('#emailAgency').val(); 
  var phone = $('#phone').val(); 
  var address = $('#address').val(); 
  var message = $('#message').val(); 

  var bodyFormData = new FormData();
  bodyFormData.append("fullname", fullname );
  bodyFormData.append("emailAgency", emailAgency );
  bodyFormData.append("phone", phone );
  bodyFormData.append("address", address );
  bodyFormData.append("message", message );
  const options = {
      method: 'POST',
      headers: { 'content-type': 'application/json' },
      data: bodyFormData,
      url: actionURL
  };
  axios(options).then(function (response) {
    $('.input-page').val('');
    $('.textarea-page').val('');
    let lang = readCookie('lang_web');
    $('.js-send-contact').hide();
    if((lang != '') || (lang == 'en')) {
      $('.notiSend').text('Message sent. Please refesh page to send another message')
      // $('.js-send-contact').html('Send <i class="fa fa-paper-plane" aria-hidden="true"></i>');
    } else {
      $('.notiSend').text('Tin nhắn đã được gửi. Vui lòng làm mới trang để gửi tin nhắn tiếp theo')
      // $('.js-send-contact').html('Gửi <i class="fa fa-paper-plane" aria-hidden="true"></i>');
    }
    
      setTimeout(function(){
        $('.notiSend').text('');
      }, 2000);
  });
});