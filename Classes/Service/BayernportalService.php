<?php declare(strict_types=1);

namespace Passionweb\BayernportalApi\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Log\LoggerInterface;

class BayernportalService
{
    protected LoggerInterface $logger;

    protected array $extConf;

    public function __construct(
        LoggerInterface $logger,
        array $extConf
    ) {
        $this->logger = $logger;
        $this->extConf = $extConf;
    }

    public function fetchJsonData(array $flexformSettings): array
    {
        $response = $this->sendRequest($flexformSettings['endpoint'] . '/' . $flexformSettings['parameter'] . '?gemeindekennziffer=' . $this->extConf['municipalCode']);

        if($response !== "") {
            $jsonData = json_decode($response, true);

            $data['Bezeichnung'] = array_key_exists('bezeichnung', $jsonData) ? $jsonData['bezeichnung']['value'] : '-';
            $data['Kurzbeschreibung'] = array_key_exists('kurzbeschreibung', $jsonData) ? $jsonData['kurzbeschreibung']['value'] : '-';
            $data['Langbeschreibung'] = array_key_exists('langbeschreibung', $jsonData) ? $jsonData['langbeschreibung']['value'] : '-';
            $data['Hinweise'] = array_key_exists('hinweise', $jsonData) ? $jsonData['hinweise']['value'] : '-';

            return $data;
        }
        return [];
    }

    private function sendRequest(string $endpoint): string
    {
        try {
            $client = new Client();
            $res = $client->request('GET', $this->extConf['apiUrl'] . $this->extConf['apiVersion'] . '/' . $endpoint,
                [
                    'headers' => [
                        'Accept' => 'application/json'
                    ],
                    'auth' => [
                        $this->extConf['apiUserIdentification'],
                        $this->extConf['apiPassword']
                    ]
                ]
            );
            return $res->getBody()->getContents();
        } catch(GuzzleException $e) {
            $this->logger->error($e->getMessage());
            return "";
        }
    }
}
