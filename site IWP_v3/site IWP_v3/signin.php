<?php
    session_start();
    $databasename="account";
    $database_connection=mysqli_connect("localhost" , "root" , "" , "account");

    if (!$database_connection) {
    	echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
    }
    echo "Successfully connected to database: $databasename";
    session_regenerate_id(true);

	$database_query="SELECT * FROM account.users WHERE username='$_POST[username]' AND password='$_POST[password]'";
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

	$query_result=mysqli_query($database_connection, $database_query);
	while ($line=mysqli_fetch_assoc($query_result)) {
        $_SESSION['id']=$line['id'];
        $_SESSION['firstname']=$line['firstname'];
        $_SESSION['middlename']=$line['middlename'];
        $_SESSION['lastname']=$line['lastname'];
        $_SESSION['username']=$line['username'];
        $_SESSION['email']=$line['email'];
    
    }

    $database_query="SELECT * FROM account.cvdata WHERE username='$_POST[username]'";
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

    $query_result=mysqli_query($database_connection, $database_query);
    while ($line=mysqli_fetch_assoc($query_result)) {
        $_SESSION['image']=$line['image'];
        $_SESSION['designation']=$line['designation'];
        $_SESSION['address']=$line['address'];
        $_SESSION['phoneno']=$line['phoneno'];
        $_SESSION['summary']=$line['summary'];
        $_SESSION['achieve_title']=$line['achieve_title'];    
        $_SESSION['achieve_description']=$line['achieve_description'];
        $_SESSION['exp_title']=$line['exp_title'];
        $_SESSION['exp_organization']=$line['exp_organization'];
        $_SESSION['exp_location']=$line['exp_location'];
        $_SESSION['exp_start_date']=$line['exp_start_date'];
        $_SESSION['exp_end_date']=$line['exp_end_date'];    
        $_SESSION['exp_description']=$line['exp_description'];
        $_SESSION['edu_school']=$line['edu_school'];
        $_SESSION['edu_degree']=$line['edu_degree'];
        $_SESSION['edu_city']=$line['edu_city'];
        $_SESSION['edu_start_date']=$line['edu_start_date'];
        $_SESSION['edu_graduation_date']=$line['edu_graduation_date'];
        $_SESSION['edu_description']=$line['edu_description'];
        $_SESSION['proj_title']=$line['proj_title'];
        $_SESSION['proj_link']=$line['proj_link'];
        $_SESSION['proj_description']=$line['proj_description'];
        $_SESSION['skill']=$line['skill'];
    }

    header("Location: indexin.php");
    exit();
    mysqli_close($database_connection);
?>