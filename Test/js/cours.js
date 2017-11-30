var premMinElt = document.getElementById("premMin");
// Accès aux informations publiques sur le Premier Ministre
ajaxGet("https://api.wonderpush.com/v1/management/deliveries", function (reponse) {
    var premierMinistre = JSON.parse(reponse);
    // Ajout de la description et du logo dans la page web
    var descriptionElt = document.createElement("p");
    descriptionElt.textContent = premierMinistre.description;
});
