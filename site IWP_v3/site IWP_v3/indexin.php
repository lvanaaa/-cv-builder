<?php
session_start();
$databasename="account";
$database_connection=mysqli_connect("localhost" , "root" , "" , "account");

if (!$database_connection) {
	echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
}
echo "Successfully connected to database: $databasename";
session_regenerate_id(true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>   
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <script src="js/chatbot1.js" defer></script>
    <script src="js/chatbot2.js" defer></script>

</head>

<body>
    <nav class="navbar bg-white" id="navbar">
        <div class="container">
            <a href="indexin.php" class="navbar-brand">
                <img src="images/cv-icon-1725x2048-mk536z84.png" alt="" class="navbar-brand-icon">
                <span class="navbar-brand-text">build <span>resume.</span></span>
            </a>
            <ul class="navigation">
                <li><a href="templates.php">Templates</a></li>
                <li><a href="how.php">How to write a CV</a></li>
                <li><a href="logoutpage.php"><?php echo $_SESSION['username'] ?></a></li>
            </ul>
        </div>
    </nav>

    <header class="header bg-bright" id="header">
        <div class="container">
            <div class="header-content text-center">
                <h6 class="text-uppercase text-blue-dark fs-15 fw-6 ls-1">online resume builder</h6>
                <h1 class="lg-title">Only 2% of resumes make it pas the first round. Be in the top 2%</h1>
                <p class="text-dark fs-18">Use professional field-tested resume templates that follow that exact 'resume
                    rules' employers look for. Easy to use and done within minutes - try now for free!</p>
                <a href="templates.php" class="btn btn-primary text-uppercase">create my resume</a>
                <div class="header-item-icon">
                    <img src="images/Screenshot 2024-05-12 103308.png">
                </div>
            </div>
        </div>
    </header>
    <section class="templates py-8 bg-white">
        <div class="container">
            <div class="row section-title text-center mb-5">
                <div class="col-12">
                    <h2 class="display-6 text-blue fw-bold">Here are the Best Templates for you</h2>
                    <p class="text-grey fs-4 my-4 mx-auto">A great job application leads to a good interview. An amazing
                        resume is what makes it all possible.</p>
                </div>
            </div>
            <div class="row templates-list gy-5 gx-lg-5">
                <div class="templates-item position-relative col-lg-4">
                    <div class="template-item-img mx-auto me-lg-0 position-relative">
                        <img src="images/template1.png" alt="" class="img-fluid">
                        <a href="template1.php" class="btn btn-lg btn-primary position-absolute choose-template-btn">Select
                            Template</a>
                    </div>
                </div>

                <div class="templates-item position-relative col-lg-4">
                    <div class="template-item-img mx-auto ms-lg-0 position-relative">
                        <img src="images/template2.png" alt="" class="img-fluid">
                        <a href="template2.php"
                            class="btn btn-lg btn-primary position-absolute choose-template-btn">Select Template</a>
                    </div>
                </div>
                <div class="templates-item position-relative col-lg-4">
                    <div class="template-item-img mx-auto ms-lg-0 position-relative">
                        <img src="images/template3.png" alt="" class="img-fluid">
                        <a href="template3.php"
                            class="btn btn-lg btn-primary position-absolute choose-template-btn">Select Template</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section-two bg-bright">
        <div class="container">
            <div class="section-two-content">
                <div class="section-items">
                    <div class="section-item">
                        <div class="section-item-icon">
                            <img src="images/winner-6299743-5295065.png" alt="">
                        </div>
                        <h5 class="section-item-title">Make a resume that wins interviews!</h5>
                        <p class="text">Use our resume maker with its advanced creation tools to tell professional story
                            that engages recruiters, hiring managers and even CEOs.</p>
                    </div>

                    <div class="section-item">
                        <div class="section-item-icon">
                            <img src="images/IMG_5203.PNG" alt="">
                        </div>
                        <h5 class="section-item-title">Resume writing made easy!</h5>
                        <p class="text">Resume writing has never been this effortless. Pre-generated text, visual
                            designs and more - all already integrated into the resume maker. Just fill in your details.
                        </p>
                    </div>

                    <div class="section-item">
                        <div class="section-item-icon">
                            <img src="images/IMG_5204.PNG" alt="">
                        </div>
                        <h5 class="section-item-title">A recruiter-tested CV maker tool</h5>
                        <p class="text">Our resume builder and its pre-generated content are tested by recruiters and IT
                            experts. We help your CV become truly competitive in the hiring process.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="chatbot-toggle" onclick="toggleChatbot()">💬</button>
    <div class="container111">
        <div class="chat-header">
            <div class="logo-chat">
                <img src="images/bot.png">
            </div>
            <div class="title-chat">
                <p>Any questions?</p>
            </div>
        </div>
        <div class="chat-body"></div>
        <div class="chat-input">
            <div class="input-sec">
                <input type="text" id="textInput" placeholder="Type here" autofocus>
            </div>
            <div class="send">
                <img src="" alt="send">
            </div>
        </div>
    </div>

    <footer class="footer bg-dark">
        <div class="container">
            <div class="footer-content text-center">
                <p class="fs-15">&copy;Copyright 2024. All Rights Reserved - <span>build.resume</span></p>
            </div>
        </div>
    </footer>

</body>

</html>