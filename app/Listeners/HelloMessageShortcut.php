<?php

declare(strict_types=1);

namespace SlackIO\Listeners;

use SlackPhp\Framework\{Context, Listener};

class HelloMessageShortcut implements Listener
{
	public function __construct() {
	}

	public function handle(Context $context): void {
		$user = $context->fmt()->user($context->payload()->get('message.user'));
		$context->say(":wave: Hello {$user}!", null, $context->payload()->get('message.ts'));
	}
}

//function (Context $ctx) {
//$user = $ctx->fmt()->user($ctx->payload()->get('message.user'));
//$ctx->say(":wave: Hello {$user}!", null, $ctx->payload()->get('message.ts'));