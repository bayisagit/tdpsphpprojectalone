<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/signup.css" />

    <link rel="icon" href="../images/favicon.png" />

    <title>TDPSchool</title>
  </head>
  <body>
  <?php include ('../shared/header.php')?>    
    <div class="main">
      <div class="image">
            <img src="../images/image10.png" alt="signup">
      </div>    
      <div class="signup-container">
        <h2 class="h2">Signup</h2>
        <form action="../configure/signup.php" method="POST">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required />
        
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required />
        
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />
        
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required />
        
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required />
        
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
                <option value="parent">Parent</option>
            </select>
        
            <button type="submit">Signup</button>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
      </div>
    </div>
    <?php include ('../shared/footer.php') ?>
    <script src="./js/homepage.js"></script>
    <script src="./js/login.js"></script>
  </body>
</html>
