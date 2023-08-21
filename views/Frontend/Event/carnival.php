<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CSE CLUB</title>
  <!-- CSS Part -->
  <?php view("layout/partials/frontendLink.php") ?>
  <link rel="stylesheet" href="<?= assets('style/Frontend/Event/carnival.css'); ?>" />
</head>

<body>
  <?php
  $settings = $compact["settings"][0];
  $footer = [
    "navLogo" => $settings["navLogo"],
    "short_des" => $settings["short_des"],
    "copyright" => $settings["copyright"]
  ];
  $navbar = [
    "navLogo" => $settings["navLogo"],
    "carnival" => [$settings["carTitle"], $settings["carSlug"]],
    "carnivals" => $compact["carnivals"]
  ];

  $sponsor = $compact["sponsor"];
  $events = $compact["events"];

  ?>
  <?php view("layout/navbar.php", compact("navbar")); ?>
  <div class="container content">
    <div class="row row-banner" style='background-image: url(<?= assets("Upload/Carnivals/" . $events[0]["banner"]) ?>);'> </div>


    <?php view("Frontend/Event/partials/sponsor.php", compact("sponsor")); ?>
    <?php view("Frontend/Event/partials/eventCard.php", compact("events")); ?>

    <?php view("layout/footer.php", compact("footer")); ?>
  </div>
  <?php view("layout/partials/frontendScript.php") ?>

</body>

</html>