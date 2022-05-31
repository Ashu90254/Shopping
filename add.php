<?php require 'php/connection.php';
$pname = $_POST["pname"];
$orignal = $_POST["orignal"];
$current = $_POST["current"];
$file = $_FILES['image'];
$name = $file['name'];
$name = trim(addslashes($_FILES['image']['name']));
$name = str_replace(' ', '_', $name);
$name = preg_replace('/\s+/', '_', $name);
$path = "images/" . basename($name);
 
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $path)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";

        $query = "INSERT INTO shop(name,current_price,original_price,image,cart_count) VALUES ('$pname','$current','$orignal','$name','0')";
        $result = mysqli_query($conn,$query);
      };
      header("Location: index.php");
?>