<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="utf-8">

    <title>Solvre - Issue Tracker</title>
    <style type="text/css" media=screen>
        body {
            width: 710px;
            font: 12px arial, sans-serif;
        }

        table {
            font: 12px arial, sans-serif;
            width: 580px;
            margin-left: 10px;
        }

        table th {
            padding: 3px 3px 15px;
            color: white;
            font-style: italic;
            background-color: #555555;
        }

        table td {
            padding: 5px 5px 10px;
            background-color: #f2f2f2;
        }

        #table-pink th {
            background-color: #c5007b;
        }
        #footer.im, #footer .im {
            color: #fff;
        }
        #content.im, #content .im {
            color: #000;
        }
    </style>
</head>
<body>
<div id="header" style="width: 710px;">
    <img src="http://maveius.pl/img/solvre/solvre-mail-header.png" />
</div>
<div id="content">
    {!! $content  !!}
</div>
<div style="width: 710px;">
    <div style="text-align: center;">
        <p>
            {{ Lang::get('email.best.regards') }}<br/>
            {{ Lang::get('email.team') }} Solvre<br/>
            <a target="_blank" href="{{ solvreUrl() }}"
               style="color: #01417d;text-decoration: none; font-weight: bold;">{{ solvreUrl() }}</a>
        </p>
    </div>

    <div style=" text-align :center;">
        <p style="color: #000;">
            <br/>
            {{ Lang::get('email.problems.report.at') }} <a
                    target="_blank" href="http://solvre.maveius.pl"
                    style="color: #01417d;
                    text-decoration: none;
                    font-weight: bold;">http://solvre.maveius.pl</a>
            <br/>
        </p>
    </div>


    <div id="footer" style="background-color: #a20911;">
        <p style="text-align: center; padding: 20px; color:#ffffff;">
            {!! Lang::get('email.sent.automatic')  !!}
        </p>
    </div>
</div>
</body>
</html>