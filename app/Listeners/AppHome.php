<?php

declare(strict_types=1);

namespace SlackIO\Listeners;

use SlackPhp\Framework\{Context, Listener};

class AppHome implements Listener
{
	public function __construct() {
	}

	public function handle(Context $context): void {
		$user = $context->fmt()->user($context->payload()->get('event.user'));
		$context->home(":wave: Hello {$user}!");
	}
}

//$user = $ctx->fmt()->user($ctx->payload()->get('event.user'));
//$ctx->home(":wave: Hello {$user}!");