<?php

declare(strict_types=1);

namespace MatiCore\SlackMessenger;


/**
 * Class LinkSection
 * @package MatiCore\SlackMessenger
 */
class LinkSection implements MessageSection
{

	/**
	 * @var string
	 */
	private string $link;

	/**
	 * @var string
	 */
	private string $name;

	/**
	 * LinkSection constructor.
	 * @param string $link
	 * @param string $name
	 */
	public function __construct(string $link, string $name)
	{
		$this->link = $link;
		$this->name = $name;
	}

	/**
	 * @return array
	 */
	public function buildSection(): array
	{
		return [
			"type" => "section",
			"text" => [
				"type" => "mrkdwn",
				"text" => '<' . $this->link . '|' . $this->name . '>',
			],
		];
	}

}