<?php
/**
 * Vue Connexion
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */
// Récupération d'un tableau associatif contenant tous les visiteurs
$pdoVisiteurs = PdoGsb::getPdoGsb();
$tabVisiteurs = $pdoVisiteurs->getLesVisiteurs();
?>
<div class="row">
    <form role="form" method="post" 
          action="index.php?uc=accueilComptable&action=voirEtatFrais"
          id="formulaire">
        <fieldset>
            <div class="form-group inline-form">
                <div class="input-group">
                    <label class="inline-form" accesskey="u">
                        &nbsp;&nbsp;&nbsp;Choisir le visiteur :&nbsp;&nbsp;
                        <select id="user" name="userId" class="form-control inline-form"
                                onchange="document.getElementById('formulaire').submit();">
                            <?php
                                foreach ($tabVisiteurs as $unVisiteur) {
                                    if ($_SESSION['idVisiteurAVerifier'] === $unVisiteur['id']){
                                        $selected = '" selected = "selected';
                                    } else {
                                        $selected = '';
                                    }
                            ?>
                            <option value="<?php echo $unVisiteur['id'] . $selected; ?>">
                                <?php echo $unVisiteur['nom'] . ' ' . $unVisiteur['prenom']; ?>
                            </option>
                            <?php
                                }
                            ?>
                        </select>
                    </label>
                    <label for="lstMois" class="inline-form" accesskey="n">
                        &nbsp;&nbsp;&nbsp;Mois :&nbsp;&nbsp;
                        <select id="lstMois" name="lstMois" class="form-control inline-form"
                                onchange="document.getElementById('formulaire').submit();">
                            <?php
                            foreach ($lesMois as $unMois) {
                                $mois = $unMois['mois'];
                                $numAnnee = $unMois['numAnnee'];
                                $numMois = $unMois['numMois'];
                                if ($mois == $moisASelectionner) {
                                    ?>
                                    <option selected value="<?php echo $mois ?>">
                                        <?php echo $numMois . '/' . $numAnnee ?> </option>
                                        <?php
                                } else {
                                    ?>
                                    <option value="<?php echo $mois ?>">
                                        <?php echo $numMois . '/' . $numAnnee ?> </option>
                                        <?php
                                }
                            }
                            ?>
                        </select>
                    </label>
                </div>
            </div>
        </fieldset>
    </form>
    <h2 class="text-warning">
        Valider la fiche de frais
    </h2>
</div>
