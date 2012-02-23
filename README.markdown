PHP-ActiveRecord Provider
==========================

PHP-ActiveRecord Provider provides easy integration with [PHP-ActiveRecord](https://github.com/kla/php-activerecord) for easy database access.

Parameters
----------

* *ar.class_path* - Path to where PHP-ActiveRecord `lib` folder is located ( without trailing slash )
* *ar.connections* - Array of connections (`name => connection`). Connections examples:
    * `mysql://username:password@localhost/database_name`
    * `pgsql://username:password@localhost/development`
    * `sqlite://my_database.db`
    * `oci://username:passsword@localhost/xe`
* *ar.default_connection* - default models connection.

Registering
-----------
    use ActiveRecordProvider\Silex\Provider\ActiveRecordProvider;

    $app['autoloader']->registerNamespace('Models', __DIR__);
    $app->register(new ActiveRecordProvider(),
    	array(
    		'ar.lib_path'	=> __DIR__.'/vendor/php-activerecord',
    		'ar.default_connection' => 'development',
    		'ar.connections' => array(
    			'development' => 'mysql://username:password@localhost/database_name'
    		)
    	)
    );

Usage
-----

Create your models in `Models` directory. Eg.

    //User.php
    namespace Models;
    class User extends \ActiveRecord\Model {
    
    }

In your application

    use Models\User;

Now you can use `User` model. 

More informations about PHP-ActiveRecord functionality [PHP-ActiveRecord Wiki](http://www.phpactiverecord.org/projects/main/wiki).
