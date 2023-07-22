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
.uyecerceve{
    display:flex;
    justify-content: center;


    margin-top: 60px;

}

.uyecerceve1{
    display:flex;
    justify-content: start;
    flex-direction:column;
    align-items: center;

    border: 3px solid aqua;
    border-radius: 10px;
    padding:20px;


    width: 600px;
}

.footer{
    display:flex;
    flex-direction:column;
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

#baslikicin{
    font-size:60px;
    margin-bottom:20px;
    color:rgb(179, 179, 179);
}

.tarificinbaslik{
margin-top:40px;
font-size:20px;
color:rgb(179, 179, 179);

display:flex;
justify-content:center;
flex-direction:column;
text-align:center;
}
.tarificin{
margin-top:40px;
font-size:20px;
color:rgb(179, 179, 179);

display:flex;
flex-direction:column;
justify-content:start;
align-items:start;
text-align:justify;
}

.yorumicin{
    display:flex;
    flex-direction:column;
    width:100%;
    justify-content:start;


    margin-top:40px;
    font-size:20px;
    color:rgb(179, 179, 179);
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

<?php

     // Veri tabanına bağlanalım...
     try {
         $vt = new PDO("mysql:dbname=tarif;host=localhost;charset=utf8","root", "");
         $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     } catch (PDOException $e) {
         echo $e->getMessage();
     }  
     $sql ="select pastaci.*, uye.isim, uye.mail, uye.soyisim from pastaci, uye WHERE pastaci.yukleyen = uye.kod and pastaci.kod = :kod";
     $ifade = $vt->prepare($sql);
     $ifade->execute(Array(":kod"=>$_GET["kod"])); 

     if($kayit = $ifade->fetch(PDO::FETCH_ASSOC))
        if ($kayit == false) { // Kod bulunamadıysa 
            echo "Bu pastaya ait veriler okunamadı!";
    } else  { // Kod veri tabanında bulunduysa
        /*
        echo "<pre>";
        print_r($kayit);
        echo "</pre>";
        */
        }
        ?>

<div class="uyecerceve">
    <div class="uyecerceve1">

<div id="baslikicin" style="color:aqua;"><?php echo htmlentities($kayit["baslik"]); ?><br></div>
<img id="urunresimleri" src="<?php echo htmlentities($kayit["dosyayolu"]); ?>">

    <div class="tarificinbaslik">
                <div style="color: aqua;"><b>İÇİNDEKİLER & YAPILIŞI</b></div>
    </div>
    <div class="tarificin">
        <div> <?php echo htmlentities($kayit["tarif"]); ?></div>           
        </div>

        <!-- Comments -->
        <?php        
            $sql ="select yorum.*, uye.isim, uye.soyisim from yorum, uye WHERE yorumyapilan= :yorumyapilan and uye.kod=yorum.yorumyapan  order by yorum.vakit desc";
            $ifade = $vt->prepare($sql);
            $ifade->execute(Array(":yorumyapilan"=>$_GET["kod"]));
            ?>
            <div class="tarificinbaslik">
                <div style="color: aqua;"><b>YORUMLAR</b></div>
                <?php 
                if ($ifade->rowCount() == 0) {
                    echo "<span style='font-style:italic;'> İlk yorumu siz yapın! </span>";
                } else {
                }
                ?>


                </div>

                <?php
                        while ($kayit = $ifade->fetch(PDO::FETCH_ASSOC)) { // Tüm yorumları yazdıralım
                            ?>
                        <div class="yorumicin">
                            <div> <?php echo htmlentities($kayit["metin"]); ?> </div>
                            <div style="color:lightblue;"> <?php echo htmlentities($kayit["isim"]); echo" "; echo htmlentities($kayit["soyisim"]); ?> </div>
                            <div style="color:lightblue;"> <?php echo htmlentities($kayit["vakit"]); ?> </div>
                        </div>
                            <?php } ?> 
<?php

                    if (isset($_SESSION["kod"])) { // Giriş yapıldıysa yorum yapabilsin
                        ?>
                        <form action="yorumkontrol.php" method="post">
                            <div class="footer">
                                <textarea  style="font-family:'Times New Roman', Times, serif;" class="formbloklari" name="yorum" rows="6" ></textarea>
                            <input type="hidden" name="kod" value="<?php echo $_GET["kod"]; ?>">
                            <input id="girisyap" type="submit" name="formdangelen" value ="Gönder">            
                            </div>                                
                        </form>  
                        <?php
                    }
                    ?>  
                                    <?php
                if (!isset($_SESSION["kod"])){ // Giriş yapılmadıysa
                    ?>

                <div><a style="margin-top:20px; text-decoration:none;" id="girisyap" href="giris.php">ÜYE GİRİŞİ</a></div>

                <?php } ?>  
</div>
</div>

</body>
</html>