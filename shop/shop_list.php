<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false){
    print 'ようこそゲスト様  ';
    print '<a href="member_login.html">会員ログイン</a>';
}
else{
    print 'ようこそ';
    print $_SESSION['member_name'];
    print '様 ';
    print '<a href="member_login.html">ログアウト</a><br />';
    print '<br />';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ろくまる農園</title>
    </head>
    <body>

<?php

    try{

        $dsn ='mysql:host=localhost;dbname=shop;charset=utf8';
        $user ='root';
        $password ='root';

        $dbh = new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT code,name,price FROM mst_product WHERE 1';
        $stmt = $dbh-> prepare($sql);   // $stmtの中に全てのデータを格納
        $stmt-> execute(); 

        $dbh = null;

        print '<br /><br />商品一覧<br /><br />';

        while(true){

            $rec = $stmt-> fetch(PDO::FETCH_ASSOC); // $stmtから1レコード取り出す

            if($rec == false){  // 最終データまで行ったら
                break;
            }
            print '<a href="shop_product.php?procode='.$rec['code'].'">';
            // print '<input type="radio" name="procode" value="'.$rec['code'].'">';
            print $rec['name'].'---';
            print $rec['price'].'円';
            print '</a>';
            print '<br />';
        }
    
        print '<br /> ';
        print '<a href="shop_cartlook.php">カートをみる</a><br />';
        print '</form>';

    }catch(EXCEPTION $e){
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }

?>

    </body>
</html>