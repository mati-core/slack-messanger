<?php

declare(strict_types=1);

namespace MatiCore\SlackMessenger;

/**
 * Class ActionSection
 * @package MatiCore\SlackMessenger
 */
class ActionSection implements MessageSection
{

	/**
	 * @var array
	 */
	private array $actions = [];

	/**
	 * @param string $label
	 * @param string $value
	 * @param string|null $url
	 * @return $this
	 */
	public function addButton(string $label, string $value, string $url = null): self
	{
		$button = [
			'type' => 'button',
			'text' =>
				[
					'type' => 'plain_text',
					'text' => $label,
					'emoji' => true,
				],
			'value' => $value,
		];

		if ($url !== null) {
			$button['url'] = $url;
		}

		$this->actions[] = $button;

		return $this;
	}

	/**
	 * @return array
	 */
	public function buildSection(): array
	{
		$sectionData = [
			'type' => 'actions',
		];

		foreach ($this->actions as $action) {
			$sectionData['elements'][] = $action;
		}

		return $sectionData;
	}

}