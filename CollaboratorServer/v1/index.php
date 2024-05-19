<?php
    use CollaboratorServer\V1\CollaboratorV1;
    require_once 'CollaboratorV1.php';
    
    $fileName = isset($_GET['f']) ? $_GET['f'] : null; 
    $collaborator = new CollaboratorV1($fileName);

    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $headers = getallheaders();

    $collaborator->collaboratorData($requestMethod, $headers);

?>