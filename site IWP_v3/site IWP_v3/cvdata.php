<?php
    session_start();
    $databasename="account";
    $database_connection=mysqli_connect("localhost" , "root" , "" , "account");

    if (!$database_connection) {
        echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
    }
    echo "Successfully connected to database: $databasename";
    session_regenerate_id(true);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['image'] = $_POST['image'];
        $_SESSION['designation'] = $_POST['designation'];
        $_SESSION['address'] = $_POST['address'];
        $_SESSION['phoneno'] = $_POST['phoneno'];
        $_SESSION['summary'] = $_POST['summary'];

        $_SESSION['group-a'] = $_POST['group-a'];
        $_SESSION['group-b'] = $_POST['group-b'];
        $_SESSION['group-c'] = $_POST['group-c'];
        $_SESSION['group-d'] = $_POST['group-d'];
        $_SESSION['group-e'] = $_POST['group-e'];

        $achievements = $_SESSION['group-a'];
        foreach ($achievements as $achievement) {
            $achieve_title = $achievement['achieve_title'];
            $achieve_description = $achievement['achieve_description'];
        }

        $experiences = $_SESSION['group-b'];
        foreach ($experiences as $experience) {
            $exp_title = $experience['exp_title'];
            $exp_organization = $experience['exp_organization'];
            $exp_location = $experience['exp_location'];
            $exp_start_date = $experience['exp_start_date'];
            $exp_end_date = $experience['exp_end_date'];
            $exp_description = $experience['exp_description'];
        }

        $educations = $_SESSION['group-c'];
        foreach ($educations as $education) {
            $edu_school = $education['edu_school'];
            $edu_degree = $education['edu_degree'];
            $edu_city = $education['edu_city'];
            $edu_start_date = $education['edu_start_date'];
            $edu_graduation_date = $education['edu_graduation_date'];
            $edu_description = $education['edu_description'];
        }

        $projects = $_SESSION['group-d'];
        foreach ($projects as $project) {
            $proj_title = $project['proj_title'];
            $proj_link = $project['proj_link'];
            $proj_description = $project['proj_description'];
        }

        $skills = $_SESSION['group-e'];
        foreach ($skills as $skill) {
            $skill_name = $skill['skill'];
        }
    }

    $database_query="INSERT INTO account.cvdata (id , username , image , designation , address , phoneno , summary , achieve_title , achieve_description , exp_title , exp_organization , exp_location , exp_start_date , exp_end_date , exp_description , edu_school , edu_degree , edu_city , edu_start_date , edu_graduation_date , edu_description , proj_title , proj_link , proj_description , skill) VALUES ( NULL , '$_SESSION[username]' , '$_POST[image]' , '$_POST[designation]' , '$_POST[address]' , '$_POST[phoneno]' , '$_POST[summary]' , '$achieve_title' , '$achieve_description' , '$exp_title' , '$exp_organization' , '$exp_location' , '$exp_start_date' , '$exp_end_date' , '$exp_description' , '$edu_school' , '$edu_degree' , '$edu_city' , '$edu_start_date' , '$edu_graduation_date' , '$edu_description' , '$proj_title' , '$proj_link' , '$proj_description' , '$skill_name' )";
    mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

    $_SESSION['achieve_title']=$achieve_title;    
    $_SESSION['achieve_description']=$achieve_description;
    $_SESSION['exp_title']=$exp_title;
    $_SESSION['exp_organization']=$exp_organization;
    $_SESSION['exp_location']=$exp_location;
    $_SESSION['exp_start_date']=$exp_start_date;
    $_SESSION['exp_end_date']=$exp_end_date;    
    $_SESSION['exp_description']=$exp_description;
    $_SESSION['edu_school']=$edu_school;
    $_SESSION['edu_degree']=$edu_degree;
    $_SESSION['edu_city']=$edu_city;
    $_SESSION['edu_start_date']=$edu_start_date;
    $_SESSION['edu_graduation_date']=$edu_graduation_date;
    $_SESSION['edu_description']=$edu_description;
    $_SESSION['proj_title']=$proj_title;
    $_SESSION['proj_link']=$proj_link;
    $_SESSION['proj_description']=$proj_description;
    $_SESSION['skill']=$skill_name;

    header("Location: template1.php");
    exit();
    mysqli_close($database_connection);
?>
