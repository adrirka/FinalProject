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
    
    // ACCORDEON
    
    $('a.bubble').click(function(e){
        $('h3#title_' + $(this).attr('id')).trigger('click');
    });

        $( 'h3' ).click( function(){ 
        
            // Fermer la balise suivant .open
            $( '.open' ).not(this) // sélectionne la balise h3 avec une class .open sauf la balise sur laquelle j'ai cliqué
            .next() // sélectionne la balise suivante du h3 cliqué (soit un p)
            .slideUp() // Remonte l'élément avec un slide haut
            .prev() // sélectionne la balise précédente au p (soit le h3 initial)
            .removeClass( 'open' ) // retire lui la class .open
            .children( '.fa' ).toggleClass( 'fa fa-arrow-circle-down' ).toggleClass( 'fa fa-arrow-circle-up' ); // Changer la class
            
            //  Faire un toggle de la class open sur la balise h3
            $( this ).toggleClass( 'open' );
            
            // Affichcer la balise <p> du <h3> sur lequel j'ai cliqué
            // This pour signifier cette balise impliquée dans la fonction de callback et .next pour lui signifier la balise suivante h3 soit 'p'

            $( this ).next().slideToggle();

            // Séélectionner la balise .fa pour toggle la class .fa-arrow et un toggle sur la class fa-times.

            $( this ).children( '.fa' ).toggleClass( 'fa fa-arrow-circle-down' ).toggleClass( 'fa fa-arrow-circle-up' );

    });

}); // Fin de la fonction d'attente du chargement du DOM