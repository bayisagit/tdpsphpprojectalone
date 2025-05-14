<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controllers\Footer;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/about.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="icon" href="../images/favicon.png">
  <title>TDPSchool</title>
</head>
<body>
  <?php include('../shared/header.php'); ?>
  <main>
    <div class="about-text">
      <p>Welcome! </p>
      <p>We are dedicated to
        provide a seamless and efficient platform for parents students and administrative staffs that help on  managing student information,
        academic records, and more.yess yess</p>
    </div>
    <div class="main">
      <div class="about-us">
        <h1>Our Missions</h1>
        <div>Rooted in the belief that every student deserves a holistic and empowering learning experience,
          our missions encompass fostering a dynamic environment for intellectual growth, nurturing a sense of community,
          and instilling values that extend beyond the classroom. We aspire to equip our students with the skills
          and mindset needed to thrive in an ever-changing world, fostering a love for learning that lasts a lifetime.
        </div>
      </div>
      <div class="about-us">
        <h1>Our vision</h1>
        <div >In envisioning the future of education at Tullu Dimtu Primary School, we strive to create a learning environment
          that goes beyond conventional boundaries. Our visions embody innovation, inclusivity, and a dedication to
          preparing students for a globally connected society. With a focus on cutting-edge teaching methodologies and
          embracing diversity, we aim to cultivate a community of learners who are not only academically adept
          but also compassionate, open-minded, and ready to tackle the challenges of tomorrow with confidence.
        </div>
      </div>
    </div>
    <div class="key-feautures">
      <p>Key features of our System</p>
      <ul>
        <li>Efficient student enrollment and registration processes</li>
        <li>Real-time access to grades, attendance, and academic progress</li>
        <li>Interactive communication channels for parents, teachers, and students</li>
        <li>Automated assesment and examination management</li>
        <li>User-friendly interface for a hassle-free experience</li>
      </ul>
    </div>
    <div class="service-container">
      <h1>our services</h1>
      <div class="service">
        <img src="../images/our_library_img.png" class="image-large">
        <div>
          <h2>Our Library</h2>
          <p>Welcome to our Primary school library, a sanctuary of learning and discovery! Our library isn't just a 
            quiet place to study; it's a dynamic space where students can explore new worlds through literature, 
            delve into research projects, and collaborate on group assignments. With a vast collection of books, 
            digital resources, and multimedia materials, our library provides the tools and resources students 
            need to excel academically and pursue their passions. Whether you're seeking a cozy corner to immerse 
            yourself in a novel or utilizing our state-of-the-art technology for research, our friendly librarians
            are here to support and guide you on your educational journey. Join us in our library and unlock a world 
            of knowledge and inspiration!
          </p>
        </div>
      </div>
      <div class="service2">
        <div>
          <h2>Our cafteria</h2>
          <p>
            <?php
              $filename = "ourcafeteria.txt"; 
              $handle = fopen($filename, "r");
              if ($handle) {
                while (($line = fgets($handle)) !== false) {
                  echo htmlspecialchars($line) . "<br>"; 
                }
                fclose($handle);
              } else {
                echo "Cafeteria content not available.";
              }
            ?>
          </p>
        </div>
        <img src="../images/cafteria.png" class="image-large">
      </div>
      <div class="service">
        <img src="../images/our_services_img.png" class="image-large">
        <div>
          <h2>Our transportation</h2>
          <p> our reliable transportation services! We understand the importance of punctuality and safety
            , which is why we offer a comprehensive transportation network to ensure students arrive at school 
            comfortably and on time. Our fleet of buses is equipped with modern amenities and supervised by 
            experienced drivers who prioritize the well-being of our students. Whether you live nearby or 
            require a longer commute, our transportation options cater to diverse needs and provide peace 
            of mind for both students and parents. Join us in our commitment to a seamless and hassle-free 
            journey to school, where every ride is a step closer to success
          </p>
        </div>
      </div>
    </div>  
  </main>
  <?php Footer::render(); ?>

  <script src="../js/homepage.js"></script>
  <script src="../js/about.js"></script>
</body>
</html>
