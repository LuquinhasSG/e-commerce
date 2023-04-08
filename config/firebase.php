<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Firebase\Factory;

class FirebaseConfig
{
    private $auth;
    private $firestore;

    public function __construct()
    {
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/../keys/serviceAccountKey.json');
        $this->auth = $factory->createAuth();

        $this->firestore = new FirestoreClient([
            'projectId' => 'e-commerce-263e3',
            'keyFilePath' => __DIR__ . '/../keys/serviceAccountKey.json'
        ]);
    }

    public function getAuth()
    {
        return $this->auth;
    }

    public function getFirestore()
    {
        return $this->firestore;
    }
}
