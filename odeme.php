<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sanal Pos</title>
  </head>
  <body>
  <?php
$clientId		=	"xxxxxx";	//	Bankadan Sanal Pos Onaylanınca Bankanın Verdiği İşyeri Numarası
$amount			=	"xxxxxx";	//	Sepet Ücreti yada İşlem Tutarı yada Karttan Çekilecek Tutar
$oid			=	"xxxxxx";	//	Sipariş Numarası (Tekrarlanmayan Bir Değer) (Örneğin Sepet Tablosundaki IDyi Kullanabilirsiniz) (Her İşlemde Değişmeli ve Asla Tekrarlanmamalı)
$okUrl			=	"http://www.siteadiniz.com/odemetamam.php";	//	Ödeme İşlemi Başarıyla Gerçekleşir ise Dönülecek Sayfa
$failUrl		=	"http://www.siteadiniz.com/odemehata.php";	//	Ödeme İşlemi Red Olur ise Dönülecek Sayfa
$rnd			=	@microtime();
$storekey		=	"xxxxxx";	// Sanal Pos Onaylandığında Bankanın Size Verdiği Sanal Pos Ekranına Girerek Oluşturulacak Olan İş Yeri Anahtarı
$storetype		=	"3d";	//	3D Modeli
$hashstr		=	$clientId.$oid.$amount.$okUrl.$failUrl.$rnd.$storekey;	// Bankanın Kendi Ayarladığı Hash Parametresi
$hash			=	@base64_encode(@pack('H*',@sha1($hashstr)));	// Bankanın Kendi Ayarladığı Hash Şifreleme Parametresi
$description	=	"xxxxxx";	//	Extra Bir Açıklama Yazmak İsterseniz Çekim İle İlgili Buraya Yazıyoruz
$xid			=	"";		//	20 bytelik, 28 Karakterli base64 Olarak Boş Bırılınca Sistem Tarafindan Ototmatik Üretilir. Lütfen Boş Bırakın
$lang			=	"";		//	Çekim Gösterim Dili Default Türkçedir. Ayarlamak İsterseniz Türkçe (tr), İngilizce (en) Girilmelidir. Boş Bırakılırsa (tr) Kabu Edilmiş Olur.
$email			=	"xxxxxx";	//	İsterseniz Çekimi Yapan Kullanıcınızın E-Mail Adresini Gönderebilirsiniz
$userid			=	"xxxxxx";	//	İsterseniz Çekimi Yapan Kullanıcınızın Idsini Gönderebilirsiniz
?>
<div class="container"></div>
  <div class="row">
    <div class="col-6 mt-5 ms-5 me-5">
    <h3 class="text-center mb-3">SANAL POS</h3>
    <form method="post" action="https://<sunucu_adresi>/<3dgate_path>"> <!-- Bu Adres Banka veya EST Firması Tarafından Verilir -->
	<input class="form-control" type="hidden" name="clientid" value="<?=$clientId?>" />
	<input class="form-control"type="hidden" name="amount" value="<?=$amount?>" />
	<input class="form-control"type="hidden" name="oid" value="<?=$oid?>" />
	<input class="form-control"type="hidden" name="okUrl" value="<?=$okUrl?>" />
	<input class="form-control"type="hidden" name="failUrl" value="<?=$failUrl?>" />
	<input class="form-control"type="hidden" name="rnd" value="<?=$rnd?>" />
	<input class="form-control"type="hidden" name="hash" value="<?=$hash?>" />
	<input class="form-control"type="hidden" name="storetype" value="3d" />	
	<input class="form-control"type="hidden" name="lang" value="tr" />
    <table class="table">
        <tr>
            <td scope="col">Kredi Kart Numarası</td>
            <td scope="col"><input type="text" name="pan" size="20" />
        </tr>
        <tr>
            <td>Son Kullanma Tarihi</td>
            <td><select class="form-select"name="Ecom_Payment_Card_ExpDate_Month">
            <option value=""></option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            </select><br>
            <select class="form-select"name="Ecom_Payment_Card_ExpDate_Year">
            <option value=""></option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            </select></td>
        </tr>
        <tr>
            <td>Kart Türü</td>
            <td><input type="radio" value="1" name="cardType"> Visa <input type="radio" value="2" name="cardType"> MasterCard</td>
        </tr>
        <tr>
            <td>Güvenlik Kodu</td>
        	<td><input type="text" name="cv2" size="4" value="" /></td>
        </tr>
        <tr>
            <td align="center">&nbsp;</td>
            <td align="left"><input class="btn btn-dark"type="submit" value="Ödeme Yap" /></td>
        </tr>
    </table>
</form>
    </div>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>