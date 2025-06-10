<?php
session_start();
include('connect.php');

// Retrieve vote details safely
$votes = isset($_POST['nomineevotes']) ? (int)$_POST['nomineevotes'] : null;
$gid = isset($_POST['nomineeid']) ? $_POST['nomineeid'] : null;
$uid = isset($_SESSION['USN']) ? $_SESSION['USN'] : null;

// Validate required fields
if (is_null($votes) || empty($gid) || empty($uid)) {
    echo '<script>
    alert("Invalid vote submission. Please try again.");
    window.location="../partials/dashboard.php";
    </script>';
    exit();
}

// Retrieve the active election ID
$electionQuery = "SELECT election_id FROM election WHERE status='active' ORDER BY start_date DESC LIMIT 1";
$electionResult = mysqli_query($con, $electionQuery);
$electionRow = mysqli_fetch_assoc($electionResult);
$election_id = $electionRow ? $electionRow['election_id'] : null;

// Check if election exists
if (!$election_id) {
    echo '<script>
    alert("No active election found. Voting is not possible.");
    window.location="../partials/dashboard.php";
    </script>';
    exit();
}

// Check if voter has already voted
$voterCheckQuery = "SELECT Voter_Status FROM student WHERE USN='$uid' AND election_id='$election_id'";
$voterCheckResult = mysqli_query($con, $voterCheckQuery);
$voterData = mysqli_fetch_assoc($voterCheckResult);

if ($voterData && $voterData['Voter_Status'] == 1) {
    echo '<script>
    alert("You have already voted.");
    window.location="../partials/dashboard.php";
    </script>';
    exit();
}

// Ensure nominee votes are initialized
$voteInitQuery = "UPDATE student SET votes = 0 WHERE votes IS NULL AND election_id='$election_id'";
mysqli_query($con, $voteInitQuery);

// Calculate updated votes
$totalvotes = $votes + 1;

// Update nominee votes within the election
$updateVotesQuery = "UPDATE student SET votes='$totalvotes' WHERE USN='$gid' AND election_id='$election_id'";
$updateVotes = mysqli_query($con, $updateVotesQuery);
if (!$updateVotes) {
    die("Error updating votes: " . mysqli_error($con));
}

// Update voter status to prevent multiple voting
$updateVoterQuery = "UPDATE student SET Voter_Status=1 WHERE USN='$uid' AND election_id='$election_id'";
$updateVoterStatus = mysqli_query($con, $updateVoterQuery);
if (!$updateVoterStatus) {
    die("Error updating voter status: " . mysqli_error($con));
}

if ($updateVotes && $updateVoterStatus) {
    // Fetch updated nominee list for the active election
    $getNomineesQuery = "SELECT Name, Photo, votes, USN FROM student WHERE Standard='nominee' AND election_id='$election_id'";
    $getNominees = mysqli_query($con, $getNomineesQuery);
    $nominee = mysqli_fetch_all($getNominees, MYSQLI_ASSOC);

    $_SESSION['nominee'] = $nominee;
    $_SESSION['Voter_Status'] = 1;

    echo '<script>
    alert("Voting successful!");
    setTimeout(function(){ window.location="../partials/dashboard.php"; }, 2000);
    </script>';
} else {
    echo '<script>
    alert("Technical error! Please vote again later.");
    window.location="../partials/dashboard.php";
    </script>';
}
?>
