## Kurulum

- docker-compose up -d
- composer install
- .env dosyasının ayarlanması.
- docker-compose exec app php artisan migrate
- docker-compose exec app php -d memory_limit=-1 artisan db:seed ( 2.220 Adet Kategori, her bir kategori için 3.000 ürün oluşturmaktadır, biraz uzun sürebilir. )
- docker-compose exec app php artisan queue:work ( cache driver redis,database vs. ayarlandığı durumda kullanılmalı )


## Admin - Crud İşlemleri
Admin Giriş Bilgileri
```
 Email: admin@admin.com
 Şifre: 123123
 
 NOT: Kullanıcı Seeder ile oluşturuluyor, öncelikle seeder çalıştırılmalıdır.
```


## Kullanım

- http://localhost:8088/ ( Anasayfada ) Sistemdeki tüm kategoriler nested bir şekilde listelenmektedir, kategorilerden birine tıklandığında o kategori ve alt kategorilerine ait ürünler sayfalı bir şekilde listelenmektedir. Sayfa yenilenmelerinde ürünler cache'den çekilecek şekilde tasarlanmıştır, admin panelden yapılan ürün güncellemelerinde cache temizlenmektedir.

- Admin panel'den aşağıdaki işlemler yapılmaktadır; 
  - Kategori Ekleme
  - Kategori Silme
  - Kategori Güncelleme
  - Ürün Ekleme
  - Ürün Silme
  - Ürün Güncelleme

- Modeller aracılığı ile yapılan tüm işlemler database'deki logs tablosunda tutulamktadır. **( Admin panelde logların görüneceği bir alan yok )**
