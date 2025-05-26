<?php

/**
 * Échappe une chaîne de caractères pour l'affichage HTML
 * 
 * @param mixed $value La valeur à échapper
 * @return string La valeur échappée
 */
function e($value) {
    if (is_null($value)) {
        return '';
    }
    
    if (is_bool($value)) {
        return $value ? 'true' : 'false';
    }
    
    if (is_array($value) || is_object($value)) {
        return htmlspecialchars(print_r($value, true), ENT_QUOTES, 'UTF-8');
    }
    
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Rend une vue partielle
 * 
 * @param string $name Le nom de la vue partielle
 * @param array $data Les données à passer à la vue
 * @return void
 */
function partial($name, $data = []) {
    extract($data);
    $partialPath = BASE_PATH . "/app/Views/partials/{$name}.php";
    if (!file_exists($partialPath)) {
        throw new RuntimeException("Vue partielle non trouvée : {$name}");
    }
    require $partialPath;
}

/**
 * Génère une URL pour un asset
 * 
 * @param string $path Le chemin de l'asset
 * @return string L'URL complète de l'asset
 */
function asset($path) {
    return '/assets/' . ltrim($path, '/');
}

/**
 * Génère une URL pour une route
 * 
 * @param string $path Le chemin de la route
 * @return string L'URL complète
 */
function url($path = '') {
    return '/' . ltrim($path, '/');
} 