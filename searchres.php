<!DOCTYPE html>
<html>

<head>
<title>Library-Add Book</title>
<link rel="stylesheet" type="text/css" href="layout.css">
</head>

<body>
<div id="container">
  <div id="header">
    <h1 id="logo">Library</h1>
  </div>
  
  <div id="side">
    <a href="/ProjectD/search.html">Search</a>
    <a href="/ProjectD/library.html">Browse</a>
	<a href="/ProjectD/add.html">Add Book</a>
	<a href="http://www.youtube.com" target="_blank">Return Book</a>
  </div>
  
  <div id="content">
	<?php
		$src=$_POST["search"];
		$stype=$_POST["srctype"];
		$k=0;
		$ft=0;
		$fa=0;
		$i=0;
		$j=0;
		
		
		$con=mysqli_connect("localhost","root","","book");
		$qet="SELECT title
		      FROM book";
		$qea="SELECT author
			  FROM book";
		$rea=mysqli_query($con,$qea);
		$ret=mysqli_query($con,$qet);
		
		
		$fxtt=mysqli_fetch_array($ret);
		$fxta=mysqli_fetch_array($rea);
		$extt=strtolower($fxtt[0]);
		$exta=strtolower($fxta[0]);
		
		$lt=strlen($extt)-strlen($src[$k]);
		$la=strlen($exta)-strlen($src[$k]);
		
		echo "<h1>Search Results</h1>"
		echo "<table>";
		echo "<tr> <th>Title</th> <th>Author</th> </tr>";
		while($extt)
		{
			for($i=0;$i<=$lt;$i++)
			{
				$ft=0;
				for($j=0;$src[$j];$j++)
				{
				    /*echo $extt[$i+$j];*/
					if($extt[$i+$j]==$src[$j])
					{	$ft++;	}
					/*echo "$ft";
					echo strlen($src);
					echo "<br>";*/
					
				}
				if($ft==strlen($src))
				{	break;	}	
			}
			for($i=0;$i<=$la;$i++)
			{
				$fa=0;
				for($j=0;$src[$j];$j++)
				{
					if($exta[$i+$j]==$src[$j])
					{	$fa++;	}	
				}
				if($ft==strlen($src))
				{	break;	}
			}
			if($ft==strlen($src) || $fa==strlen($src))
			{
				echo "<tr>
						<td>$fxtt[0]</td> <td>$fxta[0]</td> </tr>";
				echo "Found<br>";
			}
			$fxtt=mysqli_fetch_array($ret);
		    $fxta=mysqli_fetch_array($rea);
			$extt=strtolower($fxtt);
			$exta=strtolower($fxta);
			$lt=strlen($extt)-strlen($src);
		    $la=strlen($exta)-strlen($src);
		}
		echo "</table>";
				
		
	
	?>
  </div>



  <div id="footer">
  Copyright</div>

 </div>   

</body>

</html>