<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

   echo template("templates/partials/header.php");

   
    if(isset($_POST['deleteid']))
    {
        if(isset($_POST['selectstudent']))
        {
         $checkbox =$_POST['selectstudent'];
         foreach ($checkbox as $deletestudent)
      {
      $sid = $conn->real_escape_string($deletestudent);
      $sql = "DELETE FROM student WHERE studentid =". $sid;
      $result = mysqli_query($conn, $sql);
        }
    }

    echo "Student record have been Deleted <br><br>
    <a href='student.php'><button type='button' class='btn btn-primary'>Go back to student table</button></a></div>";
    }
    else
    {
    echo "Error. Try Again. <br><br>
<a href='student.php'><button type='button' class='btn btn-primary'>Go back to Student Table</button></a></div>";
}

 echo template("templates/partials/footer.php");


   
   
   
   

 
    
      
      
  
?>