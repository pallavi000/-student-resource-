<!DOCTYPE html>
<html lang="en">
<head>
    <title>Session out!!</title>
    <meta http-equiv="refresh" content="1;url=<?php echo LINK_URL."site/logout";?>">
</head>
<body>
<!-- Progress bar holder -->
<div style="align:center;" id="progress" style="width:500px;border:1px solid #ccc;"></div>
<!-- Progress information -->
<div style="text-align:center;" id="information" style="width"></div>

<h1 style="margin:150px auto 130px auto; text-align:center;">You will redirect on the login page with in 10 second</h1>

<?php
// Total processes
$total = 10;
// Loop through process
for($i=1; $i<=$total; $i++){
    // Calculate the percentation
    $percent = intval($i/$total * 100)."%";

    // Javascript for updating the progress bar and information
    echo '<script language="javascript">
    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.'; background-color:#d9d9d9;\">&nbsp;</div>";
    document.getElementById("information").innerHTML="'.$i.' second.";
    </script>';
    // This is for the buffer achieve the minimum size in order to flush data
    echo str_repeat(' ',1024*64);
    // Send output to browser immediately
    flush();
    // Sleep one second so we can see the delay
    sleep(1);
}
// Tell user that the process is completed
echo '<script language="javascript">document.getElementById("information").innerHTML="done!"</script>';
?>


</body>
</html>