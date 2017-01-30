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
      <title>Register Dimensi</title>
      <link rel="icon" href="assets/images/logo-bps.png" sizes="32x32">
    </head>
    <?php 
      include_once './controller/connection.php';
      if(isset($_POST['submitdimensi'])){
        $query = "INSERT INTO dimensi (kodedimensi, labeldimensi, deskripsi) VALUES (:kodedimensi, :labeldimensi, :deskripsi)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':kodedimensi',$kodedimensi);
        $stmt->bindParam(':labeldimensi',$labeldimensi);
        $stmt->bindParam(':deskripsi',$deskripsi);

        $kodedimensi = $_POST['kodedimensi'];
        $labeldimensi = $_POST['labeldimensi'];
        $deskripsi = $_POST['deskripsi'];
        
        if($stmt->execute()){
          $_SESSION['message'] = "Insert Dimensi Berhasil";
          header("Location: daftar-dimensi.php");
        }else{
          echo 'Gagal menambahkan dimensi';
        }
      }
    ?>
    <body>
      <?php include "view/essential.php";?>
      <div id="content" class="container">
        <div class="row content-title">
          <div class="col s12 m6" style="margin-top:25px">
            <span>Tambah Dimensi</span>
          </div>
        </div>

        <!--Register-->
        <form action="register-dimensi.php" method="POST">
          <div class="row">
            <div class="input-field col s12">
              <input id="kodedimensi" name="kodedimensi" type="text" class="validate" required>
              <label for="kodedimensi">Kode Dimensi</label>
            </div>
            <div class="input-field col s12">
              <input id="labeldimensi" name="labeldimensi" type="text" class="validate" required>
              <label for="labeldimensi">Label Dimensi</label>
            </div>
            <div class="input-field col s12">
              <input id="deskripsi" name="deskripsi" type="text" class="validate" required>
              <label for="deskripsi">Deskripsi</label>
            </div>
          </div>
          <button type="submit" id="submit" name="submitdimensi" class="waves-effect waves-light btn" style="width:100%">Submit</button>
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