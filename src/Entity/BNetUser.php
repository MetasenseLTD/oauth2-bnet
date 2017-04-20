<?php

namespace MetasenseLTD\OAuth2\Client\Entity;


use League\OAuth2\Client\Provider\ResourceOwnerInterface;

class BNetUser implements ResourceOwnerInterface
{
    public $data;

    public function __construct(array $attributes, $region)
    {
        $this->data = $attributes;
    }

    public function toArray()
    {
        return $this->data;
    }

    public function getId()
    {
        return $this->data[0]['id'];
    }

    public function getBattleTag()
    {
        return $this->data[0]['battletag'];
    }
}