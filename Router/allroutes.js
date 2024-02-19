import Route from "./route.js";

//Définir ici vos routes
export const allRoutes = [
    new Route("/", "Accueil", "/pages/home.html",[],"/js/auth/home.js"),
    new Route("/Avis", "Avis", "/pages/feedback.html",[],"/js/auth/avis.js"),
    new Route("/Contact", "Contact", "/pages/form_control.html",[],"/js/auth/contact.js"),
    new Route("/Connexion", "Connexion", "/pages/connexion.html",["disconnected"],"/js/auth/connexion.js"),
];
    

//Le titre s'affiche comme ceci : Route.titre - websitename
export const websiteName = "Garage V Parrot";