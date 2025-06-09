<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Election</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
    <div class="container mt-5 text-white">
        <h1 class="text-center">Create Election</h1>
        <form action="http://localhost/Voting/actions/store_election.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label>Election Title:</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Election Name" required>
            </div>
            <div class="mb-3">
                <label>Start Date:</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>End Date:</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Create Election</button>
        </form>
    </div>
</body>
</html>
