<?php

namespace App\Core;

class View
{
    private static array $data = [];

    public static function render(string $view, array $data = [], string $layout = 'base'): void
    {
        // Extraire les données pour les rendre disponibles dans la vue
        self::$data = array_merge(self::$data, $data);
        extract(self::$data);

        // Démarrer la mise en mémoire tampon
        ob_start();

        // Inclure la vue
        $viewPath = __DIR__ . "/../Views/{$view}.php";
        if (!file_exists($viewPath)) {
            throw new \RuntimeException("Vue non trouvée : {$view}");
        }
        require $viewPath;

        // Récupérer le contenu de la vue
        $content = ob_get_clean();

        // Inclure le layout avec le contenu
        $layoutPath = __DIR__ . "/../Views/layouts/{$layout}.php";
        if (!file_exists($layoutPath)) {
            throw new \RuntimeException("Layout non trouvé : {$layout}");
        }
        require $layoutPath;
    }

    public static function partial(string $partial, array $data = []): void
    {
        extract(array_merge(self::$data, $data));
        
        $partialPath = __DIR__ . "/../Views/partials/{$partial}.php";
        if (!file_exists($partialPath)) {
            throw new \RuntimeException("Partial non trouvé : {$partial}");
        }
        require $partialPath;
    }

    public static function addData(array $data): void
    {
        self::$data = array_merge(self::$data, $data);
    }

    public static function escape($value): string
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
} 