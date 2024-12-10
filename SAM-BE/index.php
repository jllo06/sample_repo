<?php
// Database connection
$servername = "localhost"; // your database host
$username = "root";        // your database username
$password = "";            // your database password
$dbname = "corememories";  // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the islandsofpersonality table
$sql = "SELECT * FROM islandsofpersonality";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Island of Personality</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body, html { height: 100%; }
    body, h1, h2, h3, h4, h5, h6 { font-family: "Amatic SC", sans-serif; }
    .bgimg {
      background: linear-gradient(30deg, rgba(241,8,8,1) 14%, rgba(251,26,182,1) 37%, rgba(226,201,29,1) 61%, rgba(76,0,255,0.9528186274509804) 82%);
      min-height: 100%;
    }
    .card-img-top {
      height: 200px;
      object-fit: cover;
    }
    .card-body {
      padding: 1.25rem;
    }
    .card-text {
      font-size: 1rem;
    }
    .tablink {
      font-size: 1.25rem;
      padding: 10px 20px;
    }
    .card-title, .card-text{
        color: black;
    }
  </style>
</head>
<body>

<!-- Header with image -->
<header class="bgimg d-flex justify-content-center align-items-center text-center" style="height: 100vh;">
  <div>
    <p><a href="#menu" class="btn btn-lg btn-dark">Know me better</a></p>
  </div>
</header>

<!-- Menu Container -->
<div class="container-fluid bg-dark text-white py-5" id="menu">
  <div class="container">
    <h1 class="text-center display-1 mb-5">ISLAND OF PERSONALITY</h1>
    <div class="row text-center ">
      <?php while($row = $result->fetch_assoc()): ?>
      <div class="col-3">
        <button class="btn btn-lg btn-outline-light w-100 tablink" onclick="openMenu(event, '<?php echo $row['name']; ?>')"><?php echo $row['name']; ?></button>
      </div>
      <?php endwhile; ?>
    </div>

    <!-- Dynamically Generated Content -->
    <?php 
      // Reset result pointer and fetch data again for content display
      $result->data_seek(0);
      while($row = $result->fetch_assoc()):
    ?>
    <div id="<?php echo $row['name']; ?>" class="menu mt-4" style="display: none;">
      <div class="card mb-3">
        <img src="<?php echo $row['image']; ?>" class="card-img" alt="<?php echo $row['name']; ?>">
        <div class="card-body">
          <h5 class="card-title"><b><?php echo $row['name']; ?></b></h5>
          <p class="card-text"><strong>Short Description:</strong> <?php echo $row['shortDescription']; ?></p>
          <p class="card-text"><strong>Long Description:</strong> <?php echo $row['longDescription']; ?></p>
          <p class="card-text"><strong>Color:</strong> <?php echo $row['color']; ?></p>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
</div>

<!-- Footer -->
<footer class="text-center bg-dark text-white py-4">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" class="text-success" target="_blank">w3.css</a></p>
</footer>

<script>
  // Tabbed Menu
  function openMenu(evt, menuName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("menu");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
       tablinks[i].className = tablinks[i].className.replace(" btn-dark", " btn-outline-light");
    }
    document.getElementById(menuName).style.display = "block";
    evt.currentTarget.className = evt.currentTarget.className.replace(" btn-outline-light", " btn-dark");
  }
  document.getElementsByClassName("tablink")[0].click();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
