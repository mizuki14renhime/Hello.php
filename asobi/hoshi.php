<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ろくまる農園</title>
    </head>
    <body>
    
    </body>
</html>

<?php
$mbango=$_POST['mbango'];

$hoshi['M1']='かに星雲';
$hoshi['M31']='アンドロメダ大星雲';
$hoshi['M42']='アリオン大星雲';
$hoshi['M45']='すばる';
$hoshi['M57']='ドーナツ星雲';

foreach($hoshi as $key => $val)
{
    print $key. 'は、' .$val;
    print '<br />';
}

print 'あなたが選んだ星は、';
print $hoshi[$mbango];

?>
