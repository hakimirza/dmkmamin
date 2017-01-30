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

        <div id="content" class="container" style="text-align: center">
            <h3>PANDUAN WEB</h3>
            <br>
            <a href="helplogin.php"><p>Login</p></a>
            <a href="helpindexadmin.php"><p>Index Admin</p></a>
            <a href="helpindexuser.php"><p>Index user</p></a>
            <a href="helpprofiladmin.php"><p>Profil Admin</p></a>
            <a href="helpprofiluser.php"><p>Profil User</p></a>
            <a href="helpdimensieditor.php"><p>Dimensi Editor</p></a>
            <a href="helpbuattes.php"><p>Buat Test</p></a>
            <br>
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

