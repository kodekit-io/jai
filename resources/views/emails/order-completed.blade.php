<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="format-detection" content="telephone=no" />
		<title>Order Completed</title>
		<style type="text/css">
			/* RESET STYLES */
			html { background-color:#17aebf; margin:0; padding:0; }
			body, #bodyTable, #bodyCell, #bodyCell{height:100% !important; margin:0; padding:0; width:100% !important;font-family:Helvetica, Arial, "Lucida Grande", sans-serif;}
			table{border-collapse:collapse;}
			table[id=bodyTable] {width:100%!important;margin:auto;max-width:500px!important;color:#7A7A7A;font-weight:normal;}
			img, a img{border:0; outline:none; text-decoration:none;height:auto; line-height:100%;}
			a {text-decoration:none !important;border-bottom: 1px solid;}
			h1, h2, h3, h4, h5, h6{color:#5F5F5F; font-weight:normal; font-family:Helvetica; font-size:20px; line-height:125%; text-align:Left; letter-spacing:normal;margin-top:0;margin-right:0;margin-bottom:10px;margin-left:0;padding-top:0;padding-bottom:0;padding-left:0;padding-right:0;}

			/* CLIENT-SPECIFIC STYLES */
			.ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail/Outlook.com to display emails at full width. */
			.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height:100%;} /* Force Hotmail/Outlook.com to display line heights normally. */
			table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up. */
			#outlook a{padding:0;} /* Force Outlook 2007 and up to provide a "view in browser" message. */
			img{-ms-interpolation-mode: bicubic;display:block;outline:none; text-decoration:none;} /* Force IE to smoothly render resized images. */
			body, table, td, p, a, li, blockquote{-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%; font-weight:normal!important;} /* Prevent Windows- and Webkit-based mobile platforms from changing declared text sizes. */
			.ExternalClass td[class="ecxflexibleContainerBox"] h3 {padding-top: 10px !important;} /* Force hotmail to push 2-grid sub headers down */

			/* /\/\/\/\/\/\/\/\/ TEMPLATE STYLES /\/\/\/\/\/\/\/\/ */

			/* ========== Page Styles ========== */
			h1{display:block;font-size:26px;font-style:normal;font-weight:normal;line-height:100%;}
			h2{display:block;font-size:20px;font-style:normal;font-weight:normal;line-height:120%;}
			h3{display:block;font-size:17px;font-style:normal;font-weight:normal;line-height:110%;}
			h4{display:block;font-size:18px;font-style:italic;font-weight:normal;line-height:100%;}
			.flexibleImage{height:auto;}
			.linkRemoveBorder{border-bottom:0 !important;}
			table[class=flexibleContainerCellDivider] {padding-bottom:0 !important;padding-top:0 !important;}

			body, #bodyTable{background-color:#17aebf;}
			#emailHeader{background-color:#17aebf;}
			#emailBody{background-color:#FFFFFF;}
			#emailFooter{background-color:#17aebf;}
			.nestedContainer{background-color:#F8F8F8; border:1px solid #CCCCCC;}
			.emailButton{background-color:#205478; border-collapse:separate;}
			.buttonContent{color:#FFFFFF; font-family:Helvetica; font-size:18px; font-weight:bold; line-height:100%; padding:15px; text-align:center;}
			.buttonContent a{color:#FFFFFF; display:block; text-decoration:none!important; border:0!important;}
			.emailCalendar{background-color:#FFFFFF; border:1px solid #CCCCCC;}
			.emailCalendarMonth{background-color:#205478; color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; padding-top:10px; padding-bottom:10px; text-align:center;}
			.emailCalendarDay{color:#205478; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; line-height:100%; padding-top:20px; padding-bottom:20px; text-align:center;}
			.imageContentText {margin-top: 10px;line-height:0;}
			.imageContentText a {line-height:0;}
			#invisibleIntroduction {display:none !important;} /* Removing the introduction text from the view */

			/*FRAMEWORK HACKS & OVERRIDES */
			span[class=ios-color-hack] a {color:#275100!important;text-decoration:none!important;} /* Remove all link colors in IOS (below are duplicates based on the color preference) */
			span[class=ios-color-hack2] a {color:#205478!important;text-decoration:none!important;}
			span[class=ios-color-hack3] a {color:#8B8B8B!important;text-decoration:none!important;}

			.a[href^="tel"], a[href^="sms"] {text-decoration:none!important;color:#606060!important;pointer-events:none!important;cursor:default!important;}
			.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {text-decoration:none!important;color:#606060!important;pointer-events:auto!important;cursor:default!important;}


			/* MOBILE STYLES */
			@media only screen and (max-width: 480px){
				/*////// CLIENT-SPECIFIC STYLES //////*/
				body{width:100% !important; min-width:100% !important;} /* Force iOS Mail to render the email at full width. */

				table[id="emailHeader"],
				table[id="emailBody"],
				table[id="emailFooter"],
				table[class="flexibleContainer"],
				td[class="flexibleContainerCell"] {width:100% !important;}
				td[class="flexibleContainerBox"], td[class="flexibleContainerBox"] table {display: block;width: 100%;text-align: left;}
				td[class="imageContent"] img {height:auto !important; width:100% !important; max-width:100% !important; }
				img[class="flexibleImage"]{height:auto !important; width:100% !important;max-width:100% !important;}
				img[class="flexibleImageSmall"]{height:auto !important; width:auto !important;}

				table[class="flexibleContainerBoxNext"]{padding-top: 10px !important;}
				table[class="emailButton"]{width:100% !important;}
				td[class="buttonContent"]{padding:0 !important;}
				td[class="buttonContent"] a{padding:15px !important;}

			}

			/*  CONDITIONS FOR ANDROID DEVICES ONLY
			=====================================================*/

			@media only screen and (-webkit-device-pixel-ratio:.75){
				/* Put CSS for low density (ldpi) Android layouts in here */
			}

			@media only screen and (-webkit-device-pixel-ratio:1){
				/* Put CSS for medium density (mdpi) Android layouts in here */
			}

			@media only screen and (-webkit-device-pixel-ratio:1.5){
				/* Put CSS for high density (hdpi) Android layouts in here */
			}
			/* end Android targeting */

			/* CONDITIONS FOR IOS DEVICES ONLY
			=====================================================*/
			@media only screen and (min-device-width : 320px) and (max-device-width:568px) {

			}
			/* end IOS targeting */
		</style>
		<!--
			Outlook Conditional CSS
		-->
		<!--[if mso 12]>
			<style type="text/css">
				.flexibleContainer{display:block !important; width:100% !important;}
			</style>
		<![endif]-->
		<!--[if mso 14]>
			<style type="text/css">
				.flexibleContainer{display:block !important; width:100% !important;}
			</style>
		<![endif]-->
	</head>
	<body bgcolor="#17aebf" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">

		<!-- CENTER THE EMAIL // -->
		<center style="background-color:#17aebf;">
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;">
				<tr>
					<td align="center" valign="top" id="bodyCell">
                        <table bgcolor="#17aebf" border="0" cellpadding="0" cellspacing="0" height="30" width="500" id="emailHeader">
                            <tr>
                                <td align="center" valign="top">
                                </td>
                            </tr>
                        </table>
						<table bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0" width="500" id="emailBody">
							<tr mc:hideable>
								<td align="center" valign="top">
									<!-- CENTERING TABLE // -->
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td align="center" valign="top">
												<!-- FLEXIBLE CONTAINER // -->
												<table border="0" cellpadding="30" cellspacing="0" width="500" class="flexibleContainer">
													<tr>
														<td valign="top" width="500" class="flexibleContainerCell">

															<!-- CONTENT TABLE // -->
															<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
																<tr>
																	<td align="left" valign="top" class="flexibleContainerBox">
																		<table border="0" cellpadding="0" cellspacing="0" width="210" style="max-width: 100%;">
																			<tr>
																				<td align="left" class="textContent">
																					<img src="{!! asset('frontend/img/email/logo.jpg') !!}" />
																				</td>
																			</tr>
																		</table>
																	</td>
																	<td align="right" valign="middle" class="flexibleContainerBox">
																		<table class="flexibleContainerBoxNext" border="0" cellpadding="0" cellspacing="0" width="210" style="max-width: 100%;">
																			<tr>
																				<td align="left" class="textContent">
																					<h3 style="color:#2559a4;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">BOOKING CONFIRMATION</h3>
																					{{--<div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:14px;margin-bottom:0;color:#5F5F5F;line-height:135%;">17 Agustus 2017</div>--}}
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
                                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <td align="left" valign="top" class="textContent" height="50"></td>
                                                                </tr>
                                                            </table>
                                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <td align="left" valign="top" class="textContent" style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:14px;margin-bottom:0;color:#5F5F5F;line-height:135%;">
                                                                        <h6 style="font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;">Hi {!! $name !!},</h6>
                                                                        <p>Thank you for booking online ticket at Jakarta Aquarium.</p>

                                                                        <table align="left" border="1" bordercolor="#ff9900" cellpadding="10" cellspacing="0" width="100%" style="margin-bottom:20px;">
                                                                            <tr>
                                                                                <td align="left" valign="top">
                                                                                    Your Order ID: <span style="color:#2559a4;font-size:16px;">{!! $orderId !!}</span>
                                                                                </td>
                                                                            </tr>
                                                                        </table>

                                                                        <p>Your booking details.</p>
                                                                        <table align="left" border="1" bordercolor="#17aebf" cellpadding="10" cellspacing="0" width="100%" style="margin-bottom:10px;">
                                                                            <tr>
                                                                                <td align="left" valign="top" width="100" style="max-width:100%;color:#17aebf;">
                                                                                    Date of Visit
                                                                                </td>
                                                                                <td align="left" valign="top" style="max-width: 100%;">
                                                                                    {!! $visitDate !!}
                                                                                </td>
                                                                            </tr>
                                                                        </table>

                                                                        <table align="left" border="1" bordercolor="#17aebf" cellpadding="10" cellspacing="0" width="100%" style="margin-bottom:10px;">
                                                                            <tr>
                                                                                <td align="left" valign="top" colspan="2" style="max-width: 100%;color:#17aebf;">
                                                                                    Admission Package
                                                                                </td>
                                                                            </tr>
                                                                            @if (count($details) > 0)
                                                                                @foreach($details as $detail)
                                                                                    <tr>
                                                                                        <td align="left" valign="top" width="100" style="max-width: 100%;color:#17aebf;">
                                                                                            {!! $detail->product_name !!}
                                                                                        </td>
                                                                                        <td align="left" valign="top" style="max-width: 100%;">
                                                                                            {!! $detail->qty !!} {!! str_plural('Visitor', $detail->qty) !!}
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            @endif
                                                                        </table>
                                                                        <table align="left" border="1" bordercolor="#17aebf" cellpadding="10" cellspacing="0" width="100%" style="margin-bottom:30px;">
                                                                            <tr>
                                                                                <td align="left" valign="top" width="100" style="max-width:100%;color:#17aebf;">
                                                                                    Total
                                                                                </td>
                                                                                <td align="left" valign="top" style="max-width: 100%;">
                                                                                    IDR {!! $total !!}
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat <span style="color:#2559a4;">+6281637816829</span> cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                                        <p>Signature,<br>
                                                                        <b>Jakarta Aquarium</b></p>

                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:30px;">
                                                                            <tr>
                                                                                <td align="left" valign="top"><img src="{!! asset('frontend/img/email/ad.jpg') !!}" /></td>
                                                                                <td align="left" valign="top"><img src="{!! asset('frontend/img/email/ad.jpg') !!}" /></td>
                                                                                <td align="left" valign="top"><img src="{!! asset('frontend/img/email/ad.jpg') !!}" /></td>
                                                                            </tr>
                                                                        </table>

                                                                    </td>
                                                                </tr>
                                                            </table>
														</td>
													</tr>
												</table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->

						</table>
                        <table bgcolor="#17aebf" border="0" cellpadding="0" cellspacing="0" width="500" style="margin-top:20px;">
							<tr>
								<td align="left" valign="top" style="font-size:12px;color:#ffffff;">
                                    Explore our udpate at:<br/>
                                    <a href="http://jakarta-aquarium.com" style="color:#ffffff;">www.jakarta-aquarium.com</a><br/>
                                    <table border="0" cellpadding="0" cellspacing="0" style="margin-top:5px;">
            							<tr>
            								<td align="left" valign="top">
                                                <a href="#"><img src="{!! asset('frontend/img/email/fb.jpg') !!}" /></a>
            								</td>
                                            <td align="left" valign="top">
                                                <a href="#"><img src="{!! asset('frontend/img/email/tw.jpg') !!}" /></a>
            								</td>
                                            <td align="left" valign="top">
                                                <a href="#"><img src="{!! asset('frontend/img/email/ta.jpg') !!}" /></a>
            								</td>
                                            <td align="left" valign="top">
                                                <a href="#"><img src="{!! asset('frontend/img/email/ig.jpg') !!}" /></a>
            								</td>
                                            <td align="left" valign="top">
                                                <a href="#"><img src="{!! asset('frontend/img/email/gp.jpg') !!}" /></a>
            								</td>
                                            <td align="left" valign="top">
                                                <a href="#"><img src="{!! asset('frontend/img/email/li.jpg') !!}" /></a>
            								</td>
            							</tr>
            						</table>
								</td>
							</tr>
						</table>

						<table bgcolor="#17aebf" border="0" cellpadding="0" cellspacing="0" height="30" width="500" id="emailFooter">
							<tr>
								<td align="center" valign="top">
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</center>
	</body>
</html>