<?php

declare(strict_types=1);

namespace SlackIO\Listeners;

use SlackPhp\BlockKit\Surfaces\Message;
use SlackPhp\Framework\{Coerce, Context, Listener};

class HelloCommand implements Listener
{
	public function __construct() {

	}

	public function handle(Context $context): void {
		$context->ack(Message::new()->tap(function (Message $msg) {
			$msg->newSection()
			->mrkdwnText(':wave: Hello world!')
			->newButtonAccessory('open-form')
			->text('Choose a Greeting');
		}));
	}
}

//function (Message $msg) {
//	$msg->newSection()
//	    ->mrkdwnText(':wave: Hello world!')
//	    ->newButtonAccessory('open-form')
//	    ->text('Choose a Greeting');
//}));