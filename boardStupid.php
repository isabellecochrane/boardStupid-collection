<?php

$db = new PDO('mysql:host=db; dbname=boardStupid', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT *  FROM `boardStupid`;');
$query->execute();
$result = $query->fetchAll();

?>

<html>
<body>


<?php

foreach ($result as $data){
    echo '<h3>Name: ' . $data['name'] . '</h3>';
    echo '<span>Rating: ' . $data['rating'] . '</span><br />';
    echo '<span>game duration: ' . $data['playing_time'] . '</span><br />';
    echo '<span>minimum players: ' . $data['min_players'] . '</span><br />';
    echo '<span>maximum players: ' . $data['max_players'] . '</span><br />';
}
?>

</body>
</html>

