<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class ="bg-dark">
    <h1 class="text-center text-white p-3">Voting System</h1>
    <div class="bg-warning py-4">
        <h2 class="text-center">Admin Registration</h2>
        <div class="container text-center">
            <form action="../actions/adashboard.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto"
                     placeholder="Enter admin_id" required="required"
                     name="admin_id">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto"
                     placeholder="Enter the Name" required="required"
                     name="name">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto"
                     placeholder="Enter your Email" required="required"
                     name="email">
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
                <button type="submit" class="btn btn-dark my-4">Register
                </button>
                <p>Already have an account? <a href="http://localhost/Voting/partials/adminl.php" class="text-white">Login here</a>

            </form>
        </div>
    </div>
    
</body>
</html>
