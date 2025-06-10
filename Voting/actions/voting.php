<?php
session_start();
include('connect.php');

$gid = $_POST['nomineeid'];
$uid = $_SESSION['USN'];

// Check if the voter has already voted
$voterCheck = mysqli_query($con, "SELECT Voter_Status FROM student WHERE USN='$uid'");
$voterData = mysqli_fetch_assoc($voterCheck);

if ($voterData['Voter_Status'] == 1) {
    echo '<script>
    alert("You have already voted!");
    window.location="../partials/dashboard.php";
    </script>';
} else {
    // Proceed with voting
    $votes = $_POST['nomineevotes'];
    $totalvotes = $votes + 1;

    $updatevotes = mysqli_query($con, "UPDATE student SET votes='$totalvotes' WHERE USN='$gid'");
    $updateVoter_Status = mysqli_query($con, "UPDATE student SET Voter_Status=1 WHERE USN='$uid'");

    if ($updatevotes && $updateVoter_Status) {
        $getnominee = mysqli_query($con, "SELECT Name, Photo, votes, USN FROM student WHERE Standard='nominee'");
        $nominee = mysqli_fetch_all($getnominee, MYSQLI_ASSOC);
        $_SESSION['nominee'] = $nominee;
        $_SESSION['Voter_Status'] = 1;

        echo '<script>
        alert("Voting successful");
        window.location="../partials/dashboard.php";
        </script>';
    } else {
        echo '<script>
        alert("Technical error !! Vote after sometime");
        window.location="../partials/dashboard.php";
        </script>';
    }
}
?>
