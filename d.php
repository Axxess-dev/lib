<?php class D {
  function __construct($r=false) {
    $p = [];
    if(is_object($r)) {
      if(isset($r->d)&&isset($r->u)&&isset($r->p)) {
        try {
          $d = new PDO($r->d,$r->u,$r->p);
          $d->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
          $p['e'] = $e->getMessage();
          return $p;
        }
        if(isset($r->q)) {
          try {
            $s = $d->prepare($r->q);
          } catch (PDOException $e) {
            $p['e'] = $e->getMessage();
            return $p;
          }
          if(isset($r->e)) {
            try {
              $s->execute($r->e);
            } catch(PDOException $e) {
              $p['e'] = $e->getMessage();
              return $p;
            }
            $last = $d->lastInsertId();
            if($last) {
              $p['i'] = $last;
            }else{
              if(isset($r->s)) {
                $p = $s->fetch(PDO::FETCH_ASSOC);                                                                                                                              
              }else{
                $p['r'] = $s->fetchAll(PDO::FETCH_ASSOC);
              }
            }
          }
        }
      }
    }
    return $p;
  }
} ?>
