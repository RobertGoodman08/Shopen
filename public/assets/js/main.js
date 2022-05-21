$(function() {


    // CART item-addCart


    function showCart(cart) {
        $('#cart-modal .modal-cart-content').html(cart);
        const myModalEl = document.querySelector('#cart-modal');
        const modal = bootstrap.Modal.getOrCreateInstance(myModalEl);
        modal.show();

        if ($('.cart-qty').text()) {
            $('.count-items').text($('.cart-qty').text());
        } else {
            $('.count-items').text('0');
        }
    }

    $('#mini-cart-trigger').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'cart/show',
            type: 'GET',
            success: function (res) {
                showCart(res);
            },
            error: function () {
                alert('Error!');
            }
        });
    });

    $('#cart-modal .modal-cart-content').on('click', '.del-item', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        $.ajax({
            url: 'cart/delete',
            type: 'GET',
            data: {id: id},
            success: function (res) {
                const url = window.location.toString();
                if (url.indexOf('cart/view') !== -1) {
                    window.location = url;
                } else {
                    showCart(res);
                }
            },
            error: function () {
                alert('Error!');
            }
        });
    });

    $('#cart-modal .modal-cart-content').on('click', '#clear-cart', function () {
        $.ajax({
            url: 'cart/clear',
            type: 'GET',
            success: function (res) {
                showCart(res);
            },
            error: function () {
                alert('Error!');
            }
        });
    });

    $('.add-to-cart').on('click', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        const qty = $('#input-quantity').val() ? $('#input-quantity').val() : 1;
        const $this = $(this);

        $.ajax({
            url: 'cart/add',
            type: 'GET',
            data: {id: id, qty: qty},
            success: function (res) {
                if (url.indexOf('.add-to-cart') !== -1) {
                    window.location = url;
                } else {
                    showCart(res);
                    $this.find('i').removeClass('fa-shopping-cart').addClass('fa-luggage-cart');
                }
            },
            error: function () {
                alert('Error!');
            }
        });
    });

    // CART

    // CART


    $('#sort-by').on('change', function () {
        window.location = PATH + window.location.pathname + '?' + $(this).val();
    });
    console.log('asasasasasasasasasas')


    $('#languages button').on('click', function () {
        const lang_code = $(this).data('langcode');
        window.location = PATH + '/language/change?lang=' + lang_code;
    });

    $('.item-addwishlist').on('click', '.item-addwishlist', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        const $this = $(this);
        $.ajax({
            url: 'wishlist/add',
            type: 'GET',
            data: {id: id},
            success: function (res) {
                res = JSON.parse(res);
                Swal.fire(
                    res.text,
                    '',
                    res.result
                );
                if (res.result == 'success') {
                    $this.removeClass('add-to-wishlist').addClass('delete-from-wishlist');
                    $this.find('i').removeClass('far fa-heart').addClass('fas fa-hand-holding-heart');
                }
            },
            error: function () {
                alert('Error!');
            }
        });
    });

    $('.item-addwishlist-delete').on('click', '.delete-from-wishlist', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        const $this = $(this);
        $.ajax({
            url: 'wishlist/delete',
            type: 'GET',
            data: {id: id},
            success: function (res) {
                const url = window.location.toString();
                if (url.indexOf('wishlist') !== -1) {
                    window.location = url;
                } else {
                    res = JSON.parse(res);
                    Swal.fire(
                        res.text,
                        '',
                        res.result
                    );
                    if (res.result == 'success') {
                        $this.removeClass('delete-from-wishlist').addClass('add-to-wishlist');
                        $this.find('i').removeClass('fas fa-hand-holding-heart').addClass('far fa-heart');
                    }
                }
            },
            error: function () {
                alert('Error!');
            }
        });
    });


});