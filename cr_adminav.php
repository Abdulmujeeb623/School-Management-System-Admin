<?php
session_start();

if (!isset($_SESSION['name'])) {
    header('Location: C_teach_login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Home - Crystalline Montessori Academy</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta
            content="Best Schools in Osogbo, Top Five Schools in Osogbo, Best School to Enroll My Child in Osogbo, Osogbo, Schools in Osogbo, Best Private School in Osogbo, Osun, Osun State"
            name="keywords">
        <meta
            content="Crystalline Montessori Academy is a private school that provides an individualized and enriching Montessori education for students in Osogbo. We nurture our students to develop their full potential and prepare them for success in the 21st century."
            name="description">

        <!-- Favicon -->
        <link href="logo.jpg" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap"
            rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="style.css" rel="stylesheet">
    </head>

    <body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <div style="width: 30%; float:left ;"><a href="cr_adm_dashboard.php">
                <img src="logo.jpg" width="30%-500px" class="px-2 py-2" >
            </a></div>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="cr_adm_dashboard.php" class="nav-item nav-link active">Home</a>
                    
                    
                    <a href="Appointment_list.php" class="nav-item nav-link">Appointment</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Users</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="C_user_form.php" class="dropdown-item">Create Users</a>
                            <a href="cr_editall.php" class="dropdown-item">Edit Users</a>
                            <a href="cr_editall.php" class="dropdown-item">Delete Users</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Result</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="Crystalline_result.php" class="dropdown-item">Create result</a>
                            <a href="cr_editall.php" class="dropdown-item">Edit result</a>
                            <a href="cr_editall.php" class="dropdown-item">Delete result</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="cr_createblog.php" class="dropdown-item">Create blog</a>
                            <a href="cr_edit_blog.php" class="dropdown-item">Edit blog</a>
                            <a href="cr_delete_blog.php" class="dropdown-item">Delete blog</a>
                        </div>
                    </div>
                    
                    <a href="Crystalline_blog.php" class="nav-item nav-link">Blog</a>
                    
                    
                    <a href="Crystalline_logout2.php" class="fa fa-user m-2 py-4 border-warning"> Log out</a>
                </div>
                <a href="Crystalline_result.php" class="btn btn-warning rounded-pill px-3 d-none d-lg-block">Upload result<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <!-- Navbar End -->

