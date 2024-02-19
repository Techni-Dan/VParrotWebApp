/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
/*import './styles/style.css';*/
import noUiSlider from '../node_modules/nouislider/dist/nouislider';
import '../node_modules/nouislider/dist/nouislider.css'
import Filter from './modules/Filter'

// Creating a new Filter instance for the '.js-filter' element
new Filter(document.querySelector('.js-filter'))

// Setting up sliders for price, km, and year
// Price Slider
const prixSlider = document.getElementById('prix-slider');

if (prixSlider) {
    const prixmin = document.getElementById('prixmin');
    const prixmax = document.getElementById('prixmax');
    const prixminValue = Math.floor(parseInt(prixSlider.dataset.min, 10) / 10) * 10;
    const prixmaxValue = Math.ceil(parseInt(prixSlider.dataset.max, 10) / 10) * 10;
    const range = noUiSlider.create(prixSlider, {
        start: [prixmin.value || prixminValue, prixmax.value || prixmaxValue],
        connect: true,
        step: 1000,
        range: {
            'min': prixminValue,
            'max': prixmaxValue
        }
    });

    range.on('slide', function (values, handle) {
        if (handle === 0) {
            prixmin.value = Math.round(values[0])
        }
        if (handle === 1) {
            prixmax.value = Math.round(values[1])
        }
    })
    range.on('end', function (values, handle) {
        if (handle === 0) {
            prixmin.dispatchEvent(new Event('change'))
        } else {
            prixmax.dispatchEvent(new Event('change'))
        }
    })
}

// Km Slider
const kmSlider = document.getElementById('km-slider');

if (kmSlider) {
    const kmmin = document.getElementById('kmmin');
    const kmmax = document.getElementById('kmmax');
    const kmminValue = Math.floor(parseInt(kmSlider.dataset.min, 10) / 10) * 10;
    const kmmaxValue = Math.ceil(parseInt(kmSlider.dataset.max, 10) / 10) * 10;
    const range = noUiSlider.create(kmSlider, {
        start: [kmmin.value || kmminValue, kmmax.value || kmmaxValue],
        connect: true,
        step: 100,
        range: {
            'min': kmminValue,
            'max': kmmaxValue
        }
    });

    range.on('slide', function (values, handle) {
        if (handle === 0) {
            kmmin.value = Math.round(values[0])
        }
        if (handle === 1) {
            kmmax.value = Math.round(values[1])
        }
    })
    range.on('end', function (values, handle) {
        if (handle === 0) {
            kmmin.dispatchEvent(new Event('change'))
        } else {
            kmmax.dispatchEvent(new Event('change'))
        }
    })
}

// // Year Slider
const anneeSlider = document.getElementById('annee-slider');

if (anneeSlider) {
    const anneemin = document.getElementById('anneemin');
    const anneemax = document.getElementById('anneemax');

    // Calculate the maximum allowed year (current year)
    const currentYear = new Date().getFullYear();
    const maxAllowedYear = Math.min(parseInt(anneeSlider.dataset.max, 10), currentYear);


    const anneeminValue = Math.floor(parseInt(anneeSlider.dataset.min, 10) / 10) * 10;
    //const anneemaxValue = Math.ceil(parseInt(anneeSlider.dataset.max, 10) / 10) * 10;
    const anneemaxValue = Math.min(Math.ceil(parseInt(anneeSlider.dataset.max, 10) / 10) * 10, maxAllowedYear);
    const range = noUiSlider.create(anneeSlider, {
        start: [anneemin.value || anneeminValue, anneemax.value || anneemaxValue],
        connect: true,
        step: 1,
        range: {
            'min': anneeminValue,
            'max': anneemaxValue
        }
    });

    range.on('slide', function (values, handle) {
        if (handle === 0) {
            anneemin.value = Math.round(values[0])
        }
        if (handle === 1) {
            anneemax.value = Math.round(values[1])
        }
    })
    range.on('end', function (values, handle) {
        if (handle === 0) {
            anneemin.dispatchEvent(new Event('change'))
        } else {
            anneemax.dispatchEvent(new Event('change'))
        }
    })
}
/*
window.onload = function(){

    const selectMarque = document.getElementById("marqueSelect");

    const redirectMarque = () => {   
        location.href=document.getElementById("marqueSelect").value;
    }
    
    selectMarque.addEventListener('change', redirectMarque)

    const selectModele = document.getElementById("modeleSelect");

    const redirectModele = () => {   
        location.href=document.getElementById("modeleSelect").value;
    }
    
    selectModele.addEventListener('change', redirectModele)
  
    const selectCategorie = document.getElementById("categorieSelect");

    const redirectCategorie = () => {   
        location.href=document.getElementById("categorieSelect").value;
    }
    
    selectCategorie.addEventListener('change', redirectCategorie)

    const selectType = document.getElementById("typeSelect");

    const redirectType = () => {   
        location.href=document.getElementById("typeSelect").value;
    }
    
    selectType.addEventListener('change', redirectType)

    const selectCarburant = document.getElementById("carburantSelect");

    const redirectCarburant = () => {   
        location.href=document.getElementById("carburantSelect").value;
    }
    
    selectCarburant.addEventListener('change', redirectCarburant)
}

// Get table element
const table = document.getElementById('openingHoursTable');

// Function to modify the table for Samedi and Dimanche
function modifyTable() {
  // Merge last two cells for Samedi
  const samediRow = document.getElementById('Samedi').parentElement;
  samediRow.lastElementChild.colSpan = 4;

  // Merge all four cells for Dimanche
  const dimancheRow = document.getElementById('Dimanche').parentElement;
  dimancheRow.lastElementChild.colSpan = 2;

  // Remove unnecessary cells in Dimanche row
  const nextSibling = dimancheRow.lastElementChild.nextElementSibling;
  if (nextSibling) {
    nextSibling.remove();
  }
}

// Call the function to modify the table
modifyTable();
*/
