<?php
$koneksi = mysqli_connect("localhost", "root", "", "user");
if(isset($_POST['submit'])){
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];

    if(!empty(trim($email)) && !empty(trim($pass))){
        $query = "SELECT * FROM user_detail WHERE email = '$email'";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);
       
        while($row = mysqli_fetch_assoc($result)){
            $userVal = $row['user_email'];
      a      $passVal = $row['user_pass'];
            $userName = $row['user_fullname'];

        }
        if($num > 0){
            if($userVal == $email && $passVal == $pass){
                header('location: index.php?user_fullname=' . urlencode($userName));
        }else{
            $error = 'Email atau Password Salah!!';
            header("location: login.php?");
        }
        }else{
            $error = 'user tidak ditemukan!!';
            header('location: login.php');
        }
    }else{
        $error = "Data tidak boleh kosong";
        echo $error;
    }
}
?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>    
</head>
<body>
    <form action="login.php" method="post">
        <p>Email : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="txt_email"></p>
        <p>Password : <input type="password" name="txt_pass"></p>
        <button type="submit" name="submit">Sign In</button>
    </form>
    <p><a href="register.php">Daftar</a></p>
</body>
</html>
