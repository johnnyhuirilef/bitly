<?php

namespace Enius\Bitly\Provider\V3;

use Enius\Bitly\Bitly;
use Enius\Bitly\Provider\V3\Resource\Link;
use Enius\Bitly\Provider\V3\Resource\User;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;

class V3
{
    const VERSION = 'v3';
    private $client;
    public $user;
    public $link;

    /**
     * @param $token
     * @param array $defaultConfig
     * @return V3
     */
    static function get($token, array $defaultConfig = [])
    {
        return new static($token, $defaultConfig);
    }

    /**
     * BitlyApiV3 constructor.
     * @param $token
     * @param array $defaultConfig
     */
    private function __construct($token, array $defaultConfig)
    {
        $handler = $this->getHandler($token);
        $config = array_merge(
            [
                'handler' => $handler,
                'base_uri' => Bitly::getBaseUri(self::VERSION),
            ],
            $defaultConfig
        );
        $this->client = new \GuzzleHttp\Client($config);
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

    /**
     * @param $token
     * @return HandlerStack
     */
    private function getHandler($token): HandlerStack
    {
        $handler = new HandlerStack();
        $handler->setHandler(new CurlHandler());
        $handler->unshift(
            Middleware::mapRequest(
                function (RequestInterface $request) use ($token) {
                    return $request->withUri(Uri::withQueryValue($request->getUri(), 'access_token', $token));
                }
            )
        );

        return $handler;
    }

}