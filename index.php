<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Batuwatta Primary School</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/icons/logo.png">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/animations.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/responsive.css">
</head>
<body>
    <!-- --------- Navigation bar --------- -->
    <div class="nav-bar">
        
        <div class="logo row">
            <a href="#">
                <img class="logo" src="./assets/images/icons/logo.png">
            </a>
            <p>බටුවත්ත ප්‍රාථමික විද්‍යාලය</p>
        </div>
        
        <ul>
            <li class="current-page-nav"><a href="./index.html">Home</a></li>
            <li><a href="./about.html">About</a></li>
            <li><a href="https://drive.google.com/drive/folders/1yVyBoLf9xa8T9fjSCx1aiw_CJVjHWmbZ?usp=sharing">Downloads</a></li>
            <!-- <li><a href="./news.html">News</a></li> -->
        </ul>

        <div class="menu-btn">
            <div class="menu-btn_burger"></div>
        </div>


    </div>
    <!-- --------- End of Navigation bar --------- -->

    <!-- Scroll progress button -->
    <div id="scroll_progress" onclick="toTop()">
            <img src="./assets/images/icons/up.png" alt="up">
    </div>
    <!--  End of Scroll progress button -->

    <main>
        
        <div class="home-slider">
            <div class="slider-wrapper">
                <img src="./assets/images/home-slider/hero_background_1.jpg" alt="Slide 1" class="active">
                <img src="./assets/images/home-slider/hero_background_2.jpg" alt="Slide 2">
                <img src="./assets/images/home-slider/hero_background_3.jpg" alt="Slide 3">
                <img src="./assets/images/home-slider/hero_background_4.jpg" alt="Slide 4">
            </div>

            <div class="slider-container">
                <div class="home-title">
                    <h1>බටුවත්ත ප්‍රාථමික විද්‍යාලය</h1>
                    <div class="top-news">
                        <?php
                            require './php/connection.php';


                            $sqlQuery = "SELECT html_tag FROM general_contents WHERE visibility = 1 ";

                            $result = $conn->query($sqlQuery);

                            if ($result->num_rows > 0) {
                            
                                while($row = $result->fetch_assoc()) {
                                    echo  $row["html_tag"];
                                }
                            } else {
                                echo "<h1>දැයේ දරුවන්ගේ අනාගතය එළිය කරන්නට</h1>";
                            }
                            
                            $conn->close();
                        ?>



                        <!-- <h1>පළමු වසර සඳහා තෝරාගත් දරුවන්ගේ ලැයිස්තුව</h1>
                        <p>
                            මෙවර පළමු වසර සඳහා අප පාසල වෙත තෝරාගත් දරුවන්ගේ ලැයිස්තුව පහත ඇති සබැදියෙන් ලබා ගත හැක. පළමු වසර සඳහා අප පාසල වෙත තේරී පත් වූ සිසුන් වෙත අපගේ ශුභාශිංසනය පිරිනමන්නෙමු.
                        </p>
                        <a href="https://www.google.com/"><button>ලැයිස්තුව සඳහා 👈</button></a> -->
                    </div>
                </div>

                
                <div class="slider-controls">
                    <button class="prev-slide"><img src="./assets/images/icons/left-arrow.png" alt="left-arrow"></button>
                    <div class="slider-dots"></div>
                    <button class="next-slide"><img src="./assets/images/icons/right-arrow.png" alt="right-arrow"></button>
                </div>
            </div>
 
        </div>

        <section class="section-special-news page-section">
            <div class="container col">
                <h1>විශේෂ නිවේදන</h1>

                <div class="news-list row col-mobile">

                    <?php
                        require './php/connection.php';


                        $sqlQuery = "SELECT * FROM news_list WHERE visibility = 1";

                        $result = $conn->query($sqlQuery);

                        if ($result->num_rows > 0) {
                        
                            while($row = $result->fetch_assoc()) {
                                echo "<div class='news-card col'>";

                                        echo "<img src='./assets/images/news/".$row["img"]."' alt='' class='news-img'>";

                                        echo "<h2 class='news-title'>".$row["title"]."</h2>";
                                        
                                        echo 
                                        "
                                            <p class='news-description'>
                                                ".$row["description"]."
                                            </p>
                                        ";
                                echo "</div>";
                            }
                        } else {
                            echo "<h1>loading...</h1>";
                        }
                        
                        $conn->close();
                    ?>
                    <!-- <div class="news-card col">
                        <img src="./assets/images/news/news_1.JPG" alt="" class="news-img">

                        <h2 class="news-title">News Title</h2>

                        <p class="news-description">
                            News description. News description. News description.
                        </p>
                        <a href="" class="news-read-more-link">
                            Read more..
                        </a> 
                    </div> -->

                </div>
            </div>
        </section>

        <section class="section-special-events page-section">
            <div class="container col">
                <h1>විශේෂ අවස්ථා</h1>
                <div class="event-gallery row">
                    <?php
                        require './php/connection.php';

                        $sqlQuery = "SELECT * FROM gallery_list WHERE visibility = 1";

                        $result = $conn->query($sqlQuery);

                        if ($result->num_rows > 0) {
                        
                            while($row = $result->fetch_assoc()) {
                                echo "<div class='event-gallery-item'>";
                                        echo "<img src='./assets/images/events/".$row["img"]."' >";
                                echo "</div>";
                            }
                        } else {
                            echo "<h1>Loading...</h1>";
                        }
                        
                        $conn->close();
                    ?>
                    <!-- <div class="event-gallery-item">
                        <img src="./assets/images/events/event_01.JPG" alt="">
                    </div> -->
                </div>
            </div>
        </section>

        <section class="section-achievements">
            <div class="container col">
                <h1>සිසු ජයග්‍රහණ</h1>
                <div class="achievements-list row">

                    <?php
                        require './php/connection.php';


                        $sqlQuery = "SELECT * FROM achievements_list WHERE visibility = 1";

                        $result = $conn->query($sqlQuery);

                        if ($result->num_rows > 0) {
                        
                            while($row = $result->fetch_assoc()) {
                                echo "<div class='achievements-item col'>";
                                        echo "<img src='./assets/images/achievements/".$row["img"]."' alt=''>";

                                        echo " <h2>".$row["title"]."</h2>";
                                        
                                        echo 
                                        "
                                            <p>
                                            ".$row["description"]."
                                            </p>
                                        ";

                                echo "</div>";
                            }
                        } else {
                            echo "<h1>Loading...</h1>";
                        }
                        
                        $conn->close();
                    ?>
                    <!-- <div class="achievements-item col">
                        <img src="./assets/images/achievements/achievements_01.JPG" alt="">
                        <h2>Achievement A</h2>
                        <p>
                            Small description with few words.
                        </p>
                    </div> -->
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-elements">
            <div class="contact">
                <h2>අප සමග සම්බන්ධ වන්න</h2>
                <ul>
                    <li><h3>ලිපිනය</h3> <b>:</b> <p>බප/ මීග/ බටුවත්ත ප්‍රාථමික විද්‍යාලය, <br>බටුවත්ත - රාගම</p></li>
                    <li><h3>දු.ක.</h3> <b>:</b> <p>+94 11-2051403</p></li>
                    <li><h3>ඉ-තැපැල</h3> <b>:</b> <p>batuwattapv@gmail.com</p></li>
                </ul>
            </div>
            
            <div class="logo-title">
                <a href="#">
                    <img class="logo" src="./assets/images/icons/logo.png">
                </a>
                <h2>බප/මීග/ බටුවත්ත ප්‍රාථමික විද්‍යාලය</h2>
                <p>සුනාථ, ධාරේථ, චරාථ ධම්මෙ</p>
            </div>

            <div class="social-link col">
                <h2>Connect with us</h2>
                <ul class="links">
                    <li class="facebook"><a href="https://www.facebook.com/batuwattaprimaryschool/" target="_blank"></a></li>
                    <!-- <li class="instagram"><a href="https://www.instagram.com/" target="_blank"></a></li>
                    <li class="twitter"><a href="https://twitter.com/" target="_blank"></a></li>
                    <li class="linkedin"><a href="https://www.linkedin.com/" target="_blank"></a></li> -->
                    <li class="youtube"><a href="https://www.youtube.com/channel/UCEKs-Rgvuc8HXa1HWAb6X6w" target="_blank"></a></li>
                </ul>
            </div>
        </div>
        <div class="developer">
            <p>
                Made with ❤️ by <a href="https://raveenmalitha.me/">Raveen Malitha</a>
            </p>
        </div>
    </footer>

    <script src="./js/main.js"></script>
    <script src="./js/animations.js"></script>
</body>
</html>