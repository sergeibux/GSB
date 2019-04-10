/* 
 * 
 * Author : MERLIERE VANHOEKE Sébastien <sertux.dev@gmail.com>
 * Date : 10 avr. 2019, 17:38:00
 * 
 */


var global_jsonVars;
/**
 * 
 * Reçoit un tableau associatif en paramètre
 * et enregistres les valeurs données dans une variable globale
 * 
 * @param {JSON} jsonVars contenu des vraiables de la page au format JSON
 */
function enregistrerVariables(jsonVars) {
    global_jsonVars = jsonVars;
    console.log(global_jsonVars);
}

/**
 * 
 * Restauration des valeurs pour les inputs du formulaire passé en paramètres
 * 
 * @param {String} elt contient l'id du formulaire à réinitialiser
 * @param {String} nb compteur de formulaires (applicable à formulaire_eltHorsForfait
 */
function remiseAZero(elt, nb = null) {
    console.log(elt);
    if (nb === null) {
        var i = 0;
        var el = document.getElementById(global_jsonVars[elt][i]["libelle"]);
        while (el) {
            el.value = global_jsonVars[elt][i]["quantite"];
            i++;
            el = document.getElementById(global_jsonVars[elt][i]["libelle"]);
        }
    } else {
        var el = document.getElementById("date_" + nb);
        el.value = global_jsonVars[elt][nb]["date"];

        var el = document.getElementById("libelle_" + nb);
        el.value = global_jsonVars[elt][nb]["libelle"];

        var el = document.getElementById("montant_" + nb);
        el.value = global_jsonVars[elt][nb]["montant"];
    }
}
