<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../src/output.css" rel="stylesheet" />
</head>

<body class="bg-gray-900 font-body">
  <?php
  require '../function/google_auth.php';
  // authenticate code from Google OAuth Flow
  if (isset($_GET['code'])) {
   require '../function/google_profile.php';
   header("Location: pages/dashboard.php");
  } else {
    include 'pages/login.php';
  } ?>

  <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>