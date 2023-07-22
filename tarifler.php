<?php
session_start();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<title>CSS </title>
<style>

body{
    margin:0px;
    background-color: rgb(45, 55, 48);
}

.container{
    display:flex;
    align-items: flex-end;
    justify-content: space-between;

    height: 120px;

}

.hmid{
    display:flex;
}

nav{
    display:flex;
    justify-content: center;

    border-bottom: 3px solid aqua;
    border-radius: 10px;
    margin-right: 5px;
    padding:20px;

    font-weight: bold;
    font-size: 25px;

    text-decoration: none;
    color: rgb(179, 179, 179);
}

nav:hover{

}

#resimlogo{
    display:flex;

    height:100px;
    padding-right: 20px;
}

#aramacubugu{
    display:flex;
    justify-content: flex-end;
    
    padding:20px;
    width: 300px;

}

input,form{
    font-size: 19px;
}

#logo{
    display:flex;
    justify-content: center;
    align-items: flex-end;
    padding:20px;    
    width: 300px;


    font-weight: bold;
    font-size: 35px;
    color: rgb(179, 179, 179);
}

#link{
    text-decoration: none;
    color:rgb(179, 179, 179);
    
}

#link:hover{
    color:aqua;
}

/* Header kısmı buraya kadar.*/

.urunbasliklari{
    display:Flex;
    justify-content: space-around;

    margin-top: 20px;

    border:3px aqua solid;
    border-radius: 6px;

    font-weight: bold;
    font-size: 32px;
    color: rgb(179, 179, 179);

    padding:20px;
    margin-top: 60px;
    margin-bottom: 20px;
}

.urunler{
    display:Flex;
    justify-content: space-around;

    margin-bottom: 40px;

    font-size: 20px;
    color: rgb(179, 179, 179);
}

#urunresimleri{
    display: flex;

    border:4px solid;
    box-shadow:0px 5px 25px 15px orange;

    flex-basis: 25%;
    width:450px;
    height: 300px;
    margin-left: 15px;
}

#urunbilgisi{

    display:Flex;
    justify-content: flex-start;
    align-items: center;

    flex-direction: column;
    flex-basis: 37.5%;
    margin-left: 10px;

}

#yazaryorumu{

display:Flex;
justify-content: flex-start;
flex-direction: column;

flex-basis: 37.5%;
margin-left: 10px;

}
</style>
</head>
<body>
    
<header class="container">

    
    <div id="logo"><img id="resimlogo" src="cake.png">SEBER <br>PASTAM</div>

    <div class="hmid">
        <nav><a id="link" href="anasayfa.php">ANASAYFA</a></nav>
        <nav><a id="link" href="hakkimda.php">HAKKIMDA</a></nav>
        <?php
        if (isset($_SESSION["kod"])) {  // Giriş yapanlar 
        ?>
        <nav><a id="link" href="pastapaylas.php">ÜRÜN PAYLAŞ</a></nav>
        <nav><a id="link" href="cikis.php">ÇIKIŞ YAP</a></nav> 
        <?php
        }
        else // Giriş yapmayanlar
        {
        ?>
        <nav><a id="link" href="giris.php">ÜYE GİRİŞİ</a></nav>
        <?php
        }
        ?>
        </div>
    </div>

    <div id="aramacubugu">
        <form action="yazdir.php" name="aramakutusu" method="post">
            <input type="text" name="arama" placeholder="Arama">
            <input type="submit" value="Ara">
        </form>
    </div>

</header>

<div class="urunbasliklari">

    <div>PASTA RESMİ</div>
    <div>YAZAR BİLGİSİ</div>
    <div>YAZAR YORUMU</div>

</div>
<?php

            // Veri tabanına bağlanalım...
            try {
                $vt = new PDO("mysql:dbname=tarif;host=localhost;charset=utf8","root", "");
                $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            $sql ="select pastaci.*, uye.isim, uye.mail, uye.soyisim from pastaci, uye WHERE pastaci.yukleyen = uye.kod";
            $ifade = $vt->prepare($sql);
            $ifade->execute();

            while($kayit = $ifade->fetch(PDO::FETCH_ASSOC)){
                ?>

    <div class="urunler">
    <img id="urunresimleri" src="<?php echo htmlentities($kayit["dosyayolu"]); ?>">

    <div id="urunbilgisi">
        <div><b>YAZAR İSİM-SOYİSİM: <?php echo htmlentities($kayit["isim"]); echo " "; echo htmlentities($kayit["soyisim"]);?> </b><br>
        <b>E-POSTA:</b><a id="link" href="mailto: <?php echo htmlentities($kayit["mail"]); ?>"> <?php echo htmlentities($kayit["mail"]); ?></a><br> 
        <b>GÖNDERİ TARİHİ:</b> <?php echo htmlentities($kayit["gonderitarihi"]); ?><br>
                
      <b><a id="link" href="yorum.php?kod=<?php echo $kayit["kod"]; ?>">TARİFİ GÖR/YORUM YAP</a></b><br>
    </div>
    </div>

    <div id="yazaryorumu">
        <div><b>PASTA İSMİ:</b> <?php echo htmlentities($kayit["baslik"]); ?><br>
        <b>YAZAR YORUMU:</b> <?php echo htmlentities($kayit["yorum"]); ?></div>
    </div>     

</div>
<?php  } ?>

</body>
</html>
