<?php
session_start();
include('../actions/connect.php');

$USN = $_SESSION['USN']; // Ensure login stores this
$query = "SELECT * FROM election";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
    <div class="container mt-5 text-white">
        <h1 class="text-center">VOTING DASHBOARD</h1><br>
        <h3>ELECTIONS DATA</h3>

        <div class="mt-4">
            <?php
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<p><a class='btn btn-primary' href='dashboard.php?election_id=".$row['election_id']."'>".$row['title']."</a></p>";
                }
            } else {
                echo "<p>No elections available.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
