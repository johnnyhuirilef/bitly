<?php

namespace Enius\Bitly\Provider\V4\Mapping\Link;


class Shorten
{
    private $createdAt;
    private $id;
    private $link;
    private $customBitlinks;
    private $longUrl;
    private $archived;
    private $tags;
    private $deeplinks;
    private $references;

    private function __construct($data)
    {
        $this->createdAt = new \DateTime($data->created_at);
        $this->id = $data->id;
        $this->link = $data->link;
        $this->customBitlinks = $data->custom_bitlinks;
        $this->longUrl = $data->long_url;
        $this->archived = $data->archived;
        $this->tags = $data->tags;
        $this->deeplinks = $data->deeplinks;
        $this->references = $data->references;
    }

    static function setData($data)
    {
        return new static($data);
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return mixed
     */
    public function getCustomBitlinks()
    {
        return $this->customBitlinks;
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
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @return mixed
     */
    public function getDeeplinks()
    {
        return $this->deeplinks;
    }

    /**
     * @return mixed
     */
    public function getReferences()
    {
        return $this->references;
    }
}