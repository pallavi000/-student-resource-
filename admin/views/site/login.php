
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <title><?php echo $title; ?></title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/matrix-login.css"/>
    <link href="<?php echo PUBLIC_PATH; ?>font-awesome/css/font-awesome.css" rel="stylesheet"/>
<!--    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>-->

</head>
<style>
    .remember_me {
        padding: 5px;
        margin-left: 33px;
        margin-top: 20px;
    }

    .remember_me > input[type = "checkbox"] {
        /* Double-sized Checkboxes */
        -ms-transform: scale(1.5); /* IE */
        -moz-transform: scale(1.5); /* FF */
        -webkit-transform: scale(1.5); /* Safari and Chrome */
        -o-transform: scale(1.5); /* Opera */
        margin-top: 0px;

    }

    .remember_me > .label {
        margin-left: 10px;
    }



</style>
<body>

<div id="loginbox">

    <div style="float: left; color: white">  <?php echo date("Y M D"); ?></div>
    <div id="time" style="float: right; color: white"></div>
    .
    <script>
        var time = document.getElementById('time');
        time.innerHTML = '<?php echo date("H:m:s"); ?>';
    </script>
    <form id="loginform" class="form-vertical" action="" method="post">
        <div class=" normal_text" style="<?php echo isset($error)?'color: #16FFA9':'color:white'?>">
            <?php echo isset($error)?$error:'Welcome';?> <h3>Salar Gyan</h3>

        </div>

        <div class="control-group">

            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                    <input type="text" placeholder="Enter username" name="user_name" required="ram"/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                    <input type="password" name="password" placeholder="Enter password"/>
                </div>
            </div>

        </div>
        <div class="form-actions">

                    <span>
                       <center> <button type="submit" name="login" class="btn btn-success"/> Login</button></center>
                    </span>
        </div>
    </form>

</div>

<script src="<?php echo PUBLIC_PATH; ?>js/jquery.min.js"></script>
<script src="<?php echo PUBLIC_PATH; ?>js/matrix.login.js"></script>
</body>

</html>
