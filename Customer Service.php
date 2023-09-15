<!-- Lama Al-Ghamdi - 2190002418 -->

<html>

<head>
   <meta charset="utf-8">
   <title>Amethyst|Customer Service</title>
   <link rel="stylesheet" href="css/Customer Service - Style.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <script defer src="include/onDone&onUnDone.js"></script>
</head>

<body>

   <!-------- Header --------->
   <?php
   include('include/Admin Header.php');
   require('include/mySQL Connect.php');
   require('include/Queries.php');

   if (isset($_GET['action']) && $_GET['action'] == "done") {
      done_undone_message($dbc, $_GET['id'], $_GET['action']);
   }

   if (isset($_GET['action']) && $_GET['action'] == "undone") {
      done_undone_message($dbc, $_GET['id'], $_GET['action']);
   }

   $csm_result = customer_service_messages($dbc);
   $csmd_result = customer_service_messages_done($dbc);

   if ($csm_result == '0' && $csmd_result == '0') {
      $nothing = true; ?>
      <div class="no_messages">
         <h1 class="no" style="margin-top: 30%;">No Messages To Reply To & No Replies</h1>
      </div>
   <?php } ?>


   <?php
   if ($csm_result == '0' && (!isset($nothing))) { ?>
      <div class="no_messages">
         <h1 class="no" style="margin-bottom: 10%;">No Messages To Reply To</h1>
      </div>
   <?php } ?>

   <div class="main-body">
      <?php if ($csm_result != '0') { ?>
         <h1 class="title">Customer Messages (Need to Respond)</h1>
         <div class="Messages-Table-div">
            <Table class="Messages-Table" summary="Customer Messages (Need to Respond)">
               <thead>
                  <tr>
                     <th class="done">Done?</th>
                     <th class="client_name">Name</th>
                     <th class="client_email">Email</th>
                     <th>Message</th>
                  </tr>

               </thead>
               <?php while ($row = mysqli_fetch_assoc($csm_result)) { ?>
                  <tbody>
                     <tr>
                        <td><input type="checkbox" name="Done" onchange="onDone(<?php echo $row['id']; ?>)"></td>
                        <td class="client_name"><?php echo $row['Name']; ?></td>
                        <td class="client_email"><a href="mailto: <?php $row['Email']; ?>"><?php echo $row['Email']; ?></a></td>
                        <td class="client_message"><?php echo $row['Message']; ?></td>
                     </tr>
                  </tbody>
               <?php } ?>
            </Table>
         </div>
      <?php } ?>

      <?php
      if ($csmd_result == '0' && (!isset($nothing))) { ?>
         <div class="no_messages">
            <h1 class="no" style="margin-top: 10%;">You Haven't Replied To Any Messages</h1>
         </div>
      <?php } ?>


      <?php if ($csmd_result != '0') { ?>
         <h1 class="title">Customer Messages (Done)</h1>
         <div style="overflow:auto; height: auto; max-height:50vh; border: 1px solid #8D728B;">
            <Table class="Messages-Table" summary="Customer Messages (Done)">
               <thead>
                  <tr>
                     <th class="done">Done?</th>
                     <th class="client_name">Name</th>
                     <th class="client_email">Email</th>
                     <th>Message</th>
                  </tr>

               </thead>
               <?php while ($row = mysqli_fetch_assoc($csmd_result)) { ?>
                  <tbody>
                     <tr>
                        <td><input checked type="checkbox" name="Done" onchange="onUnDone(<?php echo $row['id']; ?>)"></td>
                        <td class="client_name"><?php echo $row['Name']; ?></td>
                        <td class="client_email"><a href="mailto: <?php $row['Email']; ?>"><?php echo $row['Email']; ?></a></td>
                        <td class="client_message"><?php echo $row['Message']; ?></td>
                     </tr>
                  </tbody>
               <?php } ?>
            </Table>
         </div>
      <?php } ?>

   </div>
</body>

</html>