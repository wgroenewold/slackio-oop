<?php

declare(strict_types=1);

namespace SlackIO\Listeners;

use SlackPhp\Framework\{Context, Listener};

class FormSubmission implements Listener
{
	public function __construct() {
	}

	public function handle(Context $context): void {
		$state = $context->payload()->getState();
		$greeting = $state->get('greeting-block.greeting.selected_option.value');
		$context->view()->update(":wave: {$greeting} world!");
	}
}
//function (Context $ctx) {
//	$state = $ctx->payload()->getState();
//	$greeting = $state->get('greeting-block.greeting.selected_option.value');
//	$ctx->view()->update(":wave: {$greeting} world!");
//}