<?php


namespace MatiCore\SlackMessenger;


/**
 * Class LinkBtn
 * @package MatiCore\SlackMessenger
 */
class LinkBtnSection implements MessageSection
{

	/**
	 * @var string
	 */
	private string $text;

	/**
	 * @var string
	 */
	private string $label;

	/**
	 * @var string
	 */
	private string $value;

	/**
	 * @var string|null
	 */
	private string|null $url;

	/**
	 * @var string|null
	 */
	private string|null $actionId;

	/**
	 * LinkBtnSection constructor.
	 * @param string $text
	 * @param string $label
	 * @param string $value
	 * @param string|null $url
	 */
	public function __construct(string $text, string $label, string $value, ?string $url)
	{
		$this->text = $text;
		$this->label = $label;
		$this->value = $value;
		$this->url = $url;
	}

	/**
	 * @param string|null $url
	 * @return $this
	 */
	public function setUrl(?string $url): self
	{
		$this->url = $url;

		return $this;
	}

	/**
	 * @param string|null $actionId
	 * @return $this
	 */
	public function setActionId(?string $actionId): self
	{
		$this->actionId = $actionId;

		return $this;
	}

	/**
	 * @return array
	 */
	public function buildSection(): array
	{
		$button = [
			'type' => 'section',
			'text' => [
				'type' => 'mrkdwn',
				'text' => $this->text,
			],
			'accessory' => [
				'type' => 'button',
				'text' => [
					'type' => 'plain_text',
					'text' => $this->label,
					'emoji' => true,
				],
			],
		];

		if ($this->url !== null) {
			$button['accessory']['url'] = $this->url;
		}

		if ($this->actionId !== null) {
			$button['accessory']['action_id'] = $this->actionId;
		}

		return $button;
	}

}