<?php

require_once 'vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Firebase\Factory;

$factory = (new Factory)->withServiceAccount('keys/serviceAccountKey.json');
$auth = $factory->createAuth();


// Inicializa o Firebase SDK
$firestore = new FirestoreClient([
  'projectId' => 'e-commerce-263e3',
  'keyFilePath' => 'keys/serviceAccountKey.json'
]);
