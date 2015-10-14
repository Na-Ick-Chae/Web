<!DOCTYPE html>
<html>
<head>
    <title>Dictionary</title>
    <meta charset="utf-8" />
    <link href="dictionary.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <div id="header">
        <h1>My Dictionary</h1>
        <!-- Ex. 1: File of Dictionary -->
        <?
        $filename = "dictionary.tsv";
        $lines = file($filename);
        $d_size = filesize($filename); 
        ?>
        <p>
            My dictionary has <?=count($lines)?> total words
            and
            size of <?=$d_size?> bytes.
        </p>
    </div>
    <div class="article">
        <div class="section">
            <h2>Today's words</h2>
            <!-- Ex. 2: Today’s Words & Ex 6: Query Parameters -->
            <?php
            function getWordsByNumber($listOfWords, $numberOfWords){
                $resultArray = array();
                foreach ($listOfWords as $result) {
                    $resultArray[] = $result;
                }
                shuffle($resultArray);
                $resultArray = array_slice($resultArray, 0, $numberOfWords);
                return $resultArray;
            }
            $numberOfWords = rand(1,7);
            $todaysWords = getWordsByNumber($lines, $numberOfWords);
            ?>
            <ol>
                <?php
                foreach ($todaysWords as $element) { ?>
                <li><?=$element?></li>
                <?php } ?>

            <!-- <li>Apple - An apple is a round fruit with smooth green, yellow, or red skin and firm white flesh.</li>
            <li>Computer - A computer is an electronic machine that can store and deal with large amounts of information.</li>
            <li>Graduate - A graduate is a person who has successfully completed a degree at a university or college and has received a certificate that shows this.</li> -->
        </ol>
    </div>
    <div class="section">
        <h2>Searching Words</h2>
        <!-- Ex. 3: Searching Words & Ex 6: Query Parameters -->
        <?php
        function getWordsByCharacter($listOfWords, $startCharacter){
            $resultArray = array();
            foreach ($listOfWords as $element) {
                if ($element[0] === $startCharacter) {
                    $resultArray[] = $element;
                }
            }
            // $resultArray = array_filter($listOfWords, $startCharacter);
            return $resultArray;
        }
        $startCharacter = 'C';
        $searchedWords = getWordsByCharacter($lines, $startCharacter);
        ?>
        <p>
            Words that started by <strong>'C'</strong> are followings :
        </p>
        <ol>
            <?php
            foreach ($searchedWords as $element) { ?>
            <li><?=$element?></li>
            <?php } ?>
        </ol>
    </div>
    <div class="section">
        <h2>List of Words</h2>
        <!-- Ex. 4: List of Words & Ex 6: Query Parameters -->
        <?php
        function getWordsByOrder($listOfWords, $orderby){
            $resultArray = $listOfWords;
            $resultArray = sort($resultArray);
            if($orderby === 1) {
                $resultArray = rsort($resultArray);
            }
            return $resultArray;
        }

        $orderby = 0;
        $orderedArray = getWordsByOrder($lines, $orderby);
        ?>
        <p>
            All of words ordered by <strong>alphabetical order</strong> are followings :
        </p>
        <ol>
            <?php
            foreach ($orderedArray as $element) { 
                $temp = explode(' - ', $element);
                if (strlen($temp) >= 6) {?>
            <li class="long"><?=$element?></li>

            <?php } else { ?>
                <li><?=$element?></li>
            <?php }
            } ?>
            
        </ol>
    </div>
    <div class="section">
        <h2>Adding Words</h2>
        <!-- Ex. 5: Adding Words & Ex 6: Query Parameters -->
        <p>Input word or meaning of the word doesn't exist.</p>
    </div>
</div>
<div id="footer">
    <a href="http://validator.w3.org/check/referer">
        <img src="http://selab.hanyang.ac.kr/courses/cse326/2015/problems/images/w3c-html.png" alt="Valid HTML5" />
    </a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img src="http://selab.hanyang.ac.kr/courses/cse326/2015/problems/images/w3c-css.png" alt="Valid CSS" />
    </a>
</div>
</body>
</html>