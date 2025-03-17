<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Drawing Art Supplies System : Home</title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Add the CSS styles for the navbar -->
  <style>
    .navbar {
      background-color: #87CEEB; /* Sky Blue background color */

    }

    .navbar-brand, .navbar-nav > li > a {
      color: ; /* White text color for the brand and navigation links */
      font-weight: bold;
    }

    .navbar-toggle .icon-bar {
      background-color: white; /* White color for the toggle button bars */
    }

    .navbar-right > .dropdown > a {
      color: black; /* Black color for the user information dropdown menu */
    }

    .navbar-right > .dropdown > a:hover, .navbar-right > .dropdown > a:focus {
      background-color: transparent; /* Remove background color on hover/focus for a cleaner look */
    }

    .navbar-right > .dropdown > .dropdown-menu {
      background-color: #87CEEB; /* Sky Blue background for the dropdown menu */
      border: none; /* Remove border for a cleaner look */
      box-shadow: none; /* Remove box shadow for a cleaner look */
    }

    .navbar-right > .dropdown > .dropdown-menu > li > a {
      color: white; /* White text color for dropdown menu items */
    }

    .navbar-right > .dropdown > .dropdown-menu > li > a:hover {
      background-color: #45a049; /* Darker green on hover for dropdown menu items */
    }


  </style>

  <!-- Your existing head content -->
</head>

<body>

  <!-- Your existing HTML content -->

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">DRAWING ART SUPPLIES</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="index.php">| Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="#" disabled="disabled">
              <span class="glyphicon" aria-hidden="true">
                <strong><?php echo $fname; ?></strong> (<strong><?php echo $pos; ?></strong>)
              </span>
            </a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Menu <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="products.php"><span class="glyphicon" aria-hidden="true"></span>Products</a></li>
              <li><a href="orders.php"><span class="glyphicon" aria-hidden="true"></span>Orders</a></li>
              <li><a href="customers.php"><span class="glyphicon" aria-hidden="true"></span>Customers</a></li>
              <?php if($pos === "Admin" || $pos === "Supervisor") { ?>
                <li><a href="staffs.php"><span class="glyphicon" aria-hidden="true"></span>Staffs</a></li>
              <?php } ?>
              <li><a href="change_password.php"><span class="glyphicon" aria-hidden="true"></span>Change Password</a></li>
              <li><a href="logout.php"><span class="glyphicon" aria-hidden="true"></span>Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Bootstrap and other script tags go here -->

</body>

</html>
