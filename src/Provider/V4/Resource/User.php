<?php
/**
 * Created by PhpStorm.
 * User: Enius
 * Date: 11/20/18
 * Time: 12:18 AM
 */

namespace Enius\Bitly\Provider\V4\Resource;


use GuzzleHttp\Client;
use Enius\Bitly\Provider\V4\Mapping;
use Enius\Bitly\Provider\V4\Utils\TransformData;

class User implements ResourceInterface
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
     * User constructor.
     * @param Client $client
     */
    private function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return Mapping\User\Get
     */
    public function retrive()
    {
        $response = $this->client->get('user');
        $data = TransformData::handle($response);

        return Mapping\User\Get::setData($data);
    }
}