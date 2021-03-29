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

echo '<h1>boardStupid</h1>';

function printStats(array $result){


   foreach ($result as $data){
    '<div class="game">';
        echo '<h3>Name: ' . $data['name'] . '</h3>';
    '<div class="info">';
        echo '<span>Rating: ' . $data['rating'] . '/5'. '</span><br />';
        echo '<span>game duration: ' . $data['playing_time'] . ' minutes' . '</span><br />';
        echo '<span>minimum players: ' . $data['min_players'] . '</span><br />';
         echo '<span>maximum players: ' . $data['max_players'] . '</span><br />';
     '</div>';
    '</div>';
}
}
echo printStats($result);


'</body>';
'</html>';

