<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Voting System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
    <h1 class="text-white text-center p-3">Voting System</h1>
    <div class="bg-warning py-5">
        <h2 class="text-center">Login as Admin</h2>
        <div class="container text-center">
            <form action="http://localhost/voting/actions/adashboard.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto" name="admin_id" placeholder="Enter your admin_id" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control w-50 m-auto"
                     placeholder="Enter the password" required="required"
                     name="password">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control w-50 m-auto"
                     placeholder="Confirm the password" required="required"
                     name="cpassword">
                </div>
                <button type="submit" class="btn btn-dark my-4">Login</button> 
               <p>Not an admin yet? <a href="/Voting/partials/admin_login.php" class="text-white">Register as Admin</a></p>
                
            </form>    
        </div>
    </div>
</body>
</html>
