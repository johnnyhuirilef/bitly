<?php

namespace Enius\Bitly\Provider\V4\Utils;

use Enius\Bitly\Bitly;
use Psr\Http\Message\ResponseInterface;

class TransformData
{

    static function handle(ResponseInterface $response)
    {
        Bitly::checkResponseStatusCodeError($response);
        $contents = $response->getBody()->getContents();
        $arrayBody = json_decode($contents);

        return $arrayBody;
    }
}