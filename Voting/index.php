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
        <h2 class="text-center">Login</h2>
        <div class="container text-center">
            <form action="./actions/login.php" method="POST">
                <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto" name="Name" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto" name="mobile" placeholder="Enter your mobile number" required maxlength="10" minlength="10">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control w-50 m-auto" name="Password" placeholder="Enter your password" required>
                </div>
                <div class="mb-3">
                    <select name="std" class="form-select w-50 m-auto" required>
                        <option value="voter">voter</option>
                        <option value="nominee">nominee</option>
                        <!-- <option value="admin">admin</option>      -->
                    </select>
                </div>
                <button type="submit" class="btn btn-dark my-4">Login</button> 
                <p>Don't have an account? <a href="./partials/registration.php" class="text-white"> Register here</a></p>
               <p>Not an admin yet? <a href="./partials/admin_login.php" class="text-white">Register or login as Admin</a></p>
                

            </form>    
        </div>
    </div>
</body>
</html>
