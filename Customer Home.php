<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Amethyst | Customer Home</title>
    <link rel="stylesheet" href="css/Customer - Style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <?php session_start() ?>
     
</head>

<body>
     <!-- Loader------------
    <div id="preloader"></div>--->
    <!-------- include --------->
    <?php
     $cart="Checkout.php";
        include ('include/Customer Header.php');
    require('include/mySQL Connect.php');
    require('include/Queries.php');
    ?>

<!-------- Cover page --------->
    <div class="row " style=" background: radial-gradient(#fff, #d9cbd2); margin-top: 70px">
        <div class="col-1">
            <img src="images/necklace.PNG" width="500" , height="759">
        </div>
        <div class="col-1">
            <h1 class="subtitle">YOUR JEWELRY.<br> YOUR STORY.<br> YOUR IDENTITY.<br> YOUR POWER.<br> YOUR SIGNATURE.<br> YOUR WAY.</h1>

            <a href="#about" class="btn">About us &#8594;</a>
        </div>

    </div>
    
    <br><br><br><br><br><br>
    
<!-------- Search--------->
        <form method="post" action="Customer Home.php">
                <div class="table-search-cell">
                    <input type="text" name="search" class="Search-input" placeholder="What are you looking for?">
                    <button class="search-button" type="submit" name="search_button">
                        <img class="search-button-image static" src="images/Static Search.png" alt="search icon" style='height: 100%; width: 100%; object-fit: contain'>
                        <img class="search-button-image move" src="images/Search.gif" alt="search icon" style='height: 100%; width: 100%; object-fit: contain'>
                    </button>
                </div>
            </form>

            <?php
            if (isset($_POST['search_button'])) {
                $result = search($dbc, $_POST['search']);
            ?>

                <div class="table-images-cell table-images-cell-search" >
                    <table align="center">
                        <?php if ($result == "none") { ?>
                            <h2 class="title">Sorry, no products found with the name "<?php echo $_POST['search']; ?> "</h2>
                        <?php } ?>

                        <?php if ($result == "no value") { ?>
                            <h2 class="title">Please enter a name to search and retry</h2>
                        <?php } ?>

                        <?php if ($result != "none" && $result != "no value") { ?>
                            <h2 class="title">Search Results for "<?php echo $_POST['search']; ?> "</h2>
                            <?php
                            $counter = 1;
                            // fetch each record in result set
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($counter == 1) {
                            ?>
                                    <tr>

                                    <?php
                                }
                                $counter++;
                                    ?>
                                     <td class="col-2" >
                                    <img style=" width: 79% " src="<?php echo $row['picture'] ?>"  alt="<?php echo $row['name'] ?>">
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
                    
                            </td>

                                    <?php
                                    if ($counter  == 5) {
                                    ?>
                                    </tr>
                                    <br>

                                <?php
                                        $counter = 1;
                                    } ?>

                        <?php
                            }
                        } // end inner while
                        ?>
                    </table>

                </div>

            <?php } ?>

<!-------- Past Purchases ----->

   
     <?php
   
    if(isset($_COOKIE['purchased'])){
        $purchased=json_decode($_COOKIE['purchased']);
       
    
        ?>
        
       
        <div class="small-container">
        <h2 class="title">Past Purchases</h2>
        
        <div class="row">
            <?php
       
         foreach( $purchased as $k => $productID){
            
              
            
             $result = products_display_id($dbc,$productID);
              $row = mysqli_fetch_assoc($result);
             
            ?>
              
              
              <div class="col-2" >
                <img src="<?php echo $row['picture'] ?>" alt="<?php echo $row['name']; ?>">
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
             
              
              
              
              
         <?php  }?>
           
                 </div>
             
        </div>
                
        
        
<?php  }?>


        <!-------- products ----->
        <div class="row" id="Products">
            <h2 class="title"> Products</h2>
        
            <div class="row">
            <?php 
         //require('include/mySQL Connect.php');
                $result = getData($dbc);
           $x=0;
             while($row = mysqli_fetch_assoc($result)){
                 ?>
               <div class="col-2" >
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

    <?php
        include ('include/footer.html');
    ?>
<!-- Loader-------------->
   <script>
    var loader=document.getElementById("preloader");
       window.addEventListener("load",function(){
           loader.style.display="none";
       });
    
    </script>
</body>

</html>