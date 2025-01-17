localStorage.removeItem('id_typology_dish')

/**
 * 
 * @param {*} id 
 */
function showPlate(id) {
    console.log(id);

    // variabile che raccoglie tutti i contenitori con i piatti
    const containerElements = document.querySelectorAll('.container_card');

    // variabile che raccoglie tutti le icone che mostra menu
    const iconElement = document.querySelectorAll('.icon_show_menu');

    // se il valore passato e diverso da quello salvato nel localStorage o se il LocalStorage e null
    if (localStorage.getItem('id_typology_dish') != id || localStorage.getItem('id_typology_dish') == null) {

        // setto il localStorage con il parametro passato
        localStorage.setItem('id_typology_dish', id);

        // azzerro tutte le modifiche fatte
        containerElements.forEach((element) => {
            element.style.height = '';
            element.style.opacity = '';
            element.style.padding = ''
            element.style.display = ''
        })

        // azzero le modifiche fatte alle icone
        iconElement.forEach((element) => {
            element.style.transform = ""
        })

        /*
          ciclo tutti le icone e quella che ha l'indice uguale al parametro passato gli passo le modifiche
         */
        iconElement.forEach((element, index) => {
            if (index == id) {
                element.style.transform = " rotateX(180deg)"

            }
        })

        /*
        ciclo tutti i contenitori dei piatti e quella che ha l'indice uguale al parametro passato, gli apporto le modifiche
        */
        containerElements.forEach((element, index) => {
            if (index == id) {
                element.style.padding = '20px';
                element.style.display = 'flex'
                element.style.height = '100%';
                element.style.opacity = '1';
            }
        })

    }//altimenti se il parametro passato e uguale a quello salvato nel localStorage
    else if (localStorage.getItem('id_typology_dish') == id) {

        // contatore di errori 
        let error = 0;

        // numero di errori massimo che puo avere
        const errorNum = iconElement.length;


        // azzero le modifiche fatte alle icone
        iconElement.forEach((element, index) => {

            // se nessuna hanno la modifica 
            if (element.style.transform == '') {
                // aumento di uno gli errori
                error++
            }
        })

        // se gli errori sono uguali al numero di errori
        if (error == errorNum) {

            /*
            ciclo tutti le icone e quella che ha l'indice uguale al parametro passato gli passo le modifiche
            */
            iconElement.forEach((element, index) => {
                if (index == id) {
                    element.style.transform = " rotateX(180deg)"

                }
            })

            /*
            ciclo tutti i contenitori dei piatti e quella che ha l'indice uguale al parametro passato, gli apporto le modifiche
            */
            containerElements.forEach((element, index) => {
                if (index == id) {
                    element.style.padding = '20px';
                    element.style.display = 'flex'
                    element.style.height = '100%';
                    element.style.opacity = '1';
                }
            })

        } else {

            // azzerro tutte le modifiche fatte
            containerElements.forEach((element, index) => {
                if (index == id) {
                    element.style.padding = '';
                    element.style.display = ''
                    element.style.height = '';
                    element.style.opacity = '';
                }
            })

            // azzero le modifiche fatte alle icone
            iconElement.forEach((element) => {
                element.style.transform = ""
            })
        }

    }

}

/**
 * function for close messagge of session
 */
function closeSession() {
    document.getElementById('session').style.opacity = '0';
    document.getElementById('session').style.height = '0px';
    document.getElementById('session').style.marginBottom = '0px';
}