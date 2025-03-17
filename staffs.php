<?php
include_once 'staffs_crud.php';
include_once 'session.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Drawing art Supplies System : Staffs</title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      body {
          font-family: 'Arial', sans-serif;
          background: linear-gradient(to bottom, #fffcdb, #fffaad);
          margin: 0;
          padding: 0;
          height: 100vh;
      }
  </style>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

  <?php include_once 'nav_bar.php'; ?>

  <img src="shoplogo.png" alt="Shop Logo" style="position: absolute; top: 100px; left: 40px; max-height: 400px; max-width: 600px;">
  
  <?php if ($pos === "Admin") { ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
          <div class="page-header">
            <?php if ($pos === "Admin") { ?>
              <h2>Add New Staff</h2>
            <?php } else { ?>
              <h2>Edit Staffs</h2>
            <?php } ?>
          </div>

          <form action="staffs.php" method="post" class="form-horizontal">
            <div class="form-group">
              <label for="staffid" class="col-sm-3 control-label">Staff ID</label>
              <div class="col-sm-9">
                <input name="sid" type="text" class="form-control" id="staffid" placeholder="Staff ID" value="<?php if (isset($_GET['edit'])) echo $editrow['fld_staff_id']; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label for="firstname" class="col-sm-3 control-label">First Name</label>
              <div class="col-sm-9">
                <input name="fname" type="text" class="form-control" id="firstname" placeholder="First Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_fname']; ?>" required />
              </div>
            </div>

            <div class="form-group">
              <label for="lastname" class="col-sm-3 control-label">Last Name</label>
              <div class="col-sm-9">
                <input name="lname" type="text" class="form-control" id="lastname" placeholder="Last Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_lname']; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label for="age" class="col-sm-3 control-label">Age</label>
              <div class="col-sm-9">
                <input name="age" type="text" class="form-control" id="age" placeholder="Age" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_age']; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label for="gender" class="col-sm-3 control-label">Gender</label>
              <div class="col-sm-9">
                <div class="radio">
                  <label>
                    <input name="gender" type="radio" id="gender" value="Male" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_gender']=="Male") echo "checked"; ?> required> Male
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input name="gender" type="radio" id="gender" value="Female" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_gender']=="Female") echo "checked"; ?> required> Female
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="jobtype" class="col-sm-3 control-label">Job type</label>
              <div class="col-sm-9">
                <div class="radio">
                  <label>
                    <input name="jobtype" type="radio" id="jobtype" value="Full-time" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_jobtype']=="Full-time") echo "checked"; ?> required> Full-time
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input name="jobtype" type="radio" id="jobtype" value="Part-time" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_jobtype']=="Part-time") echo "checked"; ?> required> Part-time
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="position" class="col-sm-3 control-label">Position</label>
              <div class="col-sm-9">
                <select name="pos" class="form-control" id="position" required>
                  <option value="">Please select</option>
                  <option value="Admin" <?php if (isset($_GET['edit'])) if ($editrow['fld_staff_position'] == "Admin") echo "selected"; ?>>Admin</option>
                  <option value="Normal Staff" <?php if (isset($_GET['edit'])) if ($editrow['fld_staff_position'] == "Normal Staff") echo "selected"; ?>>Normal Staff</option>
                  <option value="Supervisor" <?php if (isset($_GET['edit'])) if ($editrow['fld_staff_position'] == "Supervisor") echo "selected"; ?>>Supervisor</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="col-sm-3 control-label">Password</label>
              <div class="col-sm-9">
                <input name="password" type="password" class="form-control" id="password" placeholder="Password" value="<?php if (isset($_GET['edit'])) echo $editrow['fld_staff_pass']; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label for="repassword" class="col-sm-3 control-label">Retype Password</label>
              <div class="col-sm-9">
                <input name="repassword" type="password" class="form-control" id="repassword" placeholder="Retype Password" value="<?php if (isset($_GET['edit'])) echo $editrow['fld_staff_pass']; ?>" required>
              </div>
            </div>



            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
                <?php if (isset($_GET['edit'])) { ?>
                  <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_id']; ?>">
                  <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
                <?php } else { ?>
                  <?php if ($pos === "Admin") { ?>
                    <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
                  <?php } ?>
                <?php } ?>
                <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    <?php } ?>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function() {
        $('form').submit(function() {
          var password = $('#password').val();
          var repassword = $('#repassword').val();

          if (password !== repassword) {
            alert("Passwords do not match!");
            return false;
          }
        });
      });
    </script>


    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <div class="page-header">
          <h2>Staff List</h2>
        </div>
        <table class="table table-striped table-bordered">
          <tr style="font-weight:bold; background-color: #e098fa;">
            <th>Staff ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Job Type</th>
            <th>Position</th>
            <?php if ($pos === "Admin") { ?>
              <?php if ($pos === "Admin") { ?>
                <th>Password</th>
              <?php } ?>
              <th></th>
            <?php } ?>
          </tr>
          <?php


          // Read
          $per_page = 5;
          if (isset($_GET["page"]))
            $page = $_GET["page"];
          else
            $page = 1;
          $start_from = ($page - 1) * $per_page;
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("select * from tbl_staffs_a188417_pt2 LIMIT $start_from, $per_page");
            $stmt->execute();
            $result = $stmt->fetchAll();
          } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
          }
          foreach ($result as $readrow) {
          ?>
            <tr style="background-color: white;">
              <td><?php echo $readrow['fld_staff_id']; ?></td>
              <td><?php echo $readrow['fld_staff_fname']; ?></td>
              <td><?php echo $readrow['fld_staff_lname']; ?></td>
              <td><?php echo $readrow['fld_staff_age']; ?></td>
              <td><?php echo $readrow['fld_staff_gender']; ?></td>
              <td><?php echo $readrow['fld_staff_jobtype']; ?></td>
              <td><?php echo $readrow['fld_staff_position']; ?></td>
              <?php if ($pos === 'Admin') { ?>
                <td><?php echo $readrow['fld_staff_pass']; ?></td>
              <?php } ?>
              <?php if ($pos === "Admin" || $pos === "Supervisor") { ?>
                <td>
                  <a href="staffs.php?edit=<?php echo $readrow['fld_staff_id']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
                  <?php if ($pos === "Admin") { ?>
                    <a href="staffs.php?delete=<?php echo $readrow['fld_staff_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
                  <?php } ?>
                </td><?php } ?>
            </tr>
          <?php } ?>

        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <nav>
          <ul class="pagination">
            <?php
            try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a188417_pt2");
              $stmt->execute();
              $result = $stmt->fetchAll();
              $total_records = count($result);
            } catch (PDOException $e) {
              echo "Error: " . $e->getMessage();
            }
            $total_pages = ceil($total_records / $per_page);
            ?>
            <?php if ($page == 1) { ?>
              <li class="disabled"><span aria-hidden="true">«</span></li>
            <?php } else { ?>
              <li><a href="staffs.php?page=<?php echo $page - 1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
            <?php
            }
            for ($i = 1; $i <= $total_pages; $i++)
              if ($i == $page)
                echo "<li class=\"active\"><a href=\"staffs.php?page=$i\">$i</a></li>";
              else
                echo "<li><a href=\"staffs.php?page=$i\">$i</a></li>";
            ?>
            <?php if ($page == $total_pages) { ?>
              <li class="disabled"><span aria-hidden="true">»</span></li>
            <?php } else { ?>
              <li><a href="staffs.php?page=<?php echo $page + 1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
            <?php } ?>
          </ul>
        </nav>
      </div>

    </div>



</body>

</html>