<?php
namespace MayCad\MFA;

use GuzzleHttp\Client;

/**
 * 
 */
abstract class WebService implements MFAService
{
	private $client;
    private $data = array();

	const BASE_URI = 'http://localhost/maycad/webservices/mfa/public/';

    public function __construct(array $data = array())
    {
    	$this->setClient([
            'base_uri' => $this->getBaseUri(),
        ]);

        $this->setData($data);
    }

    public function setClient(array $data = array())
    {
    	$this->client = new Client($data);
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getBaseUri()
    {
    	return self::BASE_URI;
    }

    public function setData(array $data = array())
    {
        if (is_array($data) && (count($data) >= 4)) {
            $this->data = $data;
        } else {
            throw new \Exception("Error Processing Request", 1);
        }

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }
}