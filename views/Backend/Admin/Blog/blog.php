<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Blog List</title>
  <!-- CSS Part -->
  <?php view("layout/partials/backendLink.php"); ?>
  <link rel="stylesheet" href="<?= assets('style/Backend/Admin/Static/college.css'); ?>" />
</head>

<body>

  <?php
    $navbar = $compact["settings"];
    $blog = $compact["blog"];
  ?>
  <?php view("layout/Admin/navbar.php", compact("navbar")); ?>
  <div class="containers content">

    <div class="card-header" style="background-color:none !important;">
      <div class="row">
        <div class="col-md-12">
          <table id="example" class="table table-striped">
            <thead>
              <tr>
                <th>Photo</th>
                <th>Author</th>
                <th>category</th>
                <th>Title</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ( $blog as $key => $item) {
                  
                ?>
                <tr>
                  <td>
                    <img src="<?= assets("Upload/Users/".$item["uimage"]) ?>"  width="50px" height="50px">
                  </td>
                  <td>
                    <?= $item["uname"] ?>
                  </td>
                  <td>
                    <?= $item["bcname"] ?>
                  </td>
                  <td>
                    <a class="text-info" href="<?= url("/blog/".$item["blog_slug"]); ?>"><?= $item["title"] ?></a>
                  </td>
                  <td>
                    <a href="<?= url("/admin/blog/delete/" . $item["blog_id"]) ?>"
                      class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-trash"></i></a>
                    <a href="<?= url("/blog/" . $item["blog_slug"]) ?>"
                      class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-eye"></i></a>
                      
                    <?php
                    if ($item["blog_status"] == 1) { ?>
                      <a href="<?= url("/admin/blog/status/" . $item["blog_id"]) ?>"
                        class="btn btn-default btn-sm text-success"><i class="fa-solid fa-circle-check"></i></a>
                    <?php }else{ ?>
                      <a href="<?= url("/admin/blog/status/" . $item["blog_id"]) ?>"
                        class="btn btn-default btn-sm text-danger"><i class="fa-solid fa-skull-crossbones"></i></a>
                    <?php }
                    ?>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
     
  </div>
  <!-- Javacript Part -->
  <?php view("layout/partials/backendScript.php"); ?>
</body>

</html>