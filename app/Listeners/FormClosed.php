<?php

declare(strict_types=1);

namespace SlackIO\Listeners;

use SlackPhp\Framework\{Context, Listener};

class FormClosed implements Listener
{
	public function __construct() {
	}

	public function handle(Context $context): void {
		$context->logger()->notice('User closed hello-form modal early.');
	}
}

//function (Context $ctx) {
//$ctx->logger()->notice('User closed hello-form modal early.');