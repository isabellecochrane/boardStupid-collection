<?php

$db = new PDO('mysql:host=db; dbname=boardStupid', 'root', 'password');
$query = $db->prepare('QUERY;');
$query->execute();
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT * FROM `boardStupid`;');
$query->execute();
$result = $query->fetchAll();

//addition