<?php
session_start();
include('connect.php'); // Ensure DB connection exists

// Retrieve posted vote details
$votes = $_POST['nomineevotes'];
$totalvotes = $votes + 1;
$gid = $_POST['nomineeid'];
$uid = $_SESSION['USN'];

// Validate required fields
if (!$votes || !$gid || !$uid) {
    echo '<script>
    alert("Invalid vote submission. Please try again.");
    window.location="../partials/dashboard.php";
    </script>';
    exit();
}

// Retrieve the election ID (Ensure election tracking)
$electionQuery = "SELECT election_id FROM election WHERE status = 'active' ORDER BY start_date DESC LIMIT 1";
$electionResult = mysqli_query($con, $electionQuery);
$electionRow = mysqli_fetch_assoc($electionResult);
$election_id = $electionRow ? $electionRow['election_id'] : null;

// Check if election exists before proceeding
if (!$election_id) {
    echo '<script>
    alert("No active election found. Voting is not possible.");
    window.location="../partials/dashboard.php";
    </script>';
    exit();
}

// Check if voter has already voted
$voterCheck = mysqli_query($con, "SELECT Voter_Status FROM student WHERE USN='$uid' AND election_id='$election_id'");
$voterData = mysqli_fetch_assoc($voterCheck);
if ($voterData && $voterData['Voter_Status'] == 1) {
    echo '<script>
    alert("You have already voted.");
    window.location="../partials/dashboard.php";
    </script>';
    exit();
}

// Update nominee votes within the election
$updateVotesQuery = "UPDATE student SET votes='$totalvotes' WHERE USN='$gid' AND election_id='$election_id'";
$updateVotes = mysqli_query($con, $updateVotesQuery);

// Update voter status to prevent multiple voting
$updateVoterQuery = "UPDATE student SET Voter_Status=1 WHERE USN='$uid' AND election_id='$election_id'";
$updateVoterStatus = mysqli_query($con, $updateVoterQuery);

if ($updateVotes && $updateVoterStatus) {
    // Fetch updated nominee list for the active election
    $getNomineesQuery = "SELECT Name, Photo, votes, USN FROM student WHERE Standard='Nominee' AND election_id='$election_id'";
    $getNominees = mysqli_query($con, $getNomineesQuery);
    $nominee = mysqli_fetch_all($getNominees, MYSQLI_ASSOC);

    $_SESSION['nominee'] = $nominee;
    $_SESSION['Voter_Status'] = 1;

    echo '<script>
    alert("Voting successful!");
    window.location="../partials/dashboard.php";
    </script>';

} else {
    echo '<script>
    alert("Technical error! Please vote again later.");
    window.location="../partials/dashboard.php";
    </script>';
}
?>
