<?php
include('../actions/connect.php');

// 1️⃣ Automatically update election status to "closed" if the end date has passed
$updateQuery = "UPDATE election SET status = 'closed' WHERE end_date < CURDATE() AND status != 'closed'";
mysqli_query($con, $updateQuery);

// 2️⃣ Fetch the highest-voted nominee per closed election
$query = "SELECT s.USN, s.Name, s.Photo, s.votes, e.election_id, e.title, e.start_date, e.end_date, e.status
          FROM student s
          INNER JOIN election e ON s.election_id = e.election_id
          WHERE e.status = 'closed' AND s.standard = 'nominee'
          GROUP BY e.election_id
          ORDER BY s.votes DESC";

$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Results</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
    <div class="container mt-5 text-white">
        <h1 class="text-center">Election Results</h1>

        <div class="bg-warning p-4 rounded">
            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <table class="table table-dark table-hover text-center">
                    <thead>
                        <tr>
                            <th>Election ID</th>
                            <th>Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Winner</th>
                            <th>Votes</th>
                            <th>Photo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $row['election_id'] ?></td>
                                <td><?= $row['title'] ?></td>
                                <td><?= $row['start_date'] ?></td>
                                <td><?= $row['end_date'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td><?= $row['Name'] ?></td>
                                <td><?= $row['votes'] ?></td>
                                <td><img src="../uploads/<?= $row['Photo'] ?>" alt="Winner Image" class="img-fluid" width="50"></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center text-dark">No completed elections yet.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
