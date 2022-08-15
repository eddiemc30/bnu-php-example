<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

     // Build sql statment that selects all the modules
     $sql = "SELECT * from student;";

     $result = mysqli_query($conn, $sql);

     $data['content'] .= "<html> <body>
     <form name='assignstudent' action='submitstudent.php' method='post' >
    student id:
     <input type='text' name='studentid' ><br/>
    password:
    <input type='password' name='studentpassword' ><br/>
    dob:
    <input type='date' name='dob' ><br/>
    first name:
     <input type='text' name='firstname' ><br/>
    last name:
     <input type='text' name='lastname' ><br/>
    house:
   <input type='text' name='house' ><br/>
    town:
    <input type='text' name='town' ><br/>
    county:
    <input type='text' name='county' ><br/>
    country:
    <input type='text' name='country' ><br/>
    postcode:
    <input type='text' name='postcode' ><br/>
    <input type='submit' name='confirm' value='Save' />
    </form> </body> </html>";
   

   // render the template
   echo template("templates/default.php", $data);



echo template("templates/partials/footer.php");

?>
