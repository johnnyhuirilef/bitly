<?php

namespace Enius\Bitly\Provider\V3\Mapping\Link;

class Shorten
{
    private $url;
    private $hash;
    private $globalHash;
    private $longUrl;
    private $newHash;

    /**
     * @param \stdClass $data
     * @return Shorten
     */
    static function setData(\stdClass $data)
    {
        return new static($data);
    }

    /**
     * Shorten constructor.
     * @param \stdClass $data
     */
    private function __construct(\stdClass $data)
    {
        $this->url = $data->url;
        $this->hash = $data->hash;
        $this->globalHash = $data->global_hash;
        $this->longUrl = $data->long_url;
        $this->newHash = $data->new_hash;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @return mixed
     */
    public function getGlobalHash()
    {
        return $this->globalHash;
    }

    /**
     * @return mixed
     */
    public function getLongUrl()
    {
        return $this->longUrl;
    }

    /**
     * @return mixed
     */
    public function getNewHash()
    {
        return $this->newHash;
    }


}