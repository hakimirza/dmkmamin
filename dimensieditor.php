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
        <title>Dimensi Editor</title>
        <link rel="icon" href="assets/images/logo-bps.png" sizes="32x32">
        <script type="text/javascript">
            $(document).ready(function () {
                $("#tambahdimensi").click(function () {
                    var jumlahbaris = $('#kumpulanbaris').attr("jumlahbaris");
                    console.log(jumlahbaris);
                    var tambah = ` <tr id="baris`+jumlahbaris+`">
                        <td><input id="kode`+jumlahbaris+`" type="text" class="validate" name="kode[]" ></td>
                        <td><input id="label`+jumlahbaris+`" type="text" class="validate" name="label[]" ></td>
                        <td><input id="deskripsi3" type="text" class="validate" name="deskripsi[]" ></td>
                           <td><i class="material-icons hapus" id="`+jumlahbaris+`">delete</i></td>
                    </tr>`;
                    var temporari = "<tr class='baris'>" + tambah + "</tr>";
                    //alert(tambah dimensi);
                    jumlahbaris++;
                    $('#kumpulanbaris').attr("jumlahbaris",jumlahbaris);
                    $("#kumpulanbaris").append(temporari);
                });
                $('#kumpulanbaris').delegate(".hapus","click",function(){
                    var idhapus = $(this).attr("id");
                    $('#baris'+idhapus).remove();
                    console.log(idhapus);
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
    </head>
    <body>
        <style type="text/css">
            .hapus{cursor:pointer;}
        </style>
        <?php include "view/essential.php";?>
        <div id="content" class="container">
            <table class="bordered striped highlight">
                <thead>
                    <tr>
                        <th data-field="kode" style="width: 20%">Kode</th>
                        <th data-field="label" style="width: 30%">Label Dimensi</th>
                        <th data-field="deskripsi" style="width: 50%">Deskripsi Dimensi</th>
                    </tr>
                </thead>

                <tbody id="kumpulanbaris" jumlahbaris="3">
                    <tr id="baris1">
                        <td><input id="kode1" type="text" class="validate" name="kode1" value="M"></td>
                        <td><input id="label1" type="text" class="validate" name="label1" value="Penguasaan Materi"></td>
                        <td><input id="deskripsi1" type="text" class="validate" name="deskripsi1" value="Nilai penguasaan materi seseorang yang diperoleh dari test"></td>
                        <td><i class="material-icons hapus" id="1">delete</i></td>
                    </tr>
                    <tr id="baris2">
                        <td><input id="kode2" type="text" class="validate" name="kode2" value="S"></td>
                        <td><input id="label2" type="text" class="validate" name="label2" value="Sikap"></td>
                        <td><input id="deskripsi2" type="text" class="validate" name="deskripsi2" value="Sikap yang dinilai dari cara bekerja setiap hari"></td>
                        <td><i class="material-icons hapus" id="2">delete</i></td>
                    </tr>
                    <tr id="baris3">
                        <td><input id="kode3" type="text" class="validate" name="kode[]" value="T"></td>
                        <td><input id="label3" type="text" class="validate" name="label[]" value="Gaya Berbicara"></td>
                        <td><input id="deskripsi3" type="text" class="validate" name="deskripsi[]" value="Dilihat dari gaya berbicara ketika persentasi"></td>
                           <td><i class="material-icons hapus" id="3">delete</i></td>
                    </tr>
                </tbody>
            </table>

            <div class="row">
                <div class="input-field col s12 m6 16">
                    <button class="btn waves-effect waves-light #009688 right" type="tambahdimendsi" name="tambahdimensi" id="tambahdimensi">Tambah Dimensi
                    </button>
                </div>
            </div>
        </div>
    </body>
</html>