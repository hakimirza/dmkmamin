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
        <title>Help</title>
        <link rel="icon" href="assets/images/logo-bps.png" sizes="32x32">
    </head>
    <body>
        <?php include "view/essential.php";?>
        <div id="content" class="container">
            <h4><b>LANGKAH-LANGKAH MENGUBAH DIMENSI EDITOR</b></h4>
            <br>
            <ol>
                <li>Halaman dimensi editor dapat dibuka oleh Admin dengan mengklik 'Dimensi Editor' pada sidebar. 
                <img id="dimensieditor" style="width: 80%" src="assets/images/dimensieditor1.png">
                </li>
                <br>
                <li>Saat membuka dimensi editor Anda akan melihat default sebagai berikut
                <img id="dimensieditor" style="width: 80%" src="assets/images/dimensieditor.png">
                </li>
                <br>
                <li>Anda dapat mengubah dimensi dengan mengedit,menghapus, dan menambah dimensi
                <img id="dimensieditor" style="width: 80%" src="assets/images/dimensitambahhapus.png">
                </li>
                <br>
                <li>Bila mengklin tambah dimensi, Anda akan registrasi dimensi lalu dimensi akan bertambah seperti berikut
                <img id="dimensieditor" style="width: 80%" src="assets/images/tambahdimensi.png">
                </li>
            </ol>
            <div class="row">
                <br/>
                <a href="help.php" class="waves-effect waves-light btn col s12">Back</a>
            </div>
        </div>

        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/materialize.min.js"></script>
        <script src="assets/js/highcharts.js"></script>
        <script src="assets/js/highcharts-more.js"></script>
        <script src="assets/js/exporting.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#tambahdimensi").click(function () {
                    var tambah = $(".baris").html();
                    var temporari = "<tr class='baris'>" + tambah + "</tr>";
                    //alert(tambah dimensi);
                    $("#content").append(temporari);
                });
                $('.button-collapse').sideNav({
                    menuWidth: 300, // Default is 240
                    edge: 'left', // Choose the horizontal origin
                    closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
                }
                );
                $('.modal-trigger').leanModal();
                $('select').material_select();
            });
        </script>
    </body>
</html>

