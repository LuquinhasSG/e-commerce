<?php

require_once 'vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

// Inicializa o Firebase SDK
$firestore = new FirestoreClient([
  'projectId' => 'e-commerce-263e3',
  'keyFilePath' => 'keys/serviceAccountKey.json'
]);
