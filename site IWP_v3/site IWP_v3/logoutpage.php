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
    <title>How to write a CV</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
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
    <div class="continut">
      <div class="forms-continut">
      <div class="signin-signup">
    <a href="logout.php">Log Out</a>
</div>
</div>
</div>
</body>