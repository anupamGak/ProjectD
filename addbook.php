<!DOCTYPE html>
<html>

<head>
<title>Library - Add Book</title>
<link rel="stylesheet" type="text/css" href="layout.css">
</head>

<body>
<div id="container">
  <div id="header">
    <h1 id="logo">Library</h1>
  </div>
  
  <div id="side">
    <a href="/ProjectD/library.html">Browse</a>
	<a href="/ProjectD/add.html">Add Book</a>
	<a href="http://www.youtube.com" target="_blank">Return Book</a>
	  
  </div>

  <div id="content">
    <?php
	    $code=$_POST["code"];
		$acode=$_POST["acode"];
		$title=$_POST["title"];
		$author=$_POST["author"];
		$qty=$_POST["qty"];
		$sql="";
		$i="";
		$j="";
		
		for($i=0;$title[$i];$i++)
		{
		    $l=strlen($title);
		    if($title[$i]=="'" || $title[$i]=='"' || $title[$i]=="\\")
			{
			    for($j=$l;$j>=$i;$j--)
				{
				    $title[$j]=$title[$j-1];
				}
				$title[$i]="\\";
				$i++;
			}
		}


		
		if($code=="")
		{
		    $sql="INSERT INTO book (code,title,author,stock)
			      VALUES ('$acode','$title','$author','$qty')";
		}
		else
		{
		    $sql="UPDATE book
			      SET stock=stock+$qty
				  WHERE code=$code";
		}
		
		$con=mysqli_connect("localhost","root","","book");
		if (mysqli_connect_errno($con))
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
		else
        {   echo "Success!!";  }
		mysqli_query($con,$sql);
		echo "<h1>Book Successfully Added</h1>";
		mysqli_close($con);
	?>
  </div>
  <div id="footer">
  Copyright</div>

 </div>   

</body>

</html>