<?php 
  $servername="localhost";
  $username="root";
  $passwordd="";
  $dbname="hatlly";

  $mysqli = new mysqli($servername, $username, $passwordd, $dbname);
  if($mysqli->connect_error){
      die("connection error" . $conn->connect_error);
  }

  $sql = "SELECT * FROM products";
  $query = $mysqli->query($sql);
  while ($obj = $query -> fetch_object()) {
    $products[$obj->id] = $obj;
  }

  if(isset($_POST['Add'])){

    $id=$_POST['id'];
    $title=$_POST['title'];
    $brand=$_POST['brand'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $description=$_POST['description'];
    $image=$_POST['image'];
    $category=$_POST['category'];
    $type=$_POST['type'];

    $sql = "INSERT INTO products(id, title, brand, price, quantity, description, image, category, type) VALUES
    ('$id','$title','$brand','$price','$quantity','$description','$image','$category','$type')";

    try {
      $mysqli->query($sql);
    } catch (mysqli_sql_exception) {
      echo '<script>alert('.'"MySQL Error: '.$mysqli->error.'")</script>';
    }
  }

  if(isset($_POST['Update'])){

    $id=$_POST['id'];
    $title=$_POST['title'];
    $brand=$_POST['brand'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $description=$_POST['description'];
    $image=$_POST['image'];
    $category=$_POST['category'];
    $type=$_POST['type'];

    $sql = "UPDATE products SET id = '$id', title = '$title', brand = '$brand', price = '$price', quantity = '$quantity', description = '$description'
              , image = '$image', category = '$category', type = '$type' WHERE id = '$id'";

    try {
      $mysqli->query($sql);
    } catch (mysqli_sql_exception) {
      echo '<script>alert('.'"MySQL Error: '.$mysqli->error.'")</script>';
    }
  }

  if(isset($_POST['Remove'])){
    

    $id=$_POST['Remove'];

    $sql = "DELETE FROM products WHERE id='$id'";

    try {
      $mysqli->query($sql);
    } catch (mysqli_sql_exception) {
      echo '<script>alert('.'"MySQL Error: '.$mysqli->error.'")</script>';
    }
  }

  if(isset($_POST['uploadImage'])) {
    print_r($_FILES);
   // name of the uploaded file
   $filename = $_FILES['img']['name'];
   // destination of the file on the server
   $destination = '../images/products/' . $filename;
   // get the file extension
   $extension = pathinfo($filename, PATHINFO_EXTENSION);
   // the physical file on a temporary uploads directory on the server
   $file = $_FILES['img']['tmp_name'];
   $size = $_FILES['img']['size'];

   if (!in_array($extension, ['jpeg', 'jpg', 'png'])) {
       echo "You file extension must be .jpeg, .jpg or .png";
   } elseif ($_FILES['img']['size'] > 10000000) { // file shouldn't be larger than 10Megabyte
       echo "File too large!";
   } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            echo "File uploaded successfully!";
        } else {
            echo "Failed to upload file.";
        }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include '../head.php';  ?>
  <link rel="stylesheet" href="admin.css">
  <title>Hattly | Admin</title>
</head>
<body>
  <div id="header">
    <span>Products</span>
  </div>

  <div id="container">
    <div id="pagmintation">
      <div class="pages">All</div>
      <div class="pages">Edit</div>
    </div>

    <script>
      $(document).ready(function(){
        $('.pages:nth-child(2)').css('background-color', 'rgb(242, 242, 242)');
        $('.pages:nth-child(3)').css('background-color', 'rgb(242, 242, 242)');

        $('.pages').click(function(){
          $('.pages').css('background-color', 'rgb(242, 242, 242)');
          $(this).css('background-color', 'white');
        });
        
        $('.pages:nth-child(1)').click(function(){
          $('table').css('left', '0%');
          $('#edit').css('left', '100%');
        });

        $('.pages:nth-child(2)').click(function(){
          $('table').css('left', '-100%');
          $('#edit').css('left', '0%');
        });
      });
    </script>

    <div id="body">
        <table>
          <tr>
            <th>id</th>
            <th>title</th>
            <th>brand</th>
            <th>price</th>
            <th>quantity</th>
            <th>desc</th>
            <th>image</th>
            <th>category</th>
            <th>type</th>
          </tr>
      
          <?php foreach ($products as $product) { ?>
            <tr class="tabledata">
              <td><?php echo $product->id; ?></td>
              <td><?php echo $product->title; ?></td>
              <td><?php echo $product->brand; ?></td>
              <td><?php echo $product->price  ?></td>
              <td><?php echo $product->quantity  ?></td>
              <td><p><?php echo $product->description  ?></p></td>
              <td><?php echo $product->image  ?></td>
              <td><?php echo $product->category ?></td>
              <td><?php echo $product->type  ?></td>
              <td class="icon"><i class="fa-solid fa-trash"></i></td>
            </tr>
          <?php } ?>
        </table>

        <script>
          $(document).ready(function(){
            $('.tabledata').click(function(){
              $("input[name='id']").val($(this).find('td:nth-child(1)').text());
              $("input[name='title']").val($(this).find('td:nth-child(2)').text());
              $("input[name='brand']").val($(this).find('td:nth-child(3)').text());
              $("input[name='price']").val($(this).find('td:nth-child(4)').text());
              $("input[name='quantity']").val($(this).find('td:nth-child(5)').text());
              $("input[name='description']").val($(this).find('td:nth-child(6)').text());
              $("input[name='image']").val($(this).find('td:nth-child(7)').text());
              $("input[name='category']").val($(this).find('td:nth-child(8)').text());
              $("input[name='type']").val($(this).find('td:nth-child(9)').text());
              $('#edit #image').css('background-image', 'url(../images/products/' + $(this).find('td:nth-child(7)').text() + ')');
              
              $('.pages:nth-child(1)').css('background-color', 'rgb(242, 242, 242)');
              $(".pages:nth-child(2)").css('background-color', 'white');
              $('table').css('left', '-100%');
              $('#edit').css('left', '0%');
            });

            $('.icon').click(function(){
              var id = $(this).parent().find('td:nth-child(1)').text();
              $.ajax({
                url: 'admin.php',
                type: 'POST',
                data: {
                  Remove: id,
                },
                success: function(){
                  window.location.reload();
                }
              });
            });

          });
        </script>

        <div id="edit">
          <form action="" method="post">
            <div>
            <input type="text" name="id" placeholder="ID" required>
            <input type="text" name="title" placeholder="Title" required>
            <input type="text" name="brand" placeholder="Brand" required>
            <input type="text" name="price" placeholder="Price" required>
            <input type="text" name="quantity" placeholder="Quantity" required>
            <input type="text" name="description" placeholder="Description" required>
            <input type="text" name="image" placeholder="Image" required>
            <input type="text" name="category" placeholder="Category" required>
            <input type="text" name="type" placeholder="Type" required>
            <input type="submit" name="Update" value="Update">
            <input type="submit" name="Add" value="Add">
            </div>
          </form> 

          <form method="post" action="" id="image" for="img" enctype="multipart/form-data">
            <label for="img">
              <input type="file" id="img" name="img" required>
              <input type="submit" name="uploadImage" id="uploadImage">
            </label>
          </form>

          <div id="upload">
            <div>Upload Image: <span></span></div>
          </div>
          
        </div>

        <script>
          $(document).ready(function(){

            $("div[id='upload']").hover(
              () => {
                $("#edit #image input[name='uploadImage']").css("opacity", "0.8")},
              () => {
                $("#edit #image input[name='uploadImage']").css("opacity", "0");
              }
            );

            $("#edit #image input[name='uploadImage']").hover(
              () => {
                $("#edit #image input[name='uploadImage']").css("opacity", "0.8");
                $("div[id='upload']").css("opacity", "0.8")},
              () => {
                $("#edit #image input[name='uploadImage']").css("opacity", "0");
                $("div[id='upload']").css("opacity", "0");
              }
            );

            

            $('#upload').click(function(){
              $('#img').click();
            });

            $('#edit #image #img').change(function(){
              $("#upload span").text($(this).val().split('\\').pop());
              if ( $("#upload span").text() != ""){
                $("#upload").css("opacity", 1);
              } else {
                $("#upload").css("opacity", 0);
              }
            });
            
          });
        </script>
    </div>
  </div>
</body>
</html>