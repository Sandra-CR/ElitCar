<?php 
// role 0 (visiteur)=> acces au home + index + read mais sans avoir acces au reste des fonctionnalités 
// role 1 (utilisateur) => Avoir finir de crée son profil 
// role 2 (client) => Avoir finir de mettre à jour son profil(Num + permis de conduire + adresse + date de naissance) + optionnelment la photo de profil
// role 3 (Propriétaire) =>
// role 4 (Agence) =>
// role 5 (Admin) => acces à tout
enum Role : int
{
    case GUEST = 0;
    case USER = 1;
    case CUSTOMER = 2;
    case OWNER = 3;
    case AGENCY = 4;
    case ADMIN = 5;
}
