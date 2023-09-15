  <html>
      <!--Sahar Saeed Al-Zahrani	2190003270 -->
      <head>

      </head>
 
<?php 
   session_start() ;

  require('include/mySQL Connect.php');
  require('include/Queries.php');
   //  Authenticate Admins
    
    if (! Empty($_POST['Aid']) && ! Empty($_POST['psw'])) 
	{
   //----conect & open & query amethyst store database Done in queries.php ---
		
$callresult=Admin_authentication($dbc,$_POST['Aid'],$_POST['psw']);
        
        

      mysqli_close($dbc);
     
		if (mysqli_num_rows($callresult)>0)
		{
            $row=mysqli_fetch_row($callresult);
			
            $_SESSION['Admin_id']=$row[0];      
			$_SESSION['Admin_Fname']=$row[1];
            $_SESSION['Admin_Lname']=$row[2];
            $_SESSION['Admin_email']=$row[3];
            $_SESSION['Admin_id']=$row[4];
           
			header('location: Admin Home.php');
			exit;
		}
		
          if(mysqli_num_rows($callresult)<=0){
          $x=1;
            header('location: Admin Login.php?x='.$x);
			
			exit;
		}

   }
   ?>

      </html>  