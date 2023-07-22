<?php
session_start();

// Oturum açık mı
if (!isset($_SESSION["kod"])) {
    header("Location: giris.php");
}

if (!isset($_GET["formdangelen"])) {
  header("Location: giris.php");
  exit;
}

// Dosya geldimi
if ($_FILES["dosya"]["error"] <> 0) { // Hata oluştu mu, dosya geldi mi?
  echo "<script>
  alert('Dosya 1.5MB\'den küçük olmalıdır!');
  window.location.href='pastapaylas.php';
  </script>";
  exit;
}


// Dosya boyutu kontrol et
if ($_FILES["dosya"]["size"] > 1500000) { // Dosya 1.5 MB'den büyükse
  echo "<script language='javascript'>
  alert('Dosya 1.5MB\'tan küçük olmalıdır!');
  window.location.href='pastapaylas.php';
  </script>";
  exit;
}

// Resim dosyası mı onu kontrol et
$izinli = ['image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png'];
if (in_array($_FILES['dosya']['type'], $izinli)) {
  echo "Geçerli dosya";
}

else {
  echo "Geçersiz dosya!<br>";
  echo "Yüklemeye çalıştığınız dosya türü: ";
  echo $_FILES['dosya']['type'];
  echo "<script language='javascript'>
  alert('Yüklediğiniz dosya türüne izin yok!');
  window.location.href='pastapaylas.php';
  </script>"; 
  exit;   
}

/*
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
*/

// İsmini kontrol ettir
if (!isset($_POST["baslik"]) or empty($_POST["baslik"])) {
  //Hata mesajı ver gönder

    // Eğer javascript ile mesaj verip göndermek istiyorsam
    echo "<script language='javascript'>
    alert('Yanlış isim');
    window.location.href='giris.php';
</script>";
//header('Location: kayitform.php');
exit;
}

  // Dosyayı kaydedeceğiz
// Aynı isimde farklı dosyalar aynı isimle kaydedilmesin
$hedef =  "resimler/".time().$_SESSION["kod"].$_FILES["dosya"]["name"];
move_uploaded_file($_FILES["dosya"]["tmp_name"], $hedef);

// Veri tabanına bağlanalım...
try {
    $vt = new PDO("mysql:dbname=tarif;host=localhost;charset=utf8","root", "");
    $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }

  // Sorgular ve diğer işlemler burada...
if (!isset($_POST["yorum"]) or empty($_POST["yorum"])) {
    $yorum = false;
} else {
    $yorum = true;
    // trim yayinevi
    //uzunluk kontrolü vs.  
}

if ($yorum == true) { // yorum girildiyse
    $sql = "insert into pastaci(gonderitarihi, tarif, yorum, baslik, dosyayolu, yukleyen) values (:gonderitarihi, :tarif, :yorum, :baslik, :dosyayolu, :yukleyen)";
    $ifade = $vt->prepare($sql);
    $ifade->execute(Array(":gonderitarihi"=>$_POST["gonderitarihi"], ":tarif"=>$_POST["tarif"], ":yorum"=>$_POST["yorum"], ":baslik"=>$_POST["baslik"], ":dosyayolu"=>$hedef, ":yukleyen"=>$_SESSION["kod"]));    
} else { // yorum girilmediyse
    $sql = "insert into pastaci (gonderitarihi, tarif, baslik, dosyayolu, yukleyen) values (:gonderitarihi, :tarif, :baslik, :dosyayolu, :yukleyen)";
    $ifade = $vt->prepare($sql);
    $ifade->execute(Array(":gonderitarihi"=>$_POST["gonderitarihi"], ":tarif"=>$_POST["tarif"], ":baslik"=>$_POST["baslik"], ":dosyayolu"=>$hedef, ":yukleyen"=>$_SESSION["kod"]));      

} 
//Bağlantıyı yok edelim...
$vt = null;
echo "<script language='javascript'>
alert('Pasta tarifi başarı ile kaydedildi!');
window.location.href='pastapaylas.php';
</script>";
?>
