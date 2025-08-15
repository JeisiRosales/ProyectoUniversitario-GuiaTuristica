<!-- Aqui se buscan las variables de entutamiento --> 
<?php include "config/path.php";?>

<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">
<head>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="<?php echo SERVERURL; ?>js/underscore-min.js"></script>
    <script src="<?php echo SERVERURL; ?>js/calendar.js"></script>
    <script type="text/javascript">   </script>
  <!------ Include the above in your HEAD tag ---------->
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>...InfoMargarita</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">
  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">
  <!-- Favicons -->
  <link href="<?php echo SERVERURL; ?>img/favicon.png" rel="icon">
  <link href="<?php echo SERVERURL; ?>img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="<?php echo SERVERURL; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo SERVERURL; ?>vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo SERVERURL; ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="<?php echo SERVERURL; ?>css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo SERVERURL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>css/calendar.css">
    <link href="<?php echo SERVERURL; ?>css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo SERVERURL; ?>js/es-ES.js"></script>
    <script src="<?php echo SERVERURL; ?>js/jquery.min.js"></script>
    <script src="<?php echo SERVERURL; ?>js/moment.js"></script>
    <script src="<?php echo SERVERURL; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo SERVERURL; ?>js/bootstrap-datetimepicker.js"></script>
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>css/bootstrap-datetimepicker.min.css" />
<!-- para las DataTables -->
  <link rel="stylesheet" type="text/css" href="<?php echo SERVERURL; ?>css/datatables.min.css" />
  <script type="text/javascript" src="<?php echo SERVERURL; ?>js/datatables.min.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>js/datatable.js"></script>
</head>
<body>

<!-- Aqui es donde se carga el cuerpo de la página y se va renderizando a medida que el usuario o el mismo sistema hace un cambio de la url -->
 <div class="container-fluid">
          <div class = "row">
              <?php require_once "views/Layouts/banner.php";?>
          </div>
          <div class = "row">
              <div class="col-sm-2 col-md-2">
                   <?php require_once "views/Menu/MenuVertiIzq.php";?>
              </div>     
              <div class="col-sm-10 col-md-10">
                  <div class="well" style = "background-color: white">
                        <!-- Aqui es donde se carga lo que el usuario pide por el url -->
                        <?php require_once "views/Layouts/routing.php";?>
                  </div>
              </div>
          </div>
          <br> <br>
 </div>
  <!-- ======= Footer ======= -->
  <footer class="site-footer">
    <div class="bottom">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-xs-12 text-lg-left text-center">
            <p class="copyright-text">
              &copy; Copyright <strong>Prof. SAZA</strong> <br>Todos los derechos reservados
            </p>
            <div class="credits">
            
            </div>
          </div>
          <div class="col-lg-9 col-xs-12 text-lg-right text-center fixed-buttom">
          <?php require_once "views/Menu/MenuHorizInf.php";?>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->
  <a title = "hola" class="scrolltop" href="www.hotmail.com"><span class="fa fa-angle-up"></span></a>

        <script src="<?php echo SERVERURL; ?>js/jquery-3.3.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="<?php echo SERVERURL; ?>js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="<?php echo SERVERURL; ?>js/bootstrap.min.js"></script>
</body>
</html>