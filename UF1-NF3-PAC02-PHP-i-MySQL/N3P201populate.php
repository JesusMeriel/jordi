<?php
// connect to mysqli
$db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');

//make sure you're using the correct database
mysqli_select_db($db,'music') or die(mysqli_error($db));

// insert data into the movie table
$query = 'INSERT INTO cancion
    VALUES
        (1, "blind", 1, 1994, 4, 2),
        (2, "my generation", 1, 2000, 4, 3),
        (3, "cant stop", 5, 2002, 4, 1),
        (4, "insane in the brain", 7, 1993, 3, 1)';
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the movietype table
$query = 'INSERT INTO estilos 
    VALUES 
        (1, "nu metal"),
        (2, "rock"), 
        (3, "pop"),
        (4, "punk"), 
        (5, "funk"),
        (6, "heavy metal"),
        (7, "rap"),
        (8, "country")';
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the people table
$query  = 'INSERT INTO persona
    VALUES 
        (1, "Anthony Kiedis", "estados unidos", 56),
        (2, "jonathan davis", "estados unidos", 48),
        (3, "fred durst", "estados unidos", 49),
        (4, "b-real", "estados unidos", 49),
        (5, "conway twitty", "estados unidos", 86),
        (6, "billie joe", "estados unidos", 47)';
mysqli_query($db,$query) or die(mysqli_error($db));


$query  = 'INSERT INTO reviews
    VALUES 
        (1, "osvaldo", "1995-01-29", 2, 1, "muy chingona xd"),
        (2, "julio", "2019-6-6", 5, 1, "500 likes en mi coment y me tiro de un quinto piso"),
        (3, "erminia", "2019-4-5", 3.5, 1, "bonita cancion"),
        (4, "joe", "2019-2-7", 3, 2, "no me gusta, bueno un poco si"),
        (5, "matius", "2019-6-6", 5, 2, "esta cansion esta muy chingona, jaja salu2"),
        (6, "jhon", "2019-21-6", 3, 2, "yeah"),
        (7, "james", "2019-3-6", 4.2, 3, "si la pones al reves se oye a dios"),
        (8, "stu", "1816-4-8", 5, 3, "que dices xdd"),
        (9, "gerardo", "2019-4-5", 2, 3, "yo solo oigo a mis voces"),
        (10, "juan", "2019-3-6", 5, 4, "melodica"),
        (11, "nelson", "2019-6-6", 4,4, "me gusta, pero no lo suficiente" ),
        (12, "ratata", "2019-4-5", 5, 4, "esto es esparta!")';
mysqli_query($db,$query) or die(mysqli_error($db));
echo 'Data inserted successfully!';
?>







