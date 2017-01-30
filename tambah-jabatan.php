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
      <script type="text/javascript" src="controller/sidemenu.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Tambah Jabatan</title>
      <link rel="icon" href="assets/images/logo-bps.png" sizes="32x32">
    </head>
    <?php 
      include_once './controller/connection.php';
      if(isset($_POST['submitjabatan'])){

        $query = "INSERT INTO jabatan (label, idjabatanbos) VALUES (:jabatan, :idjabatanbos)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':jabatan',$jabatan);
        $stmt->bindParam(':idjabatanbos',$idjabatanbos);

        $jabatan = $_POST['jabatan'];
        $idjabatanbos = $_POST['idjabatanbos'];
        
        if($stmt->execute()){
          $_SESSION['message'] = "Insert jabatan Berhasil";
          header("Location: jabatan-management.php");
        }else{
          echo 'Gagal menambahkan jabatan';
        }
      }
    ?>
    <body>
      <?php include "view/essential.php";?>
      <div id="content" class="container">
        <div class="row content-title">
          <div class="col s12 m6" style="margin-top:25px">
            <span>Tambah Jabatan</span>
          </div>
        </div>

        <!--Register-->
        <form action="tambah-jabatan.php" method="POST">
          <div class="row">
            <div class="input-field col s12">
              <input id="jabatan" name="jabatan" type="text" class="validate" required>
              <label for="jabatan">Nama Jabatan</label>
            </div>
            <div class="input-field col s12" >
              <select name="idjabatanbos" required>
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
              <label>Jabatan Bos / Atasan</label>
            </div>
          </div>
          <button type="submit" name="submitjabatan" class="waves-effect waves-light btn" style="width:100%">Submit</button>
          <br>
        </form>
      </div>
    </body>
  </html>