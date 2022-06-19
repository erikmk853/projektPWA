<?php
if(isset($_POST['naslov'])) $naslov = $_POST['naslov'];

if(isset($_POST['kratkiSadrzaj'])) $kratkiSadrzaj = $_POST['kratkiSadrzaj'];

if(isset($_POST['sadrzaj'])) $sadrzaj = $_POST['sadrzaj'];

if(isset($_POST['sazetak'])) $sazetak = $_POST['sazetak'];

if(isset($_POST['kategorija'])) $kategorija = $_POST['kategorija'];

if(isset($_POST['slika'])) $slika = $_POST['slika'];

if(isset($_POST['spremi']))
{
    $arhiva = 1;
} 

else
{
    $arhiva = 0;
}

$dbc = mysqli_connect('localhost','root','','projekt') or
    die('Error connecting to MYSQL server.'.mysqli_connect_error());

$query = "INSERT INTO vijesti(id, slika, naslov, kratkiSadrzaj, sadrzaj, sazetak, datum, arhiva, kategorija)
                VALUES (NULL, '$slika', '$naslov', '$kratkiSadrzaj', '$sadrzaj', '$sazetak', now(), '$arhiva', '$kategorija')";

$result = mysqli_query($dbc, $query) or
die('Greška prilikom spremanja podataka u bazu.');

mysqli_close($dbc);

?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
		<meta name="author" content="Erik Mihaljinec Kotarski">
		<meta name="OIB" content="0246096063">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" media="screen" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
            include_once("header.php");
        ?>

        <section class="unos text-center">
            <article>
                <h2>Uspješan unos</h2>
            </article>
        </section>
    </div>

    <?php
        include_once("footer.php");
    ?>

    
</body>
</html>