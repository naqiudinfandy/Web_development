<?php
include_once 'database.php';
// include_once 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Drawing Art Supplies</title>
 
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #fffcdb, #fffaad); /* Combine image and gradient */
            overflow: hidden;
        }

        .welcome-container {
            text-align: center;
            margin-top: 50px; /* Adjust the top margin for the welcome message */
        }

        .welcome-message {
            font-size: 36px;
            font-weight: bold;
            color: #4CAF50; /* Green color, you can choose your desired color */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Add a subtle text shadow */
            animation: pulse 2s infinite; /* Animation loop */
        }

        .sub-message {
            font-size: 18px;
            color: #333; /* Choose your desired color */
            margin-top: 10px; /* Adjust the top margin for the sub-message */
        }

        .logo-image {
            width: 25%; /* Adjust the width of the logo as needed */
            margin-top: 20px; /* Adjust the top margin for the logo */
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1.5);
            }
            50% {
                transform: scale(1.05);
            }
        }
    </style>
    

</head>
<body>

  <?php include_once 'nav_bar.php'; ?>

  <div class="welcome-container">
      <div class="welcome-message">
          Welcome to Drawing Art Supplies!
      </div>
      <div class="sub-message">
          Created by Muhammad Naqiudin
      </div>
      <img src="shoplogo.png" alt="Shop Logo" class="logo-image">
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>