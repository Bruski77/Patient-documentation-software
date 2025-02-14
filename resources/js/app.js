import './bootstrap';
import TomSelect from 'tom-select';
import 'tom-select/dist/css/tom-select.css'
import Alpine from 'alpinejs';
import lgas from '../lgas.json'

window.Alpine = Alpine;

Alpine.start();


const selectedZone = document.getElementById("zone")
const lgaSelect = document.getElementById('select-lga')

const eventHandler = () => {
    let tomSelectInstance = null;

    return function() {
        selectedZone.hidden = false
        const selectedState = arguments[0]

        lgaSelect.innerHTML = '<option value="">Select LGA/ACPN Zone...</option>'

        lgas[selectedState].forEach(state => {
            let option = document.createElement('option')
            option.value = state
            option.textContent = state
            lgaSelect.appendChild(option)
        })

        if (tomSelectInstance) {
            tomSelectInstance.destroy()
        }

        tomSelectInstance = new TomSelect("#select-lga",{
            create: true,
            valueField: 'name',
            labelField: 'name',
            searchField: 'name',
            options: lgas[selectedState]
        });
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






