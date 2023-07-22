<?php
session_start(); 

if (!isset($_POST["formdangelen"])) {
    // Eğer javascript ile mesaj verip göndermek istiyorsam
    echo "<script language='javascript'>
                alert('Uyanıklık yapma, formu doldur gel!');
                window.location.href='kayit.php';
          </script>";
    //header('Location: kayitform.php');
    exit;
  }

  // Veri tabanına bağlanalım...
try {
    $vt = new PDO("mysql:dbname=tarif;host=localhost;charset=utf8","root", "");
    $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }

$sql ="select * from uye WHERE kullaniciadi = :kullaniciadi";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":kullaniciadi"=>$_POST["kullaniciadi"]));

$kayit = $ifade->fetch(PDO::FETCH_ASSOC); 
/*
echo htmlentities($kayit["kod"]);
echo "<br/>";
echo htmlentities($kayit["isim"]);
echo "<br/>";
echo htmlentities($kayit["soyisim"]);
echo "<br/>";
echo htmlentities($kayit["mail"]);
echo "<br/>";
echo htmlentities($kayit["kullaniciadi"]);
echo "<br/>";
*/

if (password_verify($_POST["sifre"], $kayit["sifre"])) {
    // Bu adam sitemize kaydolan kişi(kendi veritabanımıza göre değişiyoruz)
    $_SESSION["kod"] = $kayit["kod"];
    $_SESSION["mail"] = $kayit["mail"];
    $_SESSION["isim"] = $kayit["isim"];
    $_SESSION["soyisim"] = $kayit["soyisim"];
    $_SESSION["kullaniciadi"] = $kayit["kullaniciadi"];
    // Başka sayfaya yönlendir...
    //header("Location: pastapaylas.php");
    //echo "<br>Giriş Başarılı, 20 saniye içerisinde yönlendiriliceksiniz.";
   header("refresh:0; url=pastapaylas.php"); // 2 sn bekleyip gitsin diye isterseniz refresh'i kaldırabilirsiniz...
  
  } else {
  // Bu kişiyi bilmiyoruz
    echo "<script language='javascript'>
    alert('Sağladığınız bilgiler doğru değil!');
    window.location.href='giris.php';
    </script>";
  }
  
  
  
  
  
  ?>