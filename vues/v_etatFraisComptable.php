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
?>
<?php
    $arrayVars["formulaire_eltForfaitises"] = $lesFraisForfait;
    $cpt = 0;   // cpt sert de compteur pour les id des formulaires
    $arrayVars["formulaire_eltHorsForfait"] = $lesFraisHorsForfait;
    $arrayVars["formulaire_nbJustificatif"][0]["libelle"] = "nbJustificatifs";
    $arrayVars["formulaire_nbJustificatif"][0]["quantite"] = $nbJustificatifs;
?>
<script src="../GSB_AppliMVC/includes/fct.inc.js"></script>
<h3>
    Éléments forfaitisés
</h3>
<div class="row">
    <div class="col-md-3">
        <form class="form-group" role="form" method="post" id="formulaire_eltForfaitises"
              action="index.php?uc=accueilComptable&action=editerEtatFrais"
              onsubmit="return false;">
            <?php
                foreach ($lesFraisForfait as $unFraisForfait) {
                    $libelle = $unFraisForfait['libelle'];
                    $quantite = $unFraisForfait['quantite'];
                    ?>
                    <label for="qtt_<?php echo htmlspecialchars($libelle) ?>">
                        <?php echo htmlspecialchars($libelle) ?>
                    </label>
                    <input class="form-control" id="<?php echo htmlspecialchars($libelle) ?>"
                           name="<?php echo htmlspecialchars($libelle) ?>"
                           value="<?php echo $quantite ?>">

                    <?php
            }
            ?>
            <input type="hidden" name="lstMois" value="<?php echo $moisASelectionner; ?>">
            <br>
            <input class="btn btn-lg btn-success btn-mini"
                   type="submit" name="corriger_eltForfaitises" value="Corriger"
                   onclick="document.getElementById('formulaire_eltForfaitises').submit();">
            <input class="btn btn-lg btn-danger btn-mini"
                   type="submit" name="reinitialiser" value="Réinitialiser"
                   onclick="remiseAZero('formulaire_eltForfaitises');">
        </form>
    </div>
</div>
<br>
<hr>
<div class="row">
    <div class="panel panel-warning">
        <div class="panel-heading panel-warning">
            Descriptif des éléments hors forfait
        </div>
        <table class="table table-bordered table-responsive">
            <tr>
                <th class="date td-warning">Date</th>
                <th class="libelle td-warning">Libellé</th>
                <th class='montant td-warning'>Montant</th>
                <th class="td-warning"></th>
            </tr>
            <?php
                foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                    $date = $unFraisHorsForfait['date'];
                    $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
                    $montant = $unFraisHorsForfait['montant'];
                    ?>
                    <tr>
                    <form class="form-group" role="form" method="post" 
                          id="formulaire_eltHorsForfait_<?php echo $cpt; ?>"
                          action="index.php?uc=accueilComptable&action=editerEtatFrais"
                          onsubmit="return false;">
                        <td class="td-warning">
                            <input class="form-control" 
                                   id="date_<?php echo $cpt; ?>"
                                   name="date_<?php echo $cpt; ?>" 
                                   value="<?php echo $date ?>">
                        </td>
                        <td class="td-warning">
                            <input class="form-control" 
                                   id="libelle_<?php echo $cpt; ?>"
                                   name="libelle_<?php echo $cpt; ?>" 
                                   value="<?php echo $libelle ?>">
                        </td>
                        <td class="td-warning">
                            <input class="form-control" 
                                   id="montant_<?php echo $cpt; ?>"
                                   name="montant_<?php echo $cpt; ?>"
                                   value="<?php echo $montant ?>">
                        </td>
                        <td class="td-warning">
                            <input class="btn btn-lg btn-success btn-mini"
                                   type="submit" name="corriger_eltHorsForfait_<?php echo $cpt; ?>" value="Corriger"
                                   onclick="document.getElementById
                                                   ('formulaire_eltHorsForfait_<?php echo $cpt; ?>').submit();">
                            <input class="btn btn-lg btn-danger btn-mini"
                                   type="submit" name="reinitialiser" value="Réinitialiser"
                                   onclick="remiseAZero
                                                   ('formulaire_eltHorsForfait', '<?php echo $cpt; ?>');">
                        </td>
                        <?php $cpt++; ?>
                    </form>
                    </tr>
                    <?php
                    }
            ?>
        </table>
    </div>
</div>
<div class="row">
    <form id="formulaire_nbJustificatif" method="post"
              action="index.php?uc=accueilComptable&action=editerEtatFrais"
              onsubmit="return false;">
        <label for="nbJustificatifs" class="inline-form">
            Nombre de justificatifs reçus :&nbsp;
            <input class="form-control form-control-sm inline-form" name="nbJustificatifs"
                   id="nbJustificatifs"
                   value="<?php echo $nbJustificatifs ?>">
        </label>
        <br>
        <input class="btn btn-lg btn-success btn-mini"
               type="submit" name="corriger_nbJustificatif" value="Corriger"
               onclick="document.getElementById('formulaire_nbJustificatif').submit();">
        <input class="btn btn-lg btn-danger btn-mini"
               type="submit" name="reinitialiser" value="Réinitialiser"
               onclick="remiseAZero('formulaire_nbJustificatif');">
    </form>
</div>
<script>
    enregistrerVariables(<?php echo json_encode($arrayVars); ?>);
</script>
