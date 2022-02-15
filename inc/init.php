<?php

$pdo= new PDO('mysql:host=localhost;dbname=site_ecommerce', 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// initiation de la session
session_start();

// chemin du site
define('SITE', '/projet/');

// variable d'affichage

$contenu ='';


function executeRequete($requete, $param = array()){
  // le parametre $requete recoit une requete sql. Le parametre $param recoit un tableau avec les marqueurs associés à leur valeur



    // Echappement des données avec htmlspecialchars() :
    foreach ($param as $marqueur => $valeur){
        $param[$marqueur]=htmlspecialchars($valeur);
        // on transforme les chevrons en entité html qui neutralise les balises <style> et <script> eventuellement injectées en formulaire. Evite les failles XSS et CSS

    }

    global $pdo; // permet d'acceder à la variable $pdo de manière globale

    $resultat= $pdo->prepare($requete);// on prepare la requete reçu
    $success=$resultat->execute($param);// on execute en lui passant le tableau des marqueurs associés à leur valeur

    // execute() renvoie toujours un boulean: true en cas de succes et false en cas d'echec

    if ($success){ // si $success == true donc que la requete a fonctionné

        return $resultat;

    }else{

        return false;

    }



}
