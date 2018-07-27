<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 800px) {
            .button {
                width: 100% !important;
            }
            .responsive-full-width {
                width: 100% !important;
            }
        }
    </style>
</head>

<?php
//$logo = asset(setting('logo'));
$facebook_logo = asset(setting('facebook_logo'));
$twitter_logo = asset(setting('twitter_logo'));
$google_plus_logo = asset(setting('google_plus_logo'));
?>

<body style="{{ config('emailstyle.body') }}" itemscope itemtype="http://schema.org/EmailMessage">
<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td style="{{ config('emailstyle.email-wrapper') }}" align="center">
            <table class="responsive-full-width" style="{{ config('emailstyle.email-content') }}" cellpadding="0" cellspacing="0">
                <!-- Logo -->
                <tr>
                    <td style="{{ config('emailstyle.email-masthead') }}">
                        <a style="{{ config('emailstyle.font-family') }} {{ config('emailstyle.email-masthead_name') }}" href="{{ url('/') }}" target="_blank">
                            <img src="" width="90" height="90" alt='{{ config('website.title') }}'/>
                            <br/>
                            <span style="{{ config('emailstyle.anchor') }}">{{ config('website.title') }}</span>
                        </a>
                    </td>
                </tr>

                <!-- email Body -->
                <tr>
                    <td style="{{ config('emailstyle.email-body') }}" width="100%">
                        <table style="{{ config('emailstyle.email-body_inner') }}" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="{{ config('emailstyle.font-family') }} {{ config('emailstyle.email-body_cell') }}">
                                    <!-- Heading -->
                                    <h1 style="{{ config('emailstyle.header-1') }}">
                                        @yield('heading')
                                    </h1>

                                    @yield('content')

                                    <br>
                                    <p style="{{ config('emailstyle.paragraph') }}">
                                        <!-- Salutation -->Regards,<br>
                                        {{ config('website.title') }}<br>
                                        {!! setting('address') !!}
                                        {{ setting('phone') }}
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td>
                        <table style="{{ config('emailstyle.email-footer') }}" align="center" width="570" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="{{ config('emailstyle.font-family') }} {{ config('emailstyle.email-footer_cell') }}">
                                    <p style="{{ config('emailstyle.paragraph-sub') }}">
                                        &copy; {{ date('Y') }}
                                        <a style="{{ config('emailstyle.anchor') }}" href="{{ url('/') }}" target="_blank">{{ config('website.title') }}</a>
                                        . All rights reserved.
                                    </p>
                                    <p style="{{ config('emailstyle.paragraph-sub') }}">
                                        <a href="{{ setting( 'facebook' ) }}" style="{{ config('emailstyle.social-anchor') }}">
                                            <img src="{{ $message->embed($facebook_logo) }}" width="30" height="30" alt="facebook" style="{{ config('emailstyle.social-img') }}">
                                        </a>
                                        <a href="{{ setting( 'twitter' ) }}" style="{{ config('emailstyle.social-anchor') }}">
                                            <img src="{{ $message->embed($twitter_logo) }}" width="30" height="30" alt="twitter" style="{{ config('emailstyle.social-img') }}">
                                        </a>
                                        <a href="{{ setting( 'google_plus' ) }}" style="{{ config('emailstyle.social-anchor') }}">
                                            <img src="{{ $message->embed($google_plus_logo) }}" width="30" height="30" alt="google_plus" style="{{ config('emailstyle.social-img') }}">
                                        </a>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
