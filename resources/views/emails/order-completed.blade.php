<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>TODO supply a title</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style strong="text/css">
        .ticket-wrapper {
            width: 600px !important;
            font-family: Arial;
            font-size: 13px;
        }
        .left-portion {
            width: 60%;
            float: left;
        }
        .right-portion {
            width: 38%;
            float: right;
        }
        .strong {
            font-weight: bold;
        }
        .large {
            font-size: 1.5em;
        }

        .medium {
            font-size: 1.3em;
        }

        .large-code {
            width: 110px;
            float: right;
        }

        .small-code {
            width: 90px;
            float: right;
        }
    </style>
</head>
<body>
<div class="ticket-wrapper">
    <table class="left-portion" border="0">
        <tr><td colspan="2" class="" style="text-align: center">ZSSF AMUSMENT PARK</td></tr>
        <tr><td class="strong">ENTRANCE TICKET</td><td rowspan="3"><img src="{!! asset('frontend/img/code.png') !!}" class="large-code" /></td></tr>
        <tr><td>Ticket No. 2345</td></tr>
        <tr><td>Entrance Date: 28 Aug 2014</td></tr>
        <tr><td colspan="2" class="strong medium">Jumping Frog</td></tr>
        <tr><td class="strong large">ADULT</td><td class="strong large" style="text-align: right">Tsh 2,000.00</td></tr>
    </table>
    <table class="right-portion" border="0">
        <tr><td colspan="2" class="strong" style="text-align: center">ENTRANCE TICKET</td></tr>
        <tr><td>Ticket No. 2345</td><td rowspan="2"><img src="{!! asset('frontend/img/code.png') !!}" class="small-code" /></td></tr>
        <tr><td>Date: 28 Aug 2014</td></tr>
        <tr><td colspan="2" class="strong">Jumping Frog</td></tr>
        <tr><td colspan="2" class="strong">ADULT</td></tr>
        <tr><td colspan="2" class="strong medium" style="text-align: right">Tsh 2,000.00</td></tr>
    </table>
</div>
</body>
</html>