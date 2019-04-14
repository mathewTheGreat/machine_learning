<?php
	$file=file('./pimadiabetes2.data.txt');
	$data=[];
	foreach ($file as $key => $line) {
		$line=explode(" ",$line);
		$line_edited=[];
		foreach ($line as $key => $value) {
			$line_edited[]=$value*1;
		}
		$data[]=$line_edited;
	}
	$t=0.5;
	$r=0.1;
	$w=[0,0,0];
	$c=[0,0,0];
	$check=1;
	//print_r($data);
	print_r("x0\t");
	print_r("x1\t");
	print_r("x2\t");
	print_r("z\t");
	print_r("w0\t");
	print_r("w1\t");
	print_r("w2\t");
	print_r("c0\t");
	print_r("c1\t");
	print_r("c2\t");
	print_r("s\t");
	print_r("n\t");
	print_r("e\t");
	print_r("d\t");
	print_r("w0\t");
	print_r("w1\t");
	print_r("w2\t");
	print_r("\n");
	while ($check!=0) {
		$check=0;
		foreach ($data as $key => $x) {
			for ($i=0; $i <4; $i++) {
				if ($i!=3) {
					print_r($x[$i]);
				}else{
					print_r($x[$i]);
				}
				
				print_r("\t");
			}
			for ($i=0; $i <3; $i++) {
				print_r($w[$i]);
				print_r("\t"); 
				$c[$i]=$x[$i]*$w[$i];
			}
			for ($i=0; $i <3; $i++) {
				print_r($c[$i]);
				print_r("\t");
			}
			$s=array_sum($c);
			print_r($s);
			print_r("\t");
			if ($s>$t) {
				$n=1;	
			}else{
				$n=0;
			}
			print_r($n);
			print_r("\t");
			$e=$x[3]-$n;
			if ($e!=0) {
				$check=1;
			}
			print_r($e);
			print_r("\t");			
			$d=$r*$e;
			print_r($d);
			print_r("\t");
			for ($i=0; $i <3; $i++) { 
				$w[$i]=$x[$i]*$d+$w[$i];
				print_r($w[$i]);
				print_r("\t");
			}
			print_r("\n");	
		}
		print_r("================================================================================================================================================");
		print_r("\n");
	}
	print_r("\n");
	
?>