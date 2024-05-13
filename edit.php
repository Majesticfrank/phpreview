<?php
include("header.php");
include("dbcon.php");
?>
<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
}

$query="SELECT * FROM `students` where `id`='$id'";
$result=mysqli_query($connection,$query);

if(!$result){
    die("query failed".mysqli_error($connection));
    
}else{
    $row=mysqli_fetch_assoc($result);
}
?>


<?php
if(isset($_POST['Edit_student'])){

    if(isset($_GET['id_new'])){
        $idnew=$_GET['id_new'];
    }

    $firstName=$_POST['first_name'];
    $lastName=$_POST['last_name'];
    $age=$_POST['age'];

    $query="update `students` set `first_name`= '$firstName', `last_name` ='$lastName' , `age`='$age'  where  `id`= '$idnew' ";
    $result =mysqli_query($connection, $query);

    if(!$result){
        die("query failed".mysqli_error($connection));
    }
    else{
        header('location:index.php?updateMsg=you have successfully edited your data');
    }
}
?>
<form action="edit.php?id_new=<?php echo $id;?>" method="post">

    
<h3>EDIT STUDENT DETAILS</h3> 

<i class="fa-solid fa-xmark close" onclick="closebox()" id="fa-xmark"></i>
<hr>

<input type="text" id="first_name" name="first_name" placeholder="Enter firt name" value="<?php echo $row['first_name']?>" >

<input type="text" name="last_name" id="last_name" placeholder="Enter last name" value="<?php echo $row['last_name']?>" >

<input type="text" name="age" id="age" placeholder="Enter Age" value="<?php echo $row['age']?>">
<button type="submit" value="add" name="Edit_student" class="btn1"
>EDIT</button>
</div>
</form>

    
<?php
include("footer.php");
?>

