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
  <title>경 REVIEWS AdminXS</title>
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
    
    
    <div class="mbr-section__container container mbr-section__container--std-top-padding" style="padding: 93px 10px 10px 10px;">
	<?php include 'config.php' ?>
	<?php
	if (isset($_POST['deleteId'])) {
		$sql = sprintf(
					"UPDATE review SET hidden = 1 WHERE id = %s",
					$_POST['deleteId']);
		if ($conn->query($sql) === TRUE) {
			echo "Title deleted!";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
	if (isset($_POST['modify'])) {
		$mod_review = array(
			"title = '" . addslashes($_POST['modifyTitle']) . "'",
			"text = '" . addslashes($_POST['modifyReview']) . "'",
			"image = '" . $_POST['modifyImageUrl'] . "'",
			"score = " . $_POST['modifyScore']
		);
		
		$sql = sprintf(
					"UPDATE review SET %s WHERE id = %s",
					implode(", ", array_values($mod_review)),
					$_POST['modifyId']
			);
			
		if ($conn->query($sql) === TRUE) {
			echo "Title updated successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
	if (isset($_POST['create']))
	{			
		$sql = sprintf(
					"INSERT INTO review (title, text, image, score) values ('%s', '%s', '%s', %s)",
					addslashes($_POST['title']),
					trim(preg_replace('/\s+/', ' ', str_replace('"', '&quot;', str_replace('\'', '\\\'', $_POST['review'])))),
					$_POST['imageUrl'],
					$_POST['score']
			);
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
			echo $sql;
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
	?>
        <div class="mbr-section__row row">
		<?php
			echo "<h3>Add new title</h3><p><form method='post' id='create'>
			<label for='title'>Title</label>
			<input type='text' name='title' id='title'>
			<label for='imageUrl'>Image URL</label>
			<input type='text' name='imageUrl' id='imageUrl'>
			<label for='score'>Score</label>
			<input type='number' step='0.5' name='score' id='score'>
			<label for='review'>Review<br/> <textarea name='review' form='create' rows='5'></textarea></label>
			<input type='submit' name='create' value='Create'>
			</form>
			<style>
			input {
				width: 100%;
				clear: both;
			}
			table {
				width: 100%;
			}
			
			th {
				height: 50px;
			}
		</style>
	</p>";
	
	$sql = "SELECT id, title, text, image, score FROM review WHERE hidden=0 order by 1 desc";
	$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				echo "<p><h3>Modify existing title</h3><table><tr><th>Edit</th><th>Title</th><th>Text</th><th>Image</th><th>score</th></tr>";
				echo "<form method='post' id='deleteRow'><input type='number' hidden='true' name='deleteId' id='deleteId'/></form>";
				echo "<script>
						function deleteId() {
							document.getElementById('deleteId').value = arguments[0];
							if (confirm('Are you sure you want to delete the title?')) {
								document.forms['deleteRow'].submit();
							}
						}
						
						function modifyId() {
							document.getElementById('modifyId').value = arguments[0];
							document.getElementById('modifyTitle').value = arguments[1];
							document.getElementById('modifyTitle').disabled = false;
							document.getElementById('modifyImageUrl').value = arguments[2];
							document.getElementById('modifyImageUrl').disabled = false;
							document.getElementById('modifyScore').value = arguments[3];
							document.getElementById('modifyScore').disabled = false;
							document.getElementById('modifyReview').value = arguments[4];
							document.getElementById('modifyReview').disabled = false;
							document.getElementById('modifyButton').disabled = false;
						}
				</script>";
				while($row = $result->fetch_assoc()) {
					$id = $row['id'];
					$text = $row['text'];
					$image = $row['image'];
					$text = strlen($text) > 30 ? substr($text, 0, 27)."..." : $text;
					$image = strlen($image) > 30 ? substr($image, 0, 27)."..." : $image;
					
					echo "<tr>" .
					"<td>" . "<input style='width: 20px; height: 20px;' type='image' src='assets/images/delete.png' onclick='deleteId(" . $id . ")'/>" .
						"<input style='width: 20px; height: 20px;' type='image' src='assets/images/edit.png' onclick=\"modifyId(" . $id 
							. ", '" . addslashes($row['title'])
							. "', '" . $row['image'] 
							. "', " . $row['score'] 
							. ", '" . trim(preg_replace('/\s+/', ' ', str_replace('"', '&quot;', str_replace('\'', '\\\'', $row['text']))))
							. "')\"></input>" .
					"</td>" .
						"<td>" . $row['title'] . "</td>" .
						"<td>" . $text . "</td>" . 
						"<td>" . "<object style='height:20px;' data='" . $row['image'] . "' type='image/png'>" .
							"<img style='height:20px;' src='assets/images/notfound.png'/></object>" 
							. $image . "</td>" .
						"<td>" . $row['score'] . "</td>" .
					"</tr>";
				}
				echo "</table></p>";
				
				echo "<form method='post' id='modifyRow'>
						<label for='modifyTitle'>Title</label>
						<input type='text' name='modifyTitle' id='modifyTitle' disabled>
						<label for='modifyImageUrl'>Image URL</label>
						<input type='text' name='modifyImageUrl' id='modifyImageUrl' disabled>
						<label for='modifyScore'>Score</label>
						<input type='number' step='0.5' name='modifyScore' id='modifyScore' disabled>
							<label for='modifyReview'>Review<br/>
									<textarea rows='5' name='modifyReview' id='modifyReview' form='modifyRow' disabled></textarea>
							</label>
						<input type='number' hidden='true' name='modifyId' id='modifyId'/>
						<input type='submit' name='modify' id='modifyButton' value='Modify' disabled>
					</form>";
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
