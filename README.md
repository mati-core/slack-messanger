# Mati-Core  | Slack Messenger

[![Latest Stable Version](https://poser.pugx.org/mati-core/slack-messenger/v)](//packagist.org/packages/mati-core/slack-messenger)
[![Total Downloads](https://poser.pugx.org/mati-core/slack-messenger/downloads)](//packagist.org/packages/mati-core/slack-messenger)
![Integrity check](https://github.com/mati-core/slack-messenger/workflows/Integrity%20check/badge.svg)
[![Latest Unstable Version](https://poser.pugx.org/mati-core/slack-messenger/v/unstable)](//packagist.org/packages/mati-core/slack-messenger)
[![License](https://poser.pugx.org/mati-core/slack-messenger/license)](//packagist.org/packages/mati-core/slack-messenger)

Install
-------

Comoposer command:
```bash
composer require mati-core/slack-messenger
```

Configuration
-------------

Slack webhook documentations:
https://api.slack.com/messaging/webhooks

1) Create your own Slack APP

https://api.slack.com/apps?new_app=1

2) Create webhook

On Slack APP dashboard find "Incoming Webhooks" in left menu and create webhook.

3) Copy webhook url in to your project common.neon

```neon
parameters:
	slack:
		hook: YOUR_WEB_HOOK_HERE
```

Web hook link example: 

```text
https://hooks.slack.com/services/abcd1235456/abcd1235456/abcd1235456abcd1235456
```

Sending messages
----------------

Include SlackMessenger service into your presenter

```php
use \MatiCore\SlackMessenger\SlackMessengerTrait

final class *Presenter extends BasePresenter
{
    use SlackMessengerTrait; 
}
```

_All object are from namespace_
```text
\MatiCore\SlackMessenger
```

Simple formated message example
```php
try{
    //Main message object with simple text (primary show on notification banner)
    $message = new Message('Hello World!');
    
    //You can set message title
    $message->setTitle(':star: Hello World!'); 
    
    // Add markdown section with formated text
    $message->addSection(new MarkdownSection(
        'This is my *FIRST* message from website!'
    ));
    
    // Add divider
    $message->addSection(new Divider());
    
    // Add link
    $message->addSection(new MarkdownSection('Odesláno z kontaktního formuláře na app-universe.cz | '. date('d.m.Y H:i:s')));
    
    // send message
    $this->slackMessenger->sendMessage($message);
}catch (\MatiCore\SlackMessenger\SlackMessengerException $e){
    // Send message error
}
```


**Section list**

|Type                       |Object name          |
|---------------------------|---------------------|
|Markdown text              |MarkdownSection      |
|Link                       |LinkSection          |
|Link button                |LinkBtnSection       |
|Image                      |ImageSection         |
|Action (action buttons)    |ActionSection        |
|Divider                    |Divider              |

You can add custom section just implement MessageSection interface.

**Slack message builder**:

https://app.slack.com/block-kit-builder/

