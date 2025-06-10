<?php
session_start(); // Start session
include('connect.php');

$name = $_POST['Name'];
$mobile = $_POST['mobile'];
$password = $_POST['Password'];
$std = $_POST['std'];

$sql = "SELECT * FROM student WHERE Name='$name' AND Password='$password' AND Standard='$std'";
$result = mysqli_query($con, $sql);
// if (!$result) {
//     die("Query failed: " . mysqli_error($con));
// }

if(mysqli_num_rows($result) > 0) {
    // Correct nominee fetch query
    $sql_nominee = "select Name, Photo, votes, USN from student where Standard='nominee'";
    $result_nominee = mysqli_query($con, $sql_nominee);
    // if (!$result_nominee) {
    //     die("Nominee query failed: " . mysqli_error($con));
    // }

    if (mysqli_num_rows($result_nominee) > 0) {
        $nominee = mysqli_fetch_all($result_nominee, MYSQLI_ASSOC);
        $_SESSION['nominee'] = $nominee;
    }

    $data = mysqli_fetch_assoc($result);
    $_SESSION['USN'] = $data['USN']; // Using correct column for ID
    $_SESSION['Voter_Status'] = $data['Voter_Status'];
    $_SESSION['data'] = $data;

    echo '<script>
        window.location.href="../partials/student_login.php";
    </script>';
}
 else {
    echo '<script>
        alert("Invalid credentials");
        window.location.href="../index.php";
    </script>';
    exit;
}
?>
