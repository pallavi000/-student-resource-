<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mail by <?php echo $name; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container text-center">
    <h2>Message Send By: <?php echo $name; ?></h2>
    <p>Hello Sir,</p>
    <table class="table table-hover">

        <tr>
            <th>Email</th>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <th>Subject</th>
            <td><?php echo $subject; ?></td>
        </tr>
        <tr>
            <th>Message</th>
            <td><?php echo $message; ?></td>
        </tr>
    </table>
</div>

</body>
</html>