<?php
session_start();
$databasename="account";
$database_connection=mysqli_connect("localhost" , "root" , "" , "account");

if (!$database_connection) {
	echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
}
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
        <section id = "about-sc" class = "">
            <div class = "container">
                <div class = "about-cnt">
                    <form action="cvdata.php" class="cv-form" id = "cv-form" method="post">
                        <div class = "cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>about section</h3>
                            </div>
                            <div class = "cv-form-row cv-form-row-about">
                                <div class = "cols-3">
                                    <div class = "form-elem">
                                        <label for = "firstname" class = "form-label">First Name</label>
                                        <input name = "firstname" type = "text" class = "form-control firstname" id = "" onkeyup="generateCV()" placeholder="e.g. John" value="<?php echo $_SESSION['firstname']; ?>">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "middlename" class = "form-label">Middle Name <span class = "opt-text">(optional)</span></label>
                                        <input name = "middlename" type = "text" class = "form-control middlename" id = "" onkeyup="generateCV()" placeholder="e.g. Herbert" value="<?php echo $_SESSION['middlename']; ?>">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "lastname" class = "form-label">Last Name</label>
                                        <input name = "lastname" type = "text" class = "form-control lastname" id = "" onkeyup="generateCV()" placeholder="e.g. Doe" value="<?php echo $_SESSION['lastname']; ?>">
                                        <span class="form-text"></span>
                                    </div>
                                </div>

                                <div class="cols-3">
                                    <div class = "form-elem">
                                        <label for = "image" class = "form-label">Your Image</label>
                                        <input name = "image" type = "file" class = "form-control image" id = "" accept = "image/*" onchange="previewImage()" value="<?php echo $_SESSION['image']; ?>">
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Designation</label>
                                        <input name = "designation" type = "text" class = "form-control designation" id = "" onkeyup="generateCV()" placeholder="e.g. Sr.Accountants" value="<?php echo $_SESSION['designation']; ?>">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Address</label>
                                        <input name = "address" type = "text" class = "form-control address" id = "" onkeyup="generateCV()" placeholder="e.g. Lake Street-23" value="<?php echo $_SESSION['address']; ?>">
                                        <span class="form-text"></span>
                                    </div>
                                </div>

                                <div class = "cols-3">
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Email</label>
                                        <input name = "email" type = "text" class = "form-control email" id = "" onkeyup="generateCV()" placeholder="e.g. johndoe@gmail.com" value="<?php echo $_SESSION['email']; ?>">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Phone No:</label>
                                        <input name = "phoneno" type = "tel" class = "form-control phoneno" id = "" onkeyup="generateCV()" placeholder="e.g. 456-768-798, 567.654.002" value="<?php echo $_SESSION['phoneno']; ?>">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class = "form-elem">
                                        <label for = "" class = "form-label">Summary</label>
                                        <input name = "summary" type = "text" class = "form-control summary" id = "" onkeyup="generateCV()" placeholder="e.g. Doe" value="<?php echo $_SESSION['summary']; ?>">
                                        <span class="form-text"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>achievements</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-a">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-achievement">
                                            <div class = "cols-2">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Title</label>
                                                    <input name = "achieve_title" type = "text" class = "form-control achieve_title" id = "" onkeyup="generateCV()" placeholder="e.g. johndoe@gmail.com" value="<?php echo $_SESSION['achieve_title']; ?>">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <input name = "achieve_description" type = "text" class = "form-control achieve_description" id = "" onkeyup="generateCV()" placeholder="e.g. johndoe@gmail.com" value="<?php echo $_SESSION['achieve_description']; ?>">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>experience</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-b">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-experience">
                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Title</label>
                                                    <input name = "exp_title" type = "text" class = "form-control exp_title" id = "" onkeyup="generateCV()" value="<?php echo $_SESSION['exp_title']; ?>">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Company / Organization</label>
                                                    <input name = "exp_organization" type = "text" class = "form-control exp_organization" id = "" onkeyup="generateCV()" value="<?php echo $_SESSION['exp_organization']; ?>">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Location</label>
                                                    <input name = "exp_location" type = "text" class = "form-control exp_location" id = "" onkeyup="generateCV()" value="<?php echo $_SESSION['exp_location']; ?>">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Start Date</label>
                                                    <input name = "exp_start_date" type = "date" class = "form-control exp_start_date" id = "" onkeyup="generateCV()" value="<?php echo $_SESSION['exp_start_date']; ?>">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">End Date</label>
                                                    <input name = "exp_end_date" type = "date" class = "form-control exp_end_date" id = "" onkeyup="generateCV()" value="<?php echo $_SESSION['exp_end_date']; ?>">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <input name = "exp_description" type = "text" class = "form-control exp_description" id = "" onkeyup="generateCV()" value="<?php echo $_SESSION['exp_description']; ?>">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>education</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-c">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-experience">
                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">School</label>
                                                    <input name = "edu_school" type = "text" class = "form-control edu_school" id = "" onkeyup="generateCV()" value="<?php echo $_SESSION['edu_school']; ?>">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Degree</label>
                                                    <input name = "edu_degree" type = "text" class = "form-control edu_degree" id = "" onkeyup="generateCV()" value="<?php echo $_SESSION['edu_degree']; ?>">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">City</label>
                                                    <input name = "edu_city" type = "text" class = "form-control edu_city" id = "" onkeyup="generateCV()" value="<?php echo $_SESSION['edu_city']; ?>">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Start Date</label>
                                                    <input name = "edu_start_date" type = "date" class = "form-control edu_start_date" id = "" onkeyup="generateCV()" value="<?php echo $_SESSION['edu_start_date']; ?>">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">End Date</label>
                                                    <input name = "edu_graduation_date" type = "date" class = "form-control edu_graduation_date" id = "" onkeyup="generateCV()" value="<?php echo $_SESSION['edu_graduation_date']; ?>">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <input name = "edu_description" type = "text" class = "form-control edu_description" id = "" onkeyup="generateCV()" value="<?php echo $_SESSION['edu_description']; ?>">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>projects</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-d">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-experience">
                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Project Name</label>
                                                    <input name = "proj_title" type = "text" class = "form-control proj_title" id = "" onkeyup="generateCV()" value="<?php echo $_SESSION['proj_title']; ?>">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Project link</label>
                                                    <input name = "proj_link" type = "text" class = "form-control proj_link" id = "" onkeyup="generateCV()" value="<?php echo $_SESSION['proj_link']; ?>">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <input name = "proj_description" type = "text" class = "form-control proj_description" id = "" onkeyup="generateCV()" value="<?php echo $_SESSION['proj_description']; ?>">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>skills</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-e">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-skills">
                                            <div class = "form-elem">
                                                <label for = "" class = "form-label">Skill</label>
                                                <input name = "skill" type = "text" class = "form-control skill" id = "" onkeyup="generateCV()" value="<?php echo $_SESSION['skill']; ?>">
                                                <span class="form-text"></span>
                                            </div>

                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>
                        <input type="submit" class="print btn btn-primary" value="Save">
                    </form>
                </div>
            </div>
        </section>

        <section id = "preview-sc" class = "print_area">
            <div class = "container">
                <div class = "preview-cnt">
                    <div class = "preview-cnt-l bg-purple text-white">
                        <div class = "preview-blk">
                            <div class = "preview-image">
                                <img src = "" alt = "" id = "image_dsp"> 
                            </div>
                            <div class = "preview-item preview-item-name">
                                <span class = "preview-item-val fw-6" id = "fullname_dsp"></span>
                            </div>
                            <div class = "preview-item">
                                <span class = "preview-item-val text-uppercase fw-6 ls-1" id = "designation_dsp"></span>
                            </div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>about</h3>
                            </div>
                            <div class = "preview-blk-list">
                                <div class = "preview-item">
                                    <span class = "preview-item-val" id = "phoneno_dsp"></span>
                                </div>
                                <div class = "preview-item">
                                    <span class = "preview-item-val" id = "email_dsp"></span>
                                </div>
                                <div class = "preview-item">
                                    <span class = "preview-item-val" id = "address_dsp"></span>
                                </div>
                                <div class = "preview-item">
                                    <span class = "preview-item-val" id = "summary_dsp"></span>
                                </div>
                            </div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>skills</h3>
                            </div>
                            <div class = "skills-items preview-blk-list" id = "skills_dsp">

                            </div>
                        </div>
                    </div>

                    <div class = "preview-cnt-r bg-white">
                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>Achievements</h3>
                            </div>
                            <div class = "achievements-items preview-blk-list" id = "achievements_dsp"></div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>educations</h3>
                            </div>
                            <div class = "educations-items preview-blk-list" id = "educations_dsp"></div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>experiences</h3>
                            </div>
                            <div class = "experiences-items preview-blk-list" id = "experiences_dsp"></div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>projects</h3>
                            </div>
                            <div class = "projects-items preview-blk-list" id = "projects_dsp"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class = "print-btn-sc">
            <div class = "container">
                <button type = "button" class = "print-btn btn btn-primary" onclick="printCV()">Print CV</button>
            </div>
        </section>

        <footer class="footer bg-dark">
            <div class="container">
                <div class="footer-content text-center">
                    <p class="fs-15">&copy;Copyright 2024. All Rights Reserved - <span>build.resume</span></p>
                </div>
            </div>
        </footer>
        

        <!-- jquery cdn -->
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <!-- jquery repeater cdn -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js" integrity="sha512-bZAXvpVfp1+9AUHQzekEZaXclsgSlAeEnMJ6LfFAvjqYUVZfcuVXeQoN5LhD7Uw0Jy4NCY9q3kbdEXbwhZUmUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- custom js -->
        <script src = "js/script.js"></script>
        <!-- app js -->
        <script src="js/app.js"></script>
    </body>
</html>