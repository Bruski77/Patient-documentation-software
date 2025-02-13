import './bootstrap';
import TomSelect from 'tom-select';
import 'tom-select/dist/css/tom-select.css'
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


const selectedZone = document.getElementById("zone")

const eventHandler = () => {
    return function() {
        selectedZone.hidden = false
        console.log(arguments[0])
    };
};

new TomSelect("#select-state",{
    create: true,
    sortField: {
        field: "text",
        direction: "asc"
    },
    onChange: eventHandler()

});

new TomSelect("#members-tags",{
    persist: false,
    createOnBlur: true,
    create: true
});

fetch("/external-data")
    .then(response => response.json())
    .then(data => {
        console.log(data);

    })
.catch(error => {
    console.error('There was a problem with the fetch operation:', error);
});






