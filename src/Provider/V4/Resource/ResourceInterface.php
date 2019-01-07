<?php

namespace Enius\Bitly\Provider\V4\Resource;

use GuzzleHttp\Client;

interface ResourceInterface
{
    static function get(Client $client);
}