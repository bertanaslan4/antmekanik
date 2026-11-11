# Ant Mekanik

Mekanik tesisat projeleri için Laravel tabanlı hesaplama ve proje yönetim uygulaması. Kazan, boyler, brülör, sirkülasyon pompası, genleşme tankı, hidrofor, güneş enerjisi, yağmur suyu, havalandırma ve borulama gibi ekipmanlar için hesap modülleri içerir.

## Özellikler

- Kullanıcı kaydı ve girişi, şifremi unuttum
- Proje oluşturma, listeleme ve güncelleme
- Ekipman bazlı hesap modülleri: kazan, boyler, brülör, pompa, genleşme tankı, ısı eşanjörü, hidrofor, havuz, soğuk hava deposu, toplayıcı (kollektör)
- Güneş enerjisi, yağmur suyu ve yakıt tüketimi hesapları
- Boru hesabı ve boru yalıtımı, boru basınç kaybı
- Hesap sonuçlarının PDF olarak üretimi
- Yönetici ayarları ve müşteri yönetimi

## Kullanılan teknolojiler

- PHP / Laravel
- MySQL
- Blade şablonları

## Kurulum

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

`.env` dosyasında MySQL bilgilerini girin, sonra:

```bash
php artisan migrate
php artisan serve
```

Uygulama `http://localhost:8000` adresinde açılır.

## Güvenlik notu

Bu repoda `.env` dosyası takip ediliyor. Repodan kaldırılmalı ve içindeki şifreler yenilenmelidir.

## Lisans

Lisans dosyası bulunmamaktadır.
