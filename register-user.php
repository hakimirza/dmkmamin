  <!DOCTYPE html>
  <html>
    <head>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="assets/css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="assets/css/custom.css"  media="screen,projection"/>
      <script type="text/javascript" src="assets/js/jquery.min.js"></script>
      <script type="text/javascript" src="assets/js/materialize.min.js"></script>
      <script src="assets/js/highcharts.js"></script>
      <script src="assets/js/highcharts-more.js"></script>
      <script src="assets/js/exporting.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Register User</title>
      <link rel="icon" href="assets/images/logo-bps.png" sizes="32x32">
    </head>
    <?php 
      include_once './controller/connection.php';
      if(isset($_POST['submituser'])){
        $idjabatan = $_POST['idjabatan'];
        $stmt = $conn->query("SELECT idjabatanbos FROM jabatan WHERE id = $idjabatan");
        $result = $stmt->fetchAll();
        $idjabatanbos = $result[0]['idjabatanbos'];

        $query = "INSERT INTO user (nip, email, password, nama, idjabatan, idbos, iduserbos) VALUES (:nip, :email, :password, :nama, :idjabatan, :idbos, :iduserbos)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nip',$nip);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password);
        $stmt->bindParam(':nama',$nama);
        $stmt->bindParam(':idjabatan', $idjabatan);
        $stmt->bindParam(':idbos',$idbos);
        $stmt->bindParam(':iduserbos',$iduserbos);

        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $idjabatan = $_POST['idjabatan'];
        $iduserbos = $_POST['iduserbos'];
        $idbos = $idjabatanbos;
        
        if($stmt->execute()){
          $_SESSION['message'] = "Insert User Berhasil";
          header("Location: daftar-user.php");
        }else{
          echo 'Gagal menambahkan user';
        }
      }
    ?>
    <body>
      <?php include "view/essential.php";?>
      <div id="content" class="container">
        <div class="row content-title">
          <div class="col s12 m6" style="margin-top:25px">
            <span>Tambah Anggota / User</span>
          </div>
        </div>

        <!--Register-->
        <form action="register-user.php" method="POST">
          <div class="row">
            <div class="input-field col s12">
              <input id="nama" name="nama" type="text" class="validate" required>
              <label for="nama">Nama</label>
            </div>
            <div class="input-field col s12">
              <input id="nip" name="nip" type="text" class="validate" required>
              <label for="nip">nip</label>
            </div>
            <div class="input-field col s12">
              <input id="email" name="email" type="email" class="validate" required>
              <label for="email">email</label>
            </div>
            <div class="input-field col s12">
              <input id="password" name="password" type="password" class="validate" required>
              <label for="password">password</label>
            </div>
            <div class="input-field col s12" >
              <select id="idjabatan" name="idjabatan" required>
                <option  value="" disabled selected>Choose your option</option>
                <?php 
                  $stmt = $connpdo->query("SELECT * FROM jabatan");
                  $result = $stmt->fetchAll();
                  foreach ($result as $key => $row) {
                    # code...
                    echo "<option value='".$row['id']."'>".$row['label']."</option>";
                  }
                ?>
              </select>
              <label>Jabatan</label>
            </div>
            <br>
            <div class="input-field col s12" id="userbos">
              
            </div>
          </div>
          <button type="submit" id="submit" name="submituser" class="waves-effect waves-light btn" style="width:100%">Submit</button>
        </form>
        <br>
      </div>
      <script type="text/javascript">
        $(document).ready(function() {
          $('#idjabatan').on('change', function(event) {
            var idJabatan = $(this).val();
            $.get("controller/ajaxdaftaruser.php?idjabatan="+idJabatan, function(data, status){
                $('#userbos').removeClass('hide');
                console.log(data);
                $('#userbos').html(data);
                $('select').material_select();
            });
          });

          $('.button-collapse').sideNav({
            menuWidth: 300,
            edge: 'left',
            closeOnClick: true
          });
          $('.modal-trigger').leanModal();
          $('select').material_select();
        });
      </script>
    </body>
  </html>