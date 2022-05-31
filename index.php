<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    <link rel = "icon" href ="logo/tittle_logo.png" type = "image/x-icon">
    <title>SHOP || Best Prices</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/homepage.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
    <header>
        <a id="logo" href="index.php"><img src="logo/website_logo.png" id="website_logo"></a>
        <form action="#"><input type="search" name="item" placeholder="Search.." id="searchbar">
            <input type="submit" id="searchbar_button">
        </form>
        <a href="cart.php" id="cartlink"><img  src="logo/cart.png" id="cart"></a>
    </header>
    <div id="offers_div">
        <div class="mySlides"><img class="offer_image" src="images/offer1.jpg" alt="Hello1"></div>
        <div class="mySlides"><img class="offer_image" src="images/offer2.jpg" alt="Hello2"></div>
        <div class="mySlides"><img class="offer_image" src="images/offer3.jpg" alt="Hello3"></div>
    </div>
    <div id='items'>
    <?php require 'php/connection.php';
        $query = "SELECT * FROM shop";
         $result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($result)){
            echo "
            <div class='products'>
            <img class='images' src='images/".$row['image']."'>
            <h5 id='name'>".$row['name']."</h5>
            <h5 class='price'><s>".$row['original_price']."</s>&nbsp;".$row['current_price']."&#8377;</h5>";
            if($row['cart_count']>0){
                echo "<a class='cart_button' href='cart.php'>View cart</a>";
            }
            else{
                echo "<a class='cart_button' href='cart_manage.php?cart_id=".$row['ID']."'>Add +</a>";
            }echo "</div>";
            };
    ?>
    </div>
    <p id="add_text">If you want to add more product then click <a class="add_button" onclick="document.getElementById('show_main').style.display='block'">here</a></p>
    <div id="show_main">
    <form class="modal-content animate" action="add.php" method="post" enctype="multipart/form-data">
    <div class="container">
      <label for="pname"><b>Productname</b></label>
      <input type="text" placeholder="Enter Product name" name="pname" required>

      <label for="orignal"><b>Orignal Price</b></label>
      <input type="number" placeholder="Enter orignal price" name="orignal" required>

      <label for="current"><b>Current Price</b></label>
      <input type="number" placeholder="Enter current price" name="current" required>

      <label for="image"><b>Select Image</b></label>
      <input type="file" name="image" id="image" onchange="return fileValidation()" required>
        
      <button class="form_button" type="submit">Add</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('show_main').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
    </div>

    
    
</body>
<script>
    
    <?php 
    $query = "SELECT COUNT(*) as total FROM shop where cart_count>0";
    $result = mysqli_query($conn, $query); 
    $count = mysqli_fetch_array($result);
    $total=  $count['total'];
?>
let total = <?php echo $total ?>;
if (total >0 ){
    document.getElementById("cartlink").setAttribute("value", total); 
} 
  function fileValidation() {
            var fileInput =
                document.getElementById('image');
             
            var filePath = fileInput.value;
         
            // Allowing file type
            var allowedExtensions =
                    /(\.png)$/i;
             
            if (!allowedExtensions.exec(filePath)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select only png file!',
                })
                fileInput.value = '';
                return false;
            }}
</script>
<script src="jscript/homepage.js" text/javascript></script>
<script>
    var modal = document.getElementById('show_main');
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>
</html>