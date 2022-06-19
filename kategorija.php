<?php

$kategorija = $_GET['kategorija'];

$dbc = mysqli_connect('localhost','root','','projekt') or
die('Error connecting to MYSQL server.'.mysqli_connect_error());

$query = "SELECT * FROM vijesti
WHERE arhiva = 0 AND kategorija = '$kategorija'";

$result = mysqli_query($dbc, $query);

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
        ?>
        <section class="kategorija">
            <div class="row">
                <?php
                    if($result){
                        while($row = mysqli_fetch_array($result)){
                            if($row['kategorija'] == "$kategorija"){
                                echo "
                                    <div class=col-lg-6 col-sm-12 col-md-12>
                                        <a href='clanak.php?id=".$row['id']."'><img src='img/".$row['slika']."'></a>
                                        <a href='clanak.php?id=".$row['id']."'><h3>".$row['sazetak']."</h3></a>
                                        <a href='clanak.php?id=".$row['id']."'><h2>".$row['naslov']."</h2></a>
                                        <a href='clanak.php?id=".$row['id']."'><p>".$row['kratkiSadrzaj']."</p></a>
                                    </div>";
                            }
                        }
                    } else {
                        echo "Nemože se pristupiti podacima: %S\n",mysqli_error($mysqli);
                    }
                    mysqli_close($dbc);
                ?>
            </div>
        </section>
    </div>

    <?php
        include_once("footer.php");
    ?>

</body>
</html>