<?php

include_once 'database.php';
session_start();

if (isset($_SESSION["staffid"])) {
     header("location:index.php");
}

try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     if (isset($_POST["login"])) {

          if (empty($_POST["staffid"]) || empty($_POST["password"])) {

               $message = '<label>All fields are required</label>';

          } else {

               $query = "SELECT * FROM tbl_staffs_a188417_pt2 WHERE fld_staff_id = :staffid AND fld_staff_pass = :password";
               $stmt = $conn->prepare($query);
               $stmt->execute(
                    array(
                         'staffid'     =>     $_POST["staffid"],
                         'password'     =>     $_POST["password"]
                    )
               );
               $count = $stmt->rowCount();
               if ($count > 0) {

                    $_SESSION["staffid"] = $_POST["staffid"];



                    header("location:login_success.php");
               } else {
                    $message = '<label>Sorry. Your ID or password was incorrect. Please try again. 
                    Thank you.</label>';
               }
          }
     }
} catch (PDOException $error) {
     $message = $error->getMessage();
}
?>


<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <?php include_once 'nav_bar_login.php' ?>
     <title>Drawing Art Supplies | Login</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
     <script src="http://kendo.cdn.telerik.com/2016.1.226/js/jquery.min.js"></script>
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="css/login.css">

     <style>
          body {
               background: linear-gradient(to bottom, #fffcdb, #fffaad); /* Gradient from light to darker yellow */
               margin: 0;
               padding: 0;
               height: 100vh;
               font-family: 'Arial', sans-serif;
          }

          .container {
              width: 500px;
              margin: 0 auto;
              background: linear-gradient(to bottom, #fffcdb, #fffaad);
              padding: 20px;
              border-radius: 10px;
              box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
              opacity: 0; /* Initially set opacity to 0 for the fade-in effect */
              animation: fadeIn 1s ease-in-out forwards; /* Apply the fade-in animation */
          }

          @keyframes fadeIn {
              from {
                  opacity: 0;
              }
              to {
                  opacity: 1;
              }
          }
          .custom-btn,
          .custom-blue-btn {
              padding: 10px 20px;
              border: none;
              border-radius: 5px;
              cursor: pointer;
              font-size: 16px;
              transition: background-color 0.3s ease, box-shadow 0.3s ease, color 0.3s ease;
          }

          .custom-btn {
              background-color: #4CAF50;
              color: white;
              box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          }

          .custom-btn:hover {
              background-color: #45a049;
              box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
          }

          .custom-blue-btn {
              background-color: #3498db;
              color: #fff;
              box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          }
     </style>
</head>

<body>
     <br />
     <div class="container">
          <?php
          if (isset($message)) {
               echo '<label class="text-danger">' . $message . '</label>';
          }
          ?>

          <center><img src="shoplogo.png" width="100%" height="100%"></center>

          <form method="post">

               <label>
                    <font face="">Username</font>
               </label>

               <input type="text" name="staffid" class="form-control" />
               <br />

               <label>
                    <font face="">Password</font>
               </label>

               <div class="input-group" style="margin-bottom: 10px;">
                    <input type="password" name="password" id="password" class="form-control" required>
                    <span class="input-group-addon" >
                         <i class="bi bi-eye-slash" id="togglePassword" ></i>
                    </span>
               </div>

               <input type="submit" name="login" class="custom-btn" value="Log in" />
               <br />
               <div style="margin-top: 10px;">
                   <button type="button" class="custom-blue-btn" data-toggle="modal" data-target="#myModal" style="font-weight: bold;">Reference</button>
               </div>

          </form>

          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Sample ID and Password</h4>
                </div>
                <div class="modal-body">
                  <p><b>Admin</b><br>ID : S001<br>Password: abc123</p>
                  <p><b>Supervisor</b><br>ID : S004<br>Password: abc123</p>
                  <p><b>Normal Staff</b><br>ID : S002<br>Password: abc123</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>


     </div>

     <br />

     <script>
           $(document).ready(function () {
                $('#togglePassword').click(function () {
                     var passwordField = $('#password');
                     var passwordFieldType = passwordField.attr('type');
                     if (passwordFieldType == 'password') {
                          passwordField.attr('type', 'text');
                          $('#togglePassword').removeClass('bi-eye-slash').addClass('bi-eye');
                     } else {
                          passwordField.attr('type', 'password');
                          $('#togglePassword').removeClass('bi-eye').addClass('bi-eye-slash');
                     }
                });
           });
      </script>

</body>

</html>