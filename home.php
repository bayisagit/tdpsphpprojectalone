<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="images/favicon.png">
  <link rel="stylesheet" href="homepage/css/home.css">
  <link rel="stylesheet" href="homepage/css/nav.css">
  <link rel="stylesheet" href="homepage/css/footer.css">
  <title>TDPSchool</title>
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<body>
  <?php include ('indu/header.php')?>

  <!--main part-->
  <main>
    <div class="img">
      <p>welcome</p>
      <p>Tullu Dimtu Preparatory School</p>
      <p class="span"> Creating the future</p>
      <a href="homepage/about.php"><button class="button">Explore</button></a>
    </div>
    <div class="smallsize">
      <div class="blog_container">
        <div class="blog"><p class="span">15</p><p> year experience</p></div>
        <div class="blog"><p class="span"><i class="fa fa-trophy"></i></p><p>over 5 prizes</p></div>
        <div class="blog"><p class="span">45:1</p><p>teacher student ratio</p></div>
        <div class="blog"><p class="span">100%</p><p>Satisfied Parents</p></div>
        <div class="blog"><p class="span">45</p><p>Certified Teachers</p></div>  
      </div>
      <div class="about-us">
        <h2>About us</h2>
        <p>TDPSchool for providing best  education for students from 9th to 12th grade.
          We use student based learning system to make our students creative and help them to
          develop their skills. Long time experience of teaching make our teachers special.
          Our mission is to develop intellectual,ethical,creativity foundation on our students 
          to create community  for better world.
        </p>
        <a href="homepage/about.php"><button class="button">Read more</button></a>
      </div>
    </div>

    <h1 class="news-h1">Latest News</h1>
    <div class="news-container">
      <div class="news">
        <div class="image"><img  src="images/img2.avif"  alt="news image "></div>
        <div class="text">
          <h3>Supporting Local Community</h3>
            TDPSchool School's student council launches a
            community outreach program aimed at supporting local
            families in need. Students organize donation drives and
            volunteer efforts to make a positive impact on the
            community, demonstrating the school's commitment to
            social responsibility.
        </div>
      </div>
      <div class="news">
        <div class="image"><img  src="images/img4.avif" alt="news image2 "  ></div>
        <div class="text">
          <h3>Students Showcase</h3>Students from the science club at TDPS School
          showcase their brilliance at the regional science fair.
          Their projects, ranging from robotics to environmental
          studies, earn top honors. The school is proud of its
          budding scientists and their dedication to exploring the
          wonders of science.
        </div>
      </div>
      <div class="news">
        <div class="image"><img  src="images/img3.avif" alt="news image3" ></div>
        <div class="text">
          <h3>Academic Year Announcement</h3>
          We are excited to announce that the new academic year registration for Tullu Dimtu Primary School will soon open!  
          Parents and guardians can register their children for Grades 1 to 4 through our registration portal.  
          Please make sure to review the required documents before registration.  
          You can access the registration form and further information using the following link:<br><br>
          Website: <a href="https://tdpschool.et/register">https://tdpschool.et/register</a>
        </div>
      </div>
    </div>

    <div class="map-section" style="margin-top: 50px; text-align: center;">
      <h2 style="margin-bottom: 10px;">Our Location</h2>
      <div class="map-container" style="display: flex; justify-content: center; align-items: center;">
        <div id="map" style="width: 70%; height: 400px; border-radius: 12px; box-shadow: 0 0 10px rgba(0,0,0,0.1);"></div>
      </div>
    </div>
    <!-- Login and Video Section -->
    <div class="login_video">
      <div class="login">
        <form id="signInForm">
          <legend>
            <h2>Get Started</h2>
            <hr>
          </legend>
          <h4>TDPS</h4>
          <div>
            <label for="email">Email Address*</label><br>
            <input name="email" placeholder="Email" type="email" id="email" required>
          </div>
          <div>
            <label for="password">Password*</label><br>
            <input name="password" placeholder="Password" type="password" id="password" minlength="6" maxlength="9" required>
          </div>
          <button type="button" class="btn" onclick="authorize()"><a href="login.php"> Sign In</a></button>
          <p>Don't have an account? <a href="login.php">| Sign Up</a></p>
        </form>
      </div>
      <div class="video">
        <video src="videos/Community Schools Animation Video.mp4"  alt="more about us" autoplay muted controls></video>
      </div>
    </div>
    
  </main>

  <?php include ('indu/footer.php') ?>

  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
  var map = L.map('map').setView([8.944992, 38.818742], 16); // Tullu Dimtu Square near AASTU

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  var marker = L.marker([8.944992, 38.818742]).addTo(map);
  marker.bindPopup("<b>Tullu Dimtu Square</b><br>Near AASTU, Addis Ababa").openPopup();
</script>
  <script src="homepage/js/homepage.js"></script>
  <script src="homepage/js/home.js"></script>
</body>
</html>
