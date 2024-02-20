import Route from "./route.js";

//Définir  routes
export const allRoutes = [
    new Route("/", "Accueil", "/pages/home.html",[],"/js/auth/home.js"),
    new Route("/Avis", "Avis", "/pages/feedback.html",[],"/js/auth/avis.js"),
    new Route("/Contact", "Contact", "/pages/form_control.html",[],"/js/auth/contact.js"),
    new Route("/Connexion", "Connexion", "/pages/connexion.html",["disconnected"],"/js/auth/connexion.js"),
    new Route("/CreationCompte", "CreationCompte", "/pages/createaccount.html",["admin"],"/js/auth/createaccount.js"),
];
    


export const websiteName = "Garage V Parrot";