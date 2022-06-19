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
    <script src="form-validation.js"></script>

    <script>
    $(function() {
        $("form[name='forma']").validate({
          rules: {

            naslov: {
              required: true,    
              minlength: 5,
              maxlength: 30
            },

            kratkiSadrzaj: {
              required: true, 
              minlength: 10,
              maxlength: 100
            },

            sadrzaj: {
              required: true,
            },

            sazetak: {
              required: true,
              minlength: 5,
              maxlength: 200
            },

            kategorija:{
              required: true,
            },

            slika:{
              required: true,
            }
          },
          
          messages: {

            naslov: {
              required: "Naslov ne smije biti prazan",
              minlength: "Minimalno 5 znakova",
              maxlength: "Maksimalno 30 znakova",
            },

            kratkiSadrzaj: {
              required: "Kratki sadržaj ne smije biti prazan",
              minlength: "Minimalno 10 znakova",
              maxlength: "Maksimalno 100 znakova",
            },

            sadrzaj: {
              required: "Sadržaj ne smije biti prazan"
            },

            sazetak:{
                required: "Sažetak ne smije biti prazan",
                minlength: "Minimalno 5 znakova",
                maxlength: "Maksimalno 200 znakova"
            },

            kategorija:{
                required: "Kategorija mora biti odabrana",
            },

            slika:{
                required: "Slika mora biti odabrana",
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

  <div class="container">
    <?php
      include_once("header.php");
    ?>

    <section class="forma text-center">
      <form action="skripta.php" method="POST" name="forma">
          <label for="naslov">Naslov:</label><br>
          <input  type="text" name="naslov" id="naslov"><br> 

          <label for = "sazetak">Sazetak: </label><br>
          <textarea name = "sazetak" rows = "3" cols = "50" id = "sazetak"></textarea><br>

          <label for = "kratkiSadrzaj">Kratki sadržaj vijesti:</label><br>
          <textarea name = "kratkiSadrzaj" rows = "10" cols = "50" id = "kratkiSadrzaj"></textarea><br>

          <label for = "sadrzaj">Sadržaj vijesti: </label><br>
          <textarea name = "sadrzaj" rows = "10" cols = "50" id = "sadrzaj"></textarea><br>

          <label for = "kategorija">Odaberite kategoriju:</label><br>
          <select name = "kategorija" id = "kategorija">
              <option value = "sport">SPORT</option>
              <option value = "politik">POLITIK</option>
          </select><br>

          <label for = "slika">Ubacite sliku:</label><br>
          <input type = "file" name = "slika" accept = "image/*" id = "slika"><br>

          <label>Spremi u arhivu:</label>
          <input type = "checkbox" value = "spremi" name = "spremi" id = "spremi"><br>
          
          <input type = "submit" name = "posalji">
        </form>
    </section>

  </div>
  <?php
    include_once("footer.php");
  ?>

</body>
</html>