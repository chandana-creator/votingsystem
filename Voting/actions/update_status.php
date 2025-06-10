<?php
include('../actions/connect.php');

// Update election status where end_date has passed
$query = "UPDATE election SET status = 'closed' WHERE end_date < CURDATE() AND status != 'closed'";
mysqli_query($con, $query);
?>
