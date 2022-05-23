<?php
if(isset($_POST['name']))
{
    $post_data = json_encode($_POST);

    // Prepare new cURL resource
    $crl = curl_init('https://ar5vimy7rb.execute-api.us-east-1.amazonaws.com/test/neworder');
    curl_setopt($crl, CURLOPT_POST, true);
    curl_setopt($crl, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);

    // Set HTTP Header for POST request 
    curl_setopt($crl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: text/json',
        'x-api-key: Hg4ojiEwH01ndqNOAY4BLa9lYOjYWjAn8K2zIwDe',
    ));
    
    // Submit the POST request
    $result = curl_exec($crl);
    
    // handle curl error
    if ($result === false) {
        // throw new Exception('Curl error: ' . curl_error($crl));
        //print_r('Curl error: ' . curl_error($crl));
        $result_noti = 0;
    } else {
    
        $result_noti = 1;
    }
    // Close cURL session handle
    curl_close($crl);
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Fillup this form to have your lab reports delivered at your doorstep.">
  <meta name="author" content="eCureHub">
  <meta name="keywords" content="ecurehub, lab report derliver, report delivery, lab report delivery in Dhaka, Dhaka, Bangladesh">

  <!-- Title Page-->
  <title>eCureHub Report Delivery</title>

  <!-- Icons font CSS-->
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <!-- Font special for pages-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
    rel="stylesheet">

  <!-- Vendor CSS-->
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="css/main.css" rel="stylesheet" media="all">
</head>
<body>
  <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
    <div class="wrapper wrapper--w960">
      <div class="card card-2">
        <div class="card-heading"></div>
        <div class="card-body">
          <h2 class="title">eCureHub Report Delivery</h2>
          <?php
          if(isset($result_noti) && $result_noti == 1)
          {
            ?> 
            <h3>
                Thank you. your order has been received. You will be contacted soon.
            </h3>
            <br>
            <a class="btn btn--radius btn--green" href="/" >Go Back</a>

            <?php
          }
          else
          {
            ?> 

<form method="post" action="order.php">
            <div class="row row-space">
              <div class="col-2">
                <div class="input-group">
                  <input class="input--style-2" type="text" placeholder="Full Name" name="name" required>
                </div>
              </div>
              <div class="col-2">
                <div class="input-group">
                  <input class="input--style-2" type="tel" placeholder="Phone Number" name="phone" required minlength="11" maxlength="11" pattern="^(?:\+88|88)?(01[3-9]\d{8})$" title="Please enter a valid 11 digit Bangladeshi phone number">
                </div>
              </div>
            </div>
            <div class="input-group">
              <input class="input--style-2" type="text" placeholder="Address" name="address" required>
            </div>
            <div class="row row-space">
              <div class="col-2">
                <div class="input-group">
                  <input class="input--style-2" type="text" placeholder="City" name="city" required>
                </div>
              </div>
              <div class="col-2">
                <div class="input-group">
                  <input class="input--style-2" type="text" placeholder="Post Code" name="postcode" required>
                </div>
              </div>
            </div>
            <div class="row row-space">
              <div class="col-2">
                <div class="rs-select2 js-select-simple select--no-search">
                  <select name="lab" required>
                    <option disabled="disabled" selected="selected">Select your Lab</option>
                    <option value="Popular diagnostic"> Popular diagnostic </option>
                    <option value="Ibn Sina Trust"> Ibn Sina Trust </option>
                    <option value="LabAid"> LabAid </option>
                    <option value="United Hospital"> United Hospital </option>
                    <option value="Square Hospital"> Square Hospital </option>
                    <option value="Medinova"> Medinova </option>
                    <option value="Evercare Hospital"> Evercare Hospital </option>
                    <option value="Padma Diagnostic C"> Padma Diagnostic C </option>
                    <option value="BRB Hospital"> BRB Hospital </option>
                    <option value="BSMMU"> BSMMU </option>
                    <option value="ICDDRB"> ICDDRB </option>
                  </select>
                  <div class="select-dropdown"></div>
                </div>
              </div>
              <div class="col-2">
                <div class="input-group">
                  <input class="input--style-2" type="text" placeholder="Branch of the lab " name="branch" required>
                </div>
              </div>
            </div>
            <div class="row row-space">
              <div class="col-2">
                <div class="input-group">
                  <input class="input--style-2" type="text" placeholder="Lab Test ID" name="lab_id" required>
                </div>
              </div>
              <div class="col-2">
                <div class="input-group">
                  <input class="input--style-2" type="number" placeholder="Due amount, if any" name="due" required value="0">
                </div>
              </div>
            </div>
            <div class="row row-space">
              <div class="col-2">
                <div class="input-group">
                  <input class="input--style-2 js-datepicker" type="text" placeholder="Report Delivery Date"
                    name="delivery_date">
                  <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                </div>
              </div>
              <div class="col-2">
                <div class="rs-select2 js-select-simple select--no-search">
                  <select name="referal">
                    <option disabled="disabled" selected="selected">How did you hear about us</option>
                    <option value="Newspaper"> Newspaper </option>
                    <option value="Internet"> Internet </option>
                    <option value="Facebook"> Facebook </option>
                    <option value="Lab Counter"> Lab Counter </option>
                    <option value="other">Other</option>
                  </select>
                  <div class="select-dropdown"></div>
                </div>
              </div>
              <div class="p-t-30">
                <button class="btn btn--radius btn--green" type="submit" >Place Order</button>
              </div>
  
            </div>
        </div>
        </form>
            <?php
          }
          ?>

      </div>
    </div>
  </div>
  </div>

  <!-- Jquery JS-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <!-- Vendor JS-->
  <script src="vendor/select2/select2.min.js"></script>
  <script src="vendor/datepicker/moment.min.js"></script>
  <script src="vendor/datepicker/daterangepicker.js"></script>

  <!-- Main JS-->
  <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->