<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/familyregistration.css"/>
  <link rel="stylesheet" href="css/nav.css" />
  <link rel="stylesheet" href="css/footer.css">
  <link rel="icon" href="../images/favicon.png">
</head>
<body>
<?php include ('../shared/header.php')?>
  <main>
    <div class="wrapper">
      <form action="#" method="POST">
        <h1>Family Registration</h1>
        <div class="input-box">
          <input type="text" name="name" placeholder="Full Name" required>
          <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
          <input type="email" name="email" placeholder="Email" required>
          <i class='bx bxs-envelope'></i>
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Password" required>
          <i class='bx bxs-lock'></i>
        </div>
        <button type="submit" class="btn">Register</button>
      </form>
    </div>    
  </main>
  <?php include ('../shared/footer.php') ?>
  <script src="./js/homepage.js"></script>
  <script src="./js/familyregistration.js"></script>
  </body>
</html>