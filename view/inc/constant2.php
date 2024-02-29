<?php
// activation de la gestion d'erreur
error_reporting(E_ALL);
// configuration de l'affichage de eerreurs
ini_set('display_errors', '1');
// dsactivation des enregistrement des erreurs
ini_set('log_error', '0');
// configuration du doosier dans lequel les fichiers journaux d'erreurs seront stockés
ini_set('log_error', './');

// constantes de connexion à la BDD
switch($_SERVER ['HTTP_HOST']){
    // si le DOMMAIN est LOCALHOST

    case'localhost':
        define('HOST', 'localhost');
        define('PORT', '3306');
        define('DATA', 'omar');
        define('USER', 'root');
        define('PASS', '');
        break;

        // DEUXIEME SOLUTION
    case'baobab-svr5':
        define('HOST', 'baobab-svr5');
        define('DATA', 'baobab-sql5');
        define('USER', 'baobab-user1');
        define('PASS', '123456789m');
        break;

    // dans le cas contraire
    default:
    




}



?>