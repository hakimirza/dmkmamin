<html lang="en">

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
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login | KWCP</title>
      <link rel="icon" href="assets/images/logo-bps.png" sizes="32x32">
    </head>
    
    <body style="background-color: #009688">
        <div id="login-page" class="row">
            <div class="row">
                <div class="col s12 m3" style="color: cyan; margin-right: 10px;"></div>
                <div class="col s12 m6">
                    <div class="card-panel center-align" style="margin-top: 40px;">
                        <div class="row">
                            <div class="input-field col s12 center">
                                <img src="assets/images/logo-bps.png" alt="" class="responsive-img valign profile-image-login" width="130" height="130">
                                <p class="center login-form-text"style="font-size: 18"><b>KNOWLEDGE WORKER COMPETENCY PLAN</b> <br>Badan Pusat Statistik</p>
                            </div>
                        </div>
                        <form class="login-form" method="POST" action="controller/login_session.php">
                            <div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">perm_identity</i>
                                    <input id="username" type="text" name="username" class="username">
                                </div>
                            </div>
                            <div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <input id="password" type="password" name="password" class="password">
                                </div>
                            </div>
                            <div class="row">          
                                <div class="input-field col s12 m12 l12  login-text">
                                    <input type="checkbox" id="remember-me" />
                                    <label for="remember-me">Remember me</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s4 white-text">.</div>
                                <div class="input-field col s4">
                                    <button class="btn waves-effect waves-light #009688 center" type="submit" name="submit">Login
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col s12 m4"></div>
            </div>
        </div>
    </body>
</html>