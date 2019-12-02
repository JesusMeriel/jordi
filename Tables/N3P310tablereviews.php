<?php
$db = mysql_connect('localhost', 'bp6am', 'bp6ampass') or 
    die ('Unable to connect. Check your connection parameters.');
mysql_select_db('moviesite', $db) or die(mysql_error($db));

//create the reviews table
$query = 'CREATE TABLE reviews (
        review_movie_id INTEGER UNSIGNED NOT NULL, 
        review_date     DATE             NOT NULL, 
        reviewer_name   VARCHAR(255)     NOT NULL, 
        review_comment  VARCHAR(255)     NOT NULL, 
        review_rating   TINYINT UNSIGNED NOT NULL  DEFAULT 0, 

        KEY (review_movie_id)
    )
    ENGINE=MyISAM';
mysql_query($query, $db) or die (mysql_error($db));

//insert new data into the reviews table
$query = <<<ENDSQL
INSERT INTO reviews
    (review_movie_id, review_date, reviewer_name, review_comment,
        review_rating)
VALUES 
    (1, "2008-09-23", "John Doe", "I thought this was a great movie
        Even though my girlfriend made me see it against my will.", 4),
    (1, "2008-09-23", "Billy Bob", "I liked Eraserhead better.", 2),
    (1, "2008-09-28", "Peppermint Patty", "I wish I'd have seen it
        sooner!", 5),
    (2, "2008-09-23", "Marvin Martian", "This is my favorite movie. I
        didn't wear my flair to the movie but I loved it anyway.", 5),
    (3, "2008-09-23", "George B.", "I liked this movie, even though I
        Thought it was an informational video from my travel agent.", 3)
ENDSQL;
mysql_query($query, $db) or die(mysql_error($db));

echo 'Movie database successfully updated!';
?>
