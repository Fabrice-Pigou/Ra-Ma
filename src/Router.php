<?php 
namespace App;

use \AltoRouter;
use App\Lib\Text;
use App\Lib\TwigFunctions;

class Router
{
    /**
     * @var string $controllerPath
     * @var string $rootPath
     * @var object $router
     * @var object $oTwig
     */
    private string $controllerPath;
    private string $rootPath;
    private object $router;
    private object $oTwig;

    public function __construct(string $controllerPath, string $rootPath)
    {
        $this->controllerPath = $controllerPath;
        $this->rootPath = $rootPath;
        $this->router = new AltoRouter();
        //  Ajouter des nouveaux MatchType à AltoRouter
        // $this->router->addMatchTypes(array('ym' => '([0-9]{4}-[0-9]{1,2})'));            //  Format de la date yyyy-mm
        // $this->router->addMatchTypes(array('ymd' => '([0-9]{4}-[0-9]{2}-[0-9]{2})'));    //  Format de la date yyyy-mm-dd
        $this->router->addMatchTypes(array('slug' => '([a-z\-]++)'));

        $this->oTwig = new TwigFunctions;
    }

    /**
     * @param string $name
     * @param array $params
     * 
     * @return object
     */
    public function url(string $name, array $params = []): object
    {
        return $this->router->generate($name, $params);
    }

    public function get($url, string $view, ?string $name = null): self
    {
        $this->router->map('GET', $url, $view, $name);

        return $this;
    }

    public function post($url, string $view, ?string $name = null): self
    {
        $this->router->map('POST', $url, $view, $name);

        return $this;
    }

    public function match($url, string $view, ?string $name = null): self
    {
        $this->router->map('POST|GET', $url, $view, $name);

        return $this;
    }

    public function run(): self
    {
        $match = $this->router->match();
        $view = $match['target'];
        $params = $match['params'];
		$router = $this;

        $loader = new \Twig\Loader\FilesystemLoader($this->rootPath .'/views');

        $twig = new \Twig\Environment($loader, [
            'debug' => true,
            // 'cache' => $this->rootPath .'/tmp'
            'cache' => false
        ]);

        $navLink = new \Twig\TwigFunction('NavLink', function (string $link, string $title, ? int $login = null, int $rank = 0) {
            return $this->oTwig->GetNavLink($link, $title, $login, $rank);
        });
        $twig->addFunction($navLink);

        //  Permet d'utiliser le "dump()" de twig
        $twig->addExtension(new \Twig\Extension\DebugExtension());

        require $this->controllerPath . DIRECTORY_SEPARATOR . $view .'.php';

        return $this;
    }
}
