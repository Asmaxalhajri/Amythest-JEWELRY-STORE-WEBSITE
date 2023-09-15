<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Amethyst | Product Details</title>

    <link rel="stylesheet" href="css/Product Details - Style.css">
    <link rel="stylesheet" href="css/Customer - Style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>

<body>
    

    <?php
    $count=0;
    
    session_start();
    if($_SERVER['REQUEST_METHOD']==='POST')
    {
        
        if(isset($_POST['addtocart']))
        {
                         if(isset($_SESSION['cart'])){
                        $item_array_id=array_column($_SESSION['cart'],"product_id");
                           
                             if(!in_array($_GET['id'],$item_array_id))
                             {
                                echo "<script>alert('The Product Has Been Added to the Cart..!');</script>";
                                $count=count($_SESSION['cart']);
                                $item_array=array(
                                'product_id'=>$_GET['id'],
                                'name'=>$_GET['name'],
                                'price'=>$_GET['price'],
                                'quantity'=>$_POST['quantity'],
                                'img'=>$_GET['img'],
                                'stock'=>$_GET['stock'],
                                'category'=>$_GET['category']
                                  );
                                 $_SESSION['cart'][$count]=$item_array;
                                  
                             }
                             else
                             {
                                  echo "<script>alert('You have already add this item to your cart..!');</script>";  
                                 echo "<script>window.location='Product Details.php?id=".$_GET['id']."</script>";  
                             }
                            
                      
                         }
                            else
                            {
                                echo "<script>alert('The Product Has Been Added to the Cart..!');</script>";
                                 $item_array=array(
                            'product_id'=>$_GET['id'],
                            'name'=>$_GET['name'],
                            'price'=>$_GET['price'],
                            'quantity'=>$_POST['quantity'],
                            'img'=>$_GET['img'],
                            'stock'=>$_GET['stock'],
                            'category'=>$_GET['category']
                            );
                            $_SESSION['cart'][0]=$item_array;
                       
                             }
        }
        
   }
       $cart="Checkout.php?id=".$_GET['id'];
    ?>
    <?php
        include ('include/Customer Header.php');
        require ('include/Queries.php');
        require('include/mySQL Connect.php');
    ?>
    

    <!--------single product details----->
     <?php if (isset($_GET['id'])) 
        $result = products_display_id($dbc, $_GET['id']);
    
        // fetch each record in result set
        while ($row = mysqli_fetch_assoc($result)) 
        {
            // build table to display results
            
            foreach ($row as $value)
            {
                $products[] = $value;
            }

        }
     // end while
        ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


    <div class="small-container single-product">
<!--------------------the form strart from heren Nour's Part--------------------------------------------->
        <form id="form" method="post" action="#">
        <div class="row">
            <div class="col-2">
                <img src="<?php echo $products[2];  ?>" width="100%">
            </div>

            <div class="col-2">
                <p>Home /<?php echo $products[3];  ?></p>
                <h1 name="p_name"><?php echo $products[1];  ?></h1> 
                <h4><?php echo $products[4];  ?> SAR </h4>
                <h3>Quantity:</h3>
                <input type="number" value="1" min="1" max="<?php echo $products[5]; ?>" name="quantity" id='quantity'>
                
                <p id="outstock"></p>
                
                
                
                
                <!----------------------------------------------add to cart button--------------------------------------------------->
                <br><button id="submit" type="submit" name="addtocart" class="btn">Add to Cart  <i class="fas fa-bag-shopping"></i></button>
                
                <script type="text/javascript">
                    var stock = <?php print($products[5]); ?>;
                    if (stock==0)
                        {
                            document.getElementById("outstock").innerHTML = "Sorry but that item is out of stock, we apologize.";
                            document.getElementById("quantity").style.display = "none";
                            document.getElementById("submit").style.display = "none";
                            
                        }
                </script>
                
                <h3>Product Description <i class="fa fa-indent"></i></h3>
                <br>
                <p><?php echo $products[6];  ?></p>
               
            </div>
        </div>
        </form>
         <?php 
                 //}//end of if to find id of product  
             //}//end of while loop
    //var_dump($_SESSION['cart']);
        ?>
    </div>
   
<!---------------------------------------------------------------------------------------------------------------------->
    <div class="small-container" id="Products">
            <h2 class="title">More Products</h2>
            <div class="row">
            <?php 
             
                $result = getData($dbc);
           $x=0;
             while($row = mysqli_fetch_assoc($result)){
                 ?>
               <div class="col-4" >
                <img src="<?php echo $row['picture'] ?>">
                <a href="Product%20Details.php?
                         name=<?php echo $row['name']; ?>
                         & id=<?php echo $row['p_id']; ?>
                         & img=<?php echo $row['picture']; ?>
                         & price=<?php echo $row['price']; ?>
                         & category=<?php echo $row['category']; ?>
                         & decripe=<?php echo $row['description']; ?>
                         & stock= <?php echo $row['stock']; ?>">
                    <h4><?php echo $row['name']; ?></h4></a>
            
                <p><?php echo "SAR ".$row['price']; ?></p> 
                    
                </div>
        
            <?php
            $x++;
                    }
            
            ?>
           
            </div>
        </div>
    
<!--------------------end of the form and other products here,  Nour's Part--------------------------------------------->
    <!------------Footer------------>
    <?php
        include('include/footer.html');
    ?>



</body>

</html>