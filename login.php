<?php
session_start();
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, CRYPT_BLOWFISH);

    $dbc = mysqli_connect('localhost','root','','projekt') or
    die('Error connecting to MYSQL server.'.mysqli_connect_error());

    $query = "SELECT lozinka, razina FROM korisnici WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($dbc);

    if(mysqli_stmt_prepare($stmt, $query))
    {
        mysqli_stmt_bind_param($stmt,'s', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }

    mysqli_stmt_bind_result($stmt, $user_password, $razina);
    mysqli_stmt_fetch($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0)
    {
        if(password_verify($password, $user_password))
        {
            $_SESSION['prijava'] = 1;
            $_SESSION['$username'] = $username;
            $_SESSION['$razina'] = $razina;

            if($razina == 1)
            {
                header("Location: administrator.php");
            }
            
            else
            {
                echo "<p style='text-align: center;'>Dobrodošli, $username<br></p>";
            }
        }

        else
        {
            echo "<p style='text-align: center;'>Unijeli ste pogrešnu lozinku<br></p>";
        }
    }

    else
    {
        echo "<p style='text-align: center;'>Unijeli ste pogrešno korisničko ime<br></p>";
        echo "<p style='text-align: center;'><a style='color: blue;'href='registracija.php'>Registrirajte se ovdje</a></p>";
    }
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
        ?>

        <form method="POST" action="">
            <label for="username">Korisnicko ime</label>
            <br/>
            <input name="username" type="text"/>
            <br/>
            <label for="password">Lozinka</label>
            <br/>
            <input name="password" type="password"/>
            <br/>
            <br/>
            <input name="submit" type="submit" value="Prijava"/> 
            <br/>
            <br/>
            <a href = "registracija.php" style = "font-weight: bold;">REGISTRACIJA</a>
        </form>
    </div>

    <?php
        include_once("footer.php");
    ?>

</body>
</html>