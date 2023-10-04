
<html>

<head>
    <meta charset="utf-8">
    <title>admin login</title>
    <link rel="stylesheet" type="text/css" href="css/Admin Login - Style.css">
     <script   defer src="include/Login_Script.js">
         
  </script>

    
</head>


<body>
 

    <div class="outer">

        <div class="box2">

            <center>

                <img src="images/LOGIN%20GIF.gif" width=100% left=20px alt="Welcome image">

                <a href="Customer Home.php" class="btn">back to Amethyst homepage</a>

            </center>


        </div>

        <div class="box">
            <center><img src="images/Amethyst%20logo%20tran-01.png" width=60%>
            </center>
            <hr>
                

          <?php
            if (isset($_SESSION['Admin_Fname']) && isset($_SESSION['Admin_Lname'])) {
                header('location: Admin Home.php');
            } else { ?>  
            
            <form method="post" name="Login_Form"action="Check_Login.php"  id="id_of_Form" >
                <h2>admin login </h2>
               <center> <div id="login_error" style="color:red;"></div></center>

                <div>
                    <label><b>Id</b></label>
                    <input type="text" placeholder="Enter your Id" name="Aid" id="id_of_id">

                    <label><b>Password</b></label>
                    <input type="password" placeholder="Enter your Password" name="psw"id="id_of_pass" >

                    <button type="submit"  value="submit" >Login</button>

                </div>
            </form>
            <?php }?>
            <hr>
            <center>
                <a href="https://twitter.com/AmythestStore"><img src="images/twicon.png" width="28" , height="28" /></a>
                <a href="https://www.instagram.com/amytheststore/?hl=en"><img src="images/instaicon.png" width="28" , height="28" /></a>

            </center>

        </div>

    </div>
 

</body>

</html>
