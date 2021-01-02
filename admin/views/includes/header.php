<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>
    <meta charset="UTF-8"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/fullcalendar.css"/>
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/matrix-style.css"/>
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/matrix-media.css"/>
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/mystyle.css"/>
    <link href="<?php echo  PUBLIC_PATH; ?>font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/jquery.gritter.css"/>
    <!--<script src="<?php echo LIBRARY_PATH; ?>ckeditor/ckeditor.js"></script>-->
    <script src="https://cdn.ckeditor.com/<?php echo CKEDITOR_VERSION."/".CDEDITOR_DISTRIBUTION; ?>/ckeditor.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">


    <style>
        //Style for pagination
        div.pagination {
            padding: 3px;
            margin: 3px;
        }

        div.pagination a {
            padding: 2px 5px 2px 5px;
            margin: 2px;
            border: 1px solid #AAAADD;

            text-decoration: none; /* no underline */
            color: #000099;
        }
        div.pagination a:hover, div.pagination a:active {
            border: 1px solid #000099;

            color: #000;
        }
        div.pagination span.current {
            padding: 2px 5px 2px 5px;
            margin: 2px;
            border: 1px solid #000099;

            font-weight: bold;
            background-color: #000099;
            color: #FFF;
        }
        div.pagination span.disabled {
            padding: 2px 5px 2px 5px;
            margin: 2px;
            border: 1px solid #EEE;

            color: #DDD;
        }

    </style>
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="<?php echo LINK_URL; ?>site/index"></a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown"
                                                      data-target="#profile-messages" class="dropdown-toggle"><i
                    class="icon icon-user"></i> <span
                    class="text">Welcome <?php echo $_SESSION[SESSION_KEY]->user_name; ?></span><b
                    class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                <li class="divider"></li>
                <li><a href="#><i class=" icon-check"></i> My Tasks</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo LINK_URL . "site/logout"; ?>"><i class="icon-key"></i> Log Out</a></li>
            </ul>
        </li>

    </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
    <input type="text" placeholder="Search here..."/>
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="<?php echo LINK_URL . "site/index"; ?>" class="visible-phone"><i class="icon icon-home"></i>
        Dashboard</a>

    <ul>
        <?php
        $controller = Functions::getController();
        $rol = Functions::getRole($_SESSION[SESSION_KEY]->id);
        $role_arr = explode(", ", $rol->role);

        foreach ($role_arr as $row) {
                ?>

                <li class="<?php echo (CONTROLLER == $row) ? 'active' : ''; ?>"><a
                        href="<?php echo LINK_URL . $row . "/index"; ?>"><i class="icon icon-user"></i>
                        <span><?php echo ucwords($row." Management"); ?></span></a></li>
            <?php
        }


        ?>
        <hr/>


        <li class=""><a href="<?php echo MAIN_URL; ?>" target="_blank"><i class="icon icon-user"></i>
                <span><?php echo "Go To Website."; ?></span></a></li>
        <!-- <li class=" hidden <?php /*echo (CONTROLLER == "site")?'active':''; */ ?>"><a href="<?php /*echo LINK_URL."site/index";*/ ?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="<?php /*echo (CONTROLLER == "user")?'active':''; */ ?>"><a href="<?php /*echo LINK_URL."user/index";*/ ?>"><i class="icon icon-user"></i> <span>Users Management</span></a> </li>
        <li class="<?php /*echo (CONTROLLER == "category")?'active':''; */ ?>"><a href="<?php /*echo LINK_URL."category/index";*/ ?>"><i class="icon icon-user"></i> <span>Category Management</span></a> </li>
        <li class="<?php /*echo (CONTROLLER == "course")?'active':''; */ ?>"><a href="<?php /*echo LINK_URL."course/index";*/ ?>"><i class="icon icon-user"></i> <span>Course Management</span></a> </li>
        <li class="<?php /*echo (CONTROLLER == "career")?'active':''; */ ?>"><a href="<?php /*echo LINK_URL."course/index";*/ ?>"><i class="icon icon-user"></i> <span>Course Management</span></a> </li>
-->
    </ul>
</div>
<!--sidebar-menu-->