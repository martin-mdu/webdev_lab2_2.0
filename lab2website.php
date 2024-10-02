<?php
session_start();
?>


<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="lab2styles.css" />
  <title>LAB1</title>
  <link href="images/lab1logo.png" rel="icon" />
</head>

<body>
<?php
if (isset($_SESSION['loggedin']) === false) {
  $_SESSION['loggedin'] = false;
}
?>
  <div class="top_page">

    <span id="circle">
      <a href="lab1website.php">
        <img id="picture_circle" src="images/lab1logo.png" />
      </a>
    </span>

    <span id="links_place">
      <div id="top_nav">
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
        <a href="#">Link 4</a>
        <input type="text" placeholder="Search" />
        <span id="share_span">
          <a href="#" class="share-icon"><img id="picture_share" src="images/pngegg.png" />
          </a>
        </span>

      </div>
      <div id="bottom_nav">
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
        <a href="#">Link 4</a>
        <a href="#">Link 5</a>
        <a href="#">Link 6</a>
        <a href="#">Link 7</a>
        <a href="auxpage.php"><?php
                              if ($_SESSION['loggedin']) {
                                echo "Admin";
                              } else {
                                echo "Login";
                              }

                              ?></a>
      </div>
    </span>

  </div>

  <?php
  // Get the latest uploaded JSON file name
  $latestFile = file_get_contents("uploads/latest.json");

  // Construct the path to the latest JSON file
  $jsonPath = "uploads/" . $latestFile;

  // Check if the file exists and load the JSON content
  if (file_exists($jsonPath)) {
    $json_data = file_get_contents($jsonPath);
    $news = json_decode($json_data, true);
    $events = json_decode($json_data, true);
    $images = json_decode($json_data, true);
  } else {
    echo "Error: JSON file not found!";
  }
  ?>

  <div class="first_section">
    <div class="news_part">
      <div class="image-panel">
        <div class="image-item">
          <img src=<?php echo htmlspecialchars($news['news'][0]['imgurl']); ?> alt="Image 1">
          <div class="news1_data">
            <div class="news1_title"><?php echo htmlspecialchars($news['news'][0]['title']); ?></div>
            <div class="text"><?php echo htmlspecialchars($news['news'][0]['content']); ?></div>
          </div>
        </div>
        <div class="image-item">
          <img src=<?php echo htmlspecialchars($news['news'][1]['imgurl']); ?> alt="Image 2">
          <div class="news1_data">
            <div class="news1_title"><?php echo htmlspecialchars($news['news'][1]['title']); ?></div>
            <div class="text"><?php echo htmlspecialchars($news['news'][1]['content']); ?></div>
          </div>
        </div>
        <div class="image-item">
          <img src=<?php echo htmlspecialchars($news['news'][2]['imgurl']); ?> alt="Image 3">
          <div class="news1_data">
            <div class="news1_title"><?php echo htmlspecialchars($news['news'][2]['title']); ?></div>
            <div class="text"><?php echo htmlspecialchars($news['news'][2]['content']); ?></div>
          </div>
        </div>
        <div class="image-item">
          <img src=<?php echo htmlspecialchars($news['news'][0]['imgurl']); ?> alt="Image 1">
          <div class="news1_data">
            <div class="news1_title"><?php echo htmlspecialchars($news['news'][0]['title']); ?></div>
            <div class="text"><?php echo htmlspecialchars($news['news'][0]['content']); ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="second_section">
    <div class="events_part">
      <h4 id="events_tab">Events Tab</h4>
      <hr id="events_hr" />
      <ul id="events_ul">
        <li><?php echo htmlspecialchars($events['events'][0]['title']); ?></li>
        <li><?php echo htmlspecialchars($events['events'][1]['title']); ?></li>
        <li><?php echo htmlspecialchars($events['events'][2]['title']); ?></li>
        <li><?php echo htmlspecialchars($events['events'][3]['title']); ?></li>
        <li><?php echo htmlspecialchars($events['events'][4]['title']); ?></li>
      </ul>
      <hr id="events_hr" />
      <div id="events_links_div">
        <a class="link_more_events" href="link_more_events">More Events</a>
        |
        <a class="link_even_more_events" href="link_even_more_events">Even More Events</a>
      </div>
    </div>

    <div class="news2_part">
      <img src=<?php echo htmlspecialchars($news['news'][3]['imgurl']); ?> alt="Image 4">
      <div class="news2_textbox">
        <div class="titletab">
          <div class="bluetab_n2"><?php echo htmlspecialchars($news['news'][3]['title']); ?></div>
          <div class="transparentdiv_n2"></div>
        </div>
        <div class="texttextbox_n2">
          <p><?php echo htmlspecialchars($news['news'][3]['content']); ?></p>
        </div>
      </div>
    </div>

    <div class="text5_part">
      <div class="part5_img_div">
        <img id="picture_2" src="images/ferrari.jpg" />
        <div class="triangle"></div>
      </div>
      <div class="part5_text_div">
        <h4 id="text_tab">Events Tab</h4>
        <hr id="text_hr" />
        <p id="p_text5">Lorem ipsum dolor sit amet, sed do eiusmod tempor incididunt.
        </p>
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
      </div>
    </div>
  </div>


  <div class="third_section">
    <div class="video_part">
      <video autoplay muted loop>
        <source src="images/lab1video.mp4" type="video/mp4">
      </video>
    </div>

    <div class="text7_part">
      <img src=<?php echo htmlspecialchars($images['images'][0]['imgurl']); ?> />
    </div>

    <div class="feed_part">
      <a class="twitter-timeline" data-theme="dark" href="https://twitter.com/NASA?ref_src=twsrc%5Etfw"></a>
      <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
  </div>


</body>

</html>