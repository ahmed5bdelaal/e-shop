/*
Template Name: ShopGrids - Bootstrap 5 eCommerce HTML Template.
Author: GrayGrids
*/

     //========= glightbox
     
    //========= Hero Slider 
    
    //======== Brand Slider
    


    

$(document).ready(function () {
    loadcart();
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
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
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
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            var fname=$('.fname').val();
            var lname=$('.lname').val();
            var email=$('.email').val();
            var phone=$('.phone').val();
            var total=$('.bb').val();
            var address=$('.address').val();
            var city=$('.city').val();
            var code=$('.code').val();
            var country=$('.country').val();
            var state=$('.state').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "/place-order",
                data: {
                    'fname' : fname,
                    'lname' : lname,
                    'email' : email,
                    'phone' : phone,
                    'address' : address,
                    'city' : city,
                    'country' : country,
                    'state' : state,
                    'code' : code,
                    'total': total,
                },
                success: function (response) {
                }
            });
              $form.get(0).submit();
        }
    }
  
});

$('.remove').click(function (e) { 
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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function loadcart(){
        $.ajax({
            method: "GET",
            url: "/load-cart",
            success: function (response) {
                $('.count-cart').html('');
                $('.count-cart').html(response.count);
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