<?php 

class ImportExport{

function Import($Table){return $Table;}

function Export($Table, $array){
	
		$fo=fopen($Table, 'w');
		$list=	$array;
		foreach ($list as $line) {
	    fputcsv($fo, split(';', $line));
	}
	
	fclose($fo);

return $Table;
}



}

?>