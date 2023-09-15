<!DOCTYPE html>

<html >
<!-- Waad Alsobi 2190003735-->
<head>
	<meta charset="utf-8">
   <title>Amethyst | Add Product </title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
   <link rel="stylesheet" type="text/css" href="css/Add Products - Style.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>

<body >
   <!-------- Header --------->
   <?php
   include('include/Admin Header.php');
   ?>

   <div class="main-body">
      <form method="post" action="#" id = "form">

         <h1> Add a product
            <p> </p>
         </h1>

         <fieldset>
            <legend> product image</legend>
            <div class="wrapper">
               <div class="image">
                  <img src= "<?php if(isset($_POST["add"])) echo dirname($_POST["image"]);?>" alt="" id = "PImage" >
               </div>
               <div class="content">
                  <div class="icon">

                     <i class="fas fa-cloud-upload-alt"></i>

                  </div>
                  <div class="text">
                     No file chosen, yet!
                  </div>
               </div>
               <div id="cancel-btn">
                  <i class="fas fa-times"></i>
               </div>
               <div class="file-name">
                  File name here
               </div>
            </div>
            <label onclick="defaultBtnActive()" id="custom-btn" style="text-align:center">Choose an image</label>
            <input name="image" id="default-btn" hidden value = "<?php if(isset($_POST["add"])) echo $_POST["image"];?>" type="file" accept="image/png, image/jpg, image/jpeg">
			<p id = "imageE" style = "margin-left:50px;font-weight:bold;color:red;">	</p>


            <script>
               const wrapper = document.querySelector(".wrapper");
               const fileName = document.querySelector(".file-name");
               const defaultBtn = document.querySelector("#default-btn");
               const customBtn = document.querySelector("#custom-btn");
               const cancelBtn = document.querySelector("#cancel-btn i");
               const img = document.querySelector(".wrapper img");
               let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

               function defaultBtnActive() {
                  defaultBtn.click();
               }
               defaultBtn.addEventListener("change", function() {
                  const file = this.files[0];
                  if (file) {
                     const reader = new FileReader();
                     reader.onload = function() {
                        const result = reader.result;
                        img.src = result;
                        wrapper.classList.add("active");
                     }
                     cancelBtn.addEventListener("click", function() {
                        img.src = "";
                        wrapper.classList.remove("active");
                     })
                     reader.readAsDataURL(file);
                  }
                  if (this.value) {
                     let valueStore = this.value.match(regExp);
                     fileName.textContent = valueStore;
                  }
               });
            </script>
         </fieldset>


         <!---------------- Product information ---------------------->
         <div class="Addcontainer">
         <div class="admin-product-form-container">
            <fieldset>
             <legend>Product Information </legend>
			 <table >
                <tr>
                <td>
					<label>Product ID:
					<input name="ID" id = "PID" value = "<?php if(isset($_POST["add"])) echo $_POST["ID"]; ?>" 
					type="number" class="box" placeholder="Enter the product ID">
					</label>
					<p id = "IDE" style = "margin-left:3px;font-weight:bold;color:red;">	</p>
				</td>
			
                <td>
					<label>Product Name: 
					<input name="name" id="PName" value = "<?php if(isset($_POST["add"])) echo $_POST["name"]; ?>" 
					type="text" class="box" placeholder="Enter the product name" >
					</label>
					<p id = "nameE" style = "margin-left:35px;font-weight:bold;color:red;"> </p>	
				</td>					
                </tr>
                <tr>
                <td>
					<label>Product Price:
					<input name ="price" id="PPrice" value = "<?php if(isset($_POST["add"])) echo $_POST["price"] ?>" 
					type="number" class="box" min="0" placeholder="Enter the product price" >
					</label>
					<p id = "priceE" style = "margin-left:20px;font-weight:bold;color:red;"> </p>	
				</td>

                <td>
					<label>Product Stock: <input name="stock" id="PStock" value = "<?php if(isset($_POST["add"])) echo $_POST["stock"];?>"
					type="number" class="box" min="0" placeholder="Enter the product stock" >
					</label>
					<p id = "stockE" style = "margin-left:35px;font-weight:bold;color:red;"></p>	
				</td>
                </tr>

                <tr>
                    <td><label> Product Type: </label>
                      <select id="type" name = "type" class="box" required>
					  <option value = "Select a type" selected> Select a type </option>
                      <option value =  "Necklace"> Necklace </option>
                      <option value =  "Bracelet"> Bracelet </option>
                      <option value = "Ring"> Ring </option>
                      <option value = "Eearrings"> Earrings </option>
                      </select>
					  	  <p id = "typeE" style = "margin-left:20px;font-weight:bold;color:red;">	</p>
					  
					  <script type="text/javascript">
                            document.getElementById('type').value = "<?php if(isset($_POST['add']))echo $_POST['type']; else echo 'Select a type'?>";
                      </script>
                    </td>
               
               </tr>
            </table>
            </fieldset>
         </div>
         </div>

         <!---------------- Description and custom/not ----------------------->

         <div class="Addcontainer">
         <div class="admin-product-form-container ">
            <fieldset>
             <legend>Product Description </legend>

                <p style="text-align:left"><label>Description:</label><span id = "descE" style = "margin-left:10px;font-weight:bold;color:red;"></span>
				</p>
                <textarea name="Description"  id ="PDiscription"
				rows="8" cols="130" placeholder="Enter product description"><?php if(isset($_POST['add']))echo $_POST['Description'];?></textarea>
            </fieldset>
         </div>
         </div>
         <p>
            <center><input type = "submit" name = "add" id = "Add"  class="btn"  value = "Add Product" ></center>
         </p>
      </form>
   </div>
  
				
		<?php
			if(isset($_POST["add"]))
				{
					$ID = $_POST['ID'];
					$name = $_POST['name'];
					$price = $_POST['price'];
					$stock = $_POST['stock'];
					$type = $_POST['type'];
					$description = $_POST['Description'];
					$image = $_POST['image'];

							require("include/mySQL Connect.php");
							require("include/Queries.php");
									
							$result = checkID($dbc,$ID);
							$result2 = checkName($dbc,$name);	
							
							if($result==0 && $result2 == 0)
							{
								addProduct($ID, $name, $image, $type, $price ,$stock, $description,$dbc);
								echo "<script type='text/javascript' >
									alert('Product Added Successfully');																	
									</script>";
							}
							else
							{
							
								if($result!=0)
								{
									echo "<script type='text/javascript' >
										alert('ID already exists');	
										
										</script>";
								
								}
								if($result2 != 0)
								{
									echo "<script type='text/javascript' >
										alert('Name already exists');								
										</script>";
								}
							}
				} ?>
				
		<script>

		var ID;
		var pname;
		var stock;
		var price;
		var Pimg;
		var type;
		var description;
		var IDE;
		var nameE ; 			
		var imageE ; 	
		var stockE; 	
		var priceE; 
		var typeE; 
		var descE; 
		var hasNumber = /\d/;
     
	function init()
    {
        ID = document.getElementById("PID");
        pname = document.getElementById("PName");
        price = document.getElementById("PPrice");
        stock = document.getElementById("PStock");
        Pimg = document.getElementById("default-btn");
        description = document.getElementById("PDiscription");
		type = document.getElementById("type");		
				
               
        //event change
        ID.addEventListener("change",checkID,false);
		pname.addEventListener("change",checkName,false);
			   
        var myForm = document.getElementById("form");
        myForm.onsubmit = validate;			 
    }
		
	function checkID()
	{	
		var IDE = document.getElementById("IDE");
				
		if(ID.value.length == 3)
		{				
			IDE.innerHTML = "";
		}
		else if(ID.value.length !=3)
		{								
			IDE.innerHTML = "*ID must contain 3 characters";	
		}
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
		var IDE = document.getElementById("IDE");

		//check id
        if (ID.value == "")
        {
            IDE.innerHTML = "* An ID is required";                 
        }
        
		else if(ID.value.length !=3)
		{								
			IDE.innerHTML = "*ID must contain 3 characters";
			return false;
		}
			
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
				var priceE = document.getElementById("priceE"); 
                priceE.innerHTML = "* A price is required";
            }
			else
			{
				var priceE = document.getElementById("priceE"); 
                priceE.innerHTML = "";
			}
			//check stock
			 if (stock.value == "")
            {	
				var stockE = document.getElementById("stockE"); 
                stockE.innerHTML = "* A stock is required";
                    
            }
			else
			{
				var stockE = document.getElementById("stockE"); 
                stockE.innerHTML = "";
			}
			//check image
			 if (Pimg.value == "")
            {
				var imageE = document.getElementById("imageE"); 
                imageE.innerHTML = "* An image is required";                  
            }
			else
			{
				var imageE = document.getElementById("imageE"); 
                imageE.innerHTML = "";
			}
			//check description
			 if (description.value == "")
            {
				var descE = document.getElementById("descE"); 
                descE.innerHTML = "* A description is required";                 
            }
			else
			{
				var descE = document.getElementById("descE"); 
                descE.innerHTML = "";
			}
            //check type 
			 if (type.value == "Select a type")
            {
				var typeE = document.getElementById("typeE"); 
                typeE.innerHTML = "* A type is required";     
            }
			else
			{
				var typeE = document.getElementById("typeE"); 
                typeE.innerHTML = "";
			}
			
              if(ID.value == "" || pname.value == "" || price.value == "" || stock.value == "" || Pimg.value == "" || description.value == "" || type.value == "Select a type")  
			 
			  {
				alert("Please fill the missing fields");
				return false;
			  }
			  
			
            }
        window.addEventListener("load", init, false);

</script>		
				
				
		
		


</body>

</html>