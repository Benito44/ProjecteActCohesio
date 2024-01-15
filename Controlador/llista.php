<?php   

session_start();

if (isset($_SESSION['administrador'])) {
    
} else {
    echo "<script>alert('You cannot enter if you\'re not an admin. Please login.');</script>";
    header("Location: ../Vista/login.html");
}
    


?>