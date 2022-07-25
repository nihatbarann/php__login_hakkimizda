<?php 
session_start();

if(!isset($_SESSION['username'])==true){
    header("location:login.php");
    exit();
}

$hakkimda=file_get_contents('db/'.$_SESSION['username'].'.txt');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Anasayfa</title>
    <style>
        body.bg-dark{ background: #181818!important;}
        button{position: absolute; bottom: 8px; right: 8px}
        form{position: relative;}
    </style>
</head>
<body class="bg-dark">
<div class="d-flex align-items-center justify-content-center p-4"><img height="" src="kodl.png" alt=""></div>
<div  class="container d-flex align-items-center justify-content-center">
    <div class="card bg-dark" style="width: 18rem;">
        <div class="card-header bg-primary">
            Profilim
        </div>
        <div class="card-body">
            <h5 class="card-title text-warning"><?php echo $_SESSION['username'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">sahin@stebilisim.com</h6>
            
            <form action="islem.php" method="post">
                <textarea class="form-control bg-dark text-white" name="yazi" id="" cols="30" rows="10"><?php echo $hakkimda; ?></textarea>
                <button class="btn btn-sm btn-primary" type="submit" name="kaydet">Kaydet</button>
            </form>
            <a href="islem.php?islem=sil" class="btn btn-success btn-sm mt-2 w-100">Oturumu Kapat</a><br>

        </div>
        <div class="card-footer bg-info d-flex align-items-center justify-content-between">
            <a href="islem.php?islem=mode&color=light" class="btn btn-sm btn-light">Light Mod</a>
            <a href="islem.php?islem=mode&color=dark" class="btn btn-sm btn-dark">Dark Mod</a>
        </div>
    </div>
</div>
</body>
</html>