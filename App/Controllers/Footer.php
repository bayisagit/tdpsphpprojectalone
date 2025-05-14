<?php
namespace App\Controllers;

class Footer {
    public static function render() {
        ?>
        <footer class="footer">
            <div class="top">
                <div class="left">
                    <p>TPSchool</p>
                    <div class="links">
                        <a href="../home.php">| Home</a>
                        <a href="announcement.php">| Announcement</a>
                        <a href="../home.php">| Resource</a>
                        <a href="about.php">| About Us</a>
                        <a href="about.php">| Services</a>
                    </div>
                </div>
                <div class="center">
                    <div class="i1">
                        <a href="https://www.google.com/maps?q=Tullu+Dimtu,+Addis+Ababa" target="_blank">
                            <i class="fa fa-map-marker"></i>
                        </a>
                        <p><span>Tullu Dimtu</span><br>Tullu Dimtu, Addis Ababa</p>
                    </div>
                    <div class="i2">
                        <p><i class="fa fa-phone"></i> +251 955185491</p>
                    </div>
                    <div class="i3">
                        <p><a href="mailto:Ggura2001@gmail.com"><i class="fa fa-envelope"></i> TDPSchool2001@gmail.com</a></p>
                    </div>
                </div>
                <div class="right">
                    <p class="follow_us"><span>Follow Us</span></p>
                    <div class="footer-icons">
                        <a href="https://www.facebook.com/" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-telegram"></a>
                        <a href="#" class="fa fa-linkedin"></a>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <p>TPSchool Primary School &copy; <?= date('Y'); ?></p>
            </div>
        </footer>
        <?php
    }
}
