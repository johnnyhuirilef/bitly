<?php

namespace Enius\Bitly;

use Enius\Bitly\Exceptions\AccessTokenMissingException;
use Enius\Bitly\Provider\V3\V3;
use Enius\Bitly\Provider\V4\V4;
use Psr\Http\Message\ResponseInterface;
use Enius\Bitly\Exceptions\BitlyResponseStatusCodeError;

class Bitly
{
    private $token = null;
    private $v3;
    private $v4;
    const BASE_URL = 'https://api-ssl.bitly.com';

    /**
     * @param $token
     * @return Bitly
     * @throws AccessTokenMissingException
     */
    static function get($token)
    {
        return new static($token);
    }

    /**
     * Client constructor.
     * @param $token
     * @throws AccessTokenMissingException
     */
    public function __construct($token)
    {
        $this->checkEmptyToken($token);
        $this->token = $token;
    }

    /**
     * @return V3
     */
    public function v3()
    {
        if (!$this->v3 instanceof V3) {
            $this->v3 = V3::get($this->token);
        }

        return $this->v3;
    }

    /**
     * @return V4
     */
    public function v4()
    {
        if (!$this->v4 instanceof V4) {
            $this->v4 = V4::get($this->token);
        }

        return $this->v4;
    }

    static function getBaseUri($version)
    {
        return self::BASE_URL.'/'.$version.'/';
    }

    /**
     * @param $token
     * @throws AccessTokenMissingException
     */
    private function checkEmptyToken($token): void
    {
        if (empty($token)) {
            throw new AccessTokenMissingException('Access token is not set');
        }
    }

    /**
     * @param ResponseInterface $response
     * @throws BitlyResponseStatusCodeError
     */
    static function checkResponseStatusCodeError(ResponseInterface $response): void
    {
        if ($response->getStatusCode() !== 200) {
            throw new BitlyResponseStatusCodeError('Bitly Status Code:'.$response->getStatusCode()." - ");
        }
    }
}
