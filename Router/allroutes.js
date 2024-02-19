import Route from "./route.js";

//Définir ici vos routes
export const allRoutes = [
    new Route("/", "Accueil", "/pages/home.html"),
    new Route("/Avis", "Avis", "/pages/feedback.html"),
    new Route("/Contact", "Contact", "/pages/form_control.html"),
];
    

//Le titre s'affiche comme ceci : Route.titre - websitename
export const websiteName = "Garage V Parrot";