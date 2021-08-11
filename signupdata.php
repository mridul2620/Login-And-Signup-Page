<?php
$insert=false;
if(isset($_POST['firstname'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

   $con = mysqli_connect($server, $username, $password);
   if(!$con){
       die("Connection failed" . mysqli_connect_error());
   } 
   //echo "Connection to Database successfull"
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $sql = "INSERT INTO `signupdata`.`signup` (`firstname`, `lastname`, `email`, `password`, `Time`) VALUES ('$firstname', '$lastname', '$email', '$password', current_timestamp());";

    if($con->query($sql) == true){
        //echo "Succesfully Inserted";
        $insert=true;
    }
    else{
        echo "Error: $sql <br> $con->error";
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="transbox">
        <h2>Sign Up</h2>
        <p>Please fill in this form to create an account.</p>
        <?php
        if($insert==true){
        echo "<p>You have been suceessfully registered</p>";
        }
        ?>
        <hr>
        <form class="credentials" action="signupdata.php" method="POST">
        <label for="firstname">First Name</label>
        <input type="text" placeholder="Enter first name" id="firstname" name="firstname" required><br>
        <label for="lastname">Last Name</label>
        <input type="text" placeholder="Enter last name" id="lastname" name="lastname" required><br>
        <label for="email">Email</label>
        <input type="email" placeholder="Enter Email" id="email" name="email" required><br>
        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password" id="password" name="password" required><br>
        <p><button class="cred">Sign Up</button></p>
        <hr>
    </form>
    <form class="credentials">
        <p><b>Already a User?</b></p>
        <button class="cred" formaction="login.html">Sign In</button>
    </form>
</div> 
    </body>
</html>