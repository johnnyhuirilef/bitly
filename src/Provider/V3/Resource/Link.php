<?php

namespace Enius\Bitly\Provider\V3\Resource;

use GuzzleHttp\Client;
use Enius\Bitly\Provider\V3\Mapping\Link\Shorten;
use Enius\Bitly\Provider\V3\Utils\TransformData;


class Link
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

    /**
     * Link constructor.
     * @param Client $client
     */
    private function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $longUrl
     * @return Shorten
     * @throws \Enius\Bitly\Exceptions\AccessTokenInvalidException
     * @throws \Enius\Bitly\Exceptions\BitlyResponsePropertyDataNoExists
     * @throws \Enius\Bitly\Exceptions\BitlyResponseStatusCodeError
     */
    public function shorten($longUrl)
    {
        $params = ['longUrl' => $longUrl];
        $response = $this->client->get(
            'shorten',
            [
                'query' => $params,
            ]
        );

        $data = TransformData::handle($response);

        return Shorten::setData($data);
    }
}