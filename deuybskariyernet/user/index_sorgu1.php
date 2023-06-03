<?php

$sorgu2 = $db->prepare("SELECT DISTINCT
kurum_ilanlari_yetenek.ilan_id, 
kurum_ilanlari.kurum_id,
kurum.kurum_ad,
kurum_ilanlari.pozisyon_id, 
pozisyon.pozisyon_ad,
kurum_ilanlari.sehir_id,
sehir.sehir_ad,
kurum_ilanlari.ilanturu_id,
ilanturu.ilanturu_ad,
kurum_ilanlari.ilan_aciklama
FROM kurum_ilanlari_yetenek, kurum_ilanlari, kurum, pozisyon, sehir, ilanturu
WHERE kurum_ilanlari_yetenek.ilan_id = kurum_ilanlari.ilan_id AND
kurum_ilanlari.kurum_id = kurum.kurum_id AND
kurum_ilanlari.pozisyon_id = pozisyon.pozisyon_id AND
kurum_ilanlari.sehir_id = sehir.sehir_id AND
kurum_ilanlari.ilanturu_id = ilanturu.ilanturu_id AND
yetenek_ad IN
	(
    SELECT kullanici_yetenek.yetenek_ad
	FROM kullanici_yetenek
	WHERE kullanici_yetenek.ogrenci_no = ?
	)
ORDER BY kurum.kurum_id ASC, pozisyon.pozisyon_id ASC, sehir.sehir_id ASC");
$sorgu2->execute([$ogrenci_no]);
$kullanicinin_profiline_uygun_ilanlar_listesi = $sorgu2->fetchAll(PDO::FETCH_OBJ);

?>