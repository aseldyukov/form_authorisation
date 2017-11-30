<?php session_start();

if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else {
?>


<?php include_once("includes/header.php"); ?>

<div id="welcome">	
	<h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
	<p>Выйти <a href="logout.php">здесь!</a></p>
</div>



<?php include_once ("includes/footer.php"); ?>

<?php 
}
?>