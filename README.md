# ModelServiceProvider
Model Service Provider for Silex

## Requirements
silex 1.x

## Installation
The best way to install ModelServiceProvider is to use a [Composer](https://getcomposer.org/download):

    php composer.phar require junker/model-service-provider

## Examples

```php
use Junker\Silex\Provider\ModelServiceProvider;

#args: ($path, $namespace = NULL)

$app->register(new ModelServiceProvider(__DIR__ . '/lib/Model'));
# or
$app->register(new ModelServiceProvider(__DIR__ . '/lib/Acme/Model', 'Acme\Model')); 

echo $app['UserModel']->getHello();

```


Model example: 

```php
#/lib/Acme/Model/UserModel.php
namespace Acme\Model;

use Junker\Silex\Model;

class UserModel extends Model
{

	public function getHello()
	{
		$app = $this->app;
		$db = $app['db'];

		return 'hello';
	}
	
}
```

