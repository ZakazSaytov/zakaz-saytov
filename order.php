<?php
  
require_once "rb/rb.php";
R::setup( 'mysql:host=localhost;dbname=zakaz_saytov', 'root', 'root' );

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/code.png" type="images/png">
    <link rel="stylesheet" href="style.css">


    <title>Order</title>
  </head>
  <body class="bg-dark">
    <div class="container">
      <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary row menu">
          <a class="navbar-brand  col-sm-12 col-9 menu_logo" href="index.html"><img src="https://www.flaticon.com/premium-icon/icons/svg/2186/2186857.svg" class="img-fluid" alt="Responsive image"></a>
          <button class="navbar-toggler col-md-1 col-sm-2 col-2" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse  col-lg-4" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
              <a class="nav-link ml-xl-4 ml-lg-4" href="info.html">Information</a>
              <a class="nav-link active ml-xl-4 ml-lg-4" href="order.html">Order</a>
            </div>
          </div>
        </nav>
      </header>

      <main>
        <?php
        $data = $_POST;
        if(isset($data['do_signup'])){
          $errors = array();

          if(trim($data['name']) == ''){
            $errors[] = 'Введите имя!';
          }
 

          if(trim($data['last_name']) == ''){
            $errors[] = 'Введите Фамилию!';
          }

          if(trim($data['info']) == ''){
            $errors[] = 'Введите иформация о вашем будущем сайте!';
          }

          if($data['kap'] == ''){
            $errors[] = 'Введите ссылку на инстаграм или Gmail!';
          }

          if(empty($errors)){
            $user = R:: dispense('info');
            $user->name = $data['name'];
            $user->lastname = $data['last_name'];
            $user->information = $data['info'];
            $user->kap = $data['kap'];
            R::store($user);
            echo '<div style="color:green; font-size:20px;">Ваш заказ был успешно отправлен!</div>';
          }else{
            echo '<div style="color:red; font-size:20px;">' .array_shift($errors). '</div>';
          }

        }
        ?>
        <form class="row mt-xl-5 mt-lg-4 mt-md-4 mt-sm-4 mt-5" action="order.php" method="POST">
          <div class="form-group col-xl-6 col-lg-6 col-md-7">
            <label for="Имя" class="text-info">Имя</label>
            <input type="text" class="form-control" name="name" value="<?php echo @$data['name']; ?>">
          </div>
          <div class="form-group col-xl-6 col-lg-6 col-md-5">
            <label for="Фамилия" class="text-info">Фамилия</label>
            <input type="text" class="form-control" name="last_name" value="<?php echo @$data['last_name']; ?>">
          </div>
          <div class="form-group col-xl-6 col-lg-6 col-md-7">
            <label for="info" class=" text-info">Информация о вашем будущем сайте</label>
            <textarea name="info"  value="<?php echo @$data['info']; ?>" class=""></textarea>
          </div>
          <div class="form-group col-xl-6 col-lg-6 col-md-5">
            <label for="kap" class="text-info">Ссылка на инстаграм или Gmail</label>
            <input type="text" class="form-control" name="kap" value="<?php echo @$data['kap']; ?>">
          </div>
          <button type="submit" name="do_signup" class="btn btn-outline-primary mt-xl-3 mt-lg-3 mt-md-3 ml-xl-3 ml-lg-3 ml-md-3 button_2">Submit</button>
        </form>
      </main>

      <footer class="bg-primary rounded-top  footer_2 mt-xl-5 mt-lg-5 mt-md-4 mt-sm-4 mt-4" style="height:80px;">
        <div class="row">
          <div class="col-xl-8 col-lg-8 col-md-6 col-sm-6 col-5">
            <a href="https://www.instagram.com/zakaz.saytov/?hl=ru">
              <img src="https://image.flaticon.com/icons/svg/1383/1383263.svg" class="ml-xl-3 ml-lg-3 ml-md-3 ml-sm-3 ml-3 mt-xl-3 mt-lg-3 mt-md-3 mt-sm-3 mt-3 footer_logo">
            </a>
            <a href="https://www.vk.com/id611662402">
              <img src="https://image.flaticon.com/icons/svg/725/725288.svg" class="ml-xl-2 ml-lg-2 ml-md-2 ml-sm-2 ml-2 mt-xl-3 mt-lg-3 mt-md-3 mt-sm-3 mt-3 footer_logo">
            </a>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-7">
              <h4 class="text-body mt-xl-4 mt-lg-4 mt-md-4 mt-sm-3 mt-3 footer_mail">zakaz.saytov0@gmail.com</h4>
          </div>
        </div>
      </footer>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>