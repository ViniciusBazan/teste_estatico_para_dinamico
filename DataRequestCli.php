<?php
header('Content-Type: application/json');

require_once 'DataRequest.php';

$data = new DataRequest;

echo json_encode($data->dadosClientes());
?>