<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10/3/14
 * Time: 7:58 PM
 */

include "vendor/autoload.php";


$fp = fsockopen('ssl://sws-sts.cert.sabre.com', 443, $errno, $errstr, 10);
$stream = \GuzzleHttp\Stream\Stream::factory($fp);

$oDate = new DateTime();
$timestamp = $oDate->format('Y-m-d\Th:i:sP');
$timetolive = $oDate->add(new DateInterval('PT1H'))->format('Y-m-d\Th:i:sP');

$serverProperties = array(
    'SERVER' => 'sws-crt.cert.sabre.com'
, 'USERNAME' => '*USERNAME*'
, 'PASSWORD' => '*PASSWORD*'
, 'PCC' => '*PCC*'
);

$body = <<<SESSIONCREATEXML
<?xml version="1.0" encoding="UTF-8"?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
   <soapenv:Header>
      <MessageHeader xmlns="http://www.ebxml.org/namespaces/messageHeader">
         <From>
            <PartyId type="urn:x12.org:IO5:01">Sabre WS Example</PartyId>
         </From>
         <To>
            <PartyId type="urn:x12.org:IO5:01">Sabre</PartyId>
         </To>
         <CPAId>{$serverProperties['PCC']}</CPAId>
         <ConversationId>MyConversationID</ConversationId>
         <Service type="string">Cruise</Service>
         <Action>SessionCreateRQ</Action>
         <MessageData>
            <MessageId>1000</MessageId>
            <Timestamp>{$timestamp}</Timestamp>
            <TimeToLive>{$timetolive}</TimeToLive>
         </MessageData>
      </MessageHeader>
      <Security xmlns="http://schemas.xmlsoap.org/ws/2002/12/secext">
         <UsernameToken>
            <Username>{$serverProperties['USERNAME']}</Username>
            <Password>{$serverProperties['PASSWORD']}</Password>
            <Organization>{$serverProperties['PCC']}</Organization>
            <Domain>DEFAULT</Domain>
         </UsernameToken>
      </Security>
   </soapenv:Header>
   <soapenv:Body>
      <SessionCreateRQ xmlns="http://www.opentravel.org/OTA/2002/11">
         <POS>
            <Source PseudoCityCode="{$serverProperties['PCC']}" />
         </POS>
      </SessionCreateRQ>
   </soapenv:Body>
</soapenv:Envelope>
SESSIONCREATEXML;

$stream->write(
    $header = "POST /websvc HTTP/1.1
Host: sws-sts.cert.sabre.com:443
Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5
Accept-Language: en-us,en;q=0.5
Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7
Keep-Alive: 300
Connection: keep-alive
Content-Type: text/xml
Content-Length: " . strlen($body) . "
Pragma: no-cache
Cache-Control: no-cache"
    . "\r\n\r\n" .
    $body
);
echo $stream;


class Sabre
{
    public $host = 'sws-sts.cert.sabre.com';
    public $port = 443;
    public $timeout = 30;


    public function makeRequest($body)
    {

        $header = "POST /websvc HTTP/1.1
Host: {$this->host}:{$this->port}
Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5
Accept-Language: en-us,en;q=0.5
Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7
Keep-Alive: 300
Connection: keep-alive
Content-Type: text/xml
Content-Length: " . strlen($body) . "
Pragma: no-cache
Cache-Control: no-cache";

        $fp = fsockopen("ssl://" . $this->host, $this->port, $errno, $errstr, $this->timeout);
        if (!$fp) {
            throw new Exception("SOCKET ERROR ({$errno}): {$errstr}\n");
        } else {
            //send the request
            $req = $header . "\r\n\r\n" . $body;
            fputs($fp, $req, strlen($req));
            stream_set_timeout($fp, $this->timeout);
            stream_set_blocking($fp, 1);
            while (!feof($fp)) {
                $line = fread($fp, 2048);
                // if (trim(strlen($line)) < 10) continue;
                $output .= $line;
            }
            fclose($fp);
        }

        // remove the HTTP response header
        $ret = explode("\r\n\r\n", $output);
        $ret = $ret[1];

        // format XML so we can read it.
        $dom = new DOMDocument;
        $dom->preserveWhiteSpace = FALSE;
        $dom->loadXML($ret);
        $dom->formatOutput = TRUE;
        $ret = $dom->saveXml();

        return $ret;
    }
}