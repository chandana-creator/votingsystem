<?php
session_start();
include('connect.php');
$votes=$_POST['nomineevotes'];
$totalvotes=$votes+1;

$gid=$_POST['nomineeid'];
$uid=$_SESSION['USN'];
// echo "votes:$votes <br>";
// echo "nomineeid:$gid <br>";
// echo "USN:$uid<br>";

$updatevotes=mysqli_query($con,"update student set votes='$totalvotes' where USN='$gid'");
$updateVoter_Status=mysqli_query($con,"update student set Voter_Status=1 where USN='$uid'");

if($updatevotes and $updateVoter_Status){
    $getnominee=mysqli_query($con,"Select Name,Photo,votes,USN from student where Standard='nominee'");
    $nominee=mysqli_fetch_all($getnominee,MYSQLI_ASSOC);
    $_SESSION['nominee']=$nominee;
    $_SESSION['Voter_Status']=1;
    

    echo '<script>
    alert("Voting sucessful");
    window.location="../partials/dashboard.php";
    </script>';


}else{
    echo '<script>
    alert("Technical error !! Vote after sometime");
    window.location="../partials/dashboard.php";
    </script>';
}
?>