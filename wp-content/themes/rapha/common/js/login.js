eraseCookie('login_cookies');
$('.js-btn-login').click(function() {
    var isThis = $(this);
    isThis.html('<i class="fa fa-spinner fa-spin"></i> Authenticate...');
    var actionURL = $('#actionURL').val(); 
    var username = $('#username').val();
    var password = $('#password').val(); 
  
    var bodyFormData = new FormData();
    bodyFormData.append("username", username );
    bodyFormData.append("password", password );
    
    const options = {
        method: 'POST',
        headers: { 'content-type': 'application/json' },
        data: bodyFormData,
        url: actionURL
    };
    axios(options).then(function (response) {
        setTimeout(function(){
            $('#errLogin').html('');
            let responseLogin = response.data;
            let res = responseLogin.replace(" ", "");
            if(res.indexOf('success') > -1 ) {
                let username = $('#username').val();
                createCookie('login_cookies', username ,30);
                window.location.href = 'http://raphatea.org/dashboard/';
            } else {
                $('#errLogin').html(res);
            }
            isThis.html('LOGIN');
        }, 500);
    });
  });

  $('.js-to-reset').click(function() {
    $('.for-login').fadeOut(400);
    $('.for-reset').fadeIn(400);
  });

  $('.js-input-reset').keyup(function(){
    const isThis = $(this);
    setTimeout(function() {
        var bodyFormData = new FormData();
        let actionURL = 'http://raphatea.org/data/validate.php';
        bodyFormData.append("username", isThis.val() );
        const options = {
            method: 'POST',
            headers: { 'content-type': 'application/json' },
            data: bodyFormData,
            url: actionURL
        };
        axios(options).then(function (response) {
            if(response.data.ID) {
                $('.js-btn-reset').removeClass('disable');
                $('.js-btn-reset').attr('data-id',response.data.ID)
            } else {
                $('.js-btn-reset').addClass('disable');
                $('.js-btn-reset').attr('data-id','')
            }
        });
    }, 200);
  });

    $('.js-btn-reset').click(function() {
        const isThis = $(this);
        let actionURL = 'http://raphatea.org/data/sendUrl.php';
        var bodyFormData = new FormData();
        bodyFormData.append("username", isThis.attr('data-id') );
        bodyFormData.append("email", $('.js-input-reset').val() );
        const options = {
            method: 'POST',
            headers: { 'content-type': 'application/json' },
            data: bodyFormData,
            url: actionURL
        };
        axios(options).then(function (response) {
            console.log('done');
        });    
    });

  