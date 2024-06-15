<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="style.css">
</head>

<body>
   <h1>Evidence knih</h1>
   <ul>
      <li><a href="./new.php">Vkladani novych knih</a></li>
      <li><a href="./prehled.php">Prehled knih</a></li>
      <li><a href="./find.php">Vyhledavani knih</a></li>
   </ul>

   <h2>Prehled</h2>
   <?php
   include("./dbLogin.php");
	$con = mysqli_connect($host, $user, $password, $db);
   if (!$con) {
      die("Nelze se připojit do databáze<body></html>");
   }
   mysqli_query($con,"SET NAMES 'utf8'");
   $dotaz = "SELECT ISBN, Jmeno, Prijmeni, Kniha, Popis FROM books ";
   if (!($vysledek = mysqli_query($con, $dotaz))) {
      die("Nelze provést dotaz.</body></html>");
   }
?>

   <table border="1">
      <?php
       echo "<tr>
       <th>"."ISBN"."</th>
       <th>"."Jmeno"."</th> 
       <th>"."Prijmeni"."</th>
       <th>"."Kniha"."</th>
       <th>"."Popis"."</th>
       </tr>";
      while ($radek = mysqli_fetch_array($vysledek)) {
        echo "
         <tr>
         <td>" . $radek["ISBN"] . "</td>
         <td>" . $radek["Jmeno"] . "</td> 
         <td>" . $radek["Prijmeni"] . "</td> 
         <td>" . $radek["Kniha"] . "</td> 
         <td>" . $radek["Popis"] . "</td>
         </tr>  ";
        
      }
      mysqli_free_result($vysledek);
      mysqli_close($con);




?>

</body>

</html>
