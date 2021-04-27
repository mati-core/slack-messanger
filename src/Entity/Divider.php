<?php

declare(strict_types=1);

namespace MatiCore\SlackMessenger;

/**
 * Class Divider
 * @package MatiCore\SlackMessenger
 */
class Divider implements MessageSection
{

	/**
	 * @return string[]
	 */
	public function buildSection(): array
	{
		return [
			'type' => 'divider',
		];
	}

}