<?php

$sorgu3 = $db->prepare("SELECT DISTINCT
	kullanici.ogrenci_no,
    kullanici.kullanici_ad,
    kullanici.kullanici_soyad,
    kullanici.kullanicituru_id,
    kullanicituru.kullanicituru_ad,
    kullanici.kullanicicalismadurumu_id,
    kullanicicalismadurumu.kullanicicalismadurumu_ad
FROM kullanici
LEFT JOIN kullanicituru ON kullanici.kullanicituru_id = kullanicituru.kullanicituru_id 
LEFT JOIN kullanicicalismadurumu ON kullanici.kullanicicalismadurumu_id = kullanicicalismadurumu.kullanicicalismadurumu_id
LEFT JOIN kullanici_yetenek ON kullanici.ogrenci_no = kullanici_yetenek.ogrenci_no
WHERE kullanici_yetenek.yetenek_ad IN (SELECT kurum_ilanlari_yetenek.yetenek_ad
FROM kurum_ilanlari_yetenek, kurum_ilanlari, kurum
WHERE kurum_ilanlari_yetenek.ilan_id = kurum_ilanlari.ilan_id AND
kurum_ilanlari.kurum_id = kurum.kurum_id AND kurum_ilanlari.kurum_id = ?)
ORDER BY kullanici.ogrenci_no ASC, kullanici.kullanicituru_id DESC");
$sorgu3->execute([$kurum_id]);
$kurumun_istegine_uygun_kullanicilar_listesi = $sorgu3->fetchAll(PDO::FETCH_OBJ);

?>