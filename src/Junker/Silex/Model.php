<?php
namespace Junker\Silex;

use Silex\Application;

abstract class Model
{
	protected $app;

	public function __construct(Application $app)
	{
		$this->app = $app;
	}
}
