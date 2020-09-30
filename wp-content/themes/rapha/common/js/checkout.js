function renderCheckout() {
    const checkoutList = $('#checkout-list');
    var htmlCart = '';
    var getCurrentCart = JSON.parse(localStorage.getItem('minicart'));
    var total = 0;
    $.each(getCurrentCart,function (index){
        var subTotal = getCurrentCart[index]['quantity'] * getCurrentCart[index]['price'];
        htmlCart += `<tr>
                <td class="grid--45">`+ getCurrentCart[index]['name_pro'] + ` </td>
                <td class="grid--15">` + getCurrentCart[index]['quantity'] + `</td>
                <td class="grid--15">` + getCurrentCart[index]['price'] + ` $</td>
                <td class="grid--15">`+ subTotal +` $</td>
                <td class="grid--10"><a href="javascript:void(0)" class="js-remove-item" data-rmv="`+ getCurrentCart[index]['id_pro'] +`"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                </tr>`
        total +=   subTotal;     
    });
    htmlCart += `<tr><td colspan="3">Total</td><td colspan="2">`+ total +` $</td></tr>`;
    checkoutList.html(htmlCart);
}
renderCheckout();

$('#checkout-list').on('click', '.js-remove-item', function() {
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
    $(this).parent().parent().remove();
    localStorage.setItem('minicart', JSON.stringify(newCart));
    renderCheckout();
    var sizeCart = Object.size(JSON.parse(localStorage.getItem('minicart')));
    if(sizeCart == 0) {
        $('#list-products').html('<p class="mt--40">Chưa có sản phẩm nào</p>');
        $('.js-get-booking').hide();
    }
});