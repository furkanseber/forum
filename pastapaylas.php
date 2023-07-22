<?php
session_start();

if (!isset($_SESSION["kod"])) {
    header("Location: giris.php");
}

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

/*header*/
.uyecerceve{
    display:flex;
    justify-content:space-evenly;
    flex-basis:50%;

    margin-top: 60px;

}

.uyecerceve1{
    display:flex;
    justify-content:right;
    align-items:center;

    margin-top:60px;
    border: 3px solid aqua;
    border-radius: 10px;
    

    height: 600px;
    width: 450px;
}

.footer{
    display:flex;
    justify-content: center;

    margin-top: 20px;
    font-family: 'Times New Roman', Times, serif;

}

#uyeol{
    display:flex;
    justify-content: center;
    align-items: center;

    color:rgb(179, 179, 179);
    font-weight: bold;
 
    border: 3px solid aqua;
    border-radius: 10px;


    padding:10px;
    font-size: 20px;



}

#girisyap{

    font-family: 'Times New Roman', Times, serif;
    color:rgb(179, 179, 179);
    font-weight: bold;

    border: 3px solid aqua;
    background-color:rgb(45, 55, 48);
    border-radius: 10px;

    margin-left:-100px;
    font-size: 20px;
    padding: 8px; 

}

#girisyap:hover{
    color:aqua;
}

.formbloklari{
    display:flex;


    text-align: center;
    font-family: 'Times New Roman', Times, serif;

    margin-top: 10px;

    
    border-color:white;
    color:White;
    font-size: 20px;

    width:242px;
    padding:8px;
    border-radius: 10px;
    background-color: rgb(45, 55, 48);
    
}

.date{
    text-align:center;
    font-family: 'Times New Roman', Times, serif;
    width:242px;
    margin-top: 20px;

    
    border-color:white;
    color: rgb(94, 94, 94);
    font-size: 20px;

    padding:8px;
    border-radius: 10px;
    background-color: rgb(45, 55, 48);
}

.dosya{
    display:Flex;
    margin-top:20px;
    margin-bottom:-5px;
    font-size:20px;
    font-weight:bold;
}

.dosya:hover{
    color:white;
}

.paylasform{
    display:flex;
    justify-content:center;
}

.uyebilgileri{

    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;

    margin-top:60px;
    border: 3px solid aqua;
    border-radius: 10px;


    font-weight: bold;
    font-size: 25px;
    color: rgb(179, 179, 179);

    height: 600px;
    width: 450px;
}
.soyadayalibilgiler{
    display:flex;

    flex-direction:column;
}

</style>
</head>
<body>
    
<header class="container">

    
    <div id="logo"><img id="resimlogo" src="cake.png">SEBER <br>PASTAM</div>

    <div class="hmid">
        <nav><a id="link" href="anasayfa.php">ANASAYFA</a></nav>
        <nav><a id="link" href="hakkimda.php">HAKKIMDA</a></nav>
        <nav><a id="link" href="tarifler.php">TARİFLER</a></nav>
        <?php
        if (isset($_SESSION["kod"])) {  // Giriş yapanlar 
        ?>
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
        <form action="yazdir.php" method="post">
            <input type="text" name="arama" placeholder="Arama">
            <input type="submit" value="Ara">
        </form>
    </div>

</header>

</form>   
<div class="uyecerceve">

<div class="uyebilgileri">

    <h1>Bilgilerim:</h1>
<div class="soyadayalibilgiler">

    <div>İsim:     
    <?php
    if (isset($_SESSION["kod"])) {
    echo htmlentities($_SESSION["isim"]);
    }
    ?>
    </div>

    <div>Soyisim:     
    <?php
    if (isset($_SESSION["kod"])) {
    echo htmlentities($_SESSION["soyisim"]);
    }
    ?>
    </div>

    <div>Mail:     
    <?php
    if (isset($_SESSION["kod"])) {
    echo htmlentities($_SESSION["mail"]);
    }
    ?>
    </div>

    <div>Kullanıcı Adı:     
    <?php
    if (isset($_SESSION["kod"])) {
    echo htmlentities($_SESSION["kullaniciadi"]);
    }
    ?>
    </div>

</div>

</div>

    <div class="uyecerceve1">

    <form action="pastapaylaskontrol.php?formdangelen=1" method="post" enctype="multipart/form-data">      
    <input type="text" class="formbloklari" name="baslik" placeholder="Pasta İsmi">
    <input type="date" class="date" name="gonderitarihi" placeholder="Gönderi Tarihi">

    <label for="files" class="dosya">Pasta Resmi Eklemek için Tıklayınız:</label>
    <input id="files" style="visibility:hidden;" type="file" name="dosya">

    <textarea class="formbloklari" name="tarif" placeholder="Pasta Tarifi"></textarea>
    <textarea class="formbloklari" name="yorum" placeholder="Yazar Yorumu"></textarea>
        <div class="footer">
        <input id="girisyap"  type="submit" value ="Paylaş">
        </div>
    </form> 
</div>
</div>

</body>
</html>




