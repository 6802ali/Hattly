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

    /* if ($mysqli->query($sql) === TRUE) {
        header("Location: admin.php");
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } */
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
      <div class="pages">Add</div>
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

          });
        </script>

        <div id="edit">
          <form action="" method="post">
            <div>
            <input type="text" name="id" placeholder="ID">
            <input type="text" name="title" placeholder="Title">
            <input type="text" name="brand" placeholder="Brand">
            <input type="text" name="price" placeholder="Price">
            <input type="text" name="quantity" placeholder="Quantity">
            <input type="text" name="description" placeholder="Description">
            <input type="text" name="image" placeholder="Image">
            <input type="text" name="category" placeholder="Category">
            <input type="text" name="type" placeholder="Type">
            <input type="submit" name="Update" value="Update">
            <input type="submit" name="Add" value="Add">
            </div>

            <label id="image" for="img">
              <input type="file" id="img" name="img">
            </label>
          </form> 

          

          <div id="upload">
            <div>Upload Image: <span></span></div>
          </div>
          
        </div>

        <script>
          $(document).ready(function(){

            $("input[name='Add']").click(() => {
              $("input[name='fileToUpload']").click();
            })

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