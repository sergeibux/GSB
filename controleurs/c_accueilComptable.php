<?php

/**
 * Gestion des fiches de frais
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Sébastien Merliere Vanhoeke <sertux.dev@gmail.com>
 * @version   GIT: <0>
 */
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$idVisiteur = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);

if (!$idVisiteur) {
// enregistrement de la variable de session 
// contenant le visiteur en cours de controle
// dans une variable temporaire
    $idVisiteur = $_SESSION['idVisiteurAVerifier'];
} else {
// enregistrement du visiteur en cours de controle 
// dans la variable de session 
    $_SESSION['idVisiteurAVerifier'] = $idVisiteur;
}

$lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
// Afin de sélectionner par défaut le dernier mois dans la zone de liste
// on demande toutes les clés, et on prend la première,
// les mois étant triés décroissants
$lesCles = array_keys($lesMois);
$leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
$moisASelectionner = $leMois;
include 'vues/v_choixVisiteur.php';
// Vérification de la sélection d'un utilisateur
if (!$idVisiteur) {
    $pdoUser = PdoGsb::getPdoGsb();
    $id = $pdoUser->getIdUtilisateur($userName, $userFirstName);
    $idVisiteur = $id['id'];
    $_SESSION['idVisiteurAVerifier'] = $idVisiteur;
}

switch ($action) {
    case 'voirEtatFrais':
        if (isset($_POST['corriger'])) {
            echo 'Modifie les informations en base de données, puis affiche le contenu mis à jour.';
        } elseif (isset($_POST['reinitialiser'])) {
            echo 'Réinitialiser les valeurs avec la base de donées';
        }
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        $numAnnee = substr($leMois, 0, 4);
        $numMois = substr($leMois, 4, 2);
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
        $dateModif = dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
        include 'vues/v_etatFraisComptable.php';
        break;
}
