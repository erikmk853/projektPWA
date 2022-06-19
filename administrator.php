<?php

session_start();
$administratorPrijava = 0;
if(isset($_SESSION['$username']) && $_SESSION['$razina'] == 1 && $_SESSION['prijava'] == 1)
{
    $administratorPrijava = 1;
}

else if(!isset($_SESSION['$prijava']))
{
    header("Location: login.php");
}

if(isset($_POST['izbrisi']))
{
    $dbc = mysqli_connect('localhost','root','','projekt') or
    die('Error connecting to MYSQL server.'.mysqli_connect_error());

    $id = $_POST['option'];

    $query = "DELETE FROM vijesti where id = $id";

    $result = mysqli_query($dbc, $query) or
    die('Error querying database.');

    mysqli_close($dbc);
}

else if(isset($_POST['promjeni']))
{
    $dbc = mysqli_connect('localhost','root','','projekt') or
    die('Error connecting to MYSQL server.'.mysqli_connect_error());

    $id = $_POST['option'];
    $naslov = $_POST['naslov'];
    $kratkiSadrzaj = $_POST['kratkiSadrzaj'];
    $sadrzaj = $_POST['sadrzaj'];
    $sazetak = $_POST['sazetak'];
    $kategorija = $_POST['kategorija'];
    $slika = $_POST['slika'];

    if(isset($_POST['spremi']))
    {
        $arhiva = 1;
    } else $arhiva = 0;

    if($slika)
    {
        $query ="UPDATE vijesti
        SET naslov = '$naslov', sazetak = '$sazetak', kratkiSadrzaj = '$kratkiSadrzaj',
            sadrzaj = '$sadrzaj', kategorija = '$kategorija', slika = '$slika', arhiva = '$arhiva', datum = now()
        WHERE id = $id";
    }

    else
    {
        $query ="UPDATE vijesti
        SET naslov = '$naslov', sazetak = '$sazetak', kratkiSadrzaj = '$kratkiSadrzaj', 
            sadrzaj = '$sadrzaj', kategorija = '$kategorija', arhiva = '$arhiva', datum = now()
        WHERE id = $id";
    }
    

    $result = mysqli_query($dbc, $query) or
    die('Error querying database.');
    
    mysqli_close($dbc);
}   

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
    <div class="container text-center">
        <?php
            include_once("header.php");

            $dbc = mysqli_connect('localhost','root','','projekt') or
            die('Error connecting to MYSQL server.'.mysqli_connect_error());
        
            $query = "SELECT * FROM vijesti";
            $result = mysqli_query($dbc, $query);

            if($administratorPrijava == 1)
            {

                echo "<a href = 'unos.php' style = 'font-weight: bold;'>UNOS NOVE STRANICE</a>
                <br>
                <br>
                <br>";
        ?>
        <section class="forma">
                <?php
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<form action='' method='POST' name='administracija'>
                        <select name='option'>
                        <option value=".$row['id'].">".$row['id'].' - '.$row['naslov']."</option>
                        </select><br><br>
                        <label>Naslov:</label><br>
                        <textarea name = 'naslov' rows = '5' cols = '50'>$row[naslov]</textarea><br><br>

                        <label>Sažetak vijesti:</label><br>
                        <textarea name = 'sazetak' rows = '10' cols = '50'>$row[sazetak]</textarea><br><br>

                        <label>Kratki sadržaj vijesti:</label><br>
                        <textarea name = 'kratkiSadrzaj' rows = '10' cols = '50'>$row[kratkiSadrzaj]</textarea><br><br>

                        <label>Sadržaj vijesti: </label><br>
                        <textarea name = 'sadrzaj' rows = '10' cols = '50'>$row[sadrzaj]</textarea><br><br>

                        <label>Odaberite kategoriju:</label><br>
                        <select name = 'kategorija'>
                            <option value = 'sport'>SPORT</option>
                            <option value = 'politik'>POLITIK</option>
                        </select><br>

                        <label>Ubacite sliku:</label><br>
                        <input type = 'file' name = 'slika' accept = 'image/*'><br>

                        <label>Spremi u arhivu:</label>";
                        if($row['arhiva'] == 0)
                        {
                            echo "<input type = 'checkbox' class='onoffswitch-checkbox' name = 'spremi'><br>";
                        }

                        else
                        {
                            echo "<input type = 'checkbox' class='onoffswitch-checkbox' name = 'spremi' checked><br>";
                        }
                        
                        echo "
                        <input type = 'submit' name = 'izbrisi' value = 'Izbriši'>
                        <input type = 'submit' name = 'promjeni' value = 'Promjeni'>
                        <br>
                        <br>
                        <hr>
                        <br>";
                        echo "</form>";
                    }

                mysqli_close($dbc); 
                }
                ?>
        </section>
    </div>

    <?php

    include_once("footer.php");
    ?>

</body>
</html>
