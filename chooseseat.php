<?php
try {
    $pdo= new PDO('mysql:host=localhost;dbname=dat_cho', 'root','');
    $sql = "SELECT seat FROM dat_cho WHERE seat IS NOT NULL";
    $results =  $pdo->query($sql)->fetchAll();

    $seats= array_map(function ($result) {
        return $result['seat'];
    }, $results);
    $array_seats= ['A1','A2','A3','A4','A5','A6'];

    $title = 'chooseseat';
    $css =  'public\css\home.css?n=1.1';
    $js =  [
        'public\js\jquery-3.2.1.min.js',
        'public\js\test.js?n=1'
    ];

    ob_start();
    include __DIR__ .'\template\chooseseat.html.php';
    $content = ob_get_clean();

    ob_start();
    include __DIR__ .'\template\choooseat.js.html.php';
    $script = ob_get_clean();
}
catch (PDOException $e) {
    echo $e->getMessage();
}

include  __DIR__ . '\template\layout.html.php';