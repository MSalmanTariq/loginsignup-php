<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="app.js"></script>
</head>
<body>
    


<?php
$servername = "localhost";
$username = "salmaan";
$password = "fIJvSt6DqLwDCBHd";
$dbname = "demo";

$usernameInput = $_POST["username"];
$nameInput = $_POST["name"];
$emailInput = $_POST ["email"];
$passwordInput = $_POST ["password"];
$flag = false;
// Create connection
$conn = new mysqli($servername, $username,$password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
/* echo "Connected successfully"; */


$sql = "SELECT email FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
   
    while($row = $result->fetch_assoc()) {
       if($row["email"]===$emailInput){
           $flag=true;
       }
        /* echo "Email: " . $row["email"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>"; */
    }
   if($flag===true){
   echo "User already exist against ".$emailInput;
   echo "<script>";
   echo "alert('hi');\n x = '".$emailInput."';";
   echo "</script>";
    
   }
   else{
    $sql = "INSERT INTO user (name, username, password, email)
    VALUES ('$nameInput','$usernameInput' ,'$passwordInput','$emailInput')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Successfully SignUp <form action='index.html' method='post'>\n<input type='submit' value='Login'/>\n</form>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
   }
} else {
    /* echo "No user on Database"; */
}
$conn->close();
?>



</body>
</html>