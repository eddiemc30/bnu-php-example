<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");




   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

   $password = $_POST['studentpassword'];



   if ($password) {
   $pwhash = password_hash($password, PASSWORD_DEFAULT);
   }
 

     // Build sql statment that selects all the modules
     $sql = "INSERT into student (studentid, password, dob, firstname, lastname, house, town, county, country, postcode)
     values ('$_POST[studentid]', '$pwhash', '$_POST[dob]','$_POST[firstname]','$_POST[lastname]',
     '$_POST[house]', '$_POST[town]', '$_POST[county]', '$_POST[country]', '$_POST[postcode]');";
     $result = mysqli_query($conn, $sql);

echo "new record have been added 
 <a href='student.php'><button type='button' class='btn btn-primary'>Go back to student table</button></a></div>";
   

   // render the template
   echo template("templates/default.php", $data);



echo template("templates/partials/footer.php");

?>
