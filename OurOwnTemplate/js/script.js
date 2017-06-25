// Chargement du DOM

$( document ).ready( function(){

    // BURGER MENU RESPONSIVE 
    $( 'nav p' ).click( function(evt){

        evt.preventDefault();

        $( 'nav ul' ).slideToggle();

    });

    
    $( 'nav li > a' ).click( function(evt){

        evt.preventDefault();

       var linkToOpen = $( this ).attr( 'href' );
        
        $( 'nav ul' ).slideUp( function(){

             window.location = linkToOpen;

        }); 
            
    }); // Fin du BURGER MENU

    // PROGRESS BAR ROUNDED


}); // Fin de la fonction d'attente du chargement du DOM