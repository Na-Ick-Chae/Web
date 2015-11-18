<?php
class TimeLine {
        # Ex 2 : Fill out the methods
    private $db;
    function __construct()
    {
            # You can change mysql username or password
        $this->db = new PDO("mysql:host=localhost;dbname=timeline", "root", "root");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
        public function add($tweet) // This function inserts a tweet
        {
            $stmt = $this->db ->prepare("INSERT INTO tweets (author, contents, time)
                VALUES (:author, :contents, NOW())");
            $stmt->execute(array(
                ':author'=>$tweet['author'],
                ':contents'=>$tweet['contents']
                ));
            //Fill out here
        }
        public function delete($no) // This function deletes a tweet
        {
            $stmt = $this->db ->prepare("DELETE from tweets where no = :no");
            $stmt->execute(array(':no'=>$no));
            //Fill out here
        }
        # Ex 6: hash tag
        # Find has tag from the contents, add <a> tag using preg_replace() or preg_replace_callback()
        public function loadTweets() // This function load all tweets
        {
            $stmt = $this->db ->prepare("SELECT * from tweets order by time desc");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {
                preg_replace('/#^[a-zA-Z0-9]+\s$/', '<a href="#">$0</a>\s', $row['contents']);
            }
            return $rows;
            //Fill out here
        }
        public function searchTweets($type, $query) // This function load tweets meeting conditions
        {
            if ($type === "author") {
                $stmt = $this->db ->prepare("SELECT * from tweets where author = :author like '%:author%'order by time desc");
                $stmt->execute(array(':author'=>$query));
            }
            else {
                $stmt = $this->db ->prepare("SELECT * from tweets where contents = :content like '%:content%'order by time desc");
                $stmt->execute(array(':content'=>$query));
            }
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {
                preg_replace('/#/', '<a>$1\s</a>', $row);
            }
            return $rows;
        }
    }
    ?>
