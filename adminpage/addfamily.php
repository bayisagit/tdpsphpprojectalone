<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="partials/admin.css">
    <link rel="stylesheet" type="text/css" href="css/addfamily.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard - Register Family</title>
</head>
<body>
    <?php include("partials/header.php"); ?>

    <main class="main-content">
        <section class="add-family-form">
            <h2>Register New Family</h2>
            <div class="central">
                <div class="phot"><img src="../images/familyregister.jpg" alt="familyregister"> </div>
                <form action="process/addfamily.php" method="POST">
                    <!-- First Name -->
                    <div class="form-group">
                        <label for="firstname">First Name:</label>
                        <input type="text" id="firstname" name="firstname" required>
                    </div>

                    <!-- Last Name -->
                    <div class="form-group">
                        <label for="lastname">Last Name:</label>
                        <input type="text" id="lastname" name="lastname" required>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" required>
                    </div>

                    <!-- Student ID -->
                    <div class="form-group">
                        <label for="student_id">Student ID:</label>
                        <input type="text" id="student_id" name="student_id" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <button type="submit" class="btn-submit">Register Family</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
