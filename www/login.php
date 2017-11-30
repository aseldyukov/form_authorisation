<?php session_start();

require_once("includes/connection.php");
include_once("includes/header.php");

if(isset($_SESSION["session_username"])) {

 //echo "Session is set"; // для тестирования
header("Location:index.php");
}

if (isset($_POST["login"])) {

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];

    $query =mysql_query("SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");

    $numrows=mysql_num_rows($query);

    if ($numrows!=0) {
    while($row=mysql_fetch_assoc($query)) {
        $dbusername=$row['username'];
        $dbpassword=$row['password'];
    }

    if ($username == $dbusername && $password == $dbpassword) {
        $_SESSION['session_username']=$username;

        /* Redirect browser */
header("Location:index.php");
    }
    } else { $message = "Invalid username or password!"; }
    } else { $message = "Все поля обязательны для заполнения!"; } } ?>




<div class="container mlogin">
    <div id="login">
    <h1>Вход</h1>
    <form name="loginform" id="loginform" action="" method="POST">
        <p>
            <label for="user_login">Имя пользователя<br />
            <input type="text" name="username" id="username" class="input" value="" size="20" /></label>
        </p>
        <p>
            <label for="user_pass">пароль<br />
            <input type="password" name="password" id="password" class="input" value="" size="20" /></label>
        </p>
            <p class="submit">
            <input type="submit" name="login" class="button" value="Log In" />
        </p>
        <p class="regtext">Ещё нет аккаунта? <a href="register.php" >Зарегистрироваться</a>!</p>
    </form>

    </div>
</div>
	
    <?php include_once("includes/footer.php"); 
	if (!empty($message)) { echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>"; } ?>    