<?php

declare(strict_types=1);

namespace MatiCore\SlackMessenger;

/**
 * Interface MessageSection
 * @package MatiCore\SlackMessenger
 */
interface MessageSection
{

	/**
	 * @return array
	 */
	public function buildSection(): array;
	
}