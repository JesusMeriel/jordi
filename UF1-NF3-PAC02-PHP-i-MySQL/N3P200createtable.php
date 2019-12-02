<?php
//connect to MySQL
$db = mysqli_connect('localhost', 'root', '') or 
    die ('Unable to connect. Check your connection parameters.');

//create the main database if it doesn't already exist
$query = 'CREATE DATABASE IF NOT EXISTS music';
mysqli_query($db,$query) or die(mysqli_error($db));

//make sure our recently created database is the active one
mysqli_select_db($db,'music') or die(mysqli_error($db));

//create the movie table
$query = 'CREATE TABLE cancion (
        cancion_id        INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT, 
        name      VARCHAR(255)      NOT NULL, 
        genero      INTEGER           NOT NULL DEFAULT 0, 
        year      INTEGER UNSIGNED NOT NULL DEFAULT 0, 
        duracion     INTEGER,
        cantante   VARCHAR(255),

        PRIMARY KEY (cancion_id)
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die (mysqli_error($db));

//create the movietype table
$query = 'CREATE TABLE estilos ( 
        estilos_id    TINYINT UNSIGNED NOT NULL AUTO_INCREMENT, 
        genero VARCHAR(100)     NOT NULL, 
        PRIMARY KEY (estilos_id) 
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));

//create the people table
$query = 'CREATE TABLE persona ( 
        persona_id         INTEGER UNSIGNED    NOT NULL AUTO_INCREMENT, 
        nombre   VARCHAR(255), 
        pais    VARCHAR(255),
        edad    integer,
        
        PRIMARY KEY (persona_id)
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));

$query = 'CREATE TABLE reviews ( 
        review_id         INTEGER UNSIGNED    NOT NULL AUTO_INCREMENT, 
        review_nom   VARCHAR(255), 
        review_date    date,
        review_rating    integer,
        song_review     integer,
        review_coment   varchar(255),
        
        PRIMARY KEY (review_id)
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));

echo 'Movie database successfully created!';
?>
