<?php

namespace Tjoosten\Github\Issues\Utils;

use Github\Client;

/**
 * Class Github
 *
 * @package Tjoosten\Github\Issues\Utils
 */
class Github
{
    /**
     * The GitHub API wrapper.
     *
     * @var Client
     */
    private $github;

    /**
     * Github constructor.
     *
     * @param  Client $github
     * @return Int|Void|Null
     */
    public function __construct()
    {
        $this->github = new Client();
    }

    /**
     * Authencate the given user against the github api.
     *
     * @param  string $username
     * @param  string $password
     * @param  string $method
     * @return $this
     */
    public function authencate($username, $password, $method)
    {
        switch ($method) {
            case "auth_url_token":
                $conMethod = Client::AUTH_URL_TOKEN;
                break;
            case "auth_url_client_id":
                $conMethod = Client::AUTH_URL_CLIENT_ID;
                break;
            case "auth_http_token":
                $conMethod = Client::AUTH_HTTP_TOKEN;
                break;
            case "auth_http_password":
                $conMethod = Client::AUTH_HTTP_PASSWORD;
                break;
            case "auth_jwt":
                $conMethod = Client::AUTH_JWT;
                break;
            default:
                $conMethod = Client::AUTH_HTTP_TOKEN;
        }

        $this->github->authenticate($username, $password, $conMethod);
        return $this;
    }

    /**
     * Get all the open issues for a given user.
     *
     * @param  string $creator
     * @param  string $repo
     * @return mixed  \Github\Client
     */
    public function getIssues($creator, $repo)
    {
        return $this->github->api('issue')->all($creator, $repo, ['state' => 'open']);
    }
}