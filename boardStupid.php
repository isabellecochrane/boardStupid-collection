<?php

$db = new PDO('mysql:host=db; dbname=boardStupid', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT *  FROM `boardStupid`;');
$query->execute();
$result = $query->fetchAll();


require_once 'game_function.php'

?>
    <html>
    <body>


<?php

echo '<h1>boardStupid</h1>';

echo printStats($result);


'</body>';
'</html>';