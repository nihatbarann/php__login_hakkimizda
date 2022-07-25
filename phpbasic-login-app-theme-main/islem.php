<?php
session_start();

if(isset($_POST['gonder'])){
$_SESSION['error']= null;

if($_POST['password']== null && $_POST['username']== null){
	$_SESSION['error']="lütfen tüm alanları dolurunuz";
	header("location:login.php");
	exit();
}
else if($_POST['username']== null){
	$_SESSION['error']="lütfen kullanıcı adını giriniz";
	header("location:login.php");
		exit();
}

else if($_POST['password']== null){
	$_SESSION['error']="lütfen şifrenizi giriniz";
	header("location:login.php");
	exit();}

if ($_POST['username']=="deneme" && $_POST['password']=="12345"){
$_SESSION['username']= $_POST['username'];
header("location:index.php?durum=başarılı");
}	
else{
	$_SESSION['error']="kullanıcı adı veya şifre yanlış";
	header("location:login.php");
	exit();}

}
if(isset($_GET['islem'])=="sil"){
	session_destroy();
	session_start();
	$_SESSION['error']="oturum sonlandırıldı.";
	header("location:login.php");
}

if(isset($_POST['kaydet'])){

	$metin=$_POST['yazi'];

	$islem=file_put_contents('db/'.$_SESSION['username']. '.txt', $metin);	

if($islem){
	header("location:index.php?durum=ok");
}
else{
	header("location:index.php?durum=false");
}
}

?>
