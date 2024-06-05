<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost"; // Database server name or IP
    $username = "root"; // Database username
    $password = ""; // Database password
    $dbname = "local.itstep.com"; // Database name
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $name = $conn->real_escape_string($_POST['Username']);
    $email = $conn->real_escape_string($_POST['Email']);
    $imageUrl = $conn->real_escape_string($_POST['ImageUrl']);
    $phoneNumber = $conn->real_escape_string($_POST['PhoneNumber']);

    // SQL query to insert data
    $sql = "INSERT INTO `tbl_users` (name, email, phone, imageUrl,) VALUES ('$name', '$email', '$phoneNumber', '$imageUrl')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>
<form action="create.php" method="POST">
    <div class="container">
        <div class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" id="Username" name="Username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="form-text">Enter your full name</div>
        </div>
        <div class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" id="ImageUrl" name="ImageUrl" placeholder="ImageUrl" aria-label="ImageUrl" aria-describedby="basic-addon1">
            </div>
            <div class="form-text">Enter image Url</div>
        </div>
        <div class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" id="Email" name="Email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
            </div>
            <div class="form-text">Enter your email</div>
        </div>
        <div class=" mb-3">
            <div class="input-group">
                <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="Phone Number" aria-label="Phone Number" aria-describedby="basic-addon1">
            </div>
            <div class="form-text">Enter your phone number</div>
        </div>
        <button class="btn btn-primary">Submit</button>
</form>
<script src="./js/bootstrap.bundle.min.js"/>
</body>
</html>