// Demande du chargement du DOM
$(document).ready(function(){

    /*
        Modal Page Portfolio
    */ 
        // Créer une fonction pour ouvrir la modal
        function openModal(){

            // Ouvrir la modal au click sur les boutons
            $('button').click(function(){

                // Afficher le titre du projet
                var modalTitle = $(this).prev().text();
                $('#modal span').text(modalTitle);

                // Afficher l'image du projet
                var modalImage = $(this).parent().prev().attr('src');
                $('#modal img').attr('src', modalImage).attr('alt', modalTitle);

                $('#modal').fadeIn();    
            });

            // Fermer la modal au click sur .fa-times
            $('.fa-times').click(function(){
                $('#modal').fadeOut();
            });
        };

   
}); // Fin du chargement d DOM