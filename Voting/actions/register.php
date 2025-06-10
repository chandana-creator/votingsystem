<?php
include('connect.php'); // Ensure DB connection exists

$usn = $_POST['USN'];
$name = $_POST['Name'];
$password = $_POST['Password'];
$cpassword = $_POST['Cpassword'];
$dept = $_POST['Department'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$mobile = $_POST['Mobile'];
$std = $_POST['std'];

// Password validation
if ($password !== $cpassword) {
    echo '<script>
    alert("Passwords do not match!");
    window.location="../partials/registration.php";
    </script>';
    exit();
}

// Fetch latest active election
$query = "SELECT election_id FROM election WHERE status = 'active' ORDER BY start_date DESC LIMIT 1";
$result = mysqli_query($con, $query);
$election = mysqli_fetch_assoc($result);
$election_id = $election ? $election['election_id'] : NULL;

if ($election_id === NULL) {
    echo '<script>
    alert("No active election found. Contact admin.");
    window.location="../partials/registration.php";
    </script>';
    exit();
}

// Move uploaded file
if (!move_uploaded_file($tmp_name, "../uploads/$image")) {
    echo '<script>
    alert("File upload failed.");
    window.location="../partials/registration.php";
    </script>';
    exit();
}

// Insert student with election ID
$sql = "INSERT INTO student (USN, Name, Password, Department, Photo, mobile, Standard, Voter_Status, Votes, election_id)
VALUES ('$usn', '$name', '$password', '$dept', '$image', '$mobile', '$std', 0, 0, '$election_id')";

if (mysqli_query($con, $sql)) {
    echo '<script>
    alert("Registration successful!");
    window.location="../";
    </script>';
} else {
    echo '<script>
    alert("Error: '.mysqli_error($con).'");
    window.location="../partials/registration.php";
    </script>';
}
?>
