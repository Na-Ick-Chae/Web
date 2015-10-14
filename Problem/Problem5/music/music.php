<!DOCTYPE html>
<html>

<head>
	<title>Music Library</title>
	<meta charset="utf-8" />
	<link href="http://selab.hanyang.ac.kr/courses/cse326/2015/problems/images/4/music.jpg" type="image/jpeg" rel="shortcut icon" />
	<link href="http://selab.hanyang.ac.kr/courses/cse326/2015/problems/pResources/music.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<h1>My Music Page</h1>

	<!-- Ex 1: Number of Songs (Variables) -->
	<?php
	$song_count = 5678;
	?>
	<p>
		I love music.
		I have <?=$song_count?> total songs,
		which is over <?=floor($song_count/10)?> hours of music!
	</p>

	<!-- Ex 2: Top Music News (Loops) -->
	<!-- Ex 3: Query Variable -->
	<div class="section">
		<h2>Yahoo! Top Music News</h2>
		
		<ol>
			<?php
			if (!isset($_GET["newspages"])) {
				$news_pages = 5;
			}
			else {
				$news_pages = $_GET["newspages"];
			}
			for ($i=1; $i <= $news_pages ; $i++) { ?>
			<li><a href="http://music.yahoo.com/news/archive/?page=<?=$i?>">Page <?=$i?></a></li>
			<?php } ?>
		</ol>
	</div>

	<!-- Ex 4: Favorite Artists (Arrays) -->
	<!-- Ex 5: Favorite Artists from a File (Files) -->
	<div class="section">
		<h2>My Favorite Artists</h2>
		<?php
		$songs = array("Guns N' Roses", "Green Day", "Blink182");     
		$songs[] = "Queen";

		$text = file("favorite.txt");
		?>
		<ol>
			<?php foreach ($text as $t) { ?>
			<li><a href="http://en.wikipedia.org/wiki/<?=$t?>"><?=$t?></a></li>
			<?php	}  ?>
		</ol>
	</div>

	<!-- Ex 6: Music (Multiple Files) -->
	<!-- Ex 7: MP3 Formatting -->
	<div class="section">
		<h2>My Music and Playlists</h2>

		<ul id="musiclist">
			<?php
			$songs_list = glob("problem4/musicPHP/songs/*.mp3");
			
			foreach ($songs_list as $song) { 
				$song_size = filesize($song);
				?>
				<li class="mp3item">
					<a href="http://en.wikipedia.org/wiki/<?=$t?>"><?=basename($song),$song_size?></a>
				</li>
				<?php } ?>

				<!-- Exercise 8: Playlists (Files) -->
				<li class="playlistitem">326-13f-mix.m3u:
					<ul>
						<li>Basket Case.mp3</li>
						<li>All the Small Things.mp3</li>
						<li>Just the Way You Are.mp3</li>
						<li>Pradise City.mp3</li>
						<li>Dreams.mp3</li>
					</ul>
				</ul>
			</div>

			<div>
				<a href="http://validator.w3.org/check/referer">
					<img src="http://selab.hanyang.ac.kr/courses/cse326/2015/problems/images/w3c-html.png" alt="Valid HTML5" />
				</a>
				<a href="http://jigsaw.w3.org/css-validator/check/referer">
					<img src="http://selab.hanyang.ac.kr/courses/cse326/2015/problems/images/w3c-css.png" alt="Valid CSS" />
				</a>
			</div>
		</body>
		</html>
