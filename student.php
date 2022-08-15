<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Build SQL statment that selects a student's modules
      $sql = "select * from student";
      $result = mysqli_query($conn,$sql);

      // prepare page content
      
$data['content'] .= "<form action = 'delete.php' method ='post'>";


      $data['content'] .= "<table border='1'>";
      $data['content'] .= "<tr><th>student id</th>";
      $data['content'] .= "<td>dob</td>";
      $data['content'] .= "<td>firstname</td>";
      $data['content'] .= "<td>lastname</td>";
      $data['content'] .= "<td>house</td>";
      $data['content'] .= "<td>town</td>";
      $data['content'] .= "<td>county</td>";
      $data['content'] .= "<td>country</td>";
      $data['content'] .= "<td>postcode</td></tr>";

      

      // Display the modules within the html table
      while($row = mysqli_fetch_array($result)) {
         $data['content'] .= "<tr><td> $row[studentid] </td>";
         $data['content'] .= "<td> $row[dob] </td>";
         $data['content'] .= "<td> $row[firstname] </td>";
         $data['content'] .= "<td> $row[lastname] </td>";
         $data['content'] .= "<td> $row[house] </td>";
         $data['content'] .= "<td> $row[town] </td>";
         $data['content'] .= "<td> $row[county] </td>";
         $data['content'] .= "<td> $row[country] </td>";
         $data['content'] .= "<td> $row[postcode] </td>";
         
      $data['content'] .= "<td><input type='checkbox' name='selectstudent[]' id='selectstudent[]' value='".$row['studentid']."'> </td></tr>";
      
      }
      $data['content'] .= "</table>";
      
$data['content'] .= "<input name='deleteid' id='deleteid' class='btn btn-primary' type=submit onClick=\"javascript: return confirm('Are you sure you want to Delete it?');\" value='Delete' /></form>";


      
      
      
      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
