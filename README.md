## Kurulum

- docker-compose up -d
- composer install
- .env dosyasının ayarlanması.
- docker-compose exec app php artisan migrate
- docker-compose exec app php artisan db:seed
- docker-compose exec app php artisan queue:work ( cache driver redis,database vs. ayarlandığı durumda kullanılmalı )


## Admin - Crud İşlemleri
Admin Giriş Bilgileri
```
 Email: admin@admin.com
 Şifre: 123123
 
 NOT: Kullanıcı Seeder ile oluşturuluyor, öncelikle seeder çalıştırılmalıdır.
```


## Kullanım

- http://localhost:8088/ ( Anasayfada ) Sistemdeki tüm kategoriler nested bir şekilde listelenmektedir, kategorilerden birine tıklandığında o kategori ve alt kategorilerine ait ürünler sayfalı bir şekilde listelenmektedir.

- Admin panel'den aşağıdaki işlemler yapılmaktadır; 
  - Kategori Ekleme
  - Kategori Silme
  - Kategori Güncelleme
  - Ürün Ekleme
  - Ürün Silme
  - Ürün Güncelleme

- Modeller aracılığı ile yapılan tüm işlemler database'deki logs tablosunda tutulamktadır. **( Admin panelde logların görüneceği bir alan yok )**
