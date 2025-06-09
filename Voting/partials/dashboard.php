<?php
session_start();
$data=$_SESSION['data'];
if($_SESSION['Voter_Status']==1){
    $status='<b class="text-success">Voted</b>';
}else{
    $status='<b class="text-danger">Not Voted</b>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
     <!-- Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--css file-->
    <link rel="stylesheet" href="../style.css">

</head>
<body class="bg-secondary text-light">
    <div class="container my-5">
<a href="../"><button class="btn btn-dark text-light px-3">Back</button></a>
<a href="logout.php"><button class="btn btn-dark text-white px-2">Logout</button></a>
<h1 class="my-3">Voting System</h1>
<div class="row my-5">
    <div class="col-md-5">
        <?php
if(isset($_SESSION['nominee'])){
    $nominee=$_SESSION['nominee'];
    for($i=0;$i<count($nominee);$i++){
        ?>
        <div class="row">
        <div class="col-md-12">
            <img src="../uploads/<?php echo $nominee[$i]['Photo'] ?>" 
            alt="Group Image">
        </div>
        <div class="col-md-12">
            <strong class="text-dark h5">Group Name:</strong>
            <?php echo $nominee[$i]['USN'] ?>
            <br>
            <strong class="text-dark h5">Votes:</strong>
            <?php echo $nominee[$i]['votes'] ?>
            <br>
        </div>
    </div>
    
    <form action="../actions/voting.php" method="post">
<input type="hidden" name="nomineevotes" value="<?php echo $nominee[$i]['votes']?>">
<input type="hidden" name="nomineeid" value="<?php echo $nominee[$i]['USN']?>">
<?php
if($_SESSION['Voter_Status']==1){
    ?>
    <button class="bg-success my-3 text-white px-3">voted</button>
    <?php
}else{
    ?>
    <button class="bg-danger my-3 text-white px-3" type="submit">vote</button>
    <?php
}
?>
    </form>
    <hr>
    <?php
    }
}else{
    ?>
    <div class="container">
        <p>No Groups to display</p>
    </div>
    <?php
}
    ?> 
        
        <!--groups-->
        
    </div>
     <div class="col-md-7">
        <!--User Profile-->
        <img src="../uploads/<?php echo $data['Photo']?>" alt="User Image">
        <br>
        <br>
         <strong class="text-dark h5">Name:</strong>
        <?php echo $data['Name'];?><br>
        <strong class="text-dark h5">USN:</strong>
        <?php echo $data['USN'];?><br>
        <strong class="text-dark h5">Mobile:</strong>
        <?php echo $data['mobile'];?><br>
        <strong class="text-dark h5">Status:</strong>
        <?php echo $status;?><br><br>
     </div>
</div>

</body>
</html>

