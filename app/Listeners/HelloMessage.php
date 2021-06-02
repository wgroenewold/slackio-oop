<?php

declare(strict_types=1);

namespace SlackIO\Listeners;

use SlackPhp\Framework\{Context, Listener};

class HelloMessage implements Listener
{
	public function __construct() {
	}

	public function handle(Context $context): void {
		$user = $context->fmt()->user($context->payload()->get('event.user'));
		$context->say(":wave: Hello {$user}!");
	}
}

//function (Context $ctx) {
//	$user = $ctx->fmt()->user($ctx->payload()->get('event.user'));
//	$ctx->say(":wave: Hello {$user}!");
//})