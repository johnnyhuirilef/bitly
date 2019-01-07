<?php

namespace Enius\Bitly\Provider\V3\Resource;

use GuzzleHttp\Client;
use Enius\Bitly\Provider\V3\Mapping;
use Enius\Bitly\Provider\V3\Utils\TransformData;


class User
{
    private $client;

    /**
     * @param Client $client
     * @return User
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
     * @return mixed
     * @throws \Enius\Bitly\Exceptions\AccessTokenInvalidException
     * @throws \Enius\Bitly\Exceptions\BitlyResponsePropertyDataNoExists
     * @throws \Enius\Bitly\Exceptions\BitlyResponseStatusCodeError
     */
    public function info()
    {
        $response = $this->client->get('user/info');
        $data = TransformData::handle($response);

        return Mapping\User\Info::setData($data);
    }
}