<?php 
	header('Content-Type: text/html; charset=utf-8');


	//Библиотека => Зависимость
	$libs = [
		0 => [2],
		1 => [0],
		2 => [4],
		3 => [1,4],
		4 => [null],
		5 => [1,2,4],
		6 => [0,3,7,8],
		7 => [1,3,4],
		8 => [5,7]
	
	];
	
	$order = array();

	

	function dependencies($lib_num, $libs, $order){
	    if (!in_array($lib_num, $order)){
    		foreach ($libs[$lib_num] as $lib){
    		    if (!in_array($lib_num, $order)){
        			if (in_array($lib, $order)){ 
        				
        			} else if ($lib===null){
        				$order[] = $lib_num;
        			} else { 
        				$order = dependencies($lib, $libs, $order); 
        			}
    		    }	
    		}
    		if (!in_array($lib_num, $order)){
    		    $order[] = $lib_num; 
    		}
	    }
		return $order; 
	}
    
    $possibility = false;
    foreach($libs as $lib) {
		if ($lib[0] === null) {
		    $possibility = true;
		}
	}
    
    if ($possibility == true) {
    	foreach($libs as $num_lib => $lib) {
    		$order = dependencies($num_lib, $libs, $order);
    	}
    	echo 'Порядок установки библиотек учитывая зависимость: ';
    	foreach ($order as $l) {
    	    echo $l.' ';
    	}
    } else {
        echo 'Error: Библиотеки с такой зависимостью невозможно установить!';
    }

 ?>
