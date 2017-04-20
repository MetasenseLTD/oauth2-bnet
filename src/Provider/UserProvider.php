<?php

namespace MetasenseLTD\OAuth2\Client\Provider;

use MetasenseLTD\OAuth2\Client\Entity\BNetUser;
use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Token\AccessToken;

class UserProvider extends BattleNet
{
    protected $entity = "user";

    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        return "https://{$this->region}.api.battle.net/account/user?access_token={$token}";
    }

    protected function createResourceOwner(array $response, AccessToken $token)
    {
        $response = (array)($response['characters']);

        $user = new BNetUser($response, $this->region);

        return $user;
    }
}