<?php

namespace Ruhul\BOGaming;

class BlueOceanGaming
{

    protected $BASE_URL;
    protected $API_PASSWORD;
    protected $API_LOGIN;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->__initialize();
    }


    /**
     * __initialize
     *
     * @return void
     */
    private function __initialize()
    {
        $this->BASE_URL = config('blueoceangaming.api_endpoint');
        $this->API_PASSWORD = config('blueoceangaming.api_password');
        $this->API_LOGIN = config('blueoceangaming.api_login');
    }

    /**
     * getGameList
     *
     * @param array $params
     * @return void
     */
    public function getGameList($array)
    {
        return json_decode($this->curl([
            "api_password"         => $this->API_PASSWORD,
            "api_login"            => $this->API_LOGIN,
            "method"               => "getGameList",
            "show_systems"         => 0, //if false, parameter is not needed
            "show_additional"      => array_key_exists("show_additional", $array) ? true : false, //if false, parameter is not needed
            "currency"             => $array['currency']
        ]), true);
    }

    /**
     * getGame
     *
     * @param array $params
     * @return void
     */
    public function getGame($array)
    {
        $games =  json_decode($this->curl([
            "api_password"         => $this->API_PASSWORD,
            "api_login"            => $this->API_LOGIN,
            'method'               => 'getGame',
            'lang'                 => array_key_exists("lang", $array) ? $array['lang'] : 'en',

            'user_username'        => $array['user_username'], //not required for fun mode
            'user_password'        => $array['user_password'], //not required for fun mode

            'gameid'               => $array['game_id'], // you can also use game hash from getGameList to start a game - for example ne#ne-jingle-spin
            'homeurl'              => $array['homeurl'],
            'cashierurl'           => '', //optional
            'play_for_fun'         => $array['play_for_fun'], //to launch sportsbook in demo use method getGameDemo
            'currency'             => $array['currency']
        ]), true);
        return $games;
    }

    /**
     * getGameDirect
     *
     * @param array $params
     * @return void
     */
    public function getGameDirect($array)
    {
        $games =  json_decode($this->curl([
            "api_password"         => $this->API_PASSWORD,
            "api_login"            => $this->API_LOGIN,
            'method'               => 'getGameDirect',
            'lang'                 => array_key_exists("lang", $array) ? $array['lang'] : 'en',

            'user_username'        => $array['user_username'], //not required for fun mode
            'user_password'        => $array['user_password'], //not required for fun mode

            'gameid'               => $array['game_id'], // you can also use game hash from getGameList to start a game - for example ne#ne-jingle-spin
            'homeurl'              => $array['homeurl'],
            'cashierurl'           => '', //optional
            'play_for_fun'         => $array['play_for_fun'], //to launch sportsbook in demo use method getGameDemo
            'currency'             => $array['currency']
        ]), true);
        return $games;
    }

    /**
     * getGameDemo
     *
     * @param array $params
     * @return void
     */
    public function getGameDemo($array)
    {
        $games =  json_decode($this->curl([
            "api_password"         => $this->API_PASSWORD,
            "api_login"            => $this->API_LOGIN,
            'method'               => 'getGameDemo',
            'lang'                 => array_key_exists("lang", $array) ? $array['lang'] : 'en',
            'gameid'               => $array['game_id'], // you can also use game hash from getGameList to start a game - for example ne#ne-jingle-spin
            'homeurl'              => $array['homeurl'],
            'cashierurl'           => '', //optional
            'play_for_fun'         => $array['play_for_fun'], //to launch sportsbook in demo use method getGameDemo
            'currency'             => $array['currency']
        ]), true);
        return $games['response'];
    }


    /**
     * createPlayer
     *
     * @param array $params
     * @return void
     */
    public function createPlayer($array)
    {
        $games =  json_decode($this->curl([
            "api_password"         => $this->API_PASSWORD,
            "api_login"            => $this->API_LOGIN,
            "method"               => "createPlayer",
            "user_username"        => $array['user_username'], //should be unique - you can use your internal ID for this parameter
            "user_password"        => $array['user_password'],
            "user_nickname"        => $array['user_nickname'], //optional - non unique nickname of a player that is showed in some providers. If not passed user_username is used
            "currency"             => $array['currency']
        ]), true);
        return $games;
    }

    /**
     * getPlayer
     *
     * @param array $params
     * @return void
     */
    public function loginPlayer($array)
    {
        $games =  json_decode($this->curl([
            "api_password"         => $this->API_PASSWORD,
            "api_login"            => $this->API_LOGIN,
            "method"               => "loginPlayer",
            "user_username"        => $array['user_username'], //should be unique - you can use your internal ID for this parameter
            "user_password"        => $array['user_password'],
            "currency"             => $array['currency']
        ]), true);
        return $games;
    }

    /**
     * getPlayer
     *
     * @param array $params
     * @return void
     */
    public function logoutPlayer($array)
    {
        $games =  json_decode($this->curl([
            "api_password"        => $this->API_PASSWORD,
            "api_login"           => $this->API_LOGIN,
            "method"              => "logoutPlayer",
            "user_username"       => $array['user_username'], //should be unique - you can use your internal ID for this parameter
            "user_password"       => $array['user_password'],
            "currency"            => $array['currency']
        ]), true);
        return $games;
    }

    /**
     * cURL function
     */
    function curl($data)
    {
        $ch = curl_init($this->BASE_URL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $html = curl_exec($ch);
        curl_close($ch);
        return $html;
    }
}
