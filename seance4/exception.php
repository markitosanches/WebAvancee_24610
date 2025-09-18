<?php

function divide($dividend, $divisor){
    if($divisor == 0){
        throw new Exception('Divisor cannot be Zero', 2945);
    }
    return $dividend/$divisor;
}


try{
    echo divide(10, 0);
}catch(Exception $e){
//   echo "<pre>";
//   var_dump($e);
//   echo "</pre>";

  echo "Message: ".$e->getMessage();
  echo "<br>";
  echo "Code: ".$e->getCode();
  echo "<br>";
  echo "Line: ".$e->getLine();
  echo "<br>";
  echo "File: ".$e->getFile();

}finally{
  echo "<br>";
  echo "End Operation";   
}


?>