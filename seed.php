<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

if (isset($_SESSION['id'])) {
   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");


   if (isset($_POST['submit'])) {

    
    $sql = "INSERT INTO student (firstname, lastname, dob, postcode, house, town, county, country, studentid)
            values('eddie', 'king','1994-12-10','rg3 4ed', '5 riveroad', 'reading', 'berkshire',  'uk', '2156789'), 
            ('macroy', 'king','1992-11-10','rg1 2ed', '9 riveroad', 'reading', 'berkshire',  'uk', '2156289'), 
            ('joshua', 'nelly','1990-09-10','rg4 9ed', '10 riveroad', 'reading', 'berkshire',  'uk', '2136789'), 
            ('stella', 'anne','1976-10-10','rg7 4ed', '13 riveroad', 'reading', 'berkshire',  'uk', '2156799'), 
            ('jon', 'smith','1978-12-10','rg8 4ed', '40 riveroad', 'reading', 'berkshire',  'uk', '2106789')";
    if(mysqli_query($conn,$sql)){

    echo "Records inserted.";

    }else{

    echo "ERROR.";

    }
    
    $data['content'] = "<p>Your details have been updated</p>";
   }
   else{ 
    $data['content'] = <<<EOD
    
    <h2> Our Detauks </h2>
    <form name='frmdetails' action ='' method='post'> 
    <input type='submit' value='Insert 5 students' name='submit'/>
    </form>
    EOD;
   }
    echo template("templates/partials/footer.php");
    echo template("templates/default.php", $data);

   // another test edit
}
?>
