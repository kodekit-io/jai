<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>Ticket</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style strong="text/css">
    @font-face {
        font-family: 'Intro';
        src: url('{!! asset('frontend/fonts/hinted-Intro.ttf') !!}')  format('truetype')
    }
    @font-face {
        font-family: 'Intro Regular';
        src: url('{!! asset('frontend/fonts/hinted-Intro-Regular.ttf') !!}')  format('truetype')
    }
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #ffffff;
        font-family: 'Intro Regular';
        color: #585858;
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        font-family: 'Intro Regular';
        color: #585858;
    }
    .intro {
        font-family: 'Intro';
    }
    .into-reg {
        font-family: 'Intro Regular';
    }
    .page {
        padding: 0;
        margin: 0;
        background: white;
    }
    .subpage {
        margin: 20mm;
    }
    table {
        margin: 0;
        padding: 0;
        border: 0;
    }
    .eticket {
        width: 70mm;
        height: 150mm;
        vertical-align: top;
        position: relative;
    }
    .eticket img{
        width: 70mm;
        height: 150mm;
        vertical-align: top;
        position: relative;
        z-index: 0;
    }
    .eticket .title {
        font-family: 'Intro';
        margin: 0;
        line-height: 10pt;
        color: #1f5daa;
        position: absolute;
        top: 34mm;
        left: 5mm;
    }
    .eticket .name {
        position: absolute;
        top: 40mm;
        left: 5mm;
        z-index: 10;
        font-family: 'Intro Regular';
        text-transform: uppercase;
        font-size: 10pt;
    }
    .eticket .name span{
        font-size: 9pt;
    }
    .eticket .date-order {
        position: absolute;
        top: 34.25mm;
        right: 5mm;
        z-index: 10;
        font-size: 8pt;
        font-family: 'Intro Regular';
    }
    .eticket .details {
        position: absolute;
        top: 55mm;
        left: 5mm;
        z-index: 10;
        text-transform: uppercase;
    }
    .eticket .details .type{
        font-family: 'Intro';
        margin: 0;
        line-height: 10pt;
    }
    .eticket .details .price{
        font-family: 'Intro Regular';
        margin: 0;
        font-size: 9pt;
        line-height: 10pt;
    }
    .eticket .details .date{
        font-family: 'Intro';
        margin: 0;
        font-size: 9pt;
        line-height: 10pt;
        color: #1f5daa;
    }
    .disclaimer {
        position: absolute;
        top: 75mm;
        left: 5mm;
        z-index: 10;
        text-transform: uppercase;
        font-family: 'Intro Regular';
        margin: 0;
        font-size: 8pt;
        line-height: 8pt;
    }
    .info {
        padding-left: 20mm;
        font-family: 'Intro Reguler';
        vertical-align: top;
        font-size: 10pt;
    }
    .title-info {
        margin-top: 0;
        font-size: 14pt;
    }
    .barcode {
        width: 70mm;
        text-align: center;
        position: absolute;
        top: 130mm;
        left: 0;
    }
    .nomargin {
        margin: 0;
    }
    table.ad {
        width: 100%;
    }
    table.ad tr td {
        height: 56mm;
        vertical-align: top;
    }
    .ad-content {
        height: 50mm;
        width: 75mm;
        background: #ccc;
    }
    @page {
        margin: 0;
    }
    @media print {
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
    </style>
</head>
<body>
    <div class="book">
        <div class="page">
            <div class="subpage">
                <table>
                    <tr>
                        <td class="eticket">
                            <img src="{!! asset('frontend/img/eticket/eticket.png') !!}" class="large-code" />
                            <div class="title">E-TICKET</div>
                            <div class="date-order">ordered on 31 Oct 2016</div>
                            <div class="name">
                                John Doe<br>
                                <span>(john@doe.com)</span>
                            </div>
                            <div class="details">
                                <p class="type">REGULAR</p>
                                <p class="price">ADMIT ONE RP 420.000</p>
                                <p class="date">Saturday, 31 December 2018</p>
                            </div>
                            <div class="disclaimer">
                                THE RIGHT TO REFUSE ENTRY RESERVED.<br>
                                THIS E-TICKET IS NON-TRANSFERABLE.<br>
                                VISIT WWW.JAKARTA-AQUARIUM.COM
                            </div>
                            <div class="barcode">
                                barcode here
                            </div>
                        </td>
                        <td class="info">
                            <p class="title-info">PROTECT THIS TICKET</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <table class="ad">
                                <tr>
                                    <td><div class="ad-content">ad here 50mmx75mm</div></td>
                                    <td><div class="ad-content">ad here 50mmx75mm</div></td>
                                </tr>
                                <tr>
                                    <td><div class="ad-content">ad here 50mmx75mm</div></td>
                                    <td><div class="ad-content">ad here 50mmx75mm</div></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>