<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting system-Registration page</title>
    <!-- Bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class ="bg-dark">
    <h1 class="text-center text-white p-3">Voting System</h1>
    <div class="bg-warning py-4">
        <h2 class="text-center">Student Account</h2>
        <div class="container text-center">
            <form action="../actions/register.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto"
                     placeholder="Enter the USN" required="required"
                     name="USN">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto"
                     placeholder="Enter the Name" required="required"
                     name="Name">
                </div>
                <!-- <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto"
                     placeholder="Enter your Email" required="required"
                     name="Email">
                </div> -->
                <div class="mb-3">
                    <input type="password" class="form-control w-50 m-auto"
                     placeholder="Enter the password" required="required"
                     name="Password">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control w-50 m-auto"
                     placeholder="Confirm the password" required="required"
                     name="Cpassword">
                </div>
                 <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto"
                     placeholder="Enter your Department" required="required"
                     name="Department">
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control w-50 m-auto"
                    name="photo">
                </div>
                 <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto" name="Mobile" placeholder="Enter your mobile" required="required">
                </div>
               <div class="mb-3">
                <select name="std" class="form-select w-50 m-auto">
                    <option value="Voter">Voter</option>
                    <option value="Nominee">Nominee</option>  
                </select>
                </div>
                <button type="submit" class="btn btn-dark my-4">Register
                </button>
                <p>Already have an account? <a href="../" class="text-white">Login here</a></p>
            </form>
        </div>
    </div>
    
</body>
</html>
