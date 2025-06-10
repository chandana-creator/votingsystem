<?php
include('../actions/connect.php'); // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Insert election into database
    $query = "InSERT INTO election (title, start_date, end_date, status) VALUES ('$title', '$start_date', '$end_date', 'active')";
    
    if (mysqli_query($con, $query)) {
        header("Location: ../partials/adashboard.php"); // Redirect back to the admin dashboard
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
