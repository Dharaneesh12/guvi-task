<?php
$name = $_POST['name'];
$pwd = $_POST['password'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];

$conn = mysqli_connect('localhost', 'root', '', 'guvi');
if ($conn->connect_error) {
    die("Connection failure: "
        . $conn->connect_error);
}
$select = "select * from register where emailid='$email'";
$result = mysqli_query($conn, $select);
$count = mysqli_num_rows($result);

if ($count < 1) {
    $insert = "INSERT INTO register(emailid, password) VALUES('$email','$pwd')";
    mysqli_query($conn, $insert);
    require '../asset/vendor/autoload.php';
    $client = new MongoDB\client;
    $companyGuvi = $client->db1;
    $collections = $companyGuvi->db2;
    $insertOneRow = $collections->insertOne(
        [
            'name' => $name,
            'password' => $pwd,
            'mobile' => $mobile,
        ]
    );
    echo json_encode("Account registered");
} else {
    echo json_encode("Email already exist");
}
