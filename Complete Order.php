<?php
session_start();
    require('include/mySQL Connect.php');
    require ('include/Queries.php');
    $result = getData($dbc);
if(isset($_SESSION['cart'])){
      $product_id=array_column($_SESSION['cart'],'product_id');
          //---------------------------------------- Past Purchases ----------------------------------->
         if (isset($_POST['Buy'])){
             
             if(isset($_SESSION['part-purchase'])){
      $_SESSION['part-purchase'] = array_merge( $_SESSION['part-purchase'],array_column($_SESSION['cart'],'product_id'));
      $_SESSION['part-purchase'] =array_unique( $_SESSION['part-purchase']);
                 
        
             }else{
                   $_SESSION['part-purchase'] =array_column($_SESSION['cart'],'product_id');
             }
                     setcookie('purchased',json_encode($_SESSION['part-purchase']));
                   while($row = mysqli_fetch_assoc($result))
                   {

                     foreach($product_id as $k => $id)
                     {
                          
                         if($row['p_id'] == $id)
                         {
                           $stock=$row['stock']-$_SESSION['cart'][$k]['quantity'];
                           
                           $update=updateStock($dbc,$id,$stock);
                             break;
                           
                         }   
                 
                     }
                    
                 }
               unset($_SESSION['cart']);
            }
        }
   
       

  
?>
<!DOCTYPE html>
<html lang="en">
<!----------------------------- HEAD --------------------------------------->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title of the weppage -->
    <title>Amethyst | Checkout </title>
    <!-- jewelry Store-->
    <!----------------------------- STYLES -------------------------------------->
    <link rel="stylesheet" href="css/Cart - Style.css">
    <link rel="stylesheet" href="css/Checkout - Style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css?v=<?php echo time(); ?>">
</head>
<!-------------------------------- BODY -------------------------------------------------------->

<body>
    <!----------------------------------  HEADER ---------------------------------------------------------->

    <?php
       $cart="Checkout.php";
        include ('include/Customer Header.php');
    ?>
    
    <!-------------------------Checkout progress------------------------------->
     <div style="max-width: 1080px;margin: auto;padding-left: 25px; padding-right: 25px;padding-top: 150px;">
    <div class="main-body">
        <!-------------------------Checkout progress------------------------------->
        <div class="checkout-panel" style="height: 500px">
            <div class="panel-body">
                <h2 class="title">Complete Order</h2>

                <div class="progress-bar">
                    <div class="step active"></div>
                    <div class="step active"></div>
                    <div class="step "></div>

                </div>


                <h2>Your order placed successfully <i class="fa fa-check"></i></h2> <br>

               <br> <nav style="text-align:center"><a href="Customer%20Home.php"><button class="butn next-btn">Go to Homepage</button></a></nav>
            </div>
        </div>

    </div>
    </div>
    <!------------------------------------Footer--------------------------------------------------------->
    <?php
        include ('include/footer.html');
    ?>
   
</body>

</html>