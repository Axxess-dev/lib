<?php class R {
  function __construct($r=false){
    foreach($r as $k){
      $f=$k.'.php';
      if(file_exists($f)){
        require_once($f);
      }else{
        file_put_contents($f,file_get_contents('https://raw.githubusercontent.com/Axxess-dev/lib/master/'.$f));
      }
    }
  }
} ?>
