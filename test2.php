<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10/5/14
 * Time: 7:27 PM
 */

include "vendor/autoload.php";

\Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation', __DIR__.'/vendor/jms/serializer/src'
);

$client = new \Sabre\Client\Client(new \Sabre\Client\ClientSettings(
    $host = 'ssl://sws-sts.cert.sabre.com',
    $port = 443,
    $CPAId = 'FF9A'
));

$client->setLogger(new \Monolog\Logger('myLogger'));

// Prepare some fake data
$source = new \Sabre\DTO\SessionCreateRequest\SessionCreateSource();
$source->setPseudoCityCode('IFTTT');
$pos = new \Sabre\DTO\SessionCreateRequest\SessionCreatePOS();
$pos->setSource($source);
$request = new \Sabre\DTO\SessionCreateRequest\SessionCreateRequest();
$request->setPOS($pos);


$sender = new \Sabre\Sender\SessionCreateSender($client);
$sender->sendRequest($request);
$response = $sender->awaitResponse();

var_dump($response);