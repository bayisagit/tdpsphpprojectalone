<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header class="header_n">
  <section class="header-title-line">
    <h1 class="logo_n">TDPSchool</h1>
    <button class="menu-button" onclick="toggleMenu()">
      <div class="menu-icon"><i class="fa fa-bars"></i></div>
      <div class="close-icon"><i class="fa fa-times"></i></div>
    </button>
  </section>
  
  <nav class="hero_nav">
    <?php $current_page = basename($_SERVER['PHP_SELF']); ?>
    <ul>
      <li><a href="home.php" class="<?= ($current_page == 'home.php') ? 'active' : '' ?>">Home</a></li>
      <li><a href="announcement.php" class="<?= ($current_page == 'announcement.php') ? 'active' : '' ?>">Announcement</a></li>
      <li><a href="about.php" class="<?= ($current_page == 'about.php') ? 'active' : '' ?>">About</a></li>

      <?php if (isset($_SESSION['user_type'])): ?>
        <?php
          $userType = $_SESSION['user_type'];
          switch ($userType) {
            case 'admin':
              $dashboardLink = '../adminpage/home.php';
              break;
            case 'teacher':
              $dashboardLink = '../teacherpage/home.php';
              break;
            case 'student':
              $dashboardLink = '../studentpage/home.php';
              break;
            case 'family':
              $dashboardLink = '../familypage/home.php';
              break;
            default:
              $dashboardLink = '#';
          }
        ?>
        <li><a href="<?= $dashboardLink ?>">Dashboard</a></li>
        <li><a href="../adminpage/partials/logout.php">Logout</a></li>
      <?php else: ?>
        <li><a href="login.php" class="<?= ($current_page == 'login.php') ? 'active' : '' ?>">Login</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>
