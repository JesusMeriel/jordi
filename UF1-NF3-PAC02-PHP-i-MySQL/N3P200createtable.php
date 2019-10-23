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
        id        INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT, 
        name      VARCHAR(255)      NOT NULL, 
        genero      INTEGER           NOT NULL DEFAULT 0, 
        year      INTEGER UNSIGNED NOT NULL DEFAULT 0, 
        duracion     INTEGER,
        cantante   VARCHAR(255),

        PRIMARY KEY (id)
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die (mysqli_error($db));

//create the movietype table
$query = 'CREATE TABLE estilos ( 
        id    TINYINT UNSIGNED NOT NULL AUTO_INCREMENT, 
        genero VARCHAR(100)     NOT NULL, 
        PRIMARY KEY (id) 
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));

//create the people table
$query = 'CREATE TABLE persona ( 
        id         INTEGER UNSIGNED    NOT NULL AUTO_INCREMENT, 
        nombre   VARCHAR(255), 
        pais    VARCHAR(255),
        edad    integer,
        
        PRIMARY KEY (id)
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));

echo 'Movie database successfully created!';
?>
