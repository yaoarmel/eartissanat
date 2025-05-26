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
        try {
            $method = $_SERVER['REQUEST_METHOD'];
            $uri = $_SERVER['REQUEST_URI'];

            // Nettoyage de l'URI (enlève la query string)
            if (false !== $pos = strpos($uri, '?')) {
                $uri = substr($uri, 0, $pos);
            }
            $uri = rtrim($uri, '/') ?: '/';

            // Vérifier les ressources statiques
            if (preg_match('/\.(css|js|png|jpg|jpeg|gif|ico|svg|woff|woff2|ttf|eot)$/', $uri)) {
                $file = BASE_PATH . '/public' . $uri;
                if (file_exists($file)) {
                    $this->serveStaticFile($file);
                    exit;
                }
            }

            foreach ($this->routes[$method] ?? [] as $route) {
                if (preg_match($route['path'], $uri, $matches)) {
                    // Extraire les variables nommées
                    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                    
                    // Résoudre et exécuter le handler
                    $handler = $this->resolveHandler($route['handler']);
                    call_user_func($handler, $params);
                    exit;
                }
            }

            // Aucune route trouvée - 404
            if (!headers_sent()) {
                http_response_code(404);
            }
            \App\Core\View::render('errors/404', [
                'title' => 'Page non trouvée - E-Artisanat'
            ]);
            exit;

        } catch (\Exception $e) {
            // Log l'erreur
            error_log($e->getMessage());
            
            // Définir le code d'erreur 500 si possible
            if (!headers_sent()) {
                http_response_code(500);
            }
            
            // Afficher la page d'erreur 500
            \App\Core\View::render('errors/500', [
                'title' => 'Erreur serveur - E-Artisanat',
                'error' => $e->getMessage()
            ]);
            exit;
        }
    }

    // Sert un fichier statique avec le bon type MIME
    private function serveStaticFile(string $file): void
    {
        $mime_types = [
            'css' => 'text/css',
            'js' => 'application/javascript',
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'ico' => 'image/x-icon',
            'svg' => 'image/svg+xml',
            'woff' => 'font/woff',
            'woff2' => 'font/woff2',
            'ttf' => 'font/ttf',
            'eot' => 'application/vnd.ms-fontobject'
        ];

        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if (isset($mime_types[$ext])) {
            if (!headers_sent()) {
                header('Content-Type: ' . $mime_types[$ext]);
            }
            readfile($file);
        }
    }
}