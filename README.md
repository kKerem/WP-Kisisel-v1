# Menü
- ustMenu
  - ( :first-child için margin-left ve padding-left değerleri sıfır )
- altMenu

# Şablon Çeşitleri
- sayfalama-dikey.php
- sayfalama-dikey4.php
- sayfalama-genis.php
- sayfalama-genis4.php
- sayfalama-normal.php
- sayfalama-ulasim.php

# Kategori Kullanımı
Özelleştirilmiş kategori şablonları atanmış slug değerlerine göre çalışmakta.

Örneğin “webtasarim” slugına sahip bir kategori için tema dosyasının içerisine category-webtasarim.php diye bir belge oluşturulup sayfalama-dikey şablonunun eklenmesi gerekli.

Kullanım (category-webtasarim.php 14. satır) `<?php get_template_part( 'sayfalama', 'dikey' ); ?>`

# Şartlar
- PHP 5.6 veya daha üstü
- PHP modülü: mbstring

# Ekstra
Temayı 2015’in Mart ayında sadece kendi kullanımım için yaptığımdan dolayı son derece sade ve işime yaramayacak şeyler ekli değil. Birşeylere ihtiyacı olanların kendisi yapması gerekli, herhangi bir destek vermiyorum.

# Değişiklikler

(29 Eylül 2017) – v1.01.1
- Full responsive işlevi eklendi
- Temanın stil dosyasında değişiklikler yapıldı
- Sayfalama sorunu düzeltildi

(17 Kasım 2017) – v1.01.1b
- substr, strlen fonksiyonları mbstring ile değiştirildi
- Özelleştirilmiş 3 bileşen eklendi
- Arşiv sayfası tekrar düzenlendi

(30 Aralık 2017) – v1.01.1c
- Özelleştirilmiş 2 şablon eklendi
- Temanın stil dosyasında değişiklikler yapıldı
- Navigasyon eklendi

(8 Şubat 2018) – v1.01.02
- Temanın stil dosyasında değişiklikler yapıldı
- Beğeni butonu eklendi
