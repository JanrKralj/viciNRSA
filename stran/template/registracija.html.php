<?php
      require 'template/layout.html.php';
    ?>
  <div class="container">
    <h3>Registracija</h3>

    <div class="row">
      <div class="col">
        <form method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">E-poštni naslov</label>
            <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Geslo</label>
            <input name="password1" type="password" class="form-control" id="exampleInputPassword1" required>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword2">Ponovite geslo</label>
            <input name="password2" type="password" class="form-control" id="exampleInputPassword2">
          </div>
          <?php

          $host = 'localhost';
          $username = 'janrk';
          $userPassword = "12345678";
          $db = 'nrsa';



          if (isset($_POST['signin'])) {
            $conn = new mysqli($host, $username, $userPassword, $db);
            $noviemail = strip_tags(trim($_POST['email']));
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            if (empty($noviemail) || $password1 == "" || $password2 == "") {
              echo '<p style="color: red;">Niste izpolnili vseh polj</p>';
            } else {
              if ($password1 != $password2) {
                echo '<p style="color: red;">Gesli se ne ujemata</p>';
              }else if(strlen($password1) < 8) {
                $dolzinaGesla = strlen($password1);
                echo '<p style="color: red;">Geslo je krajše od 8 (dolgo je ' . $dolzinaGesla . ' znakov)</p>';
              }
              else {
                $hashedPwd = sha1($password1);
                
                $date = date('Y-m-d H:i:s');

                $checkQuery = "SELECT (USERNAME) FROM USER WHERE USERNAME = '$noviemail';";
                $rezultat = mysqli_query($conn, $checkQuery);
                if(mysqli_num_rows($rezultat) != 0) {
                  echo '<p style="color: red;">Uporabnik z imenom ' . $noviemail .' že obstaja</p>';
                } else {
                  if ($conn->query("INSERT INTO USER (USERNAME, PASSWORD, REGISTER) VALUES ('$noviemail', '$hashedPwd', '$date');")) {
                    echo "Registracija je uspela";
                  } else {
                    echo "Registracija ni uspela";
                  }
                }
              }

            }
          } else {
            echo "<p>Izpolnite obrazec</p>";
          }

          ?>
          <input name="signin" type="submit" class="btn btn-primary" value="Registriraj se!" />
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