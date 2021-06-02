<?php

declare(strict_types=1);

namespace SlackIO\Listeners;

use SlackIO\Listeners\OpenFormButtonClick;
use SlackPhp\Framework\{Context, Listener};

class HelloGlobalShortcut implements Listener
{
	public function __construct() {
	}

	public function handle(Context $context): void {
		//@todo even kijken hoe je createmodal hierbij reft
		$context->modals()->open($createmodal);
	}
}
//function (Context $ctx) use ($createModal) {
//	$ctx->modals()->open($createModal());