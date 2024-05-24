<?php
include "db_conn.php";
$id = $_GET['id'];

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    
    $sql = "UPDATE `employs_db` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`gender`='$gender' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if($result){
               header("Location: index.php?msg= Data updated successfully");
    }

else{
    echo "Failed: " .mysqli_error($conn);
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> EMPLOYEE APPLICATION</title>
    <!--boostratp -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:blue">
<marquee>
    EMPLOYEE APPLICATION
</marquee>
</nav>
<div class="container">
<div class="text-center mb-4">
<h3>Edit User Information</h3>
<p class="text-muted">Click update after changing any information </p>        
</div>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM `employs_db` WHERE id =$id LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<div class="container d-flex justify-content-center" >
<form action="" method="post" style="width:50vw; min-width:300px;">
<div class="row">
<div class="col">    
<label class="form-label">First Name: </label>
<input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name'] ?>">  
</div> 

<div class="col"> 
<label class="form-label">Last Name: </label>
<input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name'] ?>"> 
</div> 
</div>

<div class="mb-3">
<label class="form-label"> Email: </label>
<input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">

</div>

<div class="form-group mb-3">
<label>Gender:</lable>&nbsp;
<input type="radio" class="form-check-input" name="gender" id="male" value="male" <?php echo ($row['gender']=='male')?
"checked":""; ?>>
<lable for="male" class="form-input-lable">Male </lable>

&nbsp;
<input type="radio" class="form-check-input" name="gender" id="female" value="female" <?php echo ($row['gender']=='female')?
"checked":""; ?>>
<lable for="male" class="form-input-lable">female </lable>
</div>

<div>
<button type="submit" class="btn btn-success" name="submit">update </button>
<a href="index.php" class="btn bnt-danger">cancel</a> 
</div>

</form>
</div>
</div>

<!--bootstap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>   