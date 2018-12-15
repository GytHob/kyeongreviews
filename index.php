<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.5.2, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <meta name="description" content="">
  <title>경 Reviews</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&subset=cyrillic,latin,greek,vietnamese">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/mobirise/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--sticky mbr-navbar--auto-collapse" id="ext_menu-m" data-rv-view="119">
    <div class="mbr-navbar__section mbr-section">
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container">
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                    <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
                        <span class="mbr-brand__logo"><a href="/"><img src="assets/images/ff2b102aa85efea3abeba6c2f8d59d39-85x128.jpg" class="mbr-navbar__brand-img mbr-brand__img" alt="Mobirise"></a></span>
                        <span class="mbr-brand__name"><a class="mbr-brand__name text-white" href="/">경 REVIEWS</a></span>
                    </span>
                </div>
<!--
                <div class="mbr-navbar__hamburger mbr-hamburger"><span class="mbr-hamburger__line"></span></div>
                <div class="mbr-navbar__column mbr-navbar__menu">
                    <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
                        <div class="mbr-navbar__column">
                            <ul class="mbr-navbar__items mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active"><li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="/">MOVIES</a></li><li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="/">FOOD</a></li><li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="/">COFFEE</a></li></ul>                            
                            <ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item"><a class="mbr-buttons__btn btn btn-link" href="/">CITIES</a></li></ul>
                        </div>
                    </nav>
                </div>
-->
            </div>
        </div>
    </div>
</section>

<section class="engine"><a href="/">Reviews</a></section><section class="mbr-section mbr-section--relative mbr-section--fixed-size mbr-after-navbar" id="features1-k" data-rv-view="114" style="background-color: rgb(255, 255, 255);">
    
    
    <div class="mbr-section__container container mbr-section__container--std-top-padding" style="padding-top: 93px;">
        <div class="mbr-section__row row">
		<?php include 'config.php' ?>
		<?php
			
			$sql = "SELECT id, title, text, image, score FROM review WHERE hidden=0 order by 1 desc";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<div class='mbr-section__col col-xs-12 col-md-3 col-sm-6'>
                <div class='mbr-section__container mbr-section__container--center mbr-section__container--middle'>
                    <figure class='mbr-figure'>
						<object data='" . $row['image'] . "' type='image/png' class='mbr-figure__img'>
							<img src='assets/images/notfound.png' />
						</object>
					</figure>
                </div>
                <div class='mbr-section__container mbr-section__container--middle'>
                    <div class='mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg'>
                        <h3 class='mbr-header__text'>" . $row["title"] . "</h3>
                    </div>
                </div>
                <div class='mbr-section__container mbr-section__container--middle'>
                    <div class='mbr-article mbr-article--wysiwyg'>
                        <p>" . $row["text"] . "</p>
                    </div>
					";
					$counter = 5.0;
					$score = $row["score"];
					while ($counter > 0) {
						echo "<div class='carrot'>";
						if ($score >= $counter) {
							echo "<img src='assets/images/carrot-on.png'/>";
						} else if ($counter - 0.5 == $score) {
							echo "<img src='assets/images/carrot-half.png'/>";
						} else {
							echo "<img src='assets/images/carrot-off.png'/>";
						}
						echo "</div>";
						
						$counter--;
					}
                echo "</div>
            </div>";
					
				}
			} else {
				echo "0 results";
			}
			$conn->close();
		?>
        </div>
    </div>
</section>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/mobirise/js/script.js"></script>
  
  
</body>
</html>