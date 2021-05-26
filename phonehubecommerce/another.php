<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="css/font-awesome.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/responsive.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="../../ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<body>


    <!DOCTYPE html>
<!-- H5FormValidation.html -->
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>HTML Form Input Validation Using HTML5</title>
</head>
 
<body>
  <h2>HTML Form Input Validation Using HTML5</h2>
 
  <form id="formTest" method="get" action="processData">
    <table>
    <tr>
      <td><label for="txtName">Name<span class="required">*</span></label></td>
      <td><input type="text" id="txtName" name="name" required pattern="[A-Za-z0-9]+"></td>
    </tr>
    <tr>
      <td><label for="txtAddress">Address</label></td>
      <td><input type="text" id="txtAddress" name="address" required pattern="[A-Za-z0-9]+"></td>
    </tr>
    <tr>
      <td><label for="txtZipcode">Zip Code<span class="required">*</span></label></td>
      <td><input type="text" id="txtZipcode" name="zipcode"
            placeholder="enter a 5-digit code"
            required pattern="^\d{5}$"
            oninvalid="this.setCustomValidity('Enter a 5-digit zipcode')"
            oninput="setCustomValidity('')"></td>
    </tr>
    <tr>
      <td>Country<span class="required">*</span></td>
      <td><select id="selCountry" name="country" required>
            <option value="" selected>Please select...</option>
            <option value="AA">AA</option>
            <option value="BB">BB</option>
            <option value="CC">CC</option>
          </select></td>
    </tr>
    <tr>
      <td>Gender<span class="required">*</span></td>
      <td><label><input type="radio" name="gender" value="m" required>Male</label>
          <label><input type="radio" name="gender" value="f">Female</label></td>
    </tr>
    <tr>
      <td>Preferences<span class="required">*</span></td>
      <td><label><input type="checkbox" name="color" value="r">Red</label>
          <label><input type="checkbox" name="color" value="g" checked>Green</label>
          <label><input type="checkbox" name="color" value="b">Blue</label></td>
    </tr>
    <tr>
      <td><label for="txtPhone">Phone<span class="required">*</span></label></td>
      <td><input type="tel" id="txtPhone" name="phone" required></td>
    </tr>
    <tr>
      <td><label for="txtEmail">Email<span class="required">*</span></label></td>
      <td><input type="email" id="txtEmail" name="email" required></td>
    </tr>
    <tr>
      <td><label for="txtPassword">Password<span class="required">*</span></label></td>
      <td><input type="password" id="txtPassword" name="password"
          required pattern="^\w{6,8}$"
          placeholder="6-8 characters"></td>
    </tr>
    <tr>
      <td><label for="txtPWVerified">Verify Password<span class="required">*</span></label></td>
      <td><input type="password" id="txtPWVerified" name="pwVerified" required></td>
    </tr>
    <tr>
      <td><label for="dateBirthday">Birthday<span class="required">*</span></label></td>
      <td><input type="date" id="dateBirthday" name="birthday" required></td>
    </tr>
    <tr>
      <td><label for="timeAppt">Appointment<span class="required">*</span></label></td>
      <td><input type="time" id="timeAppt" name="appointment" required></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" value="SEND" id="btnSubmit">&nbsp;
          <input type="reset" value="CLEAR" id="btnReset"></td>
    </tr>
    </table>
  </form>
</body>
</html>









    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="js/main.js"></script>

    <!--   para lang makita ko kung ano na piga edit sa css-->
    <style>
        <?php include "style.css"?>

    </style>
</body>

</html>
