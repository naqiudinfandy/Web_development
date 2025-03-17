<?php
include_once 'products_crud.php';
include_once 'session.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Drawing Art Supplies System : Products</title>
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
      
      .dataTables_filter input {
          background-color: #FFFFFF; /* Replace #yourColor with the desired color code */
      }
  </style>



  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">


</head>



<body>

  <?php include_once 'nav_bar.php'; ?>

  <img src="shoplogo.png" alt="Shop Logo" style="position: absolute; top: 100px; left: 40px; max-height: 400px; max-width: 600px;">

  <?php if ($pos === "Admin" || $pos === "Supervisor") { ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
          <div class="page-header">
            <h2>Create New Product</h2>
          </div>

          <form action="products.php" method="post" class="form-horizontal">
            <div class="form-group">
              <label for="productid" class="col-sm-3 control-label">ID</label>
              <div class="col-sm-9">
                <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_id']; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label for="productname" class="col-sm-3 control-label">Name</label>
              <div class="col-sm-9">
                <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label for="productprice" class="col-sm-3 control-label">Price (Ringgit Malaysia)</label>
              <div class="col-sm-9">
                <input name="price" type="number" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" min="0.0" step="0.01" required>
              </div>
            </div>

            <div class="form-group">
              <label for="productbrand" class="col-sm-3 control-label">Brand</label>
              <div class="col-sm-9">
                <select name="brand" class="form-control" id="productbrand" required>
                  <option value="">Please select</option>
                  <option value="No brand" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="No brand") echo "selected"; ?>>No brand</option>
                  <option value="Staedler" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="Staedler") echo "selected"; ?>>Staedler</option>
                  <option value="Faber-Castell" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="Faber-Castell") echo "selected"; ?>>Faber-Castell</option>
                  <option value="M&G" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="M&G") echo "selected"; ?>>M&G</option>
                  <option value="Derwent Academy" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="Derwent Academy") echo "selected"; ?>>Derwent Academy</option>
                  <option value="SeamiArt" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="SeamiArt") echo "selected"; ?>>SeamiArt</option>
                  <option value="Pentel" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="Pentel") echo "selected"; ?>>Pentel</option>
                  <option value="Stabilo" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="Stabilo") echo "selected"; ?>>Stabilo</option>
                  <option value="Sakura" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="Sakura") echo "selected"; ?>>Sakura</option>
                  <option value="Bomeijia" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="Bomeijia") echo "selected"; ?>>Bomeijia</option>
                  <option value="Pilot" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="Pilot") echo "selected"; ?>>Pilot</option>
                  <option value="Veikk" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="Veikk") echo "selected"; ?>>Veikk</option>
                  <option value="Van Gogh Rose" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="Van Gogh Rose") echo "selected"; ?>>Van Gogh Rose</option>
                  <option value="Elvino" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="Elvino") echo "selected"; ?>>Elvino</option>
                  <option value="Mont Marte" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="Mont Marte") echo "selected"; ?>>Mont Marte</option>
                  <option value="GAOMON" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="GAOMON") echo "selected"; ?>>GAOMON</option>
                  <option value="XPPen" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="XPPen") echo "selected"; ?>>XPPen</option>
                  <option value="GOOJODOQ" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="GOOJODOQ") echo "selected"; ?>>GOOJODOQ</option>
                  <option value="Noble" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="Noble") echo "selected"; ?>>Noble</option>
                  <option value="Uni-Ball" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="Uni-Ball") echo "selected"; ?>>Uni-Ball</option>
                  <option value="Buncho" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="Buncho") echo "selected"; ?>>Buncho</option>
                  <option value="Winsor-Newton" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="Winsor-Newton") echo "selected"; ?>>Winsor-Newton</option>
                  <option value="Marie's Oil" <?php if(isset($_GET['edit']) && $editrow['fld_product_brand']=="Marie's Oil") echo "selected"; ?>>Marie's Oil</option>
                </select>
              </div>
            </div> 

            <div class="form-group">
              <label for="productcategory" class="col-sm-3 control-label">Category</label>
              <div class="col-sm-9">
                <select name="category" class="form-control" id="productcategory" required>
                  <option value="">Please select</option>
                  <option value="Pencil" <?php if(isset($_GET['edit']) && $editrow['fld_product_category']=="Pencil") echo "selected"; ?>>Pencil</option>
                  <option value="Sharpener" <?php if(isset($_GET['edit']) && $editrow['fld_product_category']=="Sharpener") echo "selected"; ?>>Sharpener</option>
                  <option value="Brush" <?php if(isset($_GET['edit']) && $editrow['fld_product_category']=="Brush") echo "selected"; ?>>Brush</option>
                  <option value="Bag" <?php if(isset($_GET['edit']) && $editrow['fld_product_category']=="Bag") echo "selected"; ?>>Bag</option>
                  <option value="Charcoal" <?php if(isset($_GET['edit']) && $editrow['fld_product_category']=="Charcoal") echo "selected"; ?>>Charcoal</option>
                  <option value="Watercolor" <?php if(isset($_GET['edit']) && $editrow['fld_product_category']=="Watercolor") echo "selected"; ?>>Watercolor</option>
                  <option value="Pen" <?php if(isset($_GET['edit']) && $editrow['fld_product_category']=="Pen") echo "selected"; ?>>Pen</option>
                  <option value="Eraser" <?php if(isset($_GET['edit']) && $editrow['fld_product_category']=="Eraser") echo "selected"; ?>>Eraser</option>
                  <option value="Book" <?php if(isset($_GET['edit']) && $editrow['fld_product_category']=="Book") echo "selected"; ?>>Book</option>
                  <option value="Paper" <?php if(isset($_GET['edit']) && $editrow['fld_product_category']=="Paper") echo "selected"; ?>>Paper</option>
                  <option value="Easel" <?php if(isset($_GET['edit']) && $editrow['fld_product_category']=="Easel") echo "selected"; ?>>Easel</option>
                  <option value="Canvas Board" <?php if(isset($_GET['edit']) && $editrow['fld_product_category']=="Canvas Board") echo "selected"; ?>>Canvas Board</option>
                  <option value="Digital Art" <?php if(isset($_GET['edit']) && $editrow['fld_product_category']=="Digital Art") echo "selected"; ?>>Digital Art</option>
                  <option value="File" <?php if(isset($_GET['edit']) && $editrow['fld_product_category']=="File") echo "selected"; ?>>File</option>
                  <option value="Crayon" <?php if(isset($_GET['edit']) && $editrow['fld_product_category']=="Crayon") echo "selected"; ?>>Crayon</option>
                  <option value="Marker" <?php if(isset($_GET['edit']) && $editrow['fld_product_category']=="Marker") echo "selected"; ?>>Marker</option>
                  <option value="Clipboard" <?php if(isset($_GET['edit']) && $editrow['fld_product_category']=="Clipboard") echo "selected"; ?>>Clipboard</option>
                  </select>
              </div>
            </div> 

            <div class="form-group">
              <label for="productq" class="col-sm-3 control-label">Quantity</label>
              <div class="col-sm-9">
                <input name="quantity" type="number" class="form-control" id="productq" placeholder="Product Quantity" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_quantity']; ?>"  min="0" required>
              </div>
            </div>

            <div class="form-group">
              <label for="productwarranty" class="col-sm-3 control-label">Warranty(days)</label>
              <div class="col-sm-9">
                <input name="warranty" type="text" class="form-control" id="productwarranty" placeholder="eg: 5 (it means 5days)" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_warranty']; ?>" required>
              </div>
            </div>


              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                  <?php if (isset($_GET['edit'])) { ?>
                    <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_id']; ?>">
                    <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Update</button>
                  <?php } else { ?>
                    <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Create</button>
                  <?php } ?>
                  <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span>Clear</button>
                </div>
              </div>

          </form>
        </div>
      </div>
    </div>
  <?php } ?>



  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Product List</h2>
      </div>
      <table id="product-table" class="table table-striped table-bordered">
        <thead>
          <tr style="font-weight:bold; background-color: #e098fa;">
            <th>Product ID</th>
            <th>Name</th>
            <th>Price(Ringgit Malaysia)</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Warranty(day)</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Read
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("select * from tbl_products_a188417_pt2 ");
            $stmt->execute();
            $result = $stmt->fetchAll();
          } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
          }
          foreach ($result as $readrow) {
          ?>
            <tr style="background-color: white;">
              <td><?php echo $readrow['fld_product_id']; ?></td>
              <td><?php echo $readrow['fld_product_name']; ?></td>
              <td><?php echo $readrow['fld_product_price']; ?></td>
              <td><?php echo $readrow['fld_product_brand']; ?></td>
              <td><?php echo $readrow['fld_product_category']; ?></td>
              <td><?php echo $readrow['fld_product_quantity']; ?></td>
              <td><?php echo $readrow['fld_product_warranty']; ?></td>

              <td>
                <button data-href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-warning btn-xs btn-details" role="button">Details</button>

                <?php if ($pos === "Admin" || $pos === "Supervisor") { ?>
                  <a href="products.php?edit=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-success btn-xs" role="button">Edit</a>

                  <a href="products.php?delete=<?php echo $readrow['fld_product_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>

                <?php } ?>
              </td>
            </tr>
          <?php
          }
          $conn = null;
          ?>
        </tbody>
      </table>
    </div>
  </div>


  <div class="bs-example">

    <div id="myModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Product Details</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <script src="js/bootstrap.min.js"></script>

  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


  <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.5.0/jszip.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>



  <script>
    $(document).ready(function() {

      var table = $('#product-table').DataTable({
        "order": [
          [1, "asc"]
        ],
        "pagingType": "full_numbers",
        "pageLength": 5,
        "lengthMenu": [
          [5, 10, 20, 30, -1],
          [5, 10, 20, 30, "All"]
        ],
        "searching": true,
        "columnDefs": [{
          "searchable": false,
          "targets": 2
        }],
        "dom": 'lBfrtip',
        "buttons": [{
          extend: 'excelHtml5',
          text: 'Excel',
          exportOptions: {
            columns: [0, 1, 2, 3]
          },
          className: 'btn btn-primary'
        }]
      });


  $('.dataTables_filter input').css('background-color', '#FFFFFF');




  $('#product-table tbody').on('click', 'button.btn-details', function() {
    var dataURL = $(this).attr('data-href');
    $('.modal-body').load(dataURL, function() {
      $('#myModal').modal({
        show: true
      });
    });
  });
      




      var exportContainer = $('<div class="export-container"></div>').insertAfter('.dataTables_info');
      table.buttons().container().appendTo(exportContainer);


      $('.export-container .btn-primary').removeClass('btn-secondary').addClass('btn-primary');
    });
  </script>


</body>

</html>