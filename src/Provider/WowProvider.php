<?php

namespace MetasenseLTD\OAuth2\Client\Provider;

use MetasenseLTD\OAuth2\Client\Entity\WowUser;
use League\OAuth2\Client\Token\AccessToken;

class WowProvider extends BattleNet
{

    protected $entity = "wow";

    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        return "https://{$this->region}.api.battle.net/wow/user/characters?access_token={$token}";
    }

    protected function createResourceOwner(array $response, AccessToken $token)
    {
        $response = (array)($response['characters']);

        $user = new WowUser($response, $this->region);

        return $user;
    }
}
