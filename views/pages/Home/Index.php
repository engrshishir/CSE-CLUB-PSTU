<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CSE CLUB</title>
  <?php view("pages/Home/links.php") ?>
</head>
<body>
  
  <div class="container">
    <?php view("layout/navbar.php") ?>
    <?php view("pages/Home/fixedHero.php") ?>
    <?php view("pages/Home/videoCircle.php") ?>
  </div>
  <div class="container content">
    <?php view("pages/Home/about.php") ?>
    <?php view("pages/Home/projects.php") ?>
    <?php view("pages/Home/partner.php") ?>
    <?php view("layout/footer.php") ?>
  </div>

<?php view("pages/Home/scripts.php") ?>
</body>
</html>