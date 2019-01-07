<?php


namespace Enius\Bitly\Provider\V4\Resource;

use GuzzleHttp\Client;
use Enius\Bitly\Provider\V4\Mapping;
use Enius\Bitly\Provider\V4\Utils\TransformData;

class Link implements ResourceInterface
{
    private $client;

    /**
     * @param Client $client
     * @return Link
     */
    static function get(Client $client)
    {
        return new static($client);
    }

    private function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $longUrl
     * @return Mapping\Link\Shorten
     */
    public function shorten($longUrl)
    {
        $params = ['long_url' => $longUrl];
        $response = $this->client->post(
            'shorten',
            [
                'json' => $params,

            ]
        );

        $data = TransformData::handle($response);

        return Mapping\Link\Shorten::setData($data);

    }
}