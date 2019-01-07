<?php

namespace Enius\Bitly\Provider\V4;

use Enius\Bitly\Bitly;
use Enius\Bitly\Provider\V4\Resource\Link;
use Enius\Bitly\Provider\V4\Resource\User;


class V4
{
    const VERSION = 'v4';
    private $client;
    /**
     * @var User
     */
    private $user;
    /**
     * @var Link
     */
    private $link;

    /**
     * @param $token
     * @param array $defaultConfig
     * @return V4
     */
    static function get($token, array $defaultConfig = [])
    {
        return new static($token, $defaultConfig);
    }

    public function __construct($token, array $defaultConfig)
    {
        $config = array_merge(
            [
                'headers' => $this->getHeaders($token),
                'base_uri' => Bitly::getBaseUri(self::VERSION),
            ],
            $defaultConfig
        );
        $this->client = new \GuzzleHttp\Client($config);
    }

    /**
     * @param $token
     * @return array
     */
    private function getHeaders($token): array
    {
        return ['Authorization' => "Bearer {$token}"];
    }

    /**
     * @return User
     */
    public function user()
    {
        if (!$this->user instanceof User) {
            $this->user = User::get($this->client);
        }

        return $this->user;
    }

    /**
     * @return Link
     */
    public function link()
    {
        if (!$this->link instanceof Link) {
            $this->link = Link::get($this->client);
        }

        return $this->link;
    }
}