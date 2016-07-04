# Php Routers ( Yönlendiriciler )
Php Routers ( Yönlendiriciler )


## Kurulum

1. Kullanılmak istenen sayfada "router.php" kütüphanesi sayfaya dahil edilir.
2. $routers = new Router(); // Router ( Yönlendirici ) tetiklenir. 
3. $routers::config(array("error_none" => 1)); // İsteğe bağlı olarak ayarlamalar yapılır.
4. Router::any ve  Router:Post koşullandırılmaların yapılması
5. $routers->router(); ile yönlendiricinin çalıştırımlası.

## Koşulların Yapılandırılması

Router::any ve Router::post olmak üzere 2 türdedir.

Router::any  : Her iki gönderi türünü ( GET ve POST ) kapsamaktadır.                        
Router::post : Sadece POST gönderi türünde çalışmaktadır.

Örneğin;

Router::post sadece kullanıcıdan arka plandan girdi alındığında çalışmaktadır. Bkz : Kullanıcı Kayıt Sistemi gibi 
Router::any ise her iki gönderi türünde çalışmaktadır.

## Örnek Yönlendiriciler

    Router::any("/","views/welcome.php",array());
    Router::any("/index.html","views/welcome.php",array());

example.com ve example.com/index.html sayfalarına girildiği zaman yönlendirici views/welcome.php php sayfasına yönlendirir.

    Router::any("/breaking-news/([0-9]+).html","views/breaking-news.php",array("news-id"));

example.com/breaking-news/1.html girdiği zaman yönlendirii views/breaking-news.php php sayfasına yönlendirir.

([0-9]+) tanılmalanan alan sadece sayı gelecek şekilde şartlandırır ve şart sağlanır ise sayfaya yönlendirileçeğini unutmayınız.

example.com/breaking-news/bir.html şeklinde kullanılması halinde



    Router::any("/breaking-news/(.*)-([0-9]+).html","views/breaking-news.php",array("news-title","news-id"));

example.com/breaking-news/son-dakika-haberi-1.html


