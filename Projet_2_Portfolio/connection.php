<link rel="stylesheet" href="styleco.css">

<form action="" method="post">
        <div class="login-box">
            <h1>Login</h1>
 
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Username"
                         name="identifiant" value="">
            </div>
 
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password"
                         name="mdp" value="">
            </div>
 
            <input class="button" type="submit"
                     name="username" value="Sign In">
        </div>
    </form>

<?php
 
include_once('admin.php');
  
function test_input($data) {
     
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    $username = test_input($_POST["identifiant"]);
    $password = test_input($_POST["mdp"]);
    $stmt = $conn->prepare("SELECT * FROM admin");
    $stmt->execute();
    $users = $stmt->fetchAll();
     
    foreach($users as $user) {
        
        if(($user['identifiant'] == $username) &&
            ($user['mdp'] == $password)) {
                header("location: adminpagee.php");
        }
        else {
            echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION')";
            echo "</script>";
            die();
            
        }
       
    }
}
 
?>

