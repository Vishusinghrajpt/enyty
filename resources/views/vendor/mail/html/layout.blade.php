<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{{ config('app.name') }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="color-scheme" content="light">
<meta name="supported-color-schemes" content="light">
<style>
@media only screen and (max-width: 600px) {
.inner-body {
width: 100% !important;
}

.footer {
width: 100% !important;
}
}

@media only screen and (max-width: 500px) {
.button {
width: 100% !important;
}
}
p {
    text-align: center !important;
}
.main-sec a {
    font-size: 22px;
    background: #456297;
    background-color: #456297 !important;
    border: 8px solid #456297 !important;
    border-left: 24px solid #456297 !important;
    border-right: 24px solid #456297 !important;
}
.main-sec h1 {
    display: none;
}
.body-top12{
      background-image:url('{{ asset('/Assets/login-page-bg.jpg') }}');
          background-repeat: no-repeat;
          background-position: bottom center;
          background-size: cover;
          border-radius: 10px;
          margin: 10px !important;
         width: 750px !important;
}
</style>
</head>
<body>

<table class="wrapper " width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table class="content body-top12" width="100%" cellpadding="0" cellspacing="0" role="presentation" >
{{ $header ?? '' }}

<!-- Email Body -->
<tr>
<td class="body " width="100%" cellpadding="0" cellspacing="0" style="border: hidden !important;     background: transparent">
<table class="inner-body" align="center" width="1300" cellpadding="0" cellspacing="0" role="presentation" style="
              background: transparent !important;
          background-repeat: no-repeat;
          background-position: bottom center;
          background-size: cover;
          border-radius: 10px;
        ">
           <table  width="750" align="center" role="presentation" border="0" cellpadding="0" cellspacing="0" style="padding: 30px;">
             <tbody>
               <tr style=" text-align: center;">
                 <td> 
                   <img src="{{ env('APP_URL') }}Assets/Logo_vettoriale.png" class="logo" alt="My logo 12" style="width: auto !important;">
                 </td>
               </tr>
             </tbody>
          </table>
<!-- Body content -->
<tr style=" text-align: center;background-image:url('Assets/login-page-bg.jpg');
          background-repeat: no-repeat;
          background-position: bottom center;
          background-size: cover;
          border-radius: 10px;">

<td class="content-cell" style="display: flex; justify-content: space-around; text-align: center;">
<div class="main-sec" align="center" style=" text-align: center; width:570px;margin:0 auto;">
{{--{{ $subcopy ?? '' }}
--}}
{{ Illuminate\Mail\Markdown::parse($slot) }}


</div>
</td>

</tr>
</table>
</td>
</tr>

{{--{{ $footer ?? '' }}--}}
</table>
</td>
</tr>
</table>
</body>
</html>
