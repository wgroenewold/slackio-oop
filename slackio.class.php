<?php

declare(strict_types=1);

namespace SlackIO;
use SlackPhp\Framework\{BaseApp, Route, Router};
use SlackIO\Listeners;

use Dotenv\Dotenv;

require '../vendor/autoload.php';
require 'app/Listeners/HelloCommand.php';
require 'app/Listeners/OpenFormButtonClick.php';
require 'app/Listeners/GreetingOptions.php';
require 'app/Listeners/FormSubmission.php';
require 'app/Listeners/FormClosed.php';
require 'app/Listeners/HelloGlobalShortcut.php';
require 'app/Listeners/HelloMessageShortcut.php';
require 'app/Listeners/AppHome.php';
require 'app/Listeners/HelloMessage.php';


$dotenv = Dotenv::createUnsafeImmutable( realpath( dirname( __FILE__ ) . '/../' ) );
$dotenv->load();

setlocale( LC_ALL, 'nl_NL' );

class slackio extends BaseApp
{
	protected function prepareRouter( Router $router ): void {
		$router->command('hello', Listeners\HelloCommand::class)
		       ->blockAction('open-form', Listeners\OpenFormButtonClick::class)
		       ->blockSuggestion('greeting', Listeners\GreetingOptions::class)
		       ->viewSubmission('hello-form', Listeners\FormSubmission::class)
		       ->viewClosed('hello-form', Listeners\FormClosed::class)
		       ->globalShortcut('hello-global', Listeners\HelloGlobalShortcut::class)
		       ->messageShortcut('hello-message', Listeners\HelloMessageShortcut::class)
		       ->event('app_home_opened', Listeners\AppHome::class)
		       ->event('message', Route::filter(
			       ['event.channel_type' => 'channel', 'event.text' => 'regex:/^.*hello.*$/i'],
			       Listeners\HelloMessage::class
		       ));
	}
}