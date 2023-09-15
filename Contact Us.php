<!--Wadha Mohammed Alhajri 2190004335 -->
<html>

<head>
    <meta charset="utf-8">
    <title>
        Amethyst | Contact Us
    </title>

    <link rel="stylesheet" type="text/css" href="css/Contact Us - Style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="include/Contacting_Us.js"></script>
</head>

<body>
    <!----Header---->

    <?php
    $cart = "Checkout.php";
    include('include/Customer Header.php');
    ?>
    <!------------->

    <section class="contact">
        <div class="content">
            <h3>Contact Us
            </h3>
            <p> </p>
        </div>



        <div class="contactForm">
            <!----form--------->
            <form id="myForm" action="contact_action.php" method="POST">
                <h2>Send Massage</h2>
                <div class="inputBox">
                    <input type="text" placeholder="Full Name" name="Name" id="Name" onkeyup='validateName()'>
                    <span class='error-message' id='name-error'></span>
                </div>
                <div class="inputBox">
                    <input type="email" placeholder="Email" name="Email" id="Email" onkeyup='validateEmail()'>
                    <span class='error-message' id='email-error'></span>
                </div>
                <div class="inputBox">
                    <textarea required="required" name="Msg" id="Msg" placeholder="Type your Message ..." onkeyup='validateMessage()'></textarea>
                    <span class='error-message' id='message-error'></span>
                </div>
                <div>
                    <input type="submit" class="contact-form-submet" value="Send" name="submit" id="submit" onclick='return validateForm()'>
                    <span class='error-message' id='submit-error'></span>

                </div>

            </form>
        </div>
        <!-----contact information--------------------->
        <div class="contantInfo">
            <div class="box">
                <div class="icon1"><img src="images/Address.png" alt="Address icon"></div>
                <div class="text">
                    <h3>Address</h3>
                    <p>KSA<br> Dhahran

                    </p>

                </div>
            </div>

            <div class="box">
                <div class="icon2"><img src="images/phone.png" alt="Phone icon"></div>
                <div class="text">
                    <h3>Phone</h3>
                    <p>+966 583925584 <br>
                    </p>
                </div>
            </div>
            <div class="box">
                <div class="icon3"><img src="images/email.png" alt="Email icon"></div>
                <div class="text">
                    <h3>Email</h3>
                    <p>Amethyst@gmail.com </p>
                </div>
            </div>
        </div>

        <!----map------------------------------------>
        <div class="contentline"> <p class="theline" > </p> </div>
         
        <div class="map">
            <iframe style="width:100%; height:100%; border-radius: 15px;" frameborder="0" allowfullscreen="" loading="lazy" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3578.7171425162273!2d49.99500614353943!3d26.23837880506276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjbCsDE0JzE0LjMiTiA0OcKwNTknNTEuOSJF!5e0!3m2!1sen!2ssa!4v1615649400365!5m2!1sen!2ssa"></iframe><br>
        </div>
    </section>
</body>
<!----footer------------------>
<footer>
    <?php
    include('include/footer.html');
    ?>
</footer>

</html>