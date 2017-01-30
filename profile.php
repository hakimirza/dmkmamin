  <!DOCTYPE html>
  <html>
    <head>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="assets/css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="assets/css/custom.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="assets/css/material-icon/css/material-design-iconic-font.css">

      <script type="text/javascript" src="assets/js/jquery.min.js"></script>
      <script type="text/javascript" src="assets/js/materialize.min.js"></script>
      <script src="assets/js/highcharts.js"></script>
      <script src="assets/js/highcharts-more.js"></script>
      <script src="assets/js/exporting.js"></script>
      <script type="text/javascript" src="controller/sidemenu.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      
      <title>Profile</title>
      <link rel="icon" href="assets/images/logo-bps.png" sizes="32x32">
    </head>
    <body>
    
    <?php include "view/essential.php";?>
      <!-- Menu for navbar in top -->
      <div id="content" class="container">
        <div class="row content-title">
          <div class="col s12 m6" style="margin-top:25px">
          </div>
        </div>
        <?php 
          include_once './controller/connection.php';



          $chart = array();

          //$stmt = $conn->query("SELECT u.id, u.nama, j.label as jabatan, (SELECT timestamp FROM nilai WHERE iduser = u.id ORDER BY timestamp DESC LIMIT 1) as lastupdate FROM user u, jabatan j WHERE j.id = u.idjabatan  ORDER BY u.id");

          //YOU MAY BE FETCH ID USER IN HERE
          $myIdUser = $_SESSION['iduser'];
          $stmt = $conn->query("SELECT u.id, u.nama, u.image, j.label as jabatan, (SELECT timestamp FROM nilai WHERE iduser = u.id ORDER BY timestamp DESC LIMIT 1) as lastupdate FROM user u, jabatan j WHERE j.id = u.idjabatan AND u.id = $myIdUser ORDER BY u.id");

          $resultUser = $stmt->fetchAll();

          if(!$resultUser){
            echo '<div class="message">';
            echo 'Anda tidak mempunyai anggota';
            echo '</div>';
          }

          foreach ($resultUser as $key => $user) {
            # code...
            $namaUser = $user['nama'];
            $jabatanUser = $user['jabatan'];
            $lastupdate = $user['lastupdate'];
            $userId = $user['id'];
            $ratingUser = getRating($userId, $conn);

            $star = getStar($ratingUser);
            $detailnilai = getDetailChart($userId, $conn);
            echo '
            <div class="row detail-anggota">
              <div class="col s12 m5 detail-identity" >
                <div class="row valign-wrapper">
                  <div class="col s3">
                    <img src="assets/images/profile/'.$user['image'].'" alt="" class="circle responsive-img">
                  </div>
                  <div class="col s9">
                    <h5 class="nama" >'.$namaUser.'</h5>
                    <h6 class="jabatan" >'.$jabatanUser.'</h6>
                    <span class="info" >Last Update '.$lastupdate.'</span>
                    <h3 class="nilai">'.$ratingUser.'</h3>'.$star.'<br>
                    <a class="modal-trigger waves-effect waves-light btn modal-evaluasi" 
                      iduser="'.$userId.'" namauser="'.$namaUser.'" href="#modal1" style="margin-top:10px">Edit Profile</a>
                  </div>
                </div>
              </div>
              <div class="col s12 m7">
                <div class="row valign-wrapper">
                  <div class="col s6 spider-chart" id="chart">
                  </div>
                  <div class="col s6" style="color:#009688">
                    <h5 style="margin-bottom:0px; margin-top:-20px">Rata-rata Nilai dimensi</h5>
                    '.$detailnilai.'
                  </div>
                </div>
              </div>
            </div>

            <div class="divider-horizontal"></div>
            ';



            $stmt = $conn->query("SELECT d.id, d.labeldimensi, (SELECT SUM(nilai)/COUNT(nilai) From nilai WHERE iduser=$userId AND iddimensi = d.id) as nilai FROM dimensi d");
            $resultGraph = $stmt->fetchAll();
            foreach ($resultGraph as $key => $graph) {
              # code...
              $kodedimensi = $graph['labeldimensi'];
              $nilaidimensi = $graph['nilai'];

              $chart[$userId][$kodedimensi] = $nilaidimensi;
            }
          }

          function getStar($value){
            $valueOri = round($value);
            $valueBulat = floor($value);
            $return = "";

            for($i=0;$i<5;$i++){
              if($i<$valueBulat){
                $return .= '<i class="star zmdi zmdi-star"></i>';
              }elseif ($i<$valueOri) {
                $return .= '<i class="star zmdi zmdi-star-half"></i>';
              }else{
                $return .= '<i class="star zmdi zmdi-star-outline"></i>';
              }
            }
            return $return;
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
            if ($jumlahdimensi == 0) $rating = 0;
            else {
              $rating = $totalnilai / $jumlahdimensi;
              $rating =($rating / 100)*5;
            }
            return round($rating, 1);
            return round($rating, 1);
          }

          function getDetailChart($iduser, $conn){
            $stmt = $conn->query("SELECT id, labeldimensi FROM dimensi");
            $result = $stmt->fetchAll();
            $jumlahdimensi = count($result);
            $detailnilai = array();
            foreach ($result as $key => $dimensi) {
              # code...
              $iddimensi = $dimensi['id'];
              $kodedimensi = $dimensi['labeldimensi'];

              $stmt = $conn->query("SELECT (SUM(nilai)/COUNT(nilai)) as nilaiperdimensi FROM nilai WHERE iddimensi = $iddimensi AND iduser = $iduser");
              $result = $stmt->fetchAll();
              $detailnilai[$kodedimensi]= $result[0]['nilaiperdimensi'];
            }
            $return = "";
            foreach ($detailnilai as $key => $value) {
              # code...
              $value = round($value, 2);
              $return .= "<h6><strong> $key </strong> : $value</h6>";
            }
            return $return;
          }

          include_once './controller/profile_user.php';
          include_once './controller/profile_user2.php';

        ?>
        
    </body>
    <script type='text/javascript'>
      $(document).ready(function() {
        $(function () {


          <?php 
            foreach ($chart as $iduser => $dimensis) {
              # code...
              $listdimensi = getCategories($dimensis);
              $listnilai = getNilai($dimensis);
              echo "
                $('#chart').highcharts({
                  title: {
                    text: ''
                  },
                  chart: {
                      backgroundColor: '#ffffff',
                      polar: true,
                      type: 'line'
                  },
                  credits: {
                      enabled: false
                  },
                  xAxis: {
                      categories: [$listdimensi],
                      tickmarkPlacement: 'on',
                      lineWidth: 0
                  },

                  yAxis: {
                      gridLineInterpolation: 'polygon',
                      lineWidth: 0,
                      min: 0
                  },
                  exporting: {
                      enabled : false,
                  },
                  tooltip: {
                      shared: true
                  },
                  legend: {
                    enabled : false,
                  },
                  series: [{
                      name: 'Nilai Test:',
                      data: [$listnilai],
                      pointPlacement: 'on'
                  }]
                });
              ";
            }

            function getCategories($arrayChart){
              $arraydimensi= "";
              foreach ($arrayChart as $kodedimensi => $nilai) {
                # code...
                $arraydimensi .= "'$kodedimensi', ";
              }
              return substr($arraydimensi, 0, -2);
            }

            function getNilai($arrayChart){
              $arraynilai= "";
              foreach ($arrayChart as $kodedimensi => $nilai) {
                # code...
                if($nilai == ""){
                  $nilai = 0;
                }
                $arraynilai .= "$nilai, ";
              }
              return substr($arraynilai, 0, -2);
            }
          ?>

          });
        });
      </script>
  </html>