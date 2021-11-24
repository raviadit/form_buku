<?php
include 'koneksi.php';
session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php");
} 	
			if(isset($_POST['submit'])){
				

				$user= $_POST['user'];
				$pass = $_POST['pass'];

				$cek = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE username = '".$user."' AND password = '".$pass."'");
				if(mysqli_num_rows($cek) > 0){
					$d = mysqli_fetch_assoc($cek);
					$_SESSION['status_login'] = true;
					$_SESSION['a_global'] = $d;
					$_SESSION['id'] = $d->admin_id;
					$_SESSION['username'] = $d['username'];
        header("Location: index.php");
				}else{
					echo '<script>alert("Username atau password Anda salah!")</script>';
				}

			}
        ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css">
    <style>
    * {
    padding: 0;
    margin: 0;
    font-family: "Inter", "verdana";
}
body {
    background-color: black;
}
a {
    color: inherit;
    text-decoration: none;
}
#bg-login {
    display: flex;
    height: 80vh;
    justify-content: center;
    align-items: center;

}
.box-login{
    position: relative;
    background-color: black;
    align-content: center;
}

.box-login h2 {
    text-align: center;
    margin-bottom: 10px;
    border-radius: 10px;
    border: none;
    color: #FFFFFF;
}
.input-control {
    width: 80%;
    padding: 10px;
    margin-bottom: 10px;
    background-color: #E5E5E5;
    box-sizing: border-box;
    border-radius: 5px;
    border: 0px;
}
.btn {
    width: 80%;
    padding: 10px;
    background-color: #ed9121;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.image {
    position: absolute;
    top: 30px;
    left: 100px;

}

</style>
<link rel="icon" type="image/x-icon" href="img/ludwig.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>



<body id="bg-login">
    <div class="box-login">
            <center>
        <h2>LOGIN</h2>
        
     
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control">
            <input type="submit" name="submit" value="Login" class="btn">
        </form>
            </center>
        
    </div>
</body>
</html>