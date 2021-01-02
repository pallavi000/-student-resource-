<?php


//starting session
session_start();
//date_default_timezone_set("Asia/Kathmandu");
//Define root path
define("ROOT", dirname(__FILE__));




//defining separator
define("DS", DIRECTORY_SEPARATOR);

//define main url address
define("MAIN_URL", "/tcp/");

//Defining link url address
define("LINK_URL", MAIN_URL."index.php?url=");
//define("LINK_URL", MAIN_URL);

include "config/frontend.php";

