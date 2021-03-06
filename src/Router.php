<?php 
namespace App;

use \AltoRouter;

class Router
{
	/**
	 * @var string
	 */
	private $controllerPath;
	private $rootPath;
	/**
	 * @var AltoRouter
	 */
	private $router;

	public function __construct(string $controllerPath, string $rootPath)
	{
		$this->controllerPath = $controllerPath;
		$this->rootPath = $rootPath;
		$this->router = new AltoRouter();
		$this->router->addMatchTypes(array('ym' => '([0-9]{4}-[0-9]{1,2})'));
		$this->router->addMatchTypes(array('date' => '([0-9]{4}-[0-9]{2}-[0-9]{2})'));
	}

	public function url(string $name, array $params = [])
	{
		return $this->router->generate($name, $params);
	}

	public function get($url, string $view, ?string $name = null):self
	{
		$this->router->map('GET', $url, $view, $name);

		return $this;
	}

	public function post($url, string $view, ?string $name = null):self
	{
		$this->router->map('POST', $url, $view, $name);

		return $this;
	}

	public function match($url, string $view, ?string $name = null):self
	{
		$this->router->map('POST|GET', $url, $view, $name);

		return $this;
	}

	public function run():self
	{
		$match = $this->router->match();
		$view = $match['target'];
		$params = $match['params'];
		$router = $this;

		$loader = new \Twig\Loader\FilesystemLoader($this->rootPath .'/views');
		$twig = new \Twig\Environment($loader, [
			'debug' => true,
			'cache' => false // $this->rootPath .'/tmp',
		]);
		$twig->addExtension(new \Twig\Extension\DebugExtension());

		require $this->controllerPath . DIRECTORY_SEPARATOR . $view .'.php';

		return $this;
	}
}
