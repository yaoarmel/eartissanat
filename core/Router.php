<?php

namespace Core;

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    // Enregistre une route GET
    public function get(string $path, $handler): void
    {
        $this->addRoute('GET', $path, $handler);
    }

    // Enregistre une route POST
    public function post(string $path, $handler): void
    {
        $this->addRoute('POST', $path, $handler);
    }

    // Méthode centrale pour ajouter une route
    private function addRoute(string $method, string $path, $handler): void
    {
        $this->routes[$method][] = [
            'path' => $this->compilePath($path),
            'original' => $path,
            'handler' => $handler,
        ];
    }

    // Transforme /users/{id} en regex → #^/users/(?P<id>[^/]+)$#
    private function compilePath(string $path): string
    {
        $pattern = preg_replace('#\{(\w+)\}#', '(?P<$1>[^/]+)', $path);
        return "#^" . $pattern . "$#";
    }

    // Résout un handler de type string (Controller@method)
    private function resolveHandler($handler)
    {
        if (is_callable($handler)) {
            return $handler;
        }

        if (is_string($handler)) {
            [$controller, $method] = explode('@', $handler);
            $controllerClass = "App\\Controllers\\{$controller}";
            if (class_exists($controllerClass)) {
                return [new $controllerClass(), $method];
            }
        }

        throw new \RuntimeException('Invalid route handler');
    }

    // Exécution du routeur
    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        // Nettoyage de l'URI (enlève la query string)
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rtrim($uri, '/') ?: '/';

        foreach ($this->routes[$method] ?? [] as $route) {
            if (preg_match($route['path'], $uri, $matches)) {
                // Extraire les variables nommées
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                // Résoudre et exécuter le handler
                $handler = $this->resolveHandler($route['handler']);
                call_user_func($handler, $params);
                return;
            }
        }

        // Aucune route trouvée
        http_response_code(404);
        echo "404 - Page non trouvée";
    }
}