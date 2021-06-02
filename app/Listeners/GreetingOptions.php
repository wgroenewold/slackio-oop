<?php

declare(strict_types=1);

namespace SlackIO\Listeners;

use SlackPhp\Framework\{Context, Listener};

class GreetingOptions implements Listener
{
	public function __construct() {
	}

	public function handle(Context $context): void {
		$context->options(['Hello', 'Howdy', 'Good Morning', 'Hey']);
	}
}
//function (Context $ctx) {
//	$ctx->options(['Hello', 'Howdy', 'Good Morning', 'Hey']);
