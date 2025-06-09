<?php
include('connect.php');

$usn=$_POST['USN'];
$name=$_POST['Name'];
// $email=$_POST['Email'];
$password=$_POST['Password'];
$cpassword=$_POST['Cpassword'];
$dept=$_POST['Department'];
$image=$_FILES['photo']['name'];
$tmp_name=$_FILES['photo']['tmp_name'];
$mobile=$_POST['Mobile'];
$std=$_POST['std'];
// var_dump($_POST['std']);
// $std = isset($_POST['std']) ? strtlower($_POST['std']): 'voter';

// $std = isset($_POST['std']) ? $_POST['std'] : 'Voter'; 
// $voter_status = isset($_POST['Voter_status']) ? $_POST['Voter_status'] : 0;



if($password!=$cpassword){
    echo '<script>
    alert("Password did not match");
    window.location="../partials/registeration.php";
    </script>';
}

else{    
    move_uploaded_file($tmp_name,"../uploads/$image");
    $sql="insert into student(USN,Name,Password,Department,Photo,mobile,Standard,Voter_status,Votes) 
   values('$usn','$name','$password','$dept','$image','$mobile','$std',0,0)";

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
