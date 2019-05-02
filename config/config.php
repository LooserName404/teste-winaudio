<link rel="stylesheet" href="./../../view/css/styles.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<?php

spl_autoload_register(function ($class) {
    require_once('..'. DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . rtrim($class, 'DAO') . '.class.php');
});
spl_autoload_register(function ($dao) {
    require_once('..'. DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'dao' . DIRECTORY_SEPARATOR . rtrim($dao, 'DAO') . '.dao.php');
});


function cpfFormatado($cpf){
    $cpf = str_pad($cpf,11,'0',STR_PAD_LEFT);
    $cpf = substr_replace($cpf,'.',3,0);
    $cpf = substr_replace($cpf,'.',7,0);
    $cpf = substr_replace($cpf,'-',11,0);
    return $cpf;
}