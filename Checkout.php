
<?php

 function cartElement($name,$price,$image,$category,$id,$count,$stock,$descrption){
       echo "
                <form  method='post' action='Checkout.php?action=remove&id=$id&name=$name'>
                    <tr>
                        <td><button type='submit' style='border:none' name='remove'><i class='fas fa-trash-can i'></i></button></td>
                        <td>
                        <div class='cart-info'>
                        <img src='$image' alt='$name'>
                        <div>
                        <br> <a href='Product%20Details.php?name=$name&id=$id& img=echo $image& price=$price& category=$category& decripe=$descrption& stock=$stock' class='name'>
                        <p>$name</p></a>
                        <small>Price: SAR $price</small>
                        <br>
                        <small>$category</small>

                        </div>
                        </div>
                        </td>
                        <td> 
                        <input type='hidden' class='iprice' value='$price'>
                        <input type='number' class='iquantity' value='$count' min='1' max='$stock' onchange='this.form.submit();' name='mod_quantity'>
                        <input type='hidden' value='$id' name='p_id'>

                        </td>
                        <td>SAR <span id='price' class='itotal'></span></td>
                    </tr>
                </form>";
     
     
    }
$total=0;
     //start the session
session_start();

require('include/mySQL Connect.php');
require ('include/Queries.php');
$result = getData($dbc);

 
 //if delete single product form cart 
if(isset($_GET['action'])){
       if(isset($_POST['remove'])){
           if($_GET['action']=='remove'){
               foreach($_SESSION['cart'] as $key => $value){
                   if($value['product_id'] == $_GET['id']){
                    unset($_SESSION['cart'][$key]);
                       $temp=array_values($_SESSION['cart']);   
                       unset( $_SESSION['cart']);
                      $_SESSION['cart']=$temp;
                       unset($temp);
                    echo "<script>alert('".$_GET['name']." has been removed from your cart..!');</script>";
                    echo "<script>window.location='Checkout.php'</script>";
                      $count=count($_SESSION['cart']);
                    if ($count == 0){
                       
                           unset($_SESSION['cart']);
                 }
            }
        }
    }
}
        if($_GET['action'] == "clearall"){
            echo "<script>alert('The cart shopping empty');</script>";
            unset($_SESSION['cart']);
        }
    }
//update quantity in cart
if(isset($_POST['mod_quantity']))
    {
          foreach($_SESSION['cart'] as $key => $value)
          {
                if($value['product_id'] == $_POST['p_id'])
                {
                  $_SESSION['cart'][$key]['quantity']=$_POST['mod_quantity'];
                      
                }
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<!----------------------------- HEAD --------------------------------------->

<head>
    <meta charset="utf-8">
    <title>Shopping Cart</title>
    <!----------------------------- STYLES -------------------------------------->
    <link rel="stylesheet" href="css/Cart - Style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/Checkout - Style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css?v=<?php echo time(); ?>">
</head>
<!-------------------------------- BODY -------------------------------------------------------->
<body>
    <!----------------------------------  HEADER ---------------------------------------------------------->
<!--Teaf Bashamakh-->
    <?php
  $cart="Checkout.php";
    include ('include/Customer Header.php');
    ?>
    <!-------------------------Checkout progress------------------------------->
    <div style="max-width: 1080px;margin: auto;padding-left: 25px; padding-right: 25px;padding-top: 150px;" id="cart">
      
        <div class="checkout-panel" style="height:100%;">
            <div class="panel-body">
                <h2 class='title' >My Cart</h2>
                
                <?php
               
         if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
             echo " <div class='progress-bar'>
                    <div class='step'></div>
                    <div class='step'></div>
                    <div class='step'></div>


                </div>";
             
              //cart items details
             echo "<div class='cart-page'>
           
                    <table>
                    
                        <tr>
                            <th></th>
                            <th>Products</th>
                            <th>Quantitiy</th>
                            <th>Subtotal</th>
                        </tr>"; 
    
               $product_id=array_column($_SESSION['cart'],'product_id');
          
                 while($row = mysqli_fetch_assoc($result)){

                     foreach($product_id as $k => $id){
                          
                         if($row['p_id'] == $id){
                           
                             $q=$_SESSION['cart'][$k]['quantity'];
                            cartElement($row['name'],$row['price'],$row['picture'],$row['category'],$row['p_id'],$q,$row['stock'],$row['description']);
                             $total=$total + ($row['price']*$q);
                                 break;
                           
                       
                           
                         }
                        
                 
                 }
                    
                 }
             //------------------------------------------------------
             echo"
             </table>
             
             <div class='total-price'>
                        <table>
                        
                            <tr>
                   
                   <td>Subtotal</td> <td>SAR <span id='subtotal' class='gsubtotal'></span></td>
                            </tr> 
                            <tr>
                   
                   <td>Delivery Cost</td> <td>SAR 10</td>
                            </tr> <tr>
                   
                   <td>Total </td> <td>SAR <span id='total' class='gtotal'></span></td>
                            </tr>
                          
                        </table> </div></div>
             </div>
             <div class='panel-footer'>
                <a href='Checkout.php?action=clearall'><button type='button' class='butn back-btn' name='Empty' style='width:200px'>Empty shopping cart</button></a>
                <a href='#checkout'><button type='button' class='butn next-btn' style='margin:0 auto;' onclick=''  name='confirm'> Checkout <i class='fas fa-money-check-alt mr-2'></i></button></a>
            </div>";?>
            
           
           
        </div>
              </div>
             <!--Hajar Bawazir-->
          <!-------------------------Checkout progress------------------------------->
     <div style="max-width: 1080px;margin: auto;padding-left: 25px; padding-right: 25px;padding-top: 150px;" id='checkout' >
         <!------------------------Customer info-------------------------------->
        <form id="form" action="Complete Order.php" method="post" onsubmit="return form_validation();" autocomplete="on">
        <div class="checkout-panel" style="height:100%;">
           
            <div class="panel-body">
               

                <div class="progress-bar">
                    <div class="step active"></div>
                    <div class="step"></div>
                    <div class="step"></div>

                </div>
<!--------------------------------------------------------------------------------->
              

                <div class="input-fields">
                    
                    <div class="column-1">
                         <h2 class="title" >Checkout</h2>
                        <label>First Name:<input type="text" id="Fname" name='Fname'  /><div id="name-error" class="error"></div></label>
                         <label>Last Name:<input type="text" id="Lname" name='Lname'  /><div id="Lname-error" class="error"></div></label>
                        <label>Email<input type="text" placeholder="Amethyst@hotmail.com"
                                id="email" name='email' /> <div  id="email-error" class="error"></div></label>
                        <label>Phone Number:<input type="text" 
                                placeholder="05x xxx xxxx" id="phone" name='phone' /><div  id="phone-error" class="error"></div></label>
                          <label>  City:<input type="text" id='city' name='city' ><div  id="city-error" class="error"></div></label>
                           <label> Street:<input type="text" id='street' name='street' ><div  id="Street-error" class="error"></div></label>
                            <label>Building Number:<input type="text" id='buildno' name='buildno' ><div  id="Building-Number-error" class="error"></div></label>

                    </div>

                    <div class="column-2">
                        <!------------------------payment-------------------------------->
                  <h2 class="title">Payment</h2>

                <div class="payment-method">
                    <label for="card" class="method card" id='cardmethod'>
        <div class="card-logos">
          <img src="images/visa.png" width="50px" height="30px" style="margin-left:20px" alt="visa payment method">
          <img src="images/mastercard.png" width="50px" height="40px" alt="mastercard payment method">
        </div>
 
        <div class="radio-input">
          <input id="card" type="radio" name="payment" checked>
            Pay SAR <span id='paywithvisa'><?php echo ($total+10);?></span> with visa or MasterCard 
        </div>
      </label>

                    <label for="mada" class="method mada">

        <img src="images/mada.png" width="100px" height="35px" style="margin-left:20px" alt="mada payment method">
        <div class="radio-input">
         <input id="mada" type="radio" name="payment">
              Pay SAR <span id='paywithmada'><?php echo ($total+10);?></span> with mada credit card
        </div>
      </label>
                </div>

                    <div class="column-1">
                        <div>
                        <label for="cardholder">Cardholder's Name</label>
                        <input type="text" id="cardholder" name='CardName'/><div id="Cardname-error" class="error"></div>
                        </div>
                        <div>
                         <label for="cardnumber">Card Number</label>
                        <input type="text" id="cardnumber" name='CardNumber'  placeholder="xxxx xxxx xxxx xxxx"/>
                        <div id="CardNumber-error" class="error"></div>
                        </div>
                        <div class="small-inputs">
                            <div>
                                <label for="date">Expires Date</label>
                                <input type="text" id="ExpiresDate" placeholder="mm/yy" name='ExpiresDate' /><div id="ExpiresDate-error" class="error" style='width:50%'></div>
                            </div>
                            <div>
                                <label for="verification">CVV / CVC *</label>
                                <input type="password" id="verification" name='CVV'/>
                                <div id="CVV-error" class="error" style='width:50%'></div>
                            </div>
                      
                   
                       

                        <span class="info">* CVV or CVC is the card security code, unique three digits number on the back of your card separate from its number.</span>
  </div>

                    </div>
                       
                   
           
                    </div>
                    <!--------------------------------------------------------------->
                </div>
            </div>
                </div>
            <div class="panel-footer">
                <form method="post" action="#cart">
                <nav><a href="#cart"><button type="button" class="butn back-btn">Back</button></a></nav>
                </form>
                
                <nav><a><button type="submit" class="butn next-btn" name="Buy" value="Buy">Buy</button></a></nav>
            </div> <!------------panel footer close--------------------->
                
           
          
            </form>
       
    </div>
     
            
       


        <?php
            
         
    }else{ //if there is no session of cart
        
        echo "<hr><h3 class='h3'>Cart is Empty</h3><br>";
        echo "<nav style='margin:0 auto;text-align:center;padding-bottom:400px'width:200px><a href='Customer Home.php#Products'><button type='submit' class='butn next-btn' style='width:20%'>  Go to Shopping <i class='fas fa-bag-shopping' style='transform:scale(1.2);'></i></button></a></nav> </div>
    </div>  ";
        
    }
    
        ?>
        
            
        </div>
    <!------------------------------------Footer--------------------------------------------------------->
    <?php
        include ('include/footer.html');
    

    ?>
<!--Teaf Bashamakh-->
<!-------------Total calculation    ------------->
<script >
    var gt=0;
    var iprice=document.getElementsByClassName('iprice');       
     var iquantity=document.getElementsByClassName('iquantity');       
     var itotal=document.getElementsByClassName('itotal'); 
     var gsubtotal=document.getElementById('subtotal'); 
     var gtotal=document.getElementById('total'); 
    
    function subtotal(){
        gt=0;
        for(i=0;i<iprice.length;i++){
            itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
            gt=gt+(iprice[i].value)*(iquantity[i].value);
        }
        gsubtotal.innerText=gt;
        gtotal.innerText=(gt+10);
    }
    subtotal();


    
    </script> 
<!--Hajar Bawazir-->
<!---------------------------------------------form validation ----------------------------------------------------------->
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <script src="include/cleave.js"></script>
    <script src="include/cleave-phone.sa.js"></script>
    <!-----------card and phone format ------------>
    <script>
        var cleave_cardnumber = new Cleave("#cardnumber ", {
            creditCard: true,
            delimiter: " ",
            onCreditCardTypeChanged: function (type) {
                console.log(type)
                },
         });
        
        
        var cleaveDate = new Cleave("#ExpiresDate", {
              date: true,
              datePattern: ["m", "y"],
        });
        
        
        var cleaveCCV = new Cleave("#verification", {
              blocks: [3],
        });
        
        var cleave_phone = new Cleave('#phone', {
            phone: true,
            phoneRegionCode: 'SA'
        });
    </script>
    <!------------ end of format ---------------->
    <script>
        
        function setErrorFor(input,message_id,message) {
            var formControl = input.parentElement;
            formControl.className = 'form-control error';
            document.getElementById(message_id).innerHTML=message;
        }//end setErrorFor
        
        
        function setSuccessFor(input,message_id) {
            var formControl = input.parentElement;
            formControl.className = 'form-control success';
            document.getElementById(message_id).innerHTML="";
        }//end setSuccessFor
        
        
        function isEmail(email) {
	        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
        } //end isEmail
        
        
        function Expires(date) {
            var m=date.charAt(0)+date.charAt(1);
            var y=date.charAt(3)+date.charAt(4);
            
           if(y=="22"){
               
               if(m<="05"){
                  //Expires
                   return true;
              }else{
                 // not Expires
                   return false;
              }
               
           }else if(y < "22"){
               //Expires
               return true;
           }else if(y > "22"){
               // not Expires
               return false;
           }
	        
        }//end Expires
        
        
        function form_validation(){
            var valid=true;
            var Fname = document.forms["form"]["Fname"];
             var Lname = document.forms["form"]["Lname"];
            var email = document.forms["form"]["email"];
            var phone = document.forms["form"]["phone"];
            var city = document.forms["form"]["city"];
            var street = document.forms["form"]["street"];
            var buildng_num = document.forms["form"]["buildno"];
            var CardName = document.forms["form"]["CardName"];
            var CardNumber = document.forms["form"]["CardNumber"];
            var ExpiresDate = document.forms["form"]["ExpiresDate"];
            var CVV =  document.forms["form"]["CVV"];
            
             if (Fname.value == "") {
                    setErrorFor(Fname,"name-error","Please enter your First Name.");
                    valid=false;
                }else if(!Fname.value.match(/^[A-Za-z'\s]*$/)){
                     setErrorFor(Fname,"name-error","Not a valid First Name, Should Not Contain Numbers");
                     valid=false;
                }else{ 
                    setSuccessFor(Fname,"name-error");
                }
              if (Lname.value == "") {
                    setErrorFor(Lname,"Lname-error","Please enter your Last Name.");
                    valid=false;
                }else if(!Lname.value.match(/^[A-Za-z'\s]*$/)){
                     setErrorFor(Lname,"Lname-error","Not a valid Last Name, Should Not Contain Numbers");
                     valid=false;
                }else{ 
                    setSuccessFor(Lname,"Lname-error");
                }
                
            
            
             if (email.value == "" ) {
                     setErrorFor(email,"email-error","Please enter a e-mail address.");
                     valid=false;
                }else if (!isEmail(email.value)) {
	               	 setErrorFor(email,"email-error","Not a valid email,should be in format xxx@domin.com");
                     valid=false;
                 }else{
                     setSuccessFor(email,"email-error");
                 }
            
            
             if (phone.value == "") {
                    setErrorFor(phone,"phone-error", "Please enter your phone number.");
                    valid=false;
                 }else if(phone.value.length<12 || phone.value.charAt(0)!=0 || phone.value.charAt(1)!=5){
                    setErrorFor(phone,"phone-error","Not a valid phone number, should be in format 05x xxx xxxx all number");
                    valid=false;
                 }else{ 
                    setSuccessFor(phone,"phone-error");
                 }   
            
            
            
            
             if (CVV.value == "") {
                    setErrorFor(CVV,"CVV-error", "Please enter your CVV.");
                    valid=false;
                 }else if(CVV.value.length!=3 ||isNaN(CVV.value)){
                    setErrorFor(CVV,"CVV-error","Not a valid CVV, should be 3 numbers");
                    valid=false;
                 }else{ 
                    setSuccessFor(CVV,"CVV-error");
                 }
            
            
            
            if (city.value == "") {
                    setErrorFor(city,"city-error","Please enter your city");
                    valid=false;
                 }else if(!city.value.match(/^[A-Za-z]+$/)){
                    setErrorFor(city,"city-error","Not a valid City Name, Should Not Contain Numbers");
                    valid=false;
                }else{
                    setSuccessFor(city,"city-error" );
                }
            
                
            
              if (street.value == "") {
                    setErrorFor(street,"Street-error","Please enter the street ");
                    valid=false;
                }else{ 
                    setSuccessFor(street,"Street-error" );
                }
            
            
            
             if (buildng_num.value == "") {
                    setErrorFor(buildng_num,"Building-Number-error" ,"Please enter the Building Number ");
                    valid=false;
                }else if(isNaN(buildng_num.value)){
                    setErrorFor(buildng_num,"Building-Number-error","Not a valid Building Number, Should Only Contain Numbers");
                    valid=false;
                }else{ 
                    setSuccessFor(buildng_num,"Building-Number-error" );
                }
                
            
            
             if (CardName.value == "") {
                    setErrorFor(CardName,"Cardname-error" ,"Please enter Cardholder's Name ");
                     valid=false;
                }else if(!CardName.value.match(/^[a-zA-Z'\s]*$/)){
                    setErrorFor(CardName,"Cardname-error","Not a valid Cardholder's Name ,Should Not Contain Numbers ");
                    valid=false;
                } else{ 
                    setSuccessFor(CardName,"Cardname-error" );
                }
            
            
            
        
             if (CardNumber.value == "") {
                    setErrorFor(CardNumber,"CardNumber-error", "Please enter your Card Number.");
                    valid=false;
                 }else if(CardNumber.value.length!=19){
                    setErrorFor(CardNumber,"CardNumber-error","Not a valid Card Number, should be 16 numbers");
                    valid=false;
                 }else{ 
                    setSuccessFor(CardNumber,"CardNumber-error");
                 }
            
            
            
             if (ExpiresDate.value == "") {
                    setErrorFor(ExpiresDate,"ExpiresDate-error", "Please enter the Expires Date.");
                    valid=false;
                 }else if(ExpiresDate.value.length!=5){
                    setErrorFor(ExpiresDate,"ExpiresDate-error","Not a valid Expires Date, Please enter mm/yy");
                    valid=false; 
                 }else if(Expires(ExpiresDate.value)){
                    setErrorFor(ExpiresDate,"ExpiresDate-error","The Card is Expired");
                    valid=false;
                 }else{ 
                    setSuccessFor(ExpiresDate,"ExpiresDate-error");
                 }

             
             
            
                    return  valid;
        }//end form_validation


    </script>
</body>

</html>
