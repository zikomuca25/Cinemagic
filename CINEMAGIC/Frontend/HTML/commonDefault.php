<?php

class common {
    //NDRYSHOVA HEADER
    public static function generateHeader() {
        echo '
        <div class="navbar">
            <form id="searchForm" action="search.php" method="get" style="vertical-align: middle;">
                <div id="logoDiv" onclick="gotoHome()">
                    <img src="../../images/logo.png" id="logo" />
                </div>
                <input type="text" name="userInput" id="userInput" placeholder="🔍 Search" style="width: 300px;">
                <button type="submit" id="searchButton">Search</button>
            </form>
           
            <!---Signin--->
            <a href="login.php" id="signIn">Sign in</a>
        </div>
        <div id="movieResults"></div>';
    }
    
    //SHTUAM KETE 
    public static function getDefaultNav()
    {
        $firstNav = '
          <nav id="navBarSeconfLine">

            <a href="./Movie.php" id="nav2MoviesTag">Movies</a>
            <a href="./Club.php" onclick="showAlert(event)">Club</a>
            <a href="./Event.php" onclick="showAlert(event)">Event</a>
            <a href="./BookYourMovie.php" onclick="showAlert(event)">Book Your Movie</a>
          </nav>
          
            <script>
            function showAlert(event) {
                event.preventDefault(); // Prevent the default anchor behavior
                alert("You have to be a user to access it");
            }
            </script>';
    
        return $firstNav;
    }

    
    public static function generateFirstNav()
    {
        $firstNav = '
          <nav id="navBarSeconfLine">
            <a href="./Movie.php" id="nav2MoviesTag">Movies</a>
            <a href="./Club.php">Club</a>
            <a href="./Event.php">Event</a>
            <a href="./history.php">Purchase history </a>
          </nav>';
    
        return $firstNav;
    }
    
    public static function generateFooter() 
    {
        $footer = '<!-- Footer -->
        <footer id="footer">
            <section class="container">
              <aside>
              <div class="privacyNote">
                <h4>Privacy Note</h4>
                <p>
                    By using www.bookmyshow.com(our website), you are fully accepting the Privacy Policy available at https://bookmyshow.com/privacy governing your access to Bookmyshow and 
                    provision of services by Bookmyshow to you. If you do not accept terms mentioned in the Privacy Policy, you must not share any of your personal information and immediately exit Bookmyshow.
                </p>
            </div>
              </aside>
        
        
              <main>
              <article class="contentList widthFooter">
                    <h4>Popular inquiries</h4>
                    <p>
                        <a href="careers.php">Careers</a>
                        |<br>
                        <a href="faq.php">FAQ</a>
                        |<br>
                    </p>
        </article>
        
                <article class="contentList widthFooter">
                    <h4>Exhibition</h4>
                    <p>
                        <a href="gallery.php">Gallery</a>
        
                    </p>
        </article>
        <article class="contentList widthFooter">
                    <h4>Cinema NEWS</h4>
                    <p>
                        <a href="contactUs.php">Contact Us</a>
                        |<br>
                        <a href="aboutUs.php">About Us</a>
                    </p>
        </article>
                
                <article class="contentList widthFooter">
                    <h4>HELP</h4>
                    <p>
                        <a href="terms.php">Terms and Conditions</a>
                        |<br>
                        <a href="privacyPolicy.php">Privacy Policy</a>
                    </p>
        </article>
              </main>
        </section>
        <section id="footerPara">
                <p>
                    Copyright 2024 © Tokita Entertainment Pvt. Ltd. All Rights Reserved.
                    The content and images used on this site are copyright protected and copyrights vests with the respective owners. The usage of the content and images on this website is intended to promote the works and no endorsement of the artist 
                    shall be implied. Unauthorized use is prohibited and punishable by law.
                </p>
        </section>
          
        </footer>';
        return $footer;
    }
    public static function generateMovie(){
$moviedetails='<div class="popup">
<div class="container">
    <div class="aside">
        <img src="image-placeholder.jpg" alt="Placeholder Image">
        <button class="button">Button</button>
    </div>
    <div class="main-content">
        <div class="title">
            <h1>Title</h1>
            <span class="close">&times;</span>
        </div>
        <div class="content">
            <div class="text">
                <p>Text</p>
                <p>Text</p>
                <p>Text</p>
                <p>Text</p>
            </div>
            <div class="additional-text">
                <textarea placeholder="Type more text here..."></textarea>
            </div>
        </div>
    </div>
</div>';
return $moviedetails;

    }
    public static function flickingImages()
    {
        $flickingImages = '
        <div class="js-flickity slidingImagesParentDiv" data-flickity-options=\'{ "wrapAround": true }\' data-flickity=\'{ "autoPlay": true }\'>
            <div class="slidingImages">
                <img src="https://in.bmscdn.com/promotions/cms/creatives/1634218468007_movieseternals_incinemas5thnovknowmore_webshowcase_1240x300.jpg" alt="">
            </div>
            <div class="slidingImages">
                <img src="https://in.bmscdn.com/promotions/cms/creatives/1635404166430_bollyboomdektop.jpg" alt="">
            </div>
            <div class="slidingImages">
                <img src="https://in.bmscdn.com/promotions/cms/creatives/1633590513692_moviemunchies_webshowcase_1240x300_7oct.jpg" alt="">
            </div>
            <div class="slidingImages">
                <img src="https://in.bmscdn.com/promotions/cms/creatives/1635405147427_indiadriveinhpdesktop.jpg" alt="">
            </div>
            <div class="slidingImages">
                <img src="https://in.bmscdn.com/promotions/cms/creatives/1633590513692_moviemunchies_webshowcase_1240x300_7oct.jpg" alt="">
            </div>
            <div class="slidingImages">
                <img src="https://in.bmscdn.com/promotions/cms/creatives/1635516222490_nft_webshowcase_1240x300.jpg" alt="">
            </div>
        </div>';
            
        return $flickingImages;
    }
}

?>

