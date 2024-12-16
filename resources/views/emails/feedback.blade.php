<!DOCTYPE html>
<html lang="{{ config('locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('site.feedback_title') }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .main-table {
            margin: 0 auto;
            max-width: 500px;
        }

        table tr:nth-child(odd) {
            background-color: #f0f4f7;
        }

        table td {
            padding: .5rem .25rem;
        }

        h1 {
            font-size: 28px;
        }

        .header {
            padding: 1rem;
            text-align: center;
            background: #eee;
            border: 1px solid #ddd;
            /*border-top-left-radius: .5rem;*/
            /*border-top-right-radius: .5rem;*/
        }

        .header a {
            text-decoration: none;
            text-align: center;
            font-family: Arial, sans-serif;
            font-weight: bold;
            font-size: 20px;
            color: #444;
        }

        .main {
            padding: 1rem;
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #444;
            background: #fff;
            border-left: 1px solid #ddd;
            border-right: 1px solid #ddd;
        }

        .footer {
            padding: 1rem;
            text-align: center;
            background: #eee;
            border: 1px solid #ddd;
            /*border-bottom-left-radius: .5rem;*/
            /*border-bottom-right-radius: .5rem;*/
        }

        .footer a {
            display: block;
            text-decoration: none;
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #0032af;
        }

        .mb-1 {
            margin-bottom: .75rem;
        }

        .text-center {
            text-align: center;
        }

        a.btn,
        .btn {
            display: inline-block;
            padding: 0.7rem 0.75rem .65rem;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            font-family: Arial, sans-serif;
            font-weight: 500;
            font-size: 16px;
            line-height: 100%;
            color: #444;
            background: #eee;
            border: 1px solid #ddd;
            border-radius: .25rem;
            cursor: pointer;
        }

        a.btn:hover,
        .btn:hover {
            text-decoration: none;
        }

        a.btn-general,
        .btn-general {
            color: #fff;
            background: #3761cb;
            border: 1px solid #3761cb;
        }

        a.btn-general:hover,
        .btn-general:hover {
            color: #fff;
            background: #0032af;
            border-color: #0032af;
        }
    </style>
</head>

<body>

<table class="main-table">
    <tr>
        <td class="header">
            <a href="{{ route('index') }}">{{ env('APP_NAME') }}</a>
        </td>
    </tr>
    <tr>
        <td class="main">
            <h1>{{ __('site.feedback_title') }}</h1>
            <br>
            <table>
                <tr>
                    <td>{{ ('site.name') }}</td>
                    <td>{{ $mail_data['name'] }}</td>
                </tr>
                <tr>
                    <td>{{ ('site.email') }}</td>
                    <td>{{ $mail_data['email'] }}</td>
                </tr>
                <tr>
                    <td>{{ ('site.phone') }}</td>
                    <td>{{ $mail_data['phone'] }}</td>
                </tr>
                <tr>
                    <td>{{ ('site.message') }}</td>
                    <td>{{ $mail_data['message'] }}</td>
                </tr>
            </table>
            <br>
            <p><i>З повагою, команда <b>{{ env('APP_NAME') }}</b></i></p>
        </td>
    </tr>
    <tr>
        <td class="footer">
            <a class="mb-1" href="mailto:manager@addsite.com.ua">manager@addsite.com.ua</a>
            <a href="tel:+380961761776">+38(096)176-17-76</a>
        </td>
    </tr>
</table>

</body>
</html>

