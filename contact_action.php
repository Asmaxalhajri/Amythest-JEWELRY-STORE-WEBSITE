  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title>
      Amethyst | Contact Us
    </title>

    <link rel="stylesheet" type="text/css" href="css/Contact Us - Style.css">


  </head>

  <body>
    <?php
    require('include/mySQL Connect.php');
    require('include/Queries.php');
    include('include/Customer Header.php');
    ?>


    <?php
    $Name = ($_POST["Name"]);
    $Msg = ($_POST["Msg"]);
    $Email = ($_POST["Email"]);
    if (contact_us($dbc, $Name, $Email, $Msg)) {
    ?>

      <section class="contact">


        <div class="contactFormx">
          <h3>Thank You For Contacting Us </h3>
        </div>

      </section>

    <?php
    } else {

    ?>
      <section class="contact">


        <div class="contactFormx">
          <h3>Something went wrong </h3>
        </div>

      </section>

    <?php

    }
    ?>






  </body>
  <!----footer---->
  <footer>
    <?php
    include('include/footer.html');
    ?>
  </footer>


  </html>