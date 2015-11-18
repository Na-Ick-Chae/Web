<?php
require_once('timeline.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Simple Timeline</title>
    <link rel="stylesheet" href="timeline.css">
</head>
<body>
    <div>
        <a href="index.php"><h1>Simple Timeline</h1></a>
        <div class="search">
            <!-- Ex 3: Modify forms -->
            <form action="index.php" class="search-form" method="get">
                <input type="submit" value="search">
                <input name="query" type="text" placeholder="Search">
                <select name="type">
                    <option value="author">Author</option>
                    <option value="content">Content</option>
                </select>
            </form>
        </div>
        <div class="panel">
            <div class="panel-heading">
                <!-- Ex 3: Modify forms -->
                <form action="add.php" class="write-form" method="post">
                    <input name="author" type="text" placeholder="Author">
                    <div>
                        <input name="content" type="text" placeholder="Content">
                    </div>
                    <input type="submit" value="write">
                </form>
            </div>
            <!-- Ex 3: Modify forms & Load tweets -->
            <?php
            $timeline = new TimeLine();
            if (isset($_GET['type']) && isset($_GET['query'])) {
                $posts = $timeline->searchTweets($_GET['type'], $_GET['query']);
            }
            else  {
                $posts = $timeline->loadTweets();
            }
            foreach ($posts as $post) { ?>
            <div class="tweet">
                <form action="delete.php" class="delete-form" method="post">
                    <input type="submit" value="delete">
                    <input name="no" type="hidden" value="<?=$post['no']?>">
                </form>
                <div class="tweet-info">
                    <span><?=$post['author']?></span>
                    <span><?=date('H:i:s d/m/Y', strtotime($post['time']))?></span>
                </div>
                <div class="tweet-content">
                    <?=$post['contents']?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
