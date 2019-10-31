<?php
namespace MayCad\MFA;

use GuzzleHttp\Client;

/**
 * 
 */
abstract class WebService implements MFAService
{
	private $_client;
    private $_credentials = array();
    private $_params = array();

	const BASE_URI = 'http://localhost/maycad/webservices/mfa/public/';

    public function __construct(array $credentials = array())
    {
        $this->setCredentials($credentials);

        $this->setClient([
            'base_uri' => $this->getBaseUri(),
            'headers' => $this->getCredentials(),
        ]);
    }

    public function setCredentials(array $credentials = array())
    {
        if (is_array($credentials)) {
            $this->_credentials = $credentials;
        } else {
            throw new \Exception("Error Processing Request", 1);
        }

        return $this;
    }

    public function getCredentials()
    {
        return $this->_credentials;
    }

    public function setParams(array $params = array())
    {
        if (is_array($params)) {
            $this->_params = $params;
        } else {
            throw new \Exception("Error Processing Request", 1);
        }

        return $this;
    }

    public function getParams()
    {
        return $this->_params;
    }

    public function setClient(array $config = array())
    {
    	$this->_client = new Client($config);
    }

    public function getClient()
    {
        return $this->_client;
    }

    public function getBaseUri()
    {
    	return self::BASE_URI;
    }

    private function getData(array $params = array())
    {
        return array_merge($params, $this->getParams());
    }

    /**/
    public function transfer(array $params = array())
    {
        $req = $this->getClient()->post('operations/transfer', [
                'form_params' => $this->getData($params),
        ]);

        return json_decode($req->getBody());
    }

    public function deposit(array $params = array())
    {
        $req = $this->getClient()->post('operations/deposit', [
                'form_params' => $this->getData($params),
        ]);

        return json_decode($req->getBody());
    }

    public function withdrawal(array $params = array())
    {
        $req = $this->getClient()->post('operations/withdrawal', [
                'form_params' => $this->getData($params),
        ]);

        return json_decode($req->getBody());
    }

    public function confirm(array $params = array())
    {
        $req = $this->getClient()->post('operations/confirm', [
                'form_params' => $this->getData($params),
        ]);

        return json_decode($req->getBody());
    }

    public function register(array $params = array())
    {
        $req = $this->getClient()->post('users/register', [
            'form_params' => $this->getData($params),
        ]);

        return json_decode($req->getBody());
    }

    public function login(array $params = array())
    {
        $req = $this->getClient()->post('users/login', [
            'form_params' => $this->getData($params),
        ]);

        return json_decode($req->getBody());
    }

    public function histories(array $params = array())
    {
        $req = $this->getClient()->post('histories/charge', [
                'form_params' => $this->getData($params),
        ]);

        return json_decode($req->getBody());
    }
}