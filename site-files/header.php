<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo isset($page_title) ? $page_title : 'RCS True Facilities Pvt Ltd'; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php if (isset($meta_keywords) && $meta_keywords): ?>
    <meta content="<?php echo htmlspecialchars($meta_keywords); ?>" name="keywords">
    <?php endif; ?>
    <?php if (isset($meta_description) && $meta_description): ?>
    <meta content="<?php echo htmlspecialchars($meta_description); ?>" name="description">
    <?php endif; ?>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="files/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="files/font-awesome.min.css" rel="stylesheet">
    <link href="files/animate.min.css" rel="stylesheet">
    <link href="files/ionicons.min.css" rel="stylesheet">
    <link href="files/owl.carousel.min.css" rel="stylesheet">
    <link href="files/lightbox.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="files/style.css" rel="stylesheet">

    <?php if (isset($canonical_url) && $canonical_url): ?>
    <link href="<?php echo htmlspecialchars($canonical_url); ?>" rel="canonical">
    <?php endif; ?>
</head>
<body>
    <!--==========================
      Header
    ============================-->
    <header id="header">
        <div id="topbar">
            <div class="container">
                <div class="social-links"></div>
            </div>
        </div>

        <div class="container">
            <div class="logo float-left">
                <a class="scrollto" href="index.php"><img alt="RCS True Facilities" class="img-fluid" src="img/rcslogo.png"></a>
            </div>

            <nav class="main-nav float-right d-none d-lg-block">
                <ul>
                    <li <?php if (isset($active_page) && $active_page == 'home') echo 'class="active"'; ?>><a href="index.php">Home</a></li>
                    <li <?php if (isset($active_page) && $active_page == 'about') echo 'class="active"'; ?>><a href="about.php">About Us</a></li>
                    <li class="drop-down"><a href="#">Services</a>
                        <ul>
                            <li><a href="facility-management-services.php">Facility Management Services</a></li>
                            <li><a href="security-management-services.php">Security &amp; Safety Management</a></li>
                            <li><a href="retail-consultancy.php">Retail Consultancy Services</a></li>
                            <li><a href="marcomm.php">Marcom Solutions</a></li>
                        </ul>
                    </li>
                    <li><a href="#footer">Contact Us</a></li>
                </ul>
            </nav>
            <!-- .main-nav -->
        </div>
    </header>
    <!-- #header -->
