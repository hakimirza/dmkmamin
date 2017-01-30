  <!DOCTYPE html>
  <html>
    <head>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="assets/css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="assets/css/custom.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="assets/css/datatable.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Daftar User</title>
      <link rel="icon" href="assets/images/logo-bps.png" sizes="32x32">
    </head>
    <body>
      <!-- Menu for navbar in top -->
      <?php include "view/essential.php";?>
      <div id="content" class="container">
        <div class="row content-title">
          <div class="col s12 m6" style="margin-top:25px">
            <span>Daftar User</span>
          </div>
        </div>
          <?php 
            if(isset($_SESSION['message'])){
              echo '<div class="message">';
              echo $_SESSION['message'];
              echo '</div>';
              unset($_SESSION['message']);
            } 
          ?>
        <table class="bordered striped">
          <thead>
            <tr>
                <th data-field="id">No</th>
                <th data-field="name">Nama</th>
                <th data-field="nip">NIP</th>
                <th data-field="jabatan">Jabatan</th>
                <th data-field="rating">Rating</th>
                <th data-field="jumlah">Jumlah Anggota</th>
                <th data-field="action">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              include_once './controller/connection.php';

              $query = "SELECT u.id, u.nama, u.nip, j.label, (SELECT SUM(nilai)/COUNT(nilai) FROM nilai WHERE iduser = u.id) as rating, (SELECT COUNT(id) FROM user WHERE idbos = u.idjabatan) as jml_anggota FROM user u, jabatan j WHERE u.idjabatan = j.id ORDER BY id ASC";
              $stmt = $conn->query($query);
              $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
              if($result){
                foreach ($result as $key => $row) {
                  # code...
                  $key++;
                  $rating=0;
                  if($row['rating']!=""){
                    $rating = getRating($row['id'], $conn);
                  }
                  echo "
                    <tr>
                      <td>$key</td>
                      <td>".$row['nama']."</td>
                      <td>".$row['nip']."</td>
                      <td>".$row['label']."</td>
                      <td>".$rating."</td>
                      <td>".$row['jml_anggota']."</td>
                      <td><i iduser='".$row['id']."' class='material-icons edit'>mode_edit</i><i iduser='".$row['id']."' class='material-icons delete'>delete</i></td>
                    </tr>
                  ";
                }
              }else{
                echo "No data here";
              }
              function getRating($iduser, $conn){
                $stmt = $conn->query("SELECT id FROM dimensi");
                $result = $stmt->fetchAll();
                $jumlahdimensi = count($result);
                $totalnilai = 0;
                foreach ($result as $key => $dimensi) {
                  # code...
                  $iddimensi = $dimensi['id'];
                  $stmt = $conn->query("SELECT (SUM(nilai)/COUNT(nilai)) as nilaiperdimensi FROM nilai WHERE iddimensi = $iddimensi AND iduser = $iduser");
                  $result = $stmt->fetchAll();
                  $totalnilai += $result[0]['nilaiperdimensi'];
                }
                $rating = $totalnilai / $jumlahdimensi;
                $rating =($rating / 100)*5;
                return round($rating, 1);
              }

            ?>
          </tbody>
        </table>
        <br>
        <a class="waves-effect waves-light btn" href="register-user.php" style="width:100%"><i class="material-icons left">add</i>Tambah User</a>
      </div>
    </body>

  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/materialize.min.js"></script>
  <script src="assets/js/highcharts.js"></script>
  <script src="assets/js/highcharts-more.js"></script>
  <script src="assets/js/exporting.js"></script>
  <script type="text/javascript" src="assets/js/datatable.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        //delete user
        $('.delete').click(function(event) {
          /* Act on the event */
          if(confirm("Apakah anda ingin menghapus user ini?")){
            var _idtodelete = $(this).attr('iduser');
            $.redirectPost('./controller/delete.php',{idtodelete: _idtodelete, redirect: "../daftar-user.php", key:"id", table:"user"});
          }
        });
        $.extend({
            redirectPost: function(location, args){
                var form = $('<form></form>');
                form.attr("method", "post");
                form.attr("action", location);

                $.each( args, function( key, value ) {
                    var field = $('<input></input>');

                    field.attr("type", "hidden");
                    field.attr("name", key);
                    field.attr("value", value);

                    form.append(field);
                });
                $(form).appendTo('body').submit();
            }
        });
        $('table').DataTable({
          "bLengthChange": false,
        });
      });
    </script>
    <script type="text/javascript" src="controller/sidemenu.js"></script>
  </html>