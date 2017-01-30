  <!DOCTYPE html>
  <html>
    <head>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="assets/css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="assets/css/custom.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="assets/css/datatable.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Daftar Jabatan</title>
      <link rel="icon" href="assets/images/logo-bps.png" sizes="32x32">
    </head>
    <body>
      <!-- Menu for navbar in top -->
      <?php include "view/essential.php";?>
      <div id="content" class="container">
        <div class="row content-title">
          <div class="col s12 m6" style="margin-top:25px">
            <span>Daftar Jabatan</span>
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
                <th data-field="name">Jabatan</th>
                <th data-field="nip">jabatan Bos / Atasan</th>
                <th data-field="jabatan">Jumlah Orang</th>
                <th data-field="action">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              include_once './controller/connection.php';

              $query = "SELECT id, label as jabatan, (SELECT label FROM jabatan WHERE id = j.idjabatanbos) as jabatanbos, (SELECT COUNT(id) FROM user WHERE idjabatan = j.id) as jumlahuser FROM jabatan j ORDER BY id ASC";
              $stmt = $conn->query($query);
              $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
              if($result){
                foreach ($result as $key => $row) {
                  # code...
                  $key++;
                  echo "
                    <tr>
                      <td>$key</td>
                      <td>".$row['jabatan']."</td>
                      <td>".$row['jabatanbos']."</td>
                      <td>".$row['jumlahuser']."</td>
                      <td><i iduser='".$row['id']."' class='material-icons edit'>mode_edit</i><i iduser='".$row['id']."' class='material-icons delete'>delete</i></td>
                    </tr>
                  ";
                }
              }else{
                echo "No data here";
              }

            ?>
          </tbody>
        </table>
        <br>
        <a class="waves-effect waves-light btn" href="tambah-jabatan.php" style="width:100%"><i class="material-icons left">add</i>Tambah Jabatan</a>
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
          if(confirm("Apakah anda ingin menghapus pilihan jabatan ini?")){
            var _idtodelete = $(this).attr('idjabatan');
            $.redirectPost('./controller/delete.php',{idtodelete: _idtodelete, redirect: "../jabatan-management.php", key:"id", table:"jabatan"});
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