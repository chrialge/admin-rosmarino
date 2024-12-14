localStorage.removeItem('id_typology_dish')

function showPlate(id) {
    const containerElements = document.querySelectorAll('.container_card');
    const iconElement = document.querySelectorAll('.icon_show_menu');

    if (localStorage.getItem('id_typology_dish') != id || localStorage.getItem('id_typology_dish') == null) {

        localStorage.setItem('id_typology_dish', id);


        containerElements.forEach((element) => {
            element.style.height = '';
            element.style.opacity = '';
            element.style.padding = ''
            element.style.display = ''





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
                element.style.display = 'flex'
                element.style.height = '100%';
                element.style.opacity = '1';
            }
        })

    } else if (localStorage.getItem('id_typology_dish') == id) {
        iconElement.forEach((element, index) => {
            if (index == id) {
                element.style.transform = ""

            }
        })
        containerElements.forEach((element, index) => {
            if (index == id) {
                element.style.padding = '';
                element.style.display = ''
                element.style.height = '';
                element.style.opacity = '';
            }
        })
    }

}