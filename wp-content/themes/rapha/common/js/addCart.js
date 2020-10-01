/* check and insert number of item */

function listCookies() {
    var theCookies = document.cookie.indexOf('compare').split(';');
    var aString = '';
    for (var i = 1; i <= theCookies.length; i++) {
        aString += i + ' ' + theCookies[i - 1] + "\n";
    }
    return aString;
}

function renderCart() {
    const carInner = $('#cart-in');
    var htmlCart = '';
    var numb = 0;
    var getCurrentCart = JSON.parse(localStorage.getItem('minicart'));
    $.each(getCurrentCart,function (index){
        htmlCart += `<li class="flex-box flex-box--between flex-box--aligncenter">
                <p class="list-cart-name">`+ getCurrentCart[index]['name_pro'] + `
                <p class="list-cart-quantity">` + getCurrentCart[index]['quantity'] + `</p>
                <a href="javascript:void(0)" class="js-remove-item" data-rmv="`+ getCurrentCart[index]['id_pro'] +`"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </li>`
        numb += Number(getCurrentCart[index]['quantity']);
    });
    $('.js-numbCart').html(numb);
    carInner.html(htmlCart);
}


$('#list-products').on('click', '.js-button', function() {
    var $button = $(this);
    var oldValue = $button.parent().find(".quantity").val();
    $('.addToCard').removeClass('disable');
    $('.addToCard').html('Add to cart');
    if ($button.attr("rel") == 'desc') {
        var newVal = parseFloat(oldValue) + 1;
    } else {
        if (oldValue > 0) {
            var newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 0;
        }
    }
    $button.parent().find(".quantity").val(newVal);
});



Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};

// Get the size of an object
var sizeCart = Object.size(JSON.parse(localStorage.getItem('minicart')));
if(sizeCart > 0) {
    renderCart();
    $('.btn-checkout').show();
} else {
    $('#cart-in').html('<p class="mt--40">Chưa có sản phẩm nào</p>');
}


$('#list-products').on('click', '.addToCard', function() {    
    var isThis = $(this);
    var isQuan = $(this).parent().prev().find('.quantity');
    var quantity = parseInt(isQuan.val());
    var id_pro = isThis.attr('data-id');
    var name_pro = isThis.attr('data-title');
    var price = isThis.attr('data-price');

    isThis.html('<i class="fa fa-spinner fa-spin"></i> Loading...');
    setTimeout(function() {
        isThis.html('<i class="fa fa-shopping-cart"></i> Đã thêm');
        isThis.addClass('disable');
    }, 500);
    var eachItem = [];
    var data = {
        id_pro : id_pro,
        name_pro: name_pro,
        quantity: quantity,
        price: price,
    };
    if(!localStorage.getItem("minicart")) {
        eachItem.push(data);
        localStorage.setItem("minicart", JSON.stringify(eachItem));
        $('.js-numbCart').html(quantity);
    } else {
        var currentCart = JSON.parse(localStorage.getItem('minicart'));
        var arrID = [];
        $.each(currentCart,function (index){
            arrID.push(currentCart[index]['id_pro']);
        });
        if(arrID.indexOf(id_pro) > -1) {
            $.each(currentCart,function (index){
                if(currentCart[index]['id_pro']===id_pro){
                    var currenrQuan = currentCart[index]['quantity'];
                    currentCart[index]['quantity'] = currenrQuan + quantity;
                }
            });
        } else {
            currentCart.push(data);
        }
        localStorage.setItem('minicart', JSON.stringify(currentCart));
    }
    renderCart();
    $('.btn-checkout').show();
});


/* remove Item from cart */
$('#cart-in').on('click', '.js-remove-item', function() {
    var elm = $(this);
    var getCurrentCart = JSON.parse(localStorage.getItem('minicart'));
    var newCart = []
    $.each(getCurrentCart,function (index){
        var itemDel = elm.attr('data-rmv');
        var id_pro = getCurrentCart[index]['id_pro'];
        if( id_pro != itemDel) {
            newCart.push(getCurrentCart[index])
        }
    });
    localStorage.setItem('minicart', JSON.stringify(newCart));
    renderCart();
    var sizeCart = Object.size(JSON.parse(localStorage.getItem('minicart')));
    if(sizeCart == 0) {
        $('.btn-checkout').hide();
        $('#cart-in').html('<p class="mt--40">Chưa có sản phẩm nào</p>');
    }
});


$('.js-get-booking').click(function() {
    var bodyFormData = new FormData();
    var urlBooking = $('#urlBooking').val();
    var address = $('#addressDeliver').val();
    var idUser = $('#iduser').val();
    var orderDate = $('#dateorder').val();
    var noted = $('#noted').val();
    var totalPrice = $('#totalPrice').text();
    

    bodyFormData.append("address", address );
    bodyFormData.append("idUser", idUser );
    bodyFormData.append("orderDate", orderDate );
    bodyFormData.append("noted", noted );
    bodyFormData.append("totalPrice", totalPrice );
    
    var booking = JSON.parse(localStorage.getItem('minicart'));
    for (var i = 0; i < booking.length; i++) {
        bodyFormData.append("prod_name_"+ i , booking[i]['name_pro'] );
        bodyFormData.append("prod_quan_"+ i , booking[i]['quantity'] );
    }
    bodyFormData.append("numberOder", booking.length );

    const options = {
        method: 'POST',
        headers: { 'content-type': 'application/json' },
        data: bodyFormData,
        url: urlBooking
    };
    axios(options).then(function (response) {
        console.log(response)
        // window.location.href = 'http://example.com';
    });
});
