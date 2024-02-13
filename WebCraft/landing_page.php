<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="assets/img/webcraftLogo.png">
  <title>MedEquip Tracker</title>
  <link rel="stylesheet" href="assets/css/landing.css">
  <style>
    .navbar {
      animation: fadeIn 1.5s ease-in;
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
      }
      100% {
        opacity: 1;
      }
    }

    .left {
      animation: slideInLeft 1s ease-in;
    }

    .right-content {
      animation: slideInRight 1s ease-in;
    }

    @keyframes slideInLeft {
      0% {
        transform: translateX(-100%);
        opacity: 0;
      }
      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }

    @keyframes slideInRight {
      0% {
        transform: translateX(100%);
        opacity: 0;
      }
      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }
  </style>
</head>
<body>
  <nav class="navbar">
    <div class="container">
      <div class="nav-left">
        <img id="logo" src="assets/img/medLogo.png" alt="">
        <h4>MedEquip Tracker</h4>
      </div>

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="about.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
        <li class="nav-item">
          <a href="authentication/login.php">
            <button id="sign-in">Sign in</button>
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container2" id="container2">
    <div class="left">
      <div class="left-content">
        <div class="setting-icon">
          <img src="assets/img/setting-2.svg" alt="" id="setting-icon">
          <div class="color-options" id="color-options">
            <ul>
              <li class="color radial-gradient" style="background-image: radial-gradient(rgb(255, 252, 0, 0.7), rgb(231, 139, 0));"></li>
              <li class="color" style="background-color:  #bfd5db;"></li>
              <li class="color" style="background-color:  #b91a1ae8;"></li>
              <li class="color" style="background-color: #f0f0f0;"></li>
            </ul>
          </div>
        </div>
        <h1>Welcome to MedEquip<span>Tracker!</span></h1>
        <p>Simplify and enhance the efficient tracking and management of medical equipment</p>
        <a class="viw-inventory" href="guest panel/guest.php" id="view-inventory">View inventory</a>
      </div>
    </div>

    <div class="right-content">
      <div class="right-img">
        <img id="right-img" src="assets/img/banner_image_2.svg" alt="">
      </div>
    </div>
  </div>

  <script src="assets/js/theme/main.js"></script>

</body>
</html> 