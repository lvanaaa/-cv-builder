<?php
    session_start();
    $databasename="account";
    $database_connection=mysqli_connect("localhost" , "root" , "" , "account");

    if (!$database_connection) {
    	echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
    }
    echo "Successfully connected to database: $databasename";
    session_regenerate_id(true);

	$database_query="INSERT INTO account.users (id,firstname,middlename,lastname,username,email,password) VALUES ( NULL , '$_POST[firstname]' , '$_POST[middlename]' , '$_POST[lastname]' , '$_POST[username]' , '$_POST[email]' , '$_POST[password]' )";
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

	$database_query="SELECT * FROM account.users WHERE username='$_POST[username]'";
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
 
    $database_query="INSERT INTO account.cvdata (id , username , image , designation , address , phoneno , summary , achieve_title , achieve_description , exp_title , exp_organization , exp_location , exp_start_date , exp_end_date , exp_description , edu_school , edu_degree , edu_city , edu_start_date , edu_graduation_date , edu_description , proj_title , proj_link , proj_description , skill) VALUES ( NULL , '$_SESSION[username]' , '' , '' , '' , '' , '' , '' , '' , '' , '' , '' , '' , '' , '' , '' , '' , '' , '' , '' , '' , '' , '' , '' , '' )";
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

    $_SESSION['image']="";
    $_SESSION['designation']="";
    $_SESSION['address']="";
    $_SESSION['phoneno']="";
    $_SESSION['summary']="";
    $_SESSION['achieve_title']="";    
    $_SESSION['achieve_description']="";
    $_SESSION['exp_title']="";
    $_SESSION['exp_organization']="";
    $_SESSION['exp_location']="";
    $_SESSION['exp_start_date']="";
    $_SESSION['exp_end_date']="";    
    $_SESSION['exp_description']="";
    $_SESSION['edu_school']="";
    $_SESSION['edu_degree']="";
    $_SESSION['edu_city']="";
    $_SESSION['edu_start_date']="";
    $_SESSION['edu_graduation_date']="";
    $_SESSION['edu_description']="";
    $_SESSION['proj_title']="";
    $_SESSION['proj_link']="";
    $_SESSION['proj_description']="";
    $_SESSION['skill']="";

	header("Location: indexin.php");
    exit();
	mysqli_close($database_connection);
?>