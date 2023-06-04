<?php ob_start()?>
<?php
      require 'template/layout.html.php';
    ?>
  <div class="container">
    <h3>Prijava</h3>

    <div class="row">
      <div class="col">
        <form method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">E-poštni naslov</label>
            <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Geslo</label>
            <input name="password1" type="password" class="form-control" id="exampleInputPassword1">
          </div>
          <div>
            <input type="checkbox">&nbsp;Zapomni si geslo
            <br>
            <input type="checkbox" name="ostaniPrijavljen">&nbsp;Ostani prijavljen
          </div>
          <?php

          $host = 'localhost';
          $username = 'janrk';
          $userPassword = "12345678";
          $db = 'nrsa';


          if (isset($_POST['signin'])) {
            $conn = new mysqli($host, $username, $userPassword, $db);
            $email = strip_tags(trim($_POST['email']));
            $password = $_POST['password1'];
            $hashedPwd = sha1($password);
            
            if (empty($email) || $password == "") {
              echo '<p style="color: red;">Niste izpolnili vseh polj</p>';
            } else {
             
                $hashedPwd = sha1($password);
                $checkQuery = "SELECT (USERNAME) FROM USER WHERE USERNAME = '$email';";
                $rezultat = mysqli_query($conn, $checkQuery);
                if(mysqli_num_rows($rezultat) == 0) {
                  echo '<p style="color: red;">Uporabnik z imenom ' . $email .' ne obstaja. Če želite ustvariti račun. Pojdite na <a href="index.php?stran=registracija">Regostracijo</a>.</p>';
                } else {

                  $checkPwdQuery = "SELECT username, password FROM USER WHERE username = '$email' AND password = '$hashedPwd'";
                  $res = mysqli_query($conn, $checkPwdQuery);
                  if(mysqli_num_rows($res) == 0) {
                    echo "<p style='color: red;'</p>Nepravilno geslo!";
                  } else {
                    $date = date('Y-m-d H:i:s');
                    $_SESSION['user'] = $email;
                    setcookie("prijavljen", $email, time() + 3600 * 24);
                    $zadnjaPrijavaQuery = "UPDATE USER SET zadnjaPrijava = '$date' WHERE USERNAME = '$email';";
                    mysqli_query($conn, $zadnjaPrijavaQuery);
                    echo "<br><p style='color: green;'>Prijava uspešna! Pozdravljen " . $_SESSION['user'] ."</p>";
                  }

                  
                }
              }

            }

          ?>
          <br>
          <input name="signin" type="submit" class="btn btn-primary" value="Prijavi se!" />
          <button type="button" class="btn btn-link"><a href="index.php?">Domov</a></button>
        </form>
      </div>
    </div>
  </div>
 
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>


  <style>
    .container {
      width: 30%;
      margin-top: 3em;
      font-family: Poppins, sans-serif;
    }

    h3 {
      text-align: center;
    }

    @media screen and (max-width: 800px) {
      .container {
        width: 90%;
      }

    }
  </style>


</html>