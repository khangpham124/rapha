/*-----------------------------------------------------------
jquery-rollover.js
jquery-opacity-rollover.js
-------------------------------------------------------------*/
function createCookie(name, value, hours) {
    if (hours) {
        var date = new Date();
        date.setTime(date.getTime() + (hours * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else var expires = "";
    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}


function readCookie(name) {
    var nameEQ = escape(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return unescape(c.substring(nameEQ.length, c.length));
    }
    return null;
}


function eraseCookie(name) { createCookie(name, "", -1); }

function listCookies() {
    var theCookies = document.cookie.indexOf('compare').split(';');
    var aString = '';
    for (var i = 1; i <= theCookies.length; i++) {
        aString += i + ' ' + theCookies[i - 1] + "\n";
    }
    return aString;
}


function numberWithCommas(number) {
    var parts = number.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}

$('.formatNumb').on('keyup', function(e){
    
});


$('#getData').click(function() {
    $(this).addClass('disable');
});

$('.js-rmv-address').click(function() {
    var isThis = $(this);
    var urlBooking = $('#list-address').attr('data-action'); 
    var idUser = $('#list-address').attr('data-id'); 
    var indexKey = isThis.attr('data-numb'); 
    var bodyFormData = new FormData();
    bodyFormData.append("indexKey", indexKey );
    bodyFormData.append("idUser", idUser );
    const options = {
        method: 'POST',
        headers: { 'content-type': 'application/json' },
        data: bodyFormData,
        url: urlBooking
    };
    axios(options).then(function (response) {
        setTimeout(function(){
                location.reload();
        }, 500);
    
    });
});

$('.js-add-address').click(function() {
    var isThis = $(this);
    var urlBooking = $(this).attr('data-action');    
    var bodyFormData = new FormData();
    var address = $('#address').val();
    var idUser = $('#iduser').val();
    bodyFormData.append("address", address );
    bodyFormData.append("idUser", idUser );
    isThis.html('<i class="fa fa-spinner fa-spin"></i> Loading...');
    const options = {
        method: 'POST',
        headers: { 'content-type': 'application/json' },
        data: bodyFormData,
        url: urlBooking
    };
    axios(options).then(function (response) {
        isThis.html('<i class="fa fa-shopping-cart"></i> Đã thêm');
        $('#address').val('');
        setTimeout(function(){
                location.reload();
        }, 500);
    
    });
}); 


$('#list-products').on('click', '.js-categories', function() {     
    $('.js-list-products').slideUp(200);
    $(this).parent().toggleClass('active');
    $(this).parent().next('.js-list-products').slideDown(200);
}); 

$('.js-suggest').keyup(function() {
    $.ajax({ // create an AJAX call...
        data: $('#search-form').serialize(), // get the form data
        type: 'POST', // GET or POST
        url: "http://localhost:8888/rapha/ajax.php", // the file to call
        success: function(response) { // on success..
            var newHtml = response;
            $('#list-products').empty();
            $('#list-products').append(newHtml);
        }
    });
    return false; // cancel original event to prevent form submitting
    
});


$('#search-form').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) { 
      e.preventDefault();
      return false;
    }
  });

function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}

$('.js-toggle').click(function() {
    $(this).parent().parent().next('.order-list-detail').slideToggle(200);
});

$('.js-check-pass').keyup(function() {
    var pw = $('#pw').val();
    if((pw === $(this).val())&&(pw != '')) {
        $('.js-update-info').removeClass('disable');
    } else {
        $('.js-update-info').addClass('disable');
    }
});


$('.js-update-info').click(function() {
    var isThis = $(this);
    var urlBooking = "http://localhost:8888/rapha/data/changePass.php";
    var bodyFormData = new FormData();
    var password = $('#pw').val();
    var idUser = $('#idUser').val();
    bodyFormData.append("password", password );
    bodyFormData.append("idUser", idUser );
    isThis.html('<i class="fa fa-spinner fa-spin"></i> Loading...');
    const options = {
        method: 'POST',
        headers: { 'content-type': 'application/json' },
        data: bodyFormData,
        url: urlBooking
    };
    axios(options).then(function (response) {
        isThis.html('<i class="fa fa-shopping-cart"></i> Đã Cập nhật');
        $('#pw').val('');
        $('#re-pw').val('');
    });
}); 
