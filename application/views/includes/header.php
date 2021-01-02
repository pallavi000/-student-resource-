<!DOCTYPE html>
<html>
<head lang="en">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179632981-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-179632981-1');
    </script>

    <meta charset="UTF-8">
    <title><?php echo isset($title) ? $title : ''; ?></title>
    <meta name="keywords" content="<?php echo isset($seo_title)?$seo_title:'' ?>">
    <meta name="description" content="<?php  echo isset($seo_description)?$seo_description:''; ?>">
    <meta name="robots" content="index, follow"/>
    <link rel="icon" href="<?php echo PUBLIC_PATH; ?>img/icon.png" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo PUBLIC_PATH; ?>img/icon.png" type="image/x-icon"/>


    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH; ?>font-awesome/css/font-awesome.min.css"/>
    <!--<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>-->

    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH; ?>css/responsive.css"/>
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/style.css"/>
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/pagination.css"/>
    <link rel="stylesheet" href="<?php echo LIBRARY_PATH; ?>highlight/styles/atom-one-light.css">


    <meta property="og:title"
          content="<?php echo isset($share_title)?$share_title:'Learn, Explore & Be a Pro.'; ?>"/>
    <meta property="og:site_name" content="Tutorial's Center Point"/>
    <meta property="og:url" content="<?php echo isset($share_url)?$share_url:''; ?>"/>
    <meta property="og:description" content="<?php echo isset($share_description)?$share_description:''; ?>"/>
    <meta property="og:type" content="Web Site"/>
    <meta property="og:image" content="<?php echo isset($share_image)?$share_image:''; ?>"/>
</head>
<body id="index">

<div id="loader">
    <hr/>
</div>

<header>
    <section class="header-top">
        <div class="container">
            <div class="row">
                <nav class="top-login-register pull-left">
                    <ul hidden="">
                        <li><a href=""><i class="fa fa-sign-in"></i> Register</a></li>
                        <li><a href=""><i class="fa fa-lock"></i> Login</a></li>
                    </ul>
                </nav>
                <!--top-login-register-->

                <nav class="top-aboutus-contactus pull-right">
                    <ul>
                        <li><a href="<?php echo LINK_URL ?>news/index"
                               title="News: IT, Technological and educational related."><i
                                        class="fa fa-question-circle"></i> News Article</a></li>
                        <li><a href="<?php echo LINK_URL ?>site/contactus"><i class="fa fa-envelope"></i> Contact Us</a>
                        </li>
                    </ul>
                </nav>
                <!--top-aboutus-contactus-->

            </div>
            <!--row-->
        </div>
        <!--container-->
    </section>
    <!--header-top-->
    <div class="header-main">

        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="<?php echo MAIN_URL ?>"><img src="<?php echo PUBLIC_PATH; ?>img/logo.png" height="50px"
                                                          width="100px"/></a>
                </div>
                <!--navbar-header-->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-left">
                        <li class="active"><a href="<?php echo LINK_URL; ?>site/index"><i class="fa fa-home"></i> Home
                                <span
                                        class="sr-only">(current)</span></a></li>


                        <li><a href="<?php echo LINK_URL; ?>category/index"><i class="fa fa-briefcase"></i> Tutorials
                            </a></li>


                    </ul>
                    <!--nav-->
                    <form class="navbar-form navbar-right" action="<?php echo LINK_URL ?>site/search" method="post">
                        <div class="form-group">
                            <input name="search" value="" type="hidden">
                            <input type="text" name="search_key" required="required" class="form-control"
                                   placeholder="Enter key to search">
                        </div>
                        <button type="submit" name="btn_search" class="btn btn-default">Search</button>
                    </form>

                </div>
                <!--collapse-->
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

    </div>
    <!--header-main-->
</header>
<!--header-->
