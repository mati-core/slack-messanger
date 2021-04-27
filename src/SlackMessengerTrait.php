<?php

declare(strict_types=1);

namespace MatiCore\SlackMessenger;

/**
 * Trait SlackMessengerTrait
 * @package MatiCore\SlackMessenger
 */
trait SlackMessengerTrait
{

	/**
	 * @var SlackMessenger
	 * @inject
	 */
	public SlackMessenger $slackMessenger;

}