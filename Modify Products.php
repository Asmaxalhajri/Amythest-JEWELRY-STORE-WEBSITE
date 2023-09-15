<!DOCTYPE html>
<html lang="en">
<!--- Nour's Part --->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Amethyst | Modify Product</title>

    <link rel="stylesheet" href="css/Product Details - Style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php
    require('include/mySQL Connect.php');
    require('include/Queries.php');
    ?>

    <!-------- Header --------->
    <?php
    include('include/Admin Header.php');
    ?>



    <!--------modify product details----->
    
    <?php if (isset($_GET['id'])) 
        $result = products_display_id($dbc, $_GET['id']);
    
        // fetch each record in result set
        while ($row = mysqli_fetch_row($result)) {
            // build table to display results
            
            foreach ($row as $value)
            {
                $products[] = $value;
            }

        }
     // end while
        ?>

    
        <div class="small-container single-product">
            
            <form id = "form" method="post" action="#" onsubmit="location.replace('Modify Products.php');" style="margin-top:-30pt">
            <div class="row">
                
                <div id="img1" class="col-2"><img alt="Product Image Shown Here." id="productimg" name="productimg" width="100%" src="<?php if(isset($_POST["update"])) echo ("images/".$_POST['images']) ; else echo $products[2]; ?>"></div>
                    
                <div class="col-2">
                    <h1>Modify Product Details</h1>

                    
                        <h3>Name:</h3>
                        <input id = "name" class="name" name="name" type="text" value="<?php if(isset($_POST["update"])) echo $_POST['name']; else echo $products[1]; ?>" onchange="checkName()" >
                        <br>
                        <br>
                        <p id="nameE" style = "margin-left:50px;font-weight:bold;color:red;"></p>
                    
                        <h3>Price:</h3>
                        <input id = "price" name="price" type="number" min="1" value="<?php if(isset($_POST["update"])) echo $_POST['price']; else echo $products[4]; ?>"><label>SAR</label>
                        <p id="priceE" style = "margin-left:50px;font-weight:bold;color:red;"></p>

                        <h3>Stock:</h3>
                        <input id = "stock" name="stock" type="number" value="<?php if(isset($_POST["update"])) echo $_POST['stock']; else echo $products[5]; ?>" min="0">
                        <p id="stockE" style = "margin-left:50px;font-weight:bold;color:red;"></p>

                        <h3>Product Type:<br>
                            <select name="category" id="category">
                                <option value="Necklace" > Necklace </option>
                                <option vaule="Bracelet" > Bracelet </option>
                                <option value="Ring" > Ring </option>
                                <option value="Earrings" > Earrings </option>
                            </select>
                            
                            <script type="text/javascript">
                                document.getElementById('category').value = "<?php echo $_POST['category'];?>";
                            </script>
                        </h3>
                        <p id="typeE" style = "margin-left:50px;font-weight:bold;color:red;"></p>

                        <h3>Product Image:<input id="images" name="images" type="file" accept="image/png, image/jpg, image/jpeg" class="box" value="<?php if(isset($_POST["update"])) echo $_POST['images']; else echo $products[2]; ?>" onchange="(function() 
                            {
                                var Div_img=document.getElementById('productimg');
                                var src = 'images/'+document.getElementById('images').files[0].name;
                                Div_img.setAttribute('src',src);
                                return false;
                            })();"></h3>
                        <p id="imageE" style = "margin-left:50px;font-weight:bold;color:red;"></p>


                        <h3>Description:<br> <textarea id="description" name="description" rows="10" cols="50" placeholder="Enter Product Description"><?php if(isset($_POST["update"])) echo $_POST['description']; else echo $products[6]; ?></textarea></h3>
                        <p id="desE" style = "margin-left:50px;font-weight:bold;color:red;"></p>

                        <input type="submit" name = "update" id ="update" class="btn" value="Confirm Changes">
                        
                </div>
                
            </div>
                </form>
        </div>

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
                <a href="Modify%20Products.php?
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

        <!------- JS for toggle menu-------->

        <script>
            var MenuItems = Document.getElementById("MenuItems");
            MenuItems.style.maxHeight = "0px";

            function menutoggle() {
                if (MenuItems.style.maxHeight == "0px") {
                    MenuItems.style.maxHeight = "200px";
                } else {
                    MenuItems.style.maxHeight = "0px";
                }
            }
        </script>

        <!--------header--------->
        <script>
            window.onscroll = function() {
                myFunction()
            };

            var navbar = document.getElementById("navbar");


            var sticky = navbar.offsetTop;


            function myFunction() {
                if (window.pageYOffset > sticky) {
                    navbar.classList.add("sticky");
                } else {
                    navbar.classList.remove("sticky");
                }
            }
        </script>
    
    <!-----------------------validation--------------------------->
 <script>

		var pname;
		var stock;
		var price;
		var Pimg;
		var type;
		var description;
		var nameE ; 			
		var imageE ; 	
		var stockE; 	
		var priceE; 
		var typeE; 
		var descE; 
		var hasNumber = /\d/;
     
	function init()
    {
        pname = document.getElementById("name");
        price = document.getElementById("price");
        stock = document.getElementById("stock");
        Pimg = document.getElementById("images");
        description = document.getElementById("description");
		type = document.getElementById("category");		
				
               
		pname.addEventListener("change",checkName,false);
			   
        var myForm = document.getElementById("form");
        myForm.onsubmit = validate;			 
    }
		
	function checkName()
	{
		var nameE = document.getElementById("nameE");   			
		
		if(hasNumber.test(pname.value)) 
		{				
			nameE.innerHTML = "* name cannot include a number";;				
		}
		if (!(hasNumber.test(pname.value)))
		{
			nameE.innerHTML = "";				
		}
			
    }
          
	function validate()
    {	
		var nameE = document.getElementById("nameE"); 
		var priceE = document.getElementById("priceE");
		var stockE = document.getElementById("stockE"); 
		var imageE = document.getElementById("imageE"); 
		var typeE = document.getElementById("typeE"); 
		
		//check name
		if (pname.value == "")
        {
            nameE.innerHTML = "* A name is required";				                   
        }
			else if (hasNumber.test(pname.value)) 
			{				
				nameE.innerHTML = "* name cannot include a number";
				return false;
			}		
			//check price
			 if (price.value == "")
            {	
				
                priceE.innerHTML = "* A price is required";
            }
			else
			{
				
                priceE.innerHTML = "";
			}
			//check stock
			 if (stock.value == "")
            {
                stockE.innerHTML = "* A stock is required";
                    
            }
			else
			{
                stockE.innerHTML = "";
			}
			//check image
			 if (Pimg.value == "")
            {
				
                imageE.innerHTML = "* An image is required";                  
            }
			else
			{
				
                imageE.innerHTML = "";
			}
			//check description
			 if (description.value == "")
            {
				var desE = document.getElementById("desE"); 
                desE.innerHTML = "* A description is required";                 
            }
			else
			{
				var desE = document.getElementById("desE"); 
                desE.innerHTML = "";
			}
              if(pname.value == "" || price.value == "" || stock.value == "" || Pimg.value == "" || description.value == "")  
			 
			  {
				alert("Please fill the missing fields");
				return false;
			  }
			  
			
            }
        window.addEventListener("load", init, false);

</script>
<!-----------------------Modify Database--------------------->
    <?php 
    if(isset($_POST["update"]))
    {                       
         if(!(checkName($dbc, $_POST["name"])))
         {
             modify_product_edit($dbc,$_GET['id'],$_POST['images'],$_POST['name'],$_POST['price'],$_POST['stock'],$_POST['description'],$_POST['category']);
             echo "<script>alert('Product Has Been Updated Successfully, Thank You For Your Time!');</script>";
         }
        else
            echo "<script>alert('Name Already Exists!');</script>";
    }
    ?>
</body>

<script>
    
</script>
    
</html>