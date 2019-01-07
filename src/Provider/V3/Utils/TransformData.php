<?php

namespace Enius\Bitly\Provider\V3\Utils;

use Enius\Bitly\Bitly;
use Enius\Bitly\Exceptions\AccessTokenInvalidException;
use Enius\Bitly\Exceptions\BitlyResponsePropertyDataNoExists;
use Psr\Http\Message\ResponseInterface;

class TransformData
{
    /**
     * @param ResponseInterface $response
     * @return mixed
     * @throws AccessTokenInvalidException
     * @throws BitlyResponsePropertyDataNoExists
     * @throws \Enius\Bitly\Exceptions\BitlyResponseStatusCodeError
     */
    static function handle(ResponseInterface $response)
    {
        Bitly::checkResponseStatusCodeError($response);
        $contents = $response->getBody()->getContents();
        $arrayBody = json_decode($contents);
        self::checkValidToken($arrayBody);
        self::checkResponsePropertyDataExists($arrayBody);

        return $arrayBody->data;
    }

    /**
     * @param $arrBody
     * @throws BitlyResponsePropertyDataNoExists
     */
    static function checkResponsePropertyDataExists($arrBody): void
    {
        if (!property_exists($arrBody, 'data')) {
            throw new BitlyResponsePropertyDataNoExists();
        }
    }

    /**
     * @param $arrayBody
     * @throws AccessTokenInvalidException
     */
    static function checkValidToken($arrayBody): void
    {
        if ($arrayBody->status_code === 403 && $arrayBody->status_txt === 'INVALID_ACCESS_TOKEN') {
            throw new AccessTokenInvalidException('Access token is not valid');
        }
    }
}