<?php
    session_start();
    session_regenerate_id(true);

    require_once('../common/common.php');

    $post = sanitize($_POST);
    // var_dump($post);

    $max = $post['max'];
    // var_dump($max);

    //ver_dump($post['kazu']);

    for($i = 0; $i < $max; $i++){

        if(preg_match("/\A[0-9]+\z/", $post['kazu'.$i]) == 0){
            
            
            print '数量に誤りがあります。<br />';
            print '<a href = "shop_cartlook.php">カートに戻る</a>';
            // var_dump($kazu);
            exit();
        }

        if($post['kazu'.$i] < 1 || 10 < $post['kazu'.$i]){
            print '数量はかならず1個以上10個までです。';
            print '<a href = "shop_cartlook.php">カートに戻る</a>';
            exit();
        }

        $kazu[] = $post['kazu'.$i];
    }

    $cart = $_SESSION['cart'];

    for($i = $max; 0 < $i ;$i--){

        if(isset($_POST['sakujo'.$i]) == true){
            array_splice($cart,$i,1);
            array_splice($kazu,$i,1);
        }
    }

    $_SESSION['cart'] = $cart;
    $_SESSION['kazu'] = $kazu;

    header('Location:shop_cartlook.php');
    exit();
?>