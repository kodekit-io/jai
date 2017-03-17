<!DOCTYPE html>

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
        .eticket img.bgticket{
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
            top: 70mm;
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
            top: 128mm;
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
                        <img src="public_html/frontend/img/eticket/eticket.png" class="bgticket" />
                        <div class="title">ETICKET</div>
                        <div class="date-order">ordered on {!! $orderDate !!}</div>
                        <div class="name">
                            {!! $visitorName !!}<br>
                            <span>({!! $visitorEmail !!})</span>
                        </div>
                        <div class="details">
                            <p class="type">{!! strtoupper($ticketName) !!}</p>
                            {{--<p class="price">ADMIT ONE RP 420.000</p>--}}
                            <p class="date">{!! $visitDate !!}</p>
                        </div>
                        <div class="disclaimer">
                            {!! trans('payment.eticket_cant_resold', [], '', $lang) !!}
                        </div>
                        <div class="barcode">
                            @if (isset($galasysBarcode))
                                {{--@php--}}
                                {{--\Log::warning('Galasys barcode ===>' . substr($galasysBarcode, 1))--}}
                                {{--@endphp--}}
                                {{--<img src="{!! substr($galasysBarcode, 1) !!}">--}}
                                <img src="{!! url($galasysBarcode) !!}">
                            @endif
                        </div>
                    </td>
                    <td class="info">
                        <p class="title-info">PROTECT THIS TICKET</p>
                        <p>{!! trans('payment.eticket_toc', [], '', $lang) !!}</p>
                        {{--<table class="ad">--}}
                            {{--<tr>--}}
                                {{--<td><div class="ad-content">ad here 50mmx75mm</div></td>--}}
                                {{--<td><div class="ad-content">ad here 50mmx75mm</div></td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td><div class="ad-content">ad here 50mmx75mm</div></td>--}}
                                {{--<td><div class="ad-content">ad here 50mmx75mm</div></td>--}}
                            {{--</tr>--}}
                        {{--</table>--}}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>