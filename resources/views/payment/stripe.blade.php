<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    
    <!-- Include Apple Pay JS script -->
    <script src="https://applepay.cdn.apple.com/jsapi/v1/apple-pay.js"></script>

    <!-- Include your CSS files -->
    <link href="https://eternity.smartcctvguard.com/public/css/user_profile/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=DM Serif Display|Galada|League Gothic|Freehand|Seaweed Script" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://eternity.smartcctvguard.com/style.css?token=1712033475" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
    <link href="https://eternity.smartcctvguard.com/public/css/user_profile/style.css?token=1712033475" rel="stylesheet">
</head>
<body>
    <!-- Apple Pay button -->
    <apple-pay-button id="apple-pay-button" buttonstyle="black" type="plain" locale="en-US"></apple-pay-button>

    <!-- Include your JavaScript files -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
    <script type="text/javascript" src="https://eternity.smartcctvguard.com/js/users_profile.js?token=1712033475"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script>
    // Initialize Apple Pay button
    const applePayButton = document.getElementById('apple-pay-button');
    const paymentRequest = {
      countryCode: 'US',
      currencyCode: 'USD',
      total: {
        label: 'testing',
        amount: '100.00',
      },
    };

    const session = new ApplePaySession(1, paymentRequest);

    // Handle Apple Pay payment authorization
    session.onpaymentauthorized = function(event) {
      const paymentToken = event.payment.token;
      // Send payment token to your Laravel backend for processing
      fetch('/process-payment', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ token: paymentToken }),
      })
      .then(response => {
        if (response.ok) {
          // Payment processed successfully
          return response.json();
        }
        throw new Error('Payment failed');
      })
      .then(data => {
        // Handle successful payment response
        console.log(data);
        session.completePayment(ApplePaySession.STATUS_SUCCESS);
      })
      .catch(error => {
        // Handle payment error
        console.error(error);
        session.completePayment(ApplePaySession.STATUS_FAILURE);
      });
    };

    // Show Apple Pay button when available
    if (window.ApplePaySession) {
      applePayButton.className = 'apple-pay-button';
      applePayButton.addEventListener('click', function() {
        session.begin();
      });
    } else {
      applePayButton.style.display = 'none';
    }
    </script>
</body>
</html>
