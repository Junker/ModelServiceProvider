<?php

namespace Junker\Silex\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ModelServiceProvider implements ServiceProviderInterface
{
	protected $path;
	protected $namespace;

	public function __construct($path, $namespace = NULL)
	{
		$this->path = $path;
		$this->namespace = $namespace;
	}

    public function register(Container $app)
    {
    	$path = $this->path;

    	if (!is_dir($path))
    	{
    		throw new \InvalidArgumentException(sprintf('Path "%s" is not valid.', $path));
    	}

        foreach (glob($path . '/*.php', GLOB_NOSORT) as $filename)
        {
        	$model_name = pathinfo($filename, PATHINFO_FILENAME);


            $class_name = $this->namespace ? ($this->namespace . "\\" . $model_name) : ("\\".$model_name);

            if (!class_exists($class_name))
                require_once $filename;


        	$app[$model_name] = function($app) use ($class_name) {
	            return new $class_name($app);
	        };
	    }
    }
}
