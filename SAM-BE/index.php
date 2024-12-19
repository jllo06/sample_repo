<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "corememories";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

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
    @import url('https://fonts.googleapis.com/css2?family=Henny+Penny&family=Poller+One&family=Trade+Winds&family=Varela+Round&family=Wendy+One&display=swap');

    body,
    html {
      height: 100%;
    }

    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Amatic SC", sans-serif;
    }

    .bgimg {
      background-image: url("assets/images/BG.png");
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .btnTag {
      font-family: "Trade Winds", system-ui;
      font-weight: 400;
      font-style: normal;
      padding: 10px 20px;
      background-color: orangered;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      transition: all 0.2s ease;
      border: 2px solid transparent;
      cursor: pointer;
      font-size: 19px;
    }

    .btnTag:hover {
      background-color: white;
      color: black;
      transform: scale(1.05);
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
    }

    .titleIsland {
      font-family: "Trade Winds", system-ui;
      font-weight: 400;
      font-style: normal;
      background: #FFDD1D;
      background: linear-gradient(to right, #FFDD1D 16%, #1E6849 39%, #0612FF 62%, #EA0000 88%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;

    }

    .titleContent {
      font-family: "Trade Winds", system-ui;
      font-weight: 400;
      font-style: normal;
      background: #FFDD1D;
      background: linear-gradient(to left, #FFDD1D 40%, #1E6849 51%, #0612FF 55%, #EA0000 62%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;




    }

    .btn {
      padding: 10px;
      background-color: orangered;
      color: white;
    }

    .card img {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .card-img-top {
      height: 500px;
      width: 500px;
    }

    .card-body {
      padding: 1.25rem;
    }

    .card-text {
      font-size: 1rem;
      text-align: justify;
    }

    .tablink {
      font-size: 1.25rem;
      padding: 10px 20px;
    }

    .card-title,
    .card-text {
      color: black;
    }

    .card-textsD{
      font-size: 22px;
      color: black;
      padding: 15px;
      border-radius: 9px;
      text-align: justify;

    }

    .card-textLd {
      font-size: 19px;
      color: black;
      padding: 15px;
      border-radius: 9px;
      text-align: justify;
    }

    .background {
      background: rgb(223, 250, 236);
    }

    .menu,
    .card-body {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3);
      border: 1px solid #ddd;
      transition: all 0.3s ease;
    }

    .menu,
    .card-body:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 20px rgba(0, 0, 0, 0.4);
    }

    /* Container for the image */
    .image-container {
      position: relative;
      width: auto;
      max-height: 400px;
      overflow: hidden;
      /* Ensures no tilt overflow */
      display: flex;
      justify-content: center;
      align-items: center;
      perspective: 100px;
      /* Adds a 3D perspective effect */
    }

    /* Image styles */
    .image {
      width: 100%;
      height: auto;
      transition: transform 0.5s ease-in-out;
      /* Smooth transition for the tilt effect */
      transform-origin: center;
      /* Tilt around the center of the image */
    }

    /* Tilt effect on hover */
    .image-container:hover .image {
      transform: rotate(5deg);
      /* Tilts the image clockwise by 5 degrees */
    }

    /* Modify the card image styles to be more responsive */
.card-img-top {
  height: auto;
  width: 100%;
  max-height: 500px;
  object-fit: cover; /* Ensures the image covers the space without distortion */
}

/* Ensure card body adjusts with screen size */
.card-body {
  padding: 1rem;
}

/* Modify the grid for the contents to be more responsive */
.row {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.col-lg-4, .col-md-6, .col-sm-6 {
  margin-bottom: 20px;
  flex: 1 1 calc(33.3333% - 20px); /* Ensure the cards take up 1/3 width on large screens */
}

/* Ensure content cards take full width on smaller screens */
@media (max-width: 767px) {
  .col-lg-4 {
    flex: 1 1 100%; /* Makes the card take full width on smaller screens */
  }
}

@media (max-width: 575px) {
  .col-md-6, .col-sm-6 {
    flex: 1 1 100%; /* Ensures cards take full width on mobile screens */
  }
}



  </style>
</head>

<body>

  <header class="bgimg d-flex justify-content-center align-items-center text-center" style="height: 100vh;">
    <div>
      <p><a href="#menu" class="btnTag btn-lg">Know me better</a></p>
    </div>
  </header>

  <div class="background container-fluid text-white py-4" id="menu">
    <div class="container">
      <h1 class="titleIsland text-center display-1 mb-5 p-2">ISLANDS OF PERSONALITY</h1>
      <div class="row text-center">
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
            <button class="btn btn-lg text-dark w-100 tablink" onclick="openMenu(event, '<?php echo $row['name']; ?>')"><?php echo $row['name']; ?></button>
          </div>
        <?php endwhile; ?>
      </div>
      <div class="container mt-5">
        <?php
        $result->data_seek(0);
        while ($row = $result->fetch_assoc()):
        ?>
          <div id="<?php echo $row['name']; ?>" class="menu mt-4" style="display: none;">
            <div class="card mb-3" style="border: 5px solid <?php echo $row['color']; ?>;">
              <h5 class="card-title text-center mb-4" style="font-size: 30px; color: black; padding: 15px; background-color: <?php echo $row['color']; ?>; font-family: 'Trade Winds', system-ui; font-weight: 400; font-style: normal;">
                <b><?php echo $row['name']; ?></b>
              </h5>
              <img src="<?php echo $row['image']; ?>" class="card-img-top mx-auto d-block img-fluid pb-3" style="width: auto; max-height: 500px; " alt="<?php echo $row['name']; ?>">
              <div class="card-body mx-3">
                <p class="card-textsD" style="background-color: <?php echo $row['color']; ?>;"><strong>Short Description:</strong> <?php echo $row['shortDescription']; ?></p>
                <p class="card-textLd" style="background-color: <?php echo $row['color']; ?>;"><strong>Long Description:</strong> <?php echo $row['longDescription']; ?></p>
                <p class="card-textsD" style="color: <?php echo $row['color']; ?>;">
                  <strong>Color:</strong> <?php echo $row['color']; ?>
                </p>
              </div>

              <div>
                <h1 class="titleContent text-center my-5" style="color: black;">CONTENTS</h1>
              </div>

              <div class="row">
                <?php
                $islandOfPersonalityID = $row['islandOfPersonalityID'];
                $contentSql = "SELECT * FROM islandcontents WHERE islandOfPersonalityID = $islandOfPersonalityID";
                $contentResult = $conn->query($contentSql);

                if ($contentResult->num_rows > 0) {
                  while ($content = $contentResult->fetch_assoc()) {
                ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4 mx-1">
                      <div class="card mb-3" style="background: <?php echo $content['color']; ?> ">
                        <div class="image-container">
                          <img
                            src="<?php echo $content['image']; ?>"
                            class="image card-img-top mx-auto d-block img-fluid p-4 mt-3"
                            style="width: auto; min-height: 300px;"
                            alt="Content Image">
                        </div>
                        <div class="card-body mx-3 my-3">
                          <p class="card-text"><?php echo $content['content']; ?></p>
                          <p class="card-text"><strong>Color:</strong> <?php echo $content['color']; ?></p>
                        </div>
                      </div>
                    </div>

                <?php
                  }
                } else {
                  echo "<p>No contents available for this island.</p>";
                }
                ?>
              </div>

            </div>
          </div>
        <?php endwhile; ?>
      </div>

      <script>
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

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>