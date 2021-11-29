<?php

$givenString = "Привет! Давно не виделись."; 

$result = revertCharacters($givenString);
echo $givenString.'<br>'; 
echo $result; // Тевирп! Онвад ен ьсиледив.	Привет! Давно не виделись.


function revertCharacters($text){
	$return_string = $text;
	$text = preg_replace("/(?!.[.=$'€%-])\p{P}/u", "", $text);

	$strings = explode(' ',$text);
	//$strings = preg_split("/\s+|\b(?=[!\?\.])(?!\.\s+)/", $text);
/*
return $strings; 
exit; 
*/
	
	$initial_string = '';
	foreach($strings as $word){
		$reversedString = revertCharactersOfString($word); 
		//echo "|".$word."|<br>"; 
		//echo "|".$reversedString."|<br>"; 		
		$return_string = str_replace($word, $reversedString, $return_string); 
	}	
	return $return_string; 
}


function revertCharactersOfString($string){	
	 
	//$chars = str_split($string);		//ENGLISH CHARACTERS ONLY 
	$chars = split_mb($string);		// NOW WORKING WITH UTF-8 RUSSIAN CHARACTERS
	$return_string = ""; 	
	foreach (array_reverse($chars) as $value) {
		$return_string.=$value; 
	}	
	return $return_string; 	
}


function split_mb($str, $len = 1) {
    $arr		= [];
    $length 	= mb_strlen($str, 'UTF-8');
    for ($i = 0; $i < $length; $i += $len) {
        $arr[] = mb_substr($str, $i, $len, 'UTF-8');
    }
    return $arr;
}
