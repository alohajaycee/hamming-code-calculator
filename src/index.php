<?php
	function parcount($bin)
	{
		$k = strlen($bin);
		$par=0;
		$x=1;
		for ($i=2;($x*2)<=$k; $i++)
		{
		
			$x=$x*2;
			$par=$i;
		}
		return $par;
	}
	function bitcount($bin)
	{
		return strlen($bin);
	}
	function codecount($bin)
	{
		return parcount($bin)+bitcount($bin);
	}
	function placebit($bin)
	{
		$bin = str_split($bin);
		return $bin;
	}
	error_reporting(0);
	if ($_POST['mode']=="odd")
	{
		$what1="1";
		$what2="0";
	}
	elseif ($_POST['mode']=="even")
	{
		$what1="0";
		$what2="1";
	}
	if (isset($_POST['bin']))
	{
		$x = $_POST['bin'];
		$parity = parcount($x);
		$bit = bitcount($x);
		$word =	codecount($x);
		$y=array();
		$y[0]=1;
		$q = 1;
		$z=0;
		$parse="";
		for ($i=1;($q*2)<=$bit; $i++)
		{
				$q=$q*2;
				$y[$i] = $q;
		}
		for ($i=1; $i <= $word; $i++)
		{ 
			if (in_array($i, $y))
			{
				$parse.="x";
			}
			elseif(!in_array($i, $y))
			{
				$parse.=$x[$z];
				$z++;
			}
		}
		$p=array();
		for ($i=0; $i <count($y) ; $i++)
		{ 
			$w = $y[$i]-1;
			$x = $y[$i]+$w;
			while ($w<strlen($parse))
			{
				while($w<$x)
				{
					if ($w<strlen($parse)) {
						$p[$i].=$parse[$w];
					}
					
					$w++;
				}
					$w = $w + $y[$i];
					$x = $w + $y[$i];
			}
		} ?>
		<table border=1>
			<tbody>
		<?php
		$final = $parse;
		$final = str_split($final);
		for ($i=0; $i <count($p) ; $i++) { 
			echo "<br>";?>
			<tr>
				<td>Parity <?=$y[$i]?></td>
				<td><?=$p[$i]?></td>
			<?php
			if ( substr_count($p[$i],1) & 1 )
			{
				$g = $y[$i];
				$new = $what1;
				echo "<td>Odd</td>";
				$final[$g-1] = $new;
			}
			else
			{
				$g = $y[$i];
				$new = $what2;;
				echo "<td>Even</td>";
				$final[$g-1] = $new;
			}
		}
		$it = implode($final);
	}
?>
<html>
	<head>
		<title>Hamming Code Calculator</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<form method = POST>
			<div class="box content center">
				<input type="text" name="bin"/>
				<input type="submit"  class="btn" name = "mode" value="odd">
				<input type="submit"  class="btn" name = "mode" value="even">
			</div>
		</form>
		<?php
			if(isset($_POST['bin'])){$x = $_POST['bin']; ?>
			<div class="center boxi content">Information</div>
			<div class="box content">
			<div class="ans">
				<p>Data Input: <?=$x?></p>
				<p>Data Sent: <?=$it?></p>
				</div>
			</div>
			<?php
			}
		?>
	</body>
</html>
