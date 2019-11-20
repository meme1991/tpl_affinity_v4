<?php

/**
  * Ordinare un array multidimensionale per un campo stabilito
  * @param $array multidimensionale da ordinale
  * @param $key chiave del campo da prendere in considerazione per l'ordinamento
  * @return array multidimensionale ordinato
  */
function unique_multidim_array($array, $key){
  $temp_array = array();
  $i = 0;
  $key_array = array();

  foreach($array as $val) {
      if (!in_array($val[$key], $key_array)) {
          $key_array[$i] = $val[$key];
          $temp_array[$i] = $val;
      }
      $i++;
  }
  return $temp_array;
}

function array_orderby(){
  $args = func_get_args();
  $data = array_shift($args);
  foreach ($args as $n => $field) {
    if (is_string($field)) {
      $tmp = array();
      foreach ($data as $key => $row)
        $tmp[$key] = $row[$field];
      $args[$n] = $tmp;
    }
  }
  $args[] = &$data;
  call_user_func_array('array_multisort', $args);
  return array_pop($args);
}

/**
  * Conversione di un colore in esadecimale in RGB
  * @param $hexcode colore in esadecimale
  * @return array RGB
  */
function hexToRGB ($hexcode){
	$redhex  = substr( $hexcode, 1, 2 );
	$greenhex = substr( $hexcode, 3, 2 );
	$bluehex = substr( $hexcode, 5, 2 );


	$r = hexdec($redhex);
	$g = hexdec($greenhex);
	$b = hexdec($bluehex);

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
  * Replace di tag per titoli dei moduli
  * @param $string
  * @return stringa formattata
  */
function titleSection($string){
  return str_replace(['{b}','{/b}','{g}','{/g}'], ['<strong>', '</strong>', '<span>', '</span>'], $string);
}

/**
  * Troncamento dei titoli se troppo lunghi
  * @param $string
  * @return stringa troncata o meno
  */
function titleTruncate($string){
  if(strlen($string) > 15)
    $string = substr($string, 0, 15)."...";
  return $string;
}

?>
