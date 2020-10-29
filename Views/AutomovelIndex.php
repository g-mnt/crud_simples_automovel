<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
  <meta charset="utf8mb4_general_ci">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body class="h-100">
  <div class="d-flex justify-content-center h-25">
    <h1 class="mt-auto mb-auto">Cadastro de Automóvel</h1>
  </div>

  <div class="d-flex justify-content-center h-25 mb-5">
    <div class="d-flex flex-column justify-content-center w-75 mb-5">

      <?php include_once "Views/Components/AutomovelForm.php" ?>

    </div>
  </div>
<?php if(!$edit): ?>
  <div class="d-flex justify-content-center w-100 mt-5 pt-5">
    
    <?php include_once "Views/Components/AutomovelTabela.php" ?>

  </div>
<?php endif?>

</body>

</html>

