<?php
require __DIR__ . "/mailer.php";
$errors = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"])) {
        $name = $_POST["name"];
        $userEmail = $_POST["email"];
        $message = $_POST["message"];
        if (empty($name)) {
            $errors .= "Name is required.";
        }
        if (empty($userEmail)) {
            $errors .= "Email is required.";
        } elseif (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            $errors .= "Invalid email format.";
        }
        if (empty($message)) {
            $errors .= "Message is required.";
        }
        if (empty($errors)) {
            try {
                $mail = require __DIR__ . "/mailer.php";
                $mail->setFrom($userEmail, $name);
                $mail->addAddress('trebeshinahoney@gmail.com', 'Admin');
                $mail->addReplyTo($userEmail, $name);
                $mail->Subject = 'Contact Form Message';
                $mail->Body    = $message;

                if ($mail->send()) {
                    header("Location: ../sent");
                    exit; 
                } else {
                    $errors .= "Mailer Error: " . $mail->ErrorInfo;
                }
            } catch (Exception $e) {
                $errors .= "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    } else {
        $errors .= "Required fields are missing.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakti | Trebeshina Honey</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="../images/logo3.png">
    <link rel="stylesheet" href="../style-homepage.css">
    <style>
        .starti-foto1 h1{
            font-size: clamp(1.5rem, 2.5vw, 3rem);
            margin: 20px 0;
            text-align: center;
        }
        .starti-foto1 p{
            font-size: clamp(0.5rem, 2.5vw, 1.5rem);
            text-align: center;
        }
        .kontakt-bosh{
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="qender">
    <div class="navbar">
        <div class="logo">
            <a href="../"> <img src="../images/d-world_language_logo-removebg-preview.png" alt="logo" class="imazh-logo"></a>
        </div>
        <div class="nav">
            <div class="kontakt">
                <div class="cel">
                    <p><i class="fas fa-phone"></i>+355699953697</p>
                    <p><i class="fas fa-envelope"></i> <span>trebeshinahoney@gmail.com</span></p>
                </div>
                <div class="social">
                    <a href="https://www.instagram.com/trebeshina_honey?utm_source=qr&igsh=MXNyc2lhcnEybHRuYQ==" target="_blank"><i class="fab fa-instagram" style="color:black"></i></a>
                    <a href="https://wa.me/+355699953697" target="_blank"><i class="fab fa-whatsapp" style="color:black"></i></a>
                </div>
            </div>
            <ul class="nav-menu">
                <li><a href="../historia"><b>HISTORIA JONE</b></a></li>
                <li><a href="../produkte"><b>PRODUKTET</b></a></li>
                <li><a href="../galeria"><b>GALERIA</b></a></li>
                <li><a href="../kontakti"><b>KONTAKTI</b></a></li>
                <hr class="vije">
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class=" bar"></span>
            </div>
        </div>
        <div class="boshlek"></div>
    </div>
    <script>
const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");
const kontakt = document.querySelector(".kontakt");
function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
    kontakt.classList.toggle("active");
}
function closeMenu(event) {
    if (!hamburger.contains(event.target) && !navMenu.contains(event.target)) {
        if (navMenu.classList.contains("active")) {
            hamburger.classList.remove("active");
            navMenu.classList.remove("active");
            kontakt.classList.remove("active");
        }
    }
}
hamburger.addEventListener("click", mobileMenu);
document.addEventListener("click", closeMenu);
document.addEventListener("touchstart", closeMenu);
document.addEventListener("scroll",closeMenu);
    </script>
   <div class="starti-foto1">
    <h1>KONTAKTI</h1>
    <p style="margin-top:-20px;">*Pergjigjemi ne te gjitha mesazhet tuaj</p>
   </div>
   <script>
    function resizeContent() {
        const fillimi = document.querySelector('.starti-foto1');
        const heading = fillimi.querySelector('h1');
        const paragraph = fillimi.querySelector('p');
        if(window.matchMedia('(max-width: 2500px)').matches){    
            const baseFontSize = Math.max(window.innerWidth * 0.02, 23);
            const headingFontSize = baseFontSize * 1.1;
            const paragraphFontSize = baseFontSize * 0.5;

            heading.style.fontSize = `${headingFontSize}px`;
            paragraph.style.fontSize = `${paragraphFontSize}px`;
        }else{
            heading.style.fontSize = `55px`;
            paragraph.style.fontSize = `25px`;
        }
    }
window.addEventListener('resize', resizeContent);
window.addEventListener('load', resizeContent);
function adjustViewportHeight() {
            const container = document.querySelector('.starti-foto1');
            const stableHeight = document.documentElement.clientHeight;
            if(window.matchMedia('(min-width: 850px)').matches){
                container.style.height = `${stableHeight - 110}px`;
            }else{
                container.style.height = `${stableHeight - 85}px`;
            }
        }
        adjustViewportHeight();
        window.addEventListener('resize', adjustViewportHeight);
   </script>
   <form class="kontakti" action="" method="post">
    <p class="lajm-kontakt">Fushat me kete shenje (*) jane te detyrueshme</p>
    <div class="emri5">
        <div class="input_wrap">
        <input type="text" id="emri" name="name" required>
        <label for="emri">Emri/Mbiemri*</label>
        </div>
        <div class="input_wrap">
        <input type="text" id="email" name="email" required>
        <label for="email">Email*</label>
        </div>
    </div>
    <textarea style="resize:none; padding:10px;border: 2px solid #afbdcf;border-radius: 5px; font-size: 16px;"
    rows="10" column="80" placeholder="Mesazhi yt" name="message"></textarea>
    <?php if (isset($errors)): ?>
        <span class="error" style="margin-top:-15px;margin-left:5px;"><?php echo htmlspecialchars($errors); ?></span>
    <?php endif; ?>
    <div class="kontakt2">
        <div class="rreshti-kontakt">
        <p><img src="../images/phone-icon-removebg-preview.png" alt="phone-icon">+355699953697</p>
        <p style="top:-2px"><img src="../images/018416a708cc44b0a2a89bfc92e2dbad_t-removebg-preview.png" alt="mail-icon">trebeshinahoney@gmail.com</p>
        </div>
        <button  class="send-btn" name="send">DERGO</button>
   </div>
</form>
<div class="kontakt-bosh"></div>
<script>
 document.addEventListener("DOMContentLoaded", function () {
    const isFirefox = navigator.userAgent.toLowerCase().includes("firefox");
    const kontaktBosh = document.querySelector(".kontakt-bosh");
    console.log(navigator.userAgent);
    function adjustHeight() {
        if (window.matchMedia('(max-width: 836px)').matches) {
            if (isFirefox) {
                kontaktBosh.style.height = "75px"; 
            } else {
                kontaktBosh.style.height = "0px"; 
            }
        } else {
            kontaktBosh.style.height = "0px";
        }
    }    
    adjustHeight();    
    window.addEventListener('resize', adjustHeight);
});
</script>
    <script>
        function reveal() {
            var reveals = document.querySelectorAll(".reveal");
            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 100;
                if (elementTop < windowHeight - elementVisible) {
                    reveals[i].classList.add("active");
                }
                else {
                    reveals[i].classList.remove("active");
                }
            }
        }
        window.addEventListener("DOMContentLoaded", reveal);
        window.addEventListener("scroll", reveal);
        window.addEventListener("resize", reveal);
        window.addEventListener("orientationchange", function() {
            setTimeout(reveal, 10);
        });
    </script>
    <div class="fundi1">
        <h5>FERMA TREBESHINA,<br>PODGORANE-FUSHE, SUKE<br>PERMET, SHQIPERI</h5>
        <img src="../images/d-world_language_logo-removebg-preview.png" alt="logo" class="logo-fundi">
        <h5>TEL: +355699953697<br>EMAIL: trebeshinahoney@gmail.com</h5>
    </div>
    <button class="scroll-to-top" onclick="scrollToTop()"> &#8593;</button>
    <div class="fundi2">
        <img src="../images/natural.jpeg" alt="natural" class="imazh-natural">
        <div class="rregulla">
            <ul>
                <li><a href="../rregulla#pagesat"><b>PAGESAT</b></a></li>
                <li><a href="../rregulla#transporti"><b>TRANSPORT</b></a></li>
                <li><a href="../rregulla#rikthimi"><b>RIKTHIMI</b></a></li>
            </ul>
        </div>
    </div>
    <hr class="vija-fundit">
    <div class="fundi3">
        <p class="copyright">COPYRIGHT © <span id="year"></span> | All right reserved Ferma Trebeshina </p>
    </div>
    <script>
        const currentYear = new Date().getFullYear();
        document.getElementById('year').textContent = currentYear;
    </script>
</div>
    <script>
        window.onscroll = function() {
            var scrollButton = document.querySelector('.scroll-to-top');
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                scrollButton.style.display = 'block';
            } else {
                scrollButton.style.display = 'none';
            }
        };
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
</body>
</html>