<?php include("header.php");?> 
<?php include("dbcon.php");?>     
    
 
    <table class="table table-hover table-bordered">
    <?php
    if(isset($_GET["message"])){
        echo "<h3>". $_GET["message"]."</h3>";
    }elseif(isset($_GET["message1"])){
        echo "<h3>". $_GET["message1"]."</h3>";
    }
    elseif(isset($_GET["message3"])){
     echo "<h3>". $_GET["message3"]."</h3>";
    }else{
        echo "<h3>all fields filled successfully</h3>";
    }
    
    ?>

<?php
if(isset($_GET["updateMsg"])){
    echo "<h4>". $_GET["updateMsg"]. "</h4>";
}
?>
<?php
if(isset($_GET["DeleteMsg"])){
    echo "<h4>". $_GET["DeleteMsg"]. "</h4>";
}
?>


        <thead>
        <tr>
            <th> ID</th>
            <th>FIRSTNAME</th>
            <th>LASTNAME</th>
            <th>AGE</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        </thead>
        <tbody>
            <?php

            $query= "SELECT * FROM students";
            $result =mysqli_query($connection, $query);
             if(!$result) {
                die("Query Failed".mysqli_error($connection));
             }
             else{
                while($row=mysqli_fetch_assoc($result)){
             
        
            ?>


        <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['first_name']?></td>
            <td><?php echo $row['last_name']?></td>
            <td><?php echo $row['age']?>  </td>
            <td><a href="edit.php?id=<?php echo $row['id'];?>">EDIT</a></td>
            <td><a href="delete.php?id=<?php echo $row['id'];?>">DELETE</a></td>
            
            
        </tr>
        <?php

                }
            }
            ?>
        </tbody>
       
       
</table>

<button class="btn" id="btn"onclick="openbox()">ADD STUDENT</button>

<div class="student-form" id="student-form">

    <form action="form_data.php" method="post">

    
    <h3>ADD NEW STUDENT</h3> 

    <i class="fa-solid fa-xmark close" onclick="closebox()" id="fa-xmark"></i>
    <hr>

    <input type="text" id="first_name" name="first_name" placeholder="Enter firt name">

    <input type="text" name="last_name" id="last_name" placeholder="Enter last name">
    <input type="text" name="age" id="age" placeholder="Enter Age">
    <button type="submit" value="add" name="Add_student" class="btn1"
    >ADD</button>
</div>
</form>

<?php include("footer.php");?>   

   
