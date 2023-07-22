<?php
session_start();

// Oturum açık mı
if (!isset($_SESSION["kod"])) {
    header("Location: anasayfa.php");
    exit;
}

// Formdan mı geldi, kötü niyetli direkt adresi yazan kişi
if (!isset($_POST["formdangelen"])) {
    header("Location: anasayfa.php");
    exit;
}

/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/
$kod = $_POST["kod"];

// Yorumu kontrol ettir
$yorum = trim($_POST["yorum"]);

if (empty($yorum)) { // Yorum boşsa geri gönderelim...
    header("Location:detay.php?kod=$kod");
    exit;
}

// Veri tabanına bağlanalım...

try {
    $vt = new PDO("mysql:dbname=tarif;host=localhost;charset=utf8","root", "");
    $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}


$sql = "insert into yorum (yorumyapan, yorumyapilan, metin) values (:yorumyapan, :yorumyapilan, :metin)";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":yorumyapan"=>$_SESSION["kod"], ":yorumyapilan"=>$kod, ":metin"=>$yorum));    
 
//Bağlantıyı yok edelim...
$vt = null;
$_SESSION["mesaj"] = "Yorum başarı ile eklendi!";
header("Location:yorum.php?kod=$kod");
?>