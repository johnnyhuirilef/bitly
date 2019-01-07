<?php

namespace Enius\Bitly\Provider\V4\Mapping\User;

class Get
{
    private $created;
    private $modified;
    private $login;
    private $isActive;
    private $is2FaEnabled;
    private $name;
    private $emails;
    private $isSsoUser;
    private $defaultGroupGuid;

    private function __construct($data)
    {
        $this->created = $data->created;
        $this->modified = $data->modified;
        $this->login = $data->login;
        $this->isActive = $data->is_active;
        $this->is2FaEnabled = $data->is_2fa_enabled;
        $this->name = $data->name;
        $this->emails = $data->emails;
        $this->isSsoUser = $data->is_sso_user;
        $this->defaultGroupGuid = $data->default_group_guid;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return mixed
     */
    public function getDefaultGroupGuid()
    {
        return $this->defaultGroupGuid;
    }

    /**
     * @return mixed
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * @return mixed
     */
    public function getIs2FaEnabled()
    {
        return $this->is2FaEnabled;
    }

    /**
     * @return mixed
     */
    public function getisActive()
    {
        return $this->isActive;
    }

    /**
     * @return mixed
     */
    public function getisSsoUser()
    {
        return $this->isSsoUser;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    static function setData($data)
    {
        return new static($data);
    }
}