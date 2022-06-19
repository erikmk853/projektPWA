<?php

$dbc = mysqli_connect('localhost','root','','projekt') or
die('Error connecting to MYSQL server.'.mysqli_connect_error());

$query = "SELECT * FROM vijesti
        WHERE arhiva = 0 AND kategorija = 'politik'
        LIMIT 3";

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
        <title>Main page</title>
</head>

<body>
    <div class="container">
        <?php
            include_once("header.php");
        ?>

        <section class = "politik">
            <div class="row">
                <div class="col-lg-2 col-sm-12 col-md-12">
                        <hr style = "background-color: black;">
                        <h6>POLITIK</h6>
                </div>
                <?php
                    if($result){
                        while($row = mysqli_fetch_array($result)){
                            if($row['kategorija'] == "politik"){
                                echo "
                                    <div class = col-lg-3 col-sm-12 col-md-12>
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
        <?php
        $dbc = mysqli_connect('localhost','root','','projekt') or
        die('Error connecting to MYSQL server.'.mysqli_connect_error());

        $query = "SELECT * FROM vijesti
                WHERE arhiva = 0 AND kategorija = 'sport'
                LIMIT 3";

        $result = mysqli_query($dbc, $query);
        ?>
        <section class = "sport">
            <div class="row">
                <div class="col-lg-2 col-sm-12 col-md-12">
                <hr style = "background-color: black;">
                    <h6>SPORT</h6>
                </div>
                <?php
                    if($result){
                        while($row = mysqli_fetch_array($result)){
                            if($row['kategorija'] == "sport"){
                                echo "
                                <div class=col-lg-3 col-sm-12 col-md-12>
                                    <a href='clanak.php?id=".$row['id']."'><img src='img/".$row['slika']."'></a>
                                    <a href='clanak.php?id=".$row['id']."'><h3>".$row['sazetak']."</h3></a>
                                    <a href='clanak.php?id=".$row['id']."'><h2>".$row['naslov']."</h2></a>
                                    <a href='clanak.php?id=".$row['id']."'><p>".$row['kratkiSadrzaj']."</p></a>
                                </div>";
                            }
                        }
                    }else {
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