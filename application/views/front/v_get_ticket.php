<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
  <title><?php echo str_pad($booking_detail->booking_code, 6, '0', STR_PAD_LEFT); ?></title>
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700' rel='stylesheet' type='text/css'>
  <style>
    body {
      margin: 0;
      padding: 0;
      background:#989898";
      font-family: 'Source Sans Pro', sans-serif;
    }
    #booking_submit {
      padding: 13px 38px;
      top: 0;
      margin-left: 41%;
      font-weight: bold;
      color: #FFFFFF;
      cursor: pointer;
      border: 0;
     background: #bfff00;
      background: -moz-linear-gradient(top, #bfff00 0%, #336900 100%);
      background: -webkit-gradient(left top, left bottom, color-stop(0%, #bfff00), color-stop(100%, #336900));
      background: -webkit-linear-gradient(top, #bfff00 0%, #336900 100%);
      background: -o-linear-gradient(top, #bfff00 0%, #336900 100%);
      background: -ms-linear-gradient(top, #bfff00 0%, #336900 100%);
      background: linear-gradient(to bottom, #bfff00 0%, #336900 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#bfff00', endColorstr='#336900', GradientType=0 );
    }
    #booking_submit:hover {
      background: #77B200;
    }
    .container {
      max-width:998px; 
      margin:30px auto; 
      background:#FFF; 
      border: solid 1px #CCC;
      overflow:auto;
      font-family: 'Source Sans Pro', sans-serif;
    }
    .button_g{
      text-align: center;
    }
    button {
      cursor:pointer;
    }
    @media print and (min-width: 480px) {
      body {
        background: #FFF;
        font-family: 'Source Sans Pro', sans-serif;
      }
      #booking_submit  {
        display: none;
      }
      #print {
        display:none;
      }
      .container {
        margin: 0;
        border: solid 1px #CCC;
      }
    }
  </style>
<!--[if gte IE 9]
<style type="text/css">
.gradient {
filter: none;
}
</style>
<![endif]-->
</head>

<body>
<?php if(isset($_GET['smartluy'])){ include_once ("include/ipg/response.php");} ?>
  <div class="container">
    <div style="background:#245B83">
        <table width="100%" cellpadding="0">
          <tr>
            <td width="33.33%"><strong style="color:#FFFFFF; font-size:1.5em; padding-left:15px;"> Online Bus Ticket</strong></td>
            <td align="center" width="33.33%"> <a href="http://www.i1booking.com/" target="_blank" style="color:#FFFFFF; font-size:1.5em;">
            <img src="http://i1booking.com/images/asset/logo2.png" alt="logo" style="padding:5px;" /></a></td>
            <td align="right" valign="middle" width="33.33%">
              <img src="http://www.i1booking.com/daily-booking/images/operator-logo/<?php echo $booking_detail->logo ?>" alt="<?php echo $booking_detail->company_name  ?> Logo" style="display:block; height: 45px; background: #FFF; border-radius: 5px; margin-right: 15px" />
            </td>
          </tr>
        </table>
    </div>
    <div style="padding:20px;">
      <table width="100%" border="0" cellpadding="5" cellspacing="0" style="border-collapse: collapse; white-space:nowrap">
        <tbody>
          <tr style="border-color:#FFFFFF">
            <td colspan="2">
              <table width="91%" border="0" cellspacing="0">
                <tbody>
                  <tr>
                    <td colspan="4"><strong>Passenger Information:</strong></td>
                  </tr>
                  <tr>
                    <td width="98%"><?php echo $booking_detail->title ?> <?php echo $booking_detail->passenger_name ?></td>
                  </tr>
                  <tr>
                    <td>Email: <?php echo $booking_detail->email ?></td>
                  </tr>
                  <tr>
                    <td>Phone: <?php echo $booking_detail->phone ?></td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td colspan="2" align="right">
            <table width="84%" border="0">
              <tbody>
                <tr>
                  <td align="right">Booking Date</td>
                  <td>:</td>
                  <td><?php echo $booking_detail->booking_date ?></td>
                </tr>
                <tr>
                  <td align="right">Generate Date</td>
                  <td>:</td>
                  <td><?php echo date("Y-m-d") ?></td>
                </tr>
                <tr>
                  <td align="right">Invoice</td>
                  <td>:</td>
                  <td>#<?php echo str_pad($booking_detail->booking_code, 6, '0', STR_PAD_LEFT); ?></td>
                </tr>
              </tbody>
            </table>
            </td>
          </tr>
          <tr style="border:none">
            <td colspan="4" align="center" valign="middle" bgcolor="#1E82B9"><span style="color:#FFF"><strong>Booking Information</strong></span></td>
          </tr>
          <tr style="background-color:#EFEFEF">
            <td width="25%" align="right"><strong>Direction :</strong></td>
            <td width="25%"><?php echo $booking_detail->origin ?> &#8594; <?php echo $booking_detail->destination ?></td>
            <td width="25%" align="right"><strong>Total Seats :</strong></td>
            <td width="25%" align="right"> <?php echo count(explode(',',$booking_detail->seat_number)) ?></td>
          </tr>
          <tr style="background-color:#F5F5F5">
            <td align="right"><strong>Departure :</strong></td>
            <td><?php echo $booking_detail->departure_date ?> &nbsp; <?php echo $booking_detail->departure_time ?></td>
            <td align="right"><strong>Unit Price :</strong></td>
            <td align="right">$ <?php echo $booking_detail->price/count(explode(',',$booking_detail->seat_number)) ?></td>
          </tr>
          <tr style="background-color:#EFEFEF">
            <td align="right"><strong>Bus Type :</strong></td>
            <td><?php echo $booking_detail->vehicle_type ?></td>
            <td align="right"><strong>Sub Total :</strong></td>
            <td align="right">$ <?php echo number_format($booking_detail->price,2) ?></td>
          </tr>
          <tr style="background-color:#F5F5F5">
            <td align="right"><strong>Seats Number :</strong></td>
            <td><?php echo $booking_detail->seat_number; ?></td>
            <td align="right"><strong>Discount :</strong></td>
            <td align="right">$ 0.00</td>
          </tr>
          <tr style="background-color:#EFEFEF">
            <td align="right"><strong>Operator :</strong></td>
            <td><?php echo $booking_detail->company_name  ?></td>
            <td align="right"><strong style="color:red">Grand Total :</strong></td>
            <td align="right" bgcolor="#FF5F01"><strong style="color:#FFF">$ <?php echo number_format($booking_detail->price,2) ?></strong></td>
          </tr>
          
          <tr>
            <td colspan="2" align="right" style="background-color:#b0e3ff">
              Payment Status:
            </td>
            <td colspan="2" align="left" style="background-color:#d4f0ff">
               <?php if ($booking_detail->status !="Paid") { ?>
              <strong style="color: red">
                <em><?php echo $booking_detail->status  ?></em>
              </strong>
              <?php } else {?>
              <strong style="color: blue">
                <em><?php echo $booking_detail->status  ?></em>
              </strong>
              <?php } ?> 
            </td>
          </tr>

          <tr>
             <td align="left" colspan="3"></td> 
             <td align="center" style="font-weight:bold; color:#1E82B9;"> Have a good trip </td>
          </tr>
        </tbody>
      </table>
      <p class="button_g">
        <!--  <button id="print" onclick="javascript:window.print()"> <img src="http://icons.iconarchive.com/icons/custom-icon-design/mini-2/16/Print-icon.png" alt="button"> Click print ticket</button>
      </p> 
	<form action="http://www.i1booking.com" method="post">
		<input type="submit" value="Finish Booking" id="booking_submit">
      </form>-->

    </div>
    <div style="background:#EBEBEB; padding:20px">
      <p style="font-size:11px">
   <strong> Pickup:</strong><br/> <?php echo $booking_detail->pickup ?> <br/><br/>
      <strong style="color:red">Note:***</strong>Please printing out this ticket or keep your e-ticket on your device.<br>
  <span>1- Passenger should be at bus terminal 30 minutes before departure.</span><br />
  <span>2- Our company is not responsible for late comers or passengers in possession of expired tickets/travel documents. If documents cannot be show the passenger must proof of payment.</span><br />
  <span>3- Ticket are not refundable under any circumstances.</span><br />
  <span>4- Children under 6 years of age may travel with parent(s) or legal guardian(s) free of charge.</span><br />
  <span>5- Passengers are advised to purchase ticket at least one day in advance.</span><br />
  <span>6- Maximum luggage weight: 20 Kgs additional weight will be charged per kilogram.</span><br />
  <span>7- Pets, weapons, drugs, smuggled products and explosive/dangerous materials are not allowed to be brought onto the bus.</span><br />
  <span>8- The company is not responsible for any loss of personal (valuable) item such as jewelry, gold, diamonds, etc</span>
  <p>
    For more information feedback (positive/negative) please contact our head office:
  </p>
    </p>
         <table width="100%" border="0" style="font-size:11px;">
          <tbody>
            <tr>
              <td><strong>Address:</strong> Vihear Chin, Svay Dang Kom Commune, Siem Reap City, Cambodia</td>
              <td> <strong>Website:</strong>www.i1booking.com</td>
            </tr>
            <tr>
              <td><strong>Tel:</strong> +855 70 999 666 / +855 70 87 77 27</td>
              <td><strong>Email:</strong> info@i1booking.com</td>
            </tr>
          </tbody>
        </table>
    </div>

  </div>
</body>
</html>