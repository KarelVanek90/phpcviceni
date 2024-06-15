<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>

</head>

<body>
   <h1>Evidence knih</h1>
   <ul>
      <li><a href="./new.php">Vkladani novych knih</a></li>
      <li><a href="./prehled.php">Prehled knih</a></li>
      <li><a href="./find.php">Vyhledavani knih</a></li>
   </ul>

   <h2>Nova kniha</h2>
   <form action="new.php" method="POST" class="form-add">
      <input type="text" name="isbn" placeholder="ISBN" />
      <input type="text" name="jmeno" placeholder="Jmeno autora" />
      <input type="text" name="prijmeni" placeholder="Prijmeni autora" />
      <input type="text" name="kniha" placeholder="Nazev knihy" />
      <textarea name="popis" id="" rows="5" cols="40" placeholder="Popis knihy"></textarea>
      <input type="submit" value="Odeslat" />
   </form>


   <!-- PHP script -->
   <?php
   include("./dbLogin.php");
		if (!($con = mysqli_connect($host,$user,$password,$db))) {
			die("Nelze se připojit k databázovému serveru!</body></html>");
		}
      mysqli_query($con,"SET NAMES 'utf8'");
		if (mysqli_query($con, "INSERT INTO knihy(ISBN, Jmeno, Prijmeni, Kniha, Popis) VALUES('" . 
      addslashes($_POST["isbn"]) . "', '" . 
      addslashes($_POST["jmeno"]) . "', '" .
      addslashes($_POST["prijmeni"]) . "', '" .
      addslashes($_POST["kniha"]) . "', '" . 
      addslashes($_POST["popis"]) . "')")) 
      {
			echo "Úspěšně vloženo.";
		}
		else {
			echo "Nelze provést dotaz.";
		}
		mysqli_close($con);
	?>



</body>

</html>