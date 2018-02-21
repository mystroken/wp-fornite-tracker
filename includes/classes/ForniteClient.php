<?php
namespace FL\Fornite;

use GuzzleHttp\Exception\RequestException;

/**
 * Class ForniteClient
 *
 * @package FL\Fornite
 * @author Mystro Ken <mystorken@gmail.com>
 */
class ForniteClient {

	/**
	 * @var string
	 */
	const API_URL = 'https://api.fortnitetracker.com/v1/profile';

	/**
	 * @var \GuzzleHttp\Client $client
	 */
	private $client;


	/**
	 * ForniteClient constructor.
	 *
	 * @param $apiKey
	 */
	public function __construct($apiKey) {
		$this->client = new \GuzzleHttp\Client(
			[ 'headers' => [ 'TRN-Api-Key'=> $apiKey ] ]
		);
	}


	/**
	 * @param $nickname
	 * @param $platform
	 *
	 * @return array|mixed|object
	 */
	public function retrieveStats($nickname, $platform) {
		try {

			$url = self::API_URL . '/' . $platform . '/' . $nickname;
			$response = $this->client->request('GET', $url);
			return json_decode($response->getBody()->getContents());

		} catch (RequestException $e) { return $this->exceptionHandling($e); }
	}

	/**
	 * Handle Request Exceptions
	 *
	 * @param RequestException $e
	 * @return array|mixed|object
	 */
	public function exceptionHandling(RequestException $e) {
		return json_decode($e->getResponse()->getBody()->getContents());
	}
}
