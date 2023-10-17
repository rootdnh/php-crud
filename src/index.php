<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Simple Crud</title>
  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  ?>
  <style>
    <?php include_once __DIR__ . "/index.css" ?>
  </style>

</head>

<body>

  <?php  include __DIR__ . '/includes/header.php';  ?>

  <main>  
    <?php include __DIR__ . '/views/pages/listUsers.php'; ?>
  </main>
 
  <?php include __DIR__ . '/includes/footer.php' ?>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>