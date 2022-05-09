<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# A.	Kategori İşlemleri
E-ticaret sistemimizde bir Admin paneli bulunmaktadır.
Admin kullanıcısı bu panel üzerinden istediği şekilde ana kategori ve alt kategoriler ekleyebilmektedir. 
Kategoriye ait başlık, anahtar kelime, açıklama değerleri girilmektedir.

# B.	Ürün İşlemleri
Aynı zamanda Admin paneli üzerinden ürünlerde eklenebilmektedir. Sistemimiz ikinci el alışveriş sistemi olduğu için sıradan kullanıcılarda ürün girişi yapabilmektedir.
Admin Kullanıcısı sistemdeki tüm ürünleri düzenleyip silebilme yetkisine sahiptir sıradan kullanıcılar ise sadece kendisine ait ürünlere erişebilmektedir.


# C.	Kullanıcı İşlemleri
E-ticaret sistemimize kayıt olunabilir ve giriş yapılabilir.
Her kullanıcı kayıt olduktan sonra kendi bilgilerini düzenleyebilir. Admin kullanıcısı tüm kullanıcalara erişebilir müdahale edebilir.


# D.	Sepet
Kullanıcılar beğendikleri ürünü sepetine ekleyebilir, sepetinden geri çıkartabilir.

Kendi ürününü sepete ekleyemez.

Birden fazla ürünü sepete ekleyemez


# E.	Sipariş
Her kullanıcı kendi ürünlerine gelen siparişleri görebilir.
Admin bütün siparişleri görebilir

Satın alan kullanıcı süreci takip edebilir.

Sipariş Süreci; Yeni->Kabul edilen->Kargoda->Tamamlanmış


# F.	Settings
Admin kullanıcısı panel üzerinden site ayarlarını rahatlıkla değiştirebilir. Değiştirilebilen değerler ;
•	Title
•	Description
•	Keywords
•	Şirket İsmi
•	Adres
•	Telefon
•	FAX
•	Sosyal Medya Hesapları
•	E-posta
•	SMTP Değerleri
•	Referanslarım 
•	İletişim
•	Hakkımızda

## Veritabanı Tasarımı İlişkiler laravel models içerisinde oluşturulduğu için tasarımda gözükmemektedir
![githubdatabase](https://user-images.githubusercontent.com/57008579/167486916-1b0d97e8-49b4-40e6-b67f-5e2567d1dbca.jpg)
