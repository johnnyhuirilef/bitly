<?php

namespace Enius\Bitly\Provider\V3\Mapping\User;

class Info
{
    private $enterprisePermissions;
    private $apiKey;
    private $displayName;
    private $fullName;
    private $memberSince;
    private $defaultLinkPrivacy;
    private $hasMaster;
    private $shareAccounts;
    private $brandedShortDomains;
    private $hasPassword;
    private $customShortDomain;
    private $login;
    private $isEnterprise;
    private $isVerified;
    private $trackingDomains;
    private $domainOptions;

    private function __construct(\stdClass $data)
    {
        $this->enterprisePermissions = $data->enterprise_permissions;
        $this->apiKey = $data->apiKey;
        $this->displayName = $data->display_name;
        $this->fullName = $data->full_name;
        $this->memberSince = $data->member_since;
        $this->defaultLinkPrivacy = $data->default_link_privacy;
        $this->hasMaster = $data->has_master;
        $this->shareAccounts = $data->share_accounts;
        $this->brandedShortDomains = $data->branded_short_domains;
        $this->hasPassword = $data->has_password;
        $this->customShortDomain = $data->custom_short_domain;
        $this->login = $data->login;
        $this->isEnterprise = $data->is_enterprise;
        $this->isVerified = $data->is_verified;
        $this->trackingDomains = $data->tracking_domains;
        $this->domainOptions = $data->domain_options;
    }

    /**
     * @param \stdClass $data
     * @return Info
     */
    static function setData(\stdClass $data)
    {
        return new static($data);
    }

    /**
     * @return mixed
     */
    public function getBrandedShortDomains()
    {
        return $this->brandedShortDomains;
    }

    /**
     * @return mixed
     */
    public function getCustomShortDomain()
    {
        return $this->customShortDomain;
    }

    /**
     * @return mixed
     */
    public function getDefaultLinkPrivacy()
    {
        return $this->defaultLinkPrivacy;
    }

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @return mixed
     */
    public function getDomainOptions()
    {
        return $this->domainOptions;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @return mixed
     */
    public function getHasMaster()
    {
        return $this->hasMaster;
    }

    /**
     * @return mixed
     */
    public function getHasPassword()
    {
        return $this->hasPassword;
    }

    /**
     * @return mixed
     */
    public function getisEnterprise()
    {
        return $this->isEnterprise;
    }

    /**
     * @return mixed
     */
    public function getisVerified()
    {
        return $this->isVerified;
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
    public function getMemberSince()
    {
        return $this->memberSince;
    }

    /**
     * @return mixed
     */
    public function getShareAccounts()
    {
        return $this->shareAccounts;
    }

    /**
     * @return mixed
     */
    public function getTrackingDomains()
    {
        return $this->trackingDomains;
    }

    /**
     * @return mixed
     */
    public function getEnterprisePermissions()
    {
        return $this->enterprisePermissions;
    }

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }
}
