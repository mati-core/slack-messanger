<?php

declare(strict_types=1);

namespace MatiCore\SlackMessenger;

/**
 * Class ImageSection
 * @package MatiCore\SlackMessenger
 */
class ImageSection implements MessageSection
{

	/**
	 * @var string
	 */
	private string $description;

	/**
	 * @var string
	 */
	private string $imageUrl;

	/**
	 * @var string
	 */
	private string $altText;

	/**
	 * ImageSection constructor.
	 * @param string $description
	 * @param string $imageUrl
	 * @param string $altText
	 */
	public function __construct(string $description, string $imageUrl, string $altText)
	{
		$this->description = $description;
		$this->imageUrl = $imageUrl;
		$this->altText = $altText;
	}

	/**
	 * @return array
	 */
	public function buildSection(): array
	{
		return [
			'type' => 'section',
			'text' => [
				'type' => 'mrkdwn',
				'text' => $this->description,
			],
			'accessory' => [
				'type' => 'image',
				'image_url' => $this->imageUrl,
				'alt_text' => $this->altText,
			],
		];
	}

}