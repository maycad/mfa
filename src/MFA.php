<?php
namespace MayCad\MFA;

/**
 * 
 */
class MFA extends WebService
{
	public function __construct(array $data = array())
	{
		parent::__construct($data);
	}

	public function operations()
	{
		$req = $this->getClient()->post('operations/create', [
                'form_params' => $this->getData(),
        ]);

        return json_decode($req->getBody());
	}

	public function histories()
	{
		$req = $this->getClient()->post('histories/create', [
                'form_params' => $this->getData(),
        ]);

        return json_decode($req->getBody());
	}

	public function register()
	{
		$req = $this->getClient()->post('users/create', [
            'form_params' => $this->getData(),
        ]);

        return json_decode($req->getBody());
	}

	public function process()
	{
		if (! is_null($this->getData())) {
			switch (count($this->getData())) {
				case 2:
				case 3:

					return $this->histories();

					break;

				case 4:
					
					return $this->operations();

					break;
				
				default:
					throw new \Exception("Error Processing Request", 1);
					break;
			}
		}
	}
}