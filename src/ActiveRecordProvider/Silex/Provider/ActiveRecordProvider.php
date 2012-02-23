<?php

namespace ActiveRecordProvider\Silex\Provider;

use Silex\ServiceProviderInterface;
use Silex\Application;

class ActiveRecordProvider implements ServiceProviderInterface {

	public function register(Application $app) {
		require_once($app['ar.lib_path'].'/ActiveRecord.php');
		$app['autoloader']->registerNamespace('ActiveRecord', $app['ar.lib_path'].'/lib');

		\ActiveRecord\Config::initialize(function($cfg) use ($app) {
			/** @var $cfg \ActiveRecord\Config */
			$cfg->set_connections($app['ar.connections']);
			$cfg->set_default_connection($app['ar.default_connection']);

			$cfg->set_model_directory($app['ar.model_directory']);
		});
	}

}
