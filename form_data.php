<?php include ("dbcon.php");

if(isset($_POST["Add_student"])){
    $firstName= $_POST['first_name'] ;
    $lastName= $_POST['last_name'] ;
    $age= $_POST['age'] ;

    if($firstName==""|| empty($firstName)){
        header("location:index.php?message=please enter your firstname");

    }
    if($lastName == ""|| empty($lastName)){
        header("location:index.php?message1=please enter your lastname:");
    }
    if($age==""||empty($age)){
        header('location:index.php?message3=please enter your age');
    }
    else{
        $query="INSERT INTO `students` (`first_name`, `last_name`,`age`) values ('$firstName', '$lastName','$age')";
        $result=mysqli_query($connection,$query);
       
        if(!$result){
            die("Query has failed". mysqli_error($connection));
        }
        else{
            header('location:index.php?message=student added succesfully');
        }
    }
    }


?>