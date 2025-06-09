
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
    <h1 class="text-white text-center p-3">Admin Dashboard</h1>
    
    <div class="container text-center mt-4">
        <!-- Election Management Buttons -->
        <div class="row justify-content-center">
            <div class="col-md-3">
                <a href="http://localhost/voting/partials/create_elections.php" class="btn btn-success w-100 py-2">Create Election</a>
            </div>
            <div class="col-md-3">
                <a href="http://localhost/voting/partials/view_results.php" class="btn btn-primary w-100 py-2">View Results</a>
            </div>
        </div>
    </div>

    <!-- Ongoing Elections -->
    <?php
    include('../actions/connect.php');


    $query = "SELECT election_id, title,start_date ,end_date, status FROM election ORDER BY start_date DESC";
    //$query_closed = "SELECT* FROM elections WHERE status = 'closed' ORDER BY end_date DESC";

    $result = mysqli_query($con, $query);
    // Debugging output to check table data
    // var_dump($result); // Check if the query executed properly
    // var_dump(mysqli_num_rows($result)); // Check row count
    // var_dump(mysqli_fetch_assoc($result)); // Inspect fetched data
    var_dump(mysqli_fetch_assoc($result)); // Debugging fetched data

    ?>

    <div class="mt-5">
        <h2 class="text-white text-center">Ongoing Elections</h2><br>
        <div class="bg-warning p-4 rounded py-5 ">
            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <table class="table table-dark table-hover text-center">
                    <thead>
                        <tr>
                            <th>Election ID</th>
                            <th>Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
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
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center text-dark">No elections have been created yet !.... </p>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>
