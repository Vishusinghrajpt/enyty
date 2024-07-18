

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" type="image/jpg" href="{{asset('Assets/fav-icon.jpg')}}">
<title>@yield('title')</title>
<link href="{{asset('css/user_profile/sb-admin-2.min.css')}}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=DM Serif Display|Galada|League Gothic|Freehand|Seaweed Script" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('style.css?token=').time() }}" />

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
<link href="{{asset('css/user_profile/style.css?token=').time()}}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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