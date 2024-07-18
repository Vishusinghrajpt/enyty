
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Eternity" />
<meta property="og:description"   content="Here you can honor and share the stories of people that have left an unforgettable imprint on our lives.
Join us in the eternal celebration of lives lived." />
<meta property="og:url"           content="https://eternitsy.smartcctvguard.com/" />
<meta property='og:image' content='{{asset("Assets/facebook post_2.png?token=").time()}}'/>
<meta property="og:image:type" content="image/jpg" /> 
<link rel="icon" type="image/jpg" href="{{asset('Assets/fav-icon.jpg')}}">
<title>@yield('title')</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=DM Serif Display|Galada|League Gothic|Freehand|Seaweed Script" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('style.css?token=').time() }}" />


<!-- Add security headers -->
    <!--<meta http-equiv="Content-Security-Policy" content="default-src 'self'">-->
    <!--<meta http-equiv="Strict-Transport-Security" content="max-age=31536000; includeSubDomains">-->
    <!--<meta http-equiv="X-Frame-Options" content="SAMEORIGIN">-->
    <!--<meta http-equiv="X-Content-Type-Options" content="nosniff">-->
    <!--<meta http-equiv="Referrer-Policy" content="strict-origin-when-cross-origin">-->
    <!--<meta http-equiv="Permissions-Policy" content="geolocation=(), microphone=(), camera=()">-->
    

<!-- begin :unique css-->
@yield('css')
<!-- end :unique css-->