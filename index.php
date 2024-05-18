<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Datat</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="image-container">
    <img src="img\img2.jpg" alt="student-img" style="width:90%">
</div>
    <div class="form-container">
    <form action="index.php" method="post">
     <p ><h1 style="text-align:center"> MTIS Students Data </h1></p>
        <p style="text-align:center"><h3> Fauclty of Mangement Technology & Information Systems </h3></p>
        <div class="data-form">
        <label for="student-code">Enter yout code: </label>
 <input type="text" name="student-code" placeholder="Code must be 4 digits" class="student-code" required> 
</div>
       <input type="submit" name="code-submit" value="Show My Data" class="btn-codeSubmit">


<?php
if (isset ($_POST['code-submit'])) {
    $code= $_POST['student-code'];
    require_once "database.php";
    $sql = "SELECT *FROM  sData  WHERE Code ='$code'";
    $res = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($res, MYSQLI_ASSOC);
    if (mysqli_num_rows($res) > 0) {
        session_start();
         $_SESSION['user'] = "yes";
        echo "<p><h3 style='text-align:center'>Code: $code</h3></p>";
        echo "<table class='styled-table'>
       <!-- <thead>
            <tr>
                <th>Subject</th>
                <th>Result</th>
            </tr>
        </thead>-->
        <tbody>";
        $data = array('fullName', 'Code', 'Level', 'Section', 'Address', 'GPA');

        // Loop through each subject
        foreach ($data as $datum) {
            // Fetch the result for the current subject
            $result = $user[$datum];
            echo "<tr class='rowColor'>
                <td>$datum</td>
                <td>$result</td>
            </tr>";
        }
        echo "</tbody>
    </table>";

      echo "<style>
    .student-code ,label ,.btn-codeSubmit{
        display:none;
    }"; /* */   
    echo "<style>
.another-data{
        display: inline-block;
    }
    </style>";
    
        /*   die();*/
        
    } else {
        echo "<div class='er'> \"This Code is not found\" </div>";
    }
     if (isset ($_POST['another-data'])) {
        session_start();
        session_destroy();
    }/**/
}
else
{
    echo " <style>
 .another-data{
        display: none;
    }
    </style?\>";
}
?>
<div style="text-align:center display: inline-block;">
<form action="index.php" method="post">
<input type="submit" name="Another-data" value="Find Another Data" class="another-data" formnovalidate>
</form>
</div>
</form>
</div>
</div>
</body>
</html>

