<?php
    require_once 'Config.php';
    $loadContent = $db->query('SELECT * FROM fnc_collection
    WHERE PK_Account_id =?', "144" )->fetchArray();
    header('Content-Type:'.$loadContent['document_mine']);
    echo $loadContent['document_data'];
 ?>
