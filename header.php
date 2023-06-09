<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <!-- <script src="jquery.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#Logout").hide();
    });

    $(document).ready(function() {
      $("#user").hover(function() {
        $("#Logout").toggle("slow");
      });
    });
   
    function logout() {
  // Perform an AJAX request to the server to log the user out
  $.ajax({
  url: 'logout.php',
  type: 'POST',
  success: function(response) {
    if (response === 'success') {
      location.reload();
    }
  },
  error: function(xhr, status, error) {
    alert('There was an error logging out. Please try again later.');
  }
});

}
  </script>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><IMG SRC="img/logonobackground.png" class="img-fluid" alt="Travelr" width="80px"></IMG></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav" id="navmenu">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="pnrstatus.php">PNR Status</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="booktkt.php">Book a ticket</a>
          </li>
        </ul>
        </span>
      </div>
        <span class="navbar-text">
          <?php
          if (isset($_SESSION['user_info'])) {
            echo '<div id="user">' . $_SESSION['user_info'] . '<div id="Logout" style="display:none; cursor:pointer;" onclick="logout()">Logout</div>';
          } else
            echo '<A HREF="register.php">Login/Register</A>';
          ?>
    </div>
  </nav>

</body>

</html>