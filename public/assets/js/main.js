
$(document).ready(function () {
    loadcart();
    loadwishlist();
$('.addToCart').click(function (e) { 
    e.preventDefault();
    var product_id=$(this).closest('.product_data').find('.prod_id').val();
    var product_qty=$(this).closest('.product_data').find('.qty').val();
    var o_qty=$(this).closest('.product_data').find('.o-qty').val();
    if(o_qty > 0){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id' : product_id,
                'product_qty' : product_qty,
            },
            
            success: function (response) {
                alert(response.status);
                loadcart();
            }
        });
    }else{
        alert('Out of Stock');
    }
});

$('.addToWishlist').click(function (e) { 
    e.preventDefault();
    var product_id=$(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'product_id' : product_id,
            },
            
            success: function (response) {
                alert(response.status);
                loadwishlist();
            }
        });
});
$(function() {
    var $form         = $(".validation");
  $('form.validation').bind('submit', function(e) {
    var $form         = $(".validation"),
        inputVal = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputVal),
        $errorStatus = $form.find('div.error'),
        valid         = true;
        $errorStatus.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorStatus.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey('pk_test_51Lwa1mLotAv2HWJvLmv7zUC5pwirJYZ1Z9jvrhueQpS8KQykzWf334Ua0bCA50h3Xze4ijbIdgEaglz0FqTcRG0R00cgN8aRYd');
      Stripe.createToken({
        number: $('.card-num').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeHandleResponse);
    }
  
  });
  
  function stripeHandleResponse(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            var stripeToken=token;
            var total=$('.bb').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "/stripe-payment",
                data: {
                    'total' : total,
                    'stripeToken': stripeToken,
                },
                success: function (response) {
                    $form.get(0).submit();
                },
                error: function(response){
                    alert(response.status);
                }
            });
        }
    }
  
});

$('.remove-cart').click(function (e) { 
    e.preventDefault();
    var product_id=$(this).closest('.p_data').find('.prod_id').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: "post",
        url: "/remove-product",
        data: {
           'product_id' : product_id,
        },
        success: function (response) {
            // window.location.reload();
            $('.items-prod').load(location.href + ' .items-prod > *');
            loadcart();
        }
    });
});

$('.remove-wishlist').click(function (e) { 
    e.preventDefault();
    var product_id=$(this).closest('.p_data').find('.prod_id').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: "post",
        url: "remove-product-wishlist",
        data: {
           'product_id' : product_id,
        },
        success: function (response) {
            // window.location.reload();
            $('.items-prod').load(location.href + ' .items-prod > *');
            loadwishlist();
        }
    });
});
$(document).on('change','.c-input',function (e) { 
    e.preventDefault();
    var product_id=$(this).closest('.p_data').find('.prod_id').val();
    var product_qty=$(this).closest('.p_data').find('.c-input').val();    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "post",
            url: "/update-cart",
            data: {
                'product_id' : product_id,
                'product_qty' : product_qty,
            },
            success: function (response) {
                if(response.status){
                    $('.items-prod').load(location.href + ' .items-prod > *');
                }else{
                    alert(response.error);
                }
            }
        });
});

    
    function loadcart(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "GET",
            url: "/load-cart",
            success: function (response) {
                $('.count-cart').html('');
                $('.count-cart').html(response.count);
            }
        });
    }

    function loadwishlist(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "GET",
            url: "/load-wishlist",
            success: function (response) {
                $('.count-wishlist').html('');
                $('.count-wishlist').html(response.count);
            }
        });
    }
});
(function () {
    //===== Prealoder

    // window.onload = function () {
    //     window.setTimeout(fadeout, 100);
    // }

    // function fadeout() {
    //     document.querySelector('.preloader').style.opacity = '0';
    //     document.querySelector('.preloader').style.display = 'none';
    // }


    /*=====================================
    Sticky
    ======================================= */
    window.onscroll = function () {
        var header_navbar = document.querySelector(".navbar-area");
        var sticky = header_navbar.offsetTop;

        // show or hide the back-top-top button
        var backToTo = document.querySelector(".scroll-top");
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            backToTo.style.display = "flex";
        } else {
            backToTo.style.display = "none";
        }
    };

    //===== mobile-menu-btn
    let navbarToggler = document.querySelector(".mobile-menu-btn");
    navbarToggler.addEventListener('click', function () {
        navbarToggler.classList.toggle("active");
    });


})();