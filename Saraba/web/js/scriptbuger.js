// Chargement du DOM

$( document ).ready( function(){

    // ouverture 
    $( 'nav p' ).click( function(evt){

        // Bloquer le comportement naturel de la balise A
        evt.preventDefault();

        // Appliquer la fonction slideToggle sur la nav
        $( 'nav ul' ).slideToggle();

    });

    // Burger menu : navigation 
    $( 'nav li > a' ).click( function(evt){

        
        evt.preventDefault();

       var linkToOpen = $( this ).attr( 'href' );
        
        // Fermeture
        $( 'nav ul' ).slideUp( function(){

            // Changer de page 
             window.location = linkToOpen;

        }); 
            
    }); 

}); // Fin de la fonction d'attente du chargement du DOM