<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

<?php
$servername = "localhost";
$username = "salmaan";
$password = "fIJvSt6DqLwDCBHd";
$dbname = "demo";


$emailInput = $_POST ["email"];
$passwordInput = $_POST ["password"];
$flag1 = false;
$flag2 = false;
// Create connection
$conn = new mysqli($servername, $username,$password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
/* echo "Connected successfully"; */


$sql = "SELECT email, password FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
   
    while($row = $result->fetch_assoc()) {
       if($row["email"]===$emailInput){
           $flag1=true;
       }

       if( $row["password"]===$passwordInput){
           $flag2=true;
       }
        /* echo "Email: " . $row["email"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>"; */
    }
   if($flag1===true && $flag2===true){
       echo "Login successfull";
   }
   else if($flag1===true && $flag2===false){
       echo "Invalid Password";
   }
   else{
       echo "No user found against ".$emailInput." , Please Signup first! <form action='signup.html' method='post'>\n
       <input type='submit' value='Signup'/>\n</form>";
   }
} else {
    echo "No user on Database";
}
$conn->close();
?>

</body>
</html>