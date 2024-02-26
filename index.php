
<?php
    include("database.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <h1>Welcome!</h1><br>
    <label>Username</label>
        <input type="text" name="username"/><br>
        <label>Password</label><br>
        <input type="text" name="password"/><br>
        <button type="submit">Login</button>

    </form>
</body>
</html>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
if(empty($username)){
    echo "Please enter a Username";
}
elseif(empty($password)){
    echo"Please enter Passoword";
    
}
else{
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (user, password)
            VALUES('$username','$hash')";
    mysqli_query($conn, @sql);
    echo"You are registered!!";
};
};
mysqli_close($conn);
// if ($_POST["password"] == '1211'){
//     echo "You have correct password <br>";
// }
// else{
//     echo "consider changing password";
// }

?>

