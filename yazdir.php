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

if($_POST["sifre"] != $_POST["sifre1"]){
  echo "Şifreler uyuşmuyor";
  exit;
  }

$sifre = password_hash($_POST["sifre"], PASSWORD_DEFAULT);

// Ad soyad işlemler
// Diğer alanlar için siz boş olup olmadığını aşağıdaki gibi kontrol ettiriniz. 
if (!isset($_POST["isim"]) or (empty($_POST["isim"]))) {
  echo "İsim boş bırakılamaz...";
  exit;
  header('Location: kayit.php');
}

if (!isset($_POST["soyisim"]) or (empty($_POST["soyisim"]))) {
  echo "Soyisim boş bırakılamaz...";
  exit;
  header('Location: kayit.php');
}

if (!isset($_POST["kullaniciadi"]) or (empty($_POST["kullaniciadi"]))) {
  echo "Kullanıcı Adı boş bırakılamaz...";
  exit;
  header('Location: kayit.php');
}

if (!isset($_POST["sifre"]) or (empty($_POST["sifre"]))) {
  echo "Şifre boş bırakılamaz...";
  exit;
  header('Location: kayit.php');
}

if (!isset($_POST["sifre1"]) or (empty($_POST["sifre1"]))) {
  echo "Şifre Onay boş bırakılamaz...";
  exit;
  header('Location: kayit.php');
}
// -----------------------------------

// Sorgular ve diğer işlemler burada...
$sql = "insert into uye (isim, soyisim, mail, kullaniciadi, sifre) values (:isim, :soyisim, :mail, :kullaniciadi, :sifre)";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":isim"=>$_POST["isim"], ":soyisim"=>$_POST["soyisim"], ":mail"=>$_POST["mail"], ":kullaniciadi"=>$_POST["kullaniciadi"], ":sifre"=>$sifre));

// KOD KULLANILMASINI VS ENGELLİYEN KOD AŞAĞIDA
$kayit = $ifade->fetch(PDO::FETCH_ASSOC); 
echo htmlentities($kayit["isim"]);
echo "<br/>";
echo htmlentities($kayit["soyisim"]);
echo "<br/>";
echo htmlentities($kayit["kullaniciadi"]);
echo "<br/>";
echo htmlentities($kayit["sifre"]);
echo "<br/>";

$_SESSION["yetki"] = true;

//Bağlantıyı yok edelim...
$vt = null;

header('Location: giris.php');
?>