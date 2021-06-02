<?php

declare(strict_types=1);

namespace SlackIO\Listeners;

use SlackPhp\BlockKit\Surfaces\{Modal};
use SlackPhp\Framework\{Context, Listener};

class OpenFormButtonClick implements Listener
{
	public function __construct() {
	}

	public function handle(Context $context): void {
		$context->modals()->open($this->createModal());
	}

	public function createModal(): Modal{
		return Modal::new()
		            ->title('Choose a Greeting')
		            ->submit('Submit')
		            ->callbackId('hello-form')
		            ->notifyOnClose(true)
		            ->tap(function (Modal $modal) {
			            $modal->newInput('greeting-block')
			                  ->label('Which Greeting?')
			                  ->newSelectMenu('greeting')
			                  ->forExternalOptions()
			                  ->placeholder('Choose a greeting...');
		            });
	}
}

//$createModal = function (): Modal {
//	return Modal::new()
//	            ->title('Choose a Greeting')
//	            ->submit('Submit')
//	            ->callbackId('hello-form')
//	            ->notifyOnClose(true)
//	            ->tap(function (Modal $modal) {
//		            $modal->newInput('greeting-block')
//		                  ->label('Which Greeting?')
//		                  ->newSelectMenu('greeting')
//		                  ->forExternalOptions()
//		                  ->placeholder('Choose a greeting...');
//	            });
//};

//function (Context $ctx) use ($createModal) {
//	$ctx->modals()->open($createModal());
//})