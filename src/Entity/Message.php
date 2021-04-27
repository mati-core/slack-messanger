<?php

declare(strict_types=1);

namespace MatiCore\SlackMessenger;

use Nette\Utils\Json;
use Nette\Utils\JsonException;
use Nette\Utils\Strings;

/**
 * Class Message
 * @package MatiCore\SlackMessenger
 */
class Message
{

	/**
	 * @var string
	 */
	private string $text;

	/**
	 * @var string|null
	 */
	private string|null $title;

	/**
	 * @var array<MessageSection> $sections
	 */
	private array $sections = [];

	/**
	 * Message constructor.
	 * @param string $text
	 */
	public function __construct(string $text)
	{
		$this->text = Strings::normalize($text);
	}

	/**
	 * @param string $title
	 */
	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

	/**
	 * @param MessageSection $messageSection
	 */
	public function addSection(MessageSection $messageSection): void
	{
		$this->sections[] = $messageSection;
	}

	/**
	 * @return string
	 */
	public function buildMessage(): string
	{
		$messageData = [
			'text' => $this->text,
		];

		if ($this->title !== null) {
			$messageData['blocks'][] = [
				"type" => "header",
				"text" => [
					"type" => "plain_text",
					"text" => $this->title,
				],
			];
		}

		foreach ($this->sections as $section) {
			$messageData['blocks'][] = $section->buildSection();
		}

		try {
			$message = Json::encode($messageData);
		} catch (JsonException $e) {
			throw new SlackMessengerException($e->getMessage(), $e->getCode(), $e);
		}

		return $message;
	}

}