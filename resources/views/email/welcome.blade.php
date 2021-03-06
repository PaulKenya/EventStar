<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns:mc="http://www.w3.org/1999/xhtml">
<head>

    <title>Mstream - Welcome Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!--[if !mso]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--<![endif]-->

    <style type="text/css">

        .ReadMsgBody { width: 100%; background-color: #FFFFFF; }
        .ExternalClass { width: 100%; background-color: #FFFFFF; }
        body { width: 100%; background-color: #FFFFFF; margin: 0; padding: 0; -webkit-font-smoothing: antialiased; font-family: Arial, Times, serif }
        table { border-collapse: collapse !important; mso-table-lspace: 0pt; mso-table-rspace: 0pt; }

        @-ms-viewport{ width: device-width; }
        @media only screen and (max-width: 639px){
            .wrapper{ width:100%;  padding: 0 !important; }
        }
        @media only screen and (max-width: 480px){
            .centerClass{ margin:0 auto !important; }
            .imgClass{ width:100% !important; height:auto; }
            .wrapper{ width:320px; padding: 0 !important; }
            .container{ width:300px;  padding: 0 !important; }
            .mobile{ width:300px; display:block; padding: 0 !important; text-align:center !important;}
            *[class="mobileOff"] { width: 0px !important; display: none !important; }
            *[class*="mobileOn"] { display: block !important; max-height:none !important; }
        }

    </style>

    <!--[if gte mso 15]>
    <style type="text/css">
        table { font-size:1px; line-height:0; mso-margin-top-alt:1px;mso-line-height-rule: exactly; }
        * { mso-line-height-rule: exactly; }
    </style>
    <![endif]-->

</head>
<body marginwidth="0" marginheight="0" leftmargin="0" topmargin="0" style="background-color:#FFFFFF;  font-family:Arial,serif; margin:0; padding:0; min-width: 100%; -webkit-text-size-adjust:none; -ms-text-size-adjust:none;">

<!--[if !mso]><!-- -->
<img style="min-width:640px; display:block; margin:0; padding:0" class="mobileOff" width="640" height="1" src="http://s14.postimg.org/7139vfhzx/spacer.gif">
<!--<![endif]-->

<!-- Start Background -->
<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#FFFFFF">
    <tr>
        <td width="100%" valign="top" align="center">


            <!-- START HEADER  -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#FFFFFF" style="border-bottom:1px solid #f3f3f3;">
                <tr>
                    <td height="30" style="font-size:10px; line-height:10px;"> </td>
                </tr>
                <tr>
                    <td align="center">

                        <!-- Start Container  -->
                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                            <tr>
                                <td width="600" class="mobile" align="center" mc:label="the_logo" mc:edit="the_logo">
                                    <img src="{{asset('uon_logo.png')}}" width="58" height="16" style="margin:0; padding:0; border:none; display:block;" border="0" class="centerClass" alt="" mc:edit="the_image" />
                                    <p>{{$event_name}}</p>
                                </td>
                            </tr>
                        </table>
                        <!-- Start Container  -->

                    </td>
                </tr>
                <tr>
                    <td height="35" style="font-size:10px; line-height:10px;"> </td>
                </tr>
            </table>
            <!-- END HEADER  -->

            <!-- START HERO  -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#FFFFFF">
                <tr>
                    <td height="40" style="font-size:10px; line-height:10px;"> </td>
                </tr>
                <tr>
                    <td align="center">

                        <!-- Start Container  -->
                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                            <tr>
                                <td width="600" class="mobile" align="center" mc:label="the_banner" mc:edit="the_banner">
                                    <img src="https://media.giphy.com/media/brsEO1JayBVja/giphy.gif" width="400" height="250" style="margin:0; padding:0; border:none; display:block; border-radius:8px;" border="0" class="imgClass" alt="" mc:edit="the_image" />

                                </td>
                            </tr>
                        </table>
                        <!-- Start Container  -->

                    </td>
                </tr>
                <tr>
                    <td height="40" style="font-size:10px; line-height:10px;"> </td>
                </tr>
            </table>
            <!-- END HERO  -->


            <!-- START MESSAGE  -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#FFFFFF">
                <tr>
                    <td height="" style="font-size:10px; line-height:10px;"> </td>
                </tr>
                <tr>
                    <td align="center">

                        <!-- Start Container  -->
                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                            <tr>
                                <td width="600" class="mobile" style="font-family:arial; font-size:18px; line-height:24px;" align="center" mc:label="the_title" mc:edit="the_title">
                                    Hello <span style="color:#40a7ff;"><strong>{{ $name }}</strong></span>,

                                </td>
                            </tr>
                            <tr>
                                <td height="20" style="font-size:10px; line-height:10px;"></td>
                            </tr>
                            <tr>
                                <td width="600" class="mobile" align="center">

                                    <table width="500" class="mobile">
                                        <tr>
                                            <td style="font-family:arial; font-size:14px; line-height:24px; color:#aeaeae;" align="center" mc:label="the_copy" mc:edit="the_copy">
                                                A new {{$event_type}} has been Added. It will be held on the {{$event_date}} at {{$event_location}} starting from {{$event_time}}.
                                                The event is hosted by {{$event_host}} with only {{$number_of_tickets_available}} available.
                                                Grab you tickets right now starting from {{$price_per_ticket}} here at Event Star.
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                            <tr>
                                <td height="20" style="font-size:10px; line-height:10px;"></td>
                            </tr>
                            <tr>
                                <td width="600" class="mobile" align="center">

                                    <!-- Start Button -->
                                    <table width="170" cellpadding="0" cellspacing="0" align="center" border="0">
                                        <tr>
                                            <td width="170" height="46" bgcolor="#40a7ff" align="center" valign="middle" style="font-family: Arial, sans-serif; font-size: 16px; color: #ffffff; line-height:18px; -webkit-border-radius: 50px; -moz-border-radius: 50px; border-radius: 50px; font-weight:bold;" mc:label="the_btnText" mc:edit="the_btnText">
                                                <a href="#" target="_blank" alias="" style="font-family: Arial, sans-serif; text-decoration: none; color: #ffffff;">Welcome <span style="font-size:23px;">&rsaquo;</span></a>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Button -->

                                </td>
                            </tr>
                        </table>
                        <!-- Start Container  -->

                    </td>
                </tr>
                <tr>
                    <td height="45" style="font-size:10px; line-height:10px;"> </td>
                </tr>
            </table>
            <!-- END MESSAGE  -->


            <!-- START FOOTER  -->
            <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f6f6f6">
                <tr>
                    <td height="40" style="font-size:10px; line-height:10px;"> </td>
                </tr>
                <tr>
                    <td align="center">

                        <!-- Start Container  -->
                        <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                            <tr>
                                <td width="600" class="mobile" align="center">

                                    <table width="450" class="mobile">
                                        <tr>
                                            <td align="center" style="font-family:arial; font-size:12px; line-height:18px; color:#aeaeae;" mc:label="the_terms" mc:edit="the_terms">
                                                You’re receiving this email because you opted in at our website.
                                                If you do NOT wish to receive these marketing updates you can unsubscribe below.

                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                            <tr>
                                <td height="20" style="font-size:10px; line-height:10px;"></td>
                            </tr>
                            <!--<tr>-->
                            <!--<td width="600" class="mobile" style="font-family:arial; font-size:12px; line-height:18px; color:#aeaeae;" align="center">-->
                            <!--<a href="" target="_blank" alias="" style="font-size:12px; line-height:18px; color:#aeaeae; text-decoration:underline;" mc:label="the_unsubscribe" mc:edit="the_unsubscribe">Unsubcribe</a>-->
                            <!---->
                            <!--<span style="color:#dddddd; font-size:17px;">  |  </span>-->
                            <!---->
                            <!--<a href="" target="_blank" alias="" style="font-size:12px; line-height:18px; color:#aeaeae; text-decoration:underline;" mc:label="the_settings" mc:edit="the_settings">Settings</a>-->
                            <!---->
                            <!--<span style="color:#dddddd; font-size:17px;">  |  </span>-->
                            <!---->
                            <!--<a href="" target="_blank" alias="" style="font-size:12px; line-height:18px; color:#aeaeae; text-decoration:underline;" mc:label="the_forward" mc:edit="the_forward">Forward</a>-->
                            <!---->
                            <!--<span style="color:#dddddd; font-size:17px;">  |  </span>-->
                            <!---->
                            <!--<a href="" target="_blank" alias="" style="font-size:12px; line-height:18px; color:#aeaeae; text-decoration:underline;" mc:label="the_online" mc:edit="the_online">Online</a>-->
                            <!---->
                            <!--</td>-->
                            <!--</tr>-->
                            <tr>
                                <td height="20" style="font-size:10px; line-height:10px;"></td>
                            </tr>
                            <tr>
                                <td width="600" class="mobile" style="font-family:arial; font-size:12px; line-height:18px; color:#aeaeae;" align="center" mc:label="the_copyright" mc:edit="the_copyright">

                                    &copy; 2018 Event Star. - All Rights Reserved

                                </td>
                            </tr>
                        </table>
                        <!-- Start Container  -->

                    </td>
                </tr>
                <tr>
                    <td height="40" style="font-size:10px; line-height:10px;"> </td>
                </tr>
            </table>
            <!-- END FOOTER  -->


        </td>
    </tr>
</table>
<!-- End Background -->

</body>
</html>