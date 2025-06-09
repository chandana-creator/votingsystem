<?php
include('connect.php');

$admin_id=$_POST['admin_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
// $dept=$_POST['Department'];
// $image=$_FILES['photo']['name'];
// $tmp_name=$_FILES['photo']['tmp_name'];
// $mobile=$_POST['Mobile'];
// $std=$_POST['std'];
// var_dump($_POST['std']);
// $std = isset($_POST['std']) ? strtlower($_POST['std']): 'voter';

// $std = isset($_POST['std']) ? $_POST['std'] : 'Voter'; 
// $voter_status = isset($_POST['Voter_status']) ? $_POST['Voter_status'] : 0;



if($password!=$cpassword){
    echo '<script>
    alert("Password did not match");
    window.location="../partials/admin_login.php";
    </script>';
}

else{    
    // move_uploaded_file($tmp_name,"../uploads/$image");
    $sql="insert into admin(admin_id,name,email,password) 
   values('$admin_id','$name','$email','$password')";

    $result=mysqli_query($con,$sql);
    
    if($result){
        echo '<script>
        alert("Registration sucessfull");
        window.location="../";
        </script>';
    }
    else{
        die(mysqli_error($con));
    }
}
?>