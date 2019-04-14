<?php
	$file=file('./pimadiabetes.data.txt');
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
	$error=1;
	//print_r($data);
	print_r("x0\t");
	print_r("x1\t");
	print_r("x2\t");
	print_r("x3\t");
	print_r("x4\t");
	print_r("x5\t");
	print_r("x6\t");
	print_r("x7\t");
	print_r("z\t");
	print_r("w0\t");
	print_r("w1\t");
	print_r("w2\t");
	print_r("w3\t");
	print_r("w4\t");
	print_r("w5\t");
	print_r("w6\t");
	print_r("w7\t");
	print_r("c0\t");
	print_r("c1\t");
	print_r("c2\t");
	print_r("c3\t");
	print_r("c4\t");
	print_r("c5\t");
	print_r("c6\t");
	print_r("c7\t");
	print_r("s\t");
	print_r("n\t");
	print_r("e\t");
	print_r("d\t");
	print_r("w0\t");
	print_r("w1\t");
	print_r("w2\t");
	print_r("w3\t");
	print_r("w4\t");
	print_r("w5\t");
	print_r("w6\t");
	print_r("w7\t");
	print_r("\n");
	while ($error!=0) {
		$error=0;
		foreach ($data as $key => $x) {
			for ($i=0; $i <9; $i++) {
				if ($i!=8) {
					print_r($x[$i]);
				}else{
					print_r($x[$i]);
				}
				
				print_r("\t");
			}
			for ($i=0; $i <8; $i++) {
				print_r($w[$i]);
				print_r("\t"); 
				$c[$i]=$x[$i]*$w[$i];
			}
			for ($i=0; $i <8; $i++) {
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
			$e=$x[8]-$n;
			if ($e!=0) {
				$error=1;
			}
			print_r($e);
			print_r("\t");			
			$d=$r*$e;
			print_r($d);
			print_r("\t");
			for ($i=0; $i <8; $i++) { 
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