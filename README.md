# Php Routers ( Yönlendiriciler )
Php Routers ( Yönlendiriciler )


## Kurulum

1. Kullanılmak istenen sayfada "router.php" kütüphanesi sayfaya dahil edilir.
2. $routers = new Router(); // Router ( Yönlendirici ) tetiklenir. 
3. $routers::config(array("error_none" => 1)); // İsteğe bağlı olarak ayarlamalar yapılır.


## Koşulların Yapılandırılması

Router::any ve Router::post olmak üzere 2 türdedir.

Router::any  : Her iki gönderi türünü ( GET ve POST ) kapsamaktadır.
Router::post : Sadece POST gönderi türünde çalışmaktadır.



