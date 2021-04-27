<?php

declare(strict_types=1);

namespace MatiCore\SlackMessenger;

/**
 * Class MarkdownSection
 * @package MatiCore\SlackMessenger
 */
class MarkdownSection implements MessageSection
{

	/**
	 * @var string
	 */
	private string $content;

	/**
	 * MarkdownSection constructor.
	 * @param string $content
	 */
	public function __construct(string $content)
	{
		$this->content = $content;
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
				"text" => $this->content,
			],
		];
	}

}