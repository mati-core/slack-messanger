<?php

declare(strict_types=1);

namespace MatiCore\SlackMessenger;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Nette\Utils\Json;
use Nette\Utils\JsonException;

/**
 * Class SlackMessenger
 * @package MatiCore\SlackMessenger
 */
class SlackMessenger
{

	/**
	 * @var array<string>
	 */
	private $config;

	/**
	 * SlackMessenger constructor.
	 * @param string[] $config
	 */
	public function __construct(array $config)
	{
		$this->config = $config;
	}

	/**
	 * @param Message $message
	 * @throws SlackMessengerException
	 */
	public function sendMessage(Message $message): void
	{
		if (!isset($this->config['hook']) || (string) $this->config['hook'] === '') {
			throw new SlackMessengerException('Slack webhook url not set! Follow configuration in readme!');
		}

		try {
			$client = new Client();
			$response = $client->request('POST', $this->config['hook'], [
				'body' => $message->buildMessage(),
			]);
		} catch (GuzzleException $e) {
			throw new SlackMessengerException($e->getMessage(), $e->getCode(), $e);
		}

		if ($response->getStatusCode() !== 200 || $response->getBody()->read(2) !== 'ok') {
			throw new SlackMessengerException('Sending message error. Status code: ' . $response->getStatusCode());
		}
	}

}