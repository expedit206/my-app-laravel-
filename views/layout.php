<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mon super site</title>
    <link rel="stylesheet" href="../public/css/app.css">
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'app.css' ?>">
</head>
<body>
<!-- >< -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/my-app">Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="/my-app">Acceuil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/my-app/posts">Les derniers articles</a>
      </li>
   
    </ul>

  </div>
</nav>


    <div class="navbar">
    <?php if(isset($_SESSION['auth'])){  ?>
        <a href="/my-app/logOut">Se deconnecter</a>
      </div>
      
      <?php  }else{
        ?>
        <a href="/my-app/login">Se connecter</a>

      <?php  }
        ?>

      
    <div class="container">

        <?=$content ?>
    </div>
<!-- >< -->
</body>
</html>