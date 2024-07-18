

function showHideDiv(hide,show){
    $(hide).hide();
    $('.back').show();
    $(show).show();
}

$('.btn_amount').on('click', function() {

    var vl = $(this).attr('data-id');
    //  console.log(vl);
    $('.man_amount').val(vl);
    payment_link(vl);
})


$('.PAYPAL').on('click', function() {
    $('.main_card').hide();
    $('.back').show();
    $('.PAYPAL_form').show();
})

$('.CREDIT-card').on('click', function() {
    $('.main_card').hide();
    $('.back').show();
    $('#card_payment1').show();
})


$('.MOBILE-WALLET').on('click', function() {
    $('.main_card').hide();
    $('.back').show();
    $('.WALLET_form').show();
})

$('.delete').on('click', function() {
    var numItems = $('.delete').length

    var card_id = $(this).attr('data-id');
    var csrf_token = "{{csrf_token()}}";
    $.ajax({
        method: 'get',
        url: "{{route('deletCard')}}", // Replace with the actual server-side script URL
        data: {
            id: card_id
        },
        success: function(response) {
            $('#delete' + card_id).html('');
            if (numItems == 1) {
                $('.savecard').hide();
            }
            $(this).css("display", "none");
            console.log('hello');
        },
        error: function(error) {
            // Handle the error response from the server
            console.log("Error:", error);
        }
    });

    console.log(numItems);
})



// credit card validation
$(document).ready(function() {
    var $form = $(".validation");
    $('form.validation').bind('submit', function(e) {
        e.preventDefault();
        var $form = $(".validation"),
            inputVal = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'
            ].join(', '),
            $inputs = $form.find('.required').find(inputVal),
            $errorStatus = $form.find('div.error'),
            valid = true;
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
            Stripe.setPublishableKey($form.data('stripePublishableKey'));
            Stripe.createToken({
                number: $('.card-num').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeHandleResponse);
        }
    });

    function stripeHandleResponse(status, response) {
        //   console.log(response.error.message);
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }

});
























const stripe = Stripe('pk_test_51OdpPpCMNLcvAZTHI0Z4tyhge09aAusCPT0ny8d1iwMYM4lDARUxHCa6Sjg1NODwoEplFeB2TD1kJDWJBKaEWPPg00ddLPmcvQ', {
    apiVersion: "2022-11-15",
  });
  
  
  
   var wallet_amount =  $('.wallet_amount').val();
   var am = parseInt(wallet_amount);
   payment_link(am);
   $('.wallet_amount').keyup(function(){
        wallet_amount =  $('.wallet_amount').val();
          am = parseInt(wallet_amount);
          // alert("The text has been changed.");
          payment_link(am);
   });
  
  console.log(am);
  function payment_link(am){
   const paymentRequest = stripe.paymentRequest({
    country: 'US',
    currency: 'usd',
    total: {
      label: 'Demo total',
      amount: am*100,
    },
    requestPayerName: true,
    requestPayerEmail: true,
  });
  
  const elements = stripe.elements();
  const prButton = elements.create('paymentRequestButton', {
    paymentRequest,
  });
  
  (async () => {
    const result = await paymentRequest.canMakePayment();
    if (result) {
      prButton.mount('#payment-request-button');
    } else {
      document.getElementById('payment-request-button').style.display = 'none';
    }
  })();
  
  paymentRequest.on('paymentmethod', async (ev) => {
    const {paymentIntent, error: confirmError} = await stripe.confirmCardPayment(
      clientSecret,
      {payment_method: ev.paymentMethod.id},
      {handleActions: false}
    );
  
    if (confirmError) {
      ev.complete('fail');
    } else {
      ev.complete('success');
      if (paymentIntent.status === "requires_action") {
        const {error} = await stripe.confirmCardPayment(clientSecret);
        if (error) {
        } else {
          
        }
      } else {
        
      }
    }
  });
  }
  
  //test
  
  $('#CardNumber1').keyup(function(){
     if($(this).val().length >= 6){
       var type = $.payment.cardType("4242 4242 4242 4242"); 
              console.log(type);
     }
  });