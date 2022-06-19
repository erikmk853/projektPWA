<?php
session_start();
  $msg='';
  if(isset($_POST['registracija']))
  {
    $username = $_POST['username'];
    $lozinka = $_POST['pass'];
    $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
    $razina = 0;

    $dbc = mysqli_connect('localhost','root','','projekt') or
    die('Error connecting to MYSQL server.'.mysqli_connect_error());

    $sql = "SELECT korisnicko_ime FROM korisnici WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($dbc);

    if (mysqli_stmt_prepare($stmt, $sql)) 
    {
      mysqli_stmt_bind_param($stmt, 's', $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
    }

    if(mysqli_stmt_num_rows($stmt) > 0)
    {
      $msg='Korisničko ime već postoji!';
    }

    else
    {
     $sql = "INSERT INTO korisnici(korisnicko_ime, lozinka, razina) VALUES (?, ?, ?)";
     $stmt = mysqli_stmt_init($dbc);

     if (mysqli_stmt_prepare($stmt, $sql)) 
     {
      mysqli_stmt_bind_param($stmt, 'ssi', $username, $hashed_password, $razina);
      mysqli_stmt_execute($stmt);
     }

    }

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
  <script type="text/javascript" src="jquery-1.11.0.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <script src="js/form-validation.js"></script>
  <script type="text/javascript">
    $(function() {
        $("form[name='reg']").validate({
          rules: {
            username: {
                required: true,
            },
            pass:{
              required: true,
            },
            pass1:{
                required: true,
                equalTo: "#pass",
            }
          },
          
          messages: {
            username:{
                required: "Korisničko ime nesmije biti prazno",
            },
            pass:{
                required: "Lozinka ne smije biti prazna",
            },
            pass1:{
                required: "Lozinka ne smije biti prazna",
                equalTo: "Lozinke moraju biti iste",
            }
        },

          submitHandler: function(form) {
            form.submit();
          }
        });
    });
  </script>
</head>

<body>

  <div class="container text-center">
    <?php
        include_once("header.php");
    ?>
    <section class="forma">
      <form action="" name="reg" method="POST">
        <label for="username">Username</label>
        <br>
        <input type="text" name="username" id="username"/><br>
        <br>

        <label for="pass">Lozinka</label>
        <br>
        <input type="password" name="pass" id="pass"/><br>
        <br>

        <label for="pass1">Ponovite lozinku</label>
        <br>
        <input type="password" name="pass1" id="pass1"/><br>
        <?php
          echo "<p style='color: red;'>$msg </p>";
        ?>
        <button type="submit" value="Registracija" id="slanje" name="registracija">Registracija</button>
      </form>   
    </section>
  </div>

  <?php
        include_once("footer.php");
  ?>

</body>
</html>
