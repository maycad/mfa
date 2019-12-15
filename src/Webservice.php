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

	const BASE_URI = 'https://apis.maycad.net/mfa/v1/public/';

    public function __construct(array $credentials)
    {
        $this->setCredentials($credentials);

        $this->setClient([
            'base_uri' => $this->getBaseUri(),
            'headers' => $this->getCredentials(),
        ]);
    }

    public function setCredentials(array $credentials)
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

    public function setClient(array $config)
    {
    	$this->_client = new Client($config);

        return $this;
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

    public function balance(array $params = array())
    {
        $req = $this->getClient()->post('operations/balance', [
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

    public function transactions(array $params = array())
    {
        $req = $this->getClient()->post('transactions/charge', [
            'form_params' => $this->getData($params),
        ]);

        return json_decode($req->getBody());
    }

    public function contact(array $params = array())
    {
        $req = $this->getClient()->post('contacts/store', [
            'form_params' => $this->getData($params),
        ]);

        return json_decode($req->getBody());
    }

    public function newsletter(array $params = array())
    {
        $req = $this->getClient()->post('newsletters/store', [
            'form_params' => $this->getData($params),
        ]);

        return json_decode($req->getBody());
    }
}