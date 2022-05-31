<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href ="logo/tittle_logo.png" type = "image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/cart.css">
    <title>cart</title>
</head>
<body>
<header>
        <a id="logo" href="index.php"><img src="logo/website_logo.png" id="website_logo"></a>
        <form action="#"><input type="search" name="item" placeholder="Search.." id="searchbar">
            <input type="submit" id="searchbar_button">
        </form>
        <a href="cart.php" id="cartlink"><img  src="logo/cart.png" id="cart"></a>
        </header>
    <div id="main_div">
    <div id="show_div">
        <table class="table_comon" id="table_product">
            <tr>
                <th class="col" colspan="4" id="table_head"><h3>Shopping Cart</h3></th>
            </tr>
                <?php require 'php/connection.php';
                $query = "SELECT * FROM shop WHERE cart_count>0";
                $result = mysqli_query($conn,$query);
                $total = 0;
               while($row = mysqli_fetch_array($result)){
                   echo "<tr><td class='col'><img src='images/".$row['image']."' height='85vw' alt=''></td>
                   <td class='col'><h6 id='name'>".$row['name']."</h6></td>
                   <td class='col'><a id='delete' href='cart_manage.php?delete_id=".$row['ID']."'>Remove</a></div></td>
                   <td class='col'><h6>".$row['current_price']."&#8377;</h6></td></tr>
                   ";
                   $total += $row['current_price']; };
                ?>
        </table>
    </div>
    <div id="count_div">
        <table class="table_comon" id="table_count">
            <tr>
                <th id="summary_head" colspan="2" class="col">Shopping Summary</th>
                <th></th>
            </tr>
            <tr>
                <td>Total cost of products</td>
                <th><?php echo $total;?></th>
            </tr>
            <tr>
                <td>GST (18% if aplicable)</td>
                <td><?php $gst = ($total/100)*18; echo $gst?></td>
            </tr>
            <tr>
                <form action="#">
                    <td><input type="text" placeholder="Enter Coupon code"></td>
                    <td><button type="submit" id="coupon_apply" >Apply</button></td>
                </form>
            </tr>
            <tr>
                <td>Final amount of order</td>
                <td><?php echo $total;?></td>
            </tr>
            <tr>
                <td colspan="2"><button id="order_now">Order Now</button></td>
            </tr>            
        </table>
    </div>
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
</script>
</html>