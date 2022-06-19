<?php
    $id = $_GET['id'];

    $dbc = mysqli_connect('localhost','root','','projekt') or
    die('Error connecting to MYSQL server.'.mysqli_connect_error());

    $query = "SELECT * FROM vijesti
    WHERE id = '$id'";

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
    <div class="container">
        <?php
            include_once("header.php");
        ?>
        <hr>
        <div class="row">
            <div class= "col-lg-12 col-sm-12 col-md-12">
                <section class="title">
                    <?php
                        if($result){
                            while($row = mysqli_fetch_array($result)){
                                    echo "
                                            <div class='verticalLine'>
                                                <h1>".$row['naslov']."</h1>
                                            </div>
                                            <h3>AKTUALISIERT ".$row['datum']."</h3>
                                        </section>
                                        <img src='img/".$row['slika']."'>
                                        <section class='text'>
                                            <h2>".$row['kratkiSadrzaj']."</h2>
                                            ".$row['sadrzaj']."
                                        </section>
                                        ";
                            }
                        } else {
                            echo "Nemože se pristupiti podacima: %S\n",mysqli_error($mysqli);
                        }
                        mysqli_close($dbc);
                    ?>
                </section>
            </div>
        </div>
    </div>
    <?php
        include_once("footer.php");
    ?>

</body>
</html>