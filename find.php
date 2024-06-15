<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Document</title>
   <link rel="stylesheet" href="style.css" />
</head>

<body>
   <h1>Evidence knih</h1>
   <ul>
      <li><a href="./new.php">Vkladani novych knih</a></li>
      <li><a href="./prehled.php">Prehled knih</a></li>
      <li><a href="./find.php">Vyhledavani knih</a></li>
   </ul>

   <h2>Vyhledavani</h2>
   <form action="find.php" method="POST" class="form-add">
      <label for="lastName">Prijmeni autora: </label>
      <input type="text" name="lastName" />
      <label for="firstName">Krestni jmeno: </label>
      <input type="text" name="firstName" />
      <label for="nazev">Nazev Knihy:</label>
      <input type="text" name="nazev" />
      <label for="isbn">ISBN: </label>
      <input type="text" name="isbn" />
      <input type="submit" value="Hledej" />
   </form>

   <?php
    $isbn = addslashes($_POST["isbn"]);
    $jmeno = addslashes($_POST["firstName"]);
    $prijmeni = addslashes($_POST["lastName"]);
    $kniha = addslashes($_POST["nazev"]);
    
    include("./dbLogin.php");
    $con = mysqli_connect($host, $user, $password, $db);
    if (!$con) {
       die("Nelze se připojit do databáze<body></html>");
    }
    mysqli_query($con,"SET NAMES 'utf8'");
    $dotaz = "SELECT ISBN, Jmeno, Prijmeni,Kniha,Popis FROM books WHERE Jmeno = '$jmeno' or ISBN = '$isbn' or Prijmeni = '$prijmeni' or Kniha = '$kniha'";
    if (!($vysledek = mysqli_query($con, $dotaz))) {
       die("Nelze provést dotaz.</body></html>");
    }
 ?>

   <table border="1">
      <?php
       if($isbn || $jmeno || $prijmeni ||$kniha){
 
          while ($radek = mysqli_fetch_array($vysledek)) {
             echo "<tr><th>"."ISBN"."</th>
             <th>"."Jmeno"."</th> 
             <th>"."Prijmeni"."</th>
             <th>"."Kniha"."</th>
             <th>"."Popis"."</th></tr>
             <tr><td>" . $radek["ISBN"] . "</td>
             <td>" . $radek["Jmeno"] . "</td> 
             <td>" . $radek["Prijmeni"] . "</td> 
             <td>" . $radek["Kniha"] . "</td> 
             <td>" . $radek["Popis"] . "</td></tr>  ";
          }
         
       }else{
          echo "<h3>Nezadali jste zadne kriteria</h3>";
          
       }
       mysqli_free_result($vysledek);
       mysqli_close($con);
 
 
 ?>
</body>

</html>
