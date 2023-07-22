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

/*Header kısmı bitiyor*/

.uyecerceve{
    display:flex;
    justify-content: center;


    margin-top: 60px;

}

.uyecerceve1{
    display:flex;
    justify-content: center;
    align-items: center;


    

    border-radius: 10px;
    padding:20px;

    height: 600px;
    width: 800px;
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

    display:flex;
    justify-content: center;
    align-items: center;

    font-family: 'Times New Roman', Times, serif;
    color:rgb(179, 179, 179);
    font-weight: bold;

    border: 3px solid aqua;
    background-color:rgb(45, 55, 48);
    border-radius: 10px;

    margin-right: 5px;
    font-size: 20px;
    padding: 8px;
 

    

}

#girisyap:hover{
    color:aqua;
}

.formbloklari{
    display:flex;
    justify-content: center;
    align-items: center;
    text-align: center;

    margin-top: 20px;

    border-color:white;
    color:White;
    font-size: 20px;

    padding:8px;
    border-radius: 10px;
    background-color: rgb(45, 55, 48);
    
}

.hakkimdacerceve{
    display:flex;
    margin-top:10%;
    justify-content:center;
    align-items:center;
}
#hakkimdaresim{


}
#hakkimda{
    margin-top:50px;
    font-size:20px;
    margin-left:30px;
    text-align:justify;
    color:rgb(179, 179, 179);
}


</style>
</head>
<body>
    
<header class="container">

    
    <div id="logo"><img id="resimlogo" src="cake.png">SEBER <br>PASTAM</div>

    <div class="hmid">
        <nav><a id="link" href="anasayfa.php">ANASAYFA</a></nav>
        <nav><a id="link" href="tarifler.php">TARİFLER</a></nav>
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
        <form action="yazdir.php" method="post">
            <input type="text" name="arama" placeholder="Arama">
            <input type="submit" value="Ara">
        </form>
    </div>

</header>

<div class="uyecerceve">
<div class="uyecerceve1">
       <img id="hakkimdaresim" src="me.png">
       <div id="hakkimda">Merhaba, ben Furkan Seber.<br><br>
       Marmara Üniversitesi Bilgisayar ve Öğretim Teknolojileri Eğitimi Bölümü 3. sınıf öğrencisiyim.<br><br>
       Bu siteyi Web Tabanlı Programlama dersi kapsamında çeşitli pastalarla ilgilenen kişilerin birbiriyle fikirlerini paylaşması amacıyla oluşturdum.<br><br>
       Site içerisinde çeşitli pasta tarifleri paylaşabilir, farklı insanların paylaşımlarına yorumlar yapabilir ve fikirlerinizi söyleyebilirsiniz. <br>
        </div>
</div>
</div>
       





</body>
</html>

</body>
</html>