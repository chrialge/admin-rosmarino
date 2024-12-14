localStorage.removeItem('id_typology_dish')

function showPlate(id) {

    if (localStorage.getItem('id_typology_dish') != id || localStorage.getItem('id_typology_dish') == null) {

        localStorage.setItem('id_typology_dish', id);


        const headerElements = document.querySelectorAll('.header_container');
        const containerElements = document.querySelectorAll('.container_card');
        const iconElement = document.querySelectorAll('.icon_show_menu');


        containerElements.forEach((element) => {
            element.style.height = '';
            element.style.opacity = '';
            element.style.transform = '';
            element.style.transitionDelay = '';
            element.style.padding = ''






        })

        iconElement.forEach((element) => {
            element.style.transform = "rotateX(0deg)"
        })



        iconElement.forEach((element, index) => {
            if (index == id) {
                element.style.transform = " rotateX(180deg)"

            }
        })
        containerElements.forEach((element, index) => {
            if (index == id) {
                element.style.padding = '20px';

                element.style.height = '100%';
                element.style.opacity = '1';
                element.style.transform = 'translateX(0)'
            }
        })

    }

}