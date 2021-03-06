<?php

class Convert extends Controller implements convertion
{

  public function create($number = '')
  {
    $num = $number;
    echo $num;
    function convert($num){
        $roman = "";
        if($num > 4000 || $num<=0 ){
          echo "please enter a number between 1 to 3999";
        }
        else{
          //2273
          if($num >= 1000){
            $piece = floor($num/1000);
            for ($i=0; $i< $piece; $i++){
              $roman .= 'M';
            }
            $num = $num % 1000;
          }
          //227
          if($num >= 100){
           $piece = (floor($num / 100));
            if($piece == 9){
               $roman .= "CM";
            }
            else if($piece >= 5){
              $roman .= 'D';
              for($i = 0; $i < $piece-5; $i++) {
                $roman .= 'C';
              }
            }
            else if($piece == 4) {
              $roman .= "CD";
            }
            else if($piece >= 1) {
              for($i=0; $i<$piece; $i++){
                $roman .= 'C';
              }
            }
            $num = $num % 100;
          }

          //27
          if ($num >= 10){

                  $piece = (floor($num /10));
                  if($piece == 9){
                    $roman .= "XC";
                  }
                  else if ($piece >= '5') {
                    $roman .= 'L';
                    for($i=0; $i<$piece-5; $i++){
                      $roman .= 'X';
                    }
                  }
                  else if ($piece == 4){
                    $roman .= "XL";
                  }
                  else if ($piece >= 1){
                    for($i=0; $i<$piece; $i++){
                      $roman .= 'X';
                    }
                  }
                  $num = $num % 10;
          }
          //7
          if ($num >= 1) {
            $piece = floor($num) ;
            if($piece == 9){
             $roman .= "IX";
            }
            else if($piece >= 5){
              $roman .= "V";
              for($i = 0; $i < $piece - 5; $i++){
                $roman .= "I";
              }
            }
            else if($piece == 4){
              $roman .= "IV";
            }
            elseif($piece >= 1){
              for($i=0; $i< $piece; $i++){
                $roman .= 'I';
              }
            }
          }
          return  $roman;
        }
      }
      $converted_number = convert($number);
      echo $converted_number;
      Number::create([
       'number' => $num,
       'roman' => $converted_number,
      ]);
      $status_code = 200;
      $this->view('/status', ['statusCode' => $status_code]);
  }

}
