<?php
session_start();
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<title>SCaPsY</title>
    <link rel="icon" type="image/png" href="images/capsy.png">
<body>

    <!--<img src="ASSETS\icon.png" class="C">-->
    <style>

.C{
    width: 500px;
    height: 200px;
    top: 12%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    padding: 70px 30px;
}
body{
    margin: 0;
    padding: 0;
    background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(images/img.jpg);
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
}
h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
}
h2{
    margin: 0;
    padding: 0 0 0px;
    text-align: center;
    font-size: 50px;
    font-family: Freestyle Script;
    color: #67b12f;
}
.loginbox{
    width: 320px;
    height: 420px;
    background: rgba(0,0,0,0.8);
    color: #fff;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
    border-radius: 20px;

}

.avatar{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px);
}

.icon{
    width: 500px;
    height: 200px;
    border-radius: 50%;
    top: 10%;
    left: 50%;
    position: absolute;
    left: calc(50% 50px);
}

.loginbox p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}

.loginbox input{
    width: 100%;
    margin-bottom: 20px;
}

.loginbox input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.loginbox input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #E81123 ;
    color: #fff;
    font-size: 18px;
    letter-spacing: 2px;
    border-radius: 20px;
}
.loginbox input[type="submit"]:hover
{
    cursor: pointer;
    background: #E74856;
    color: #000;
}
.loginbox a{
    text-decoration: none;
    font-size: 12px;
    line-height: 20px;
    color: darkgrey;
}

.loginbox a:hover
{
    color: #ffc107;
}
.error 
{
    color: #FF7800;
}
.btn
{
    float: right;
    margin: 50px;   
    text-decoration: none;
    padding: 5px 20px;
    font-family: "Roboto",sans-serif;
    font-size: 15px;
    border: 2px solid white;
    color: white;
}
.btn:hover
{

    background-color: #67b12f;
    color: white;
    border: 2px solid #67b12f;
}
::placeholder {
    color: darkgrey;
    opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
   color: darkgrey;
}

::-ms-input-placeholder { /* Microsoft Edge */
   color: darkgrey;
}
    </style>

<?php
$LOGINERR=NULL;
if (isset($_POST['signup'])) {

$user= $_POST["username"];
$pass= $_POST["password"];
// $id=$_POST["id"];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scapsy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id,username,password FROM signup WHERE username='$username' && password='$password'";
//$sql = "SELECT username,password,statues FROM login WHERE username='$user' && password='abc'";
//sql = "SELECT username,password,statues FROM login WHERE username='$user' && password='a' or '1'='1'";
$result = $conn->query($sql);
 

if ($result->num_rows > 0){
//echo "<script>alert('Login Successful ');</script>";
//header('location: home.php');

    header('location: http://localhost/Scapsy/MarkSlot.html');
} 
else 
{
//echo "<script>alert('Username or Password is Wrong ');</script>";
$LOGINERR = "Username or Password is Wrong";

}
$conn->close();
}
else
{

}
?>
    <header>
    <div><a href="scapsyweb.html" class="btn">Go Back</a></div>
    </header>
    <div class="loginbox">
    <img src="images/admin.png" class="avatar">
        <h1>Login Here</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <p>Username</p>
            <input type="text" name="user" placeholder="Enter Your Username">
            <p>Password</p>
            <input type="password" name="pass" placeholder="Enter Your Password">
            <span class="error"><?php echo $LOGINERR;?></span><br><br>
            
             <input type="submit" name="login" value="Login">
         
            <a href="Recover_password_step1.php">Forgot password?</a><br>
            <a href="signup.php">Don't have an account?</a>
        </form>

    </div>

</body>
</head>
</html>

