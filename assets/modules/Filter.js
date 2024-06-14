/**
 * @property {HTMLElement} pagination
 * @property {HTMLElement} content
 * @property {HTMLElement} sorting
 * @property {HTMLFormElement} form
 * @property {number} page
 */
export default class Filter {

  /**
   * @param {HTMLElement|null} element
   */
  constructor(element) {
    if (element === null) {
      return
    }

    // Initializing properties
    this.pagination = element.querySelector('.js-filter-pagination')
    this.content = element.querySelector('.js-filter-content')
    this.sorting = element.querySelector('.js-filter-sorting')
    this.form = element.querySelector('.js-filter-form')
    this.bindEvents()
  }

  /**
  * Ajoute les comportements aux différents éléments
  */
  bindEvents() {
    const aClickListener = e => {
      if (e.target.tagName === 'A') {
        e.preventDefault()
        this.loadUrl(e.target.getAttribute('href'))
      }
    }
    // Adding event listeners
    this.sorting.addEventListener('click', aClickListener)
    this.pagination.addEventListener('click', aClickListener)
    // Event listeners for form inputs
    this.form.querySelectorAll('input').forEach(input => {
      input.addEventListener('change', this.loadForm.bind(this))
    })
    this.form.querySelectorAll('select').forEach(select => {
      select.addEventListener('change', this.loadForm.bind(this))
      //console.log("Event listener attached for:", select);
      //console.log("Selected marque:", marque);
    })
    // Event delegation for select elements within the form
    this.form.addEventListener('change', (event) => {
      if (event.target.tagName === 'SELECT') {
        //console.log('Change event fired on select');
        //console.log('Select element name:', event.target.name);
        if (event.target.name === 'marque[]') { // Check if the changed select is the 'marque'
          //console.log('Change event fired on marque');
          this.loadModels();
        } else {
          this.loadForm(); // Handle changes for other select elements
        }
      }
    });

  }
  // Loads form data asynchronously
  async loadForm() {
    const data = new FormData(this.form)
    const url = new URL(this.form.getAttribute('action') || window.location.href)
    const params = new URLSearchParams()
    data.forEach((value, key) => {
      params.append(key, value)
    })
    return this.loadUrl(url.pathname + '?' + params.toString())
  }
  // Loads content based on a given URL
  async loadUrl(url) {
    const ajaxUrl = url + '&ajax=1'
    const response = await fetch(ajaxUrl, {
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    })
    if (response.status >= 200 && response.status < 300) {
      const data = await response.json()
      //console.log(data)
      this.content.innerHTML = data.content
      this.sorting.innerHTML = data.sorting
      this.pagination.innerHTML = data.pagination
      this.updatePrix(data);
      this.updateKm(data);
      this.updateAnnee(data);
      history.replaceState({}, '', url)  // pushState pour l'historique
    } else {
      console.error(response)
    }

    //this.hideLoader()

  }
  showLoader() {
    this.form.classList.add('is-loading')
    const loader = this.form.querySelector('.js-loading')
    if (loader === null) {
      return
    }

    loader.setAttribute('aria-hidden', 'false')
    loader.style.display = null
  }

  hideLoader() {
    this.form.classList.remove('is-loading')
    const loader = this.form.querySelector('.js-loading')
    if (loader === null) {
      return
    }

    loader.setAttribute('aria-hidden', 'true')
    loader.style.display = 'none'
  }
  // Updates the price slider
  updatePrix(data) {
    const prixSlider = document.getElementById('prix-slider')
    if (prixSlider === null) {
      return
    }
    prixSlider.noUiSlider.updateOptions({
      reange: {
        min: data.prixmin,
        max: data.prixmax,
      }
    })
  }
  // Updates the km slider
  updateKm(data) {
    const kmSlider = document.getElementById('km-slider')
    if (kmSlider === null) {
      return
    }
    kmSlider.noUiSlider.updateOptions({
      reange: {
        min: data.kmmin,
        max: data.kmmax
      }
    })
  }
  // Updates the year slider
  updateAnnee(data) {
    const anneeSlider = document.getElementById('annee-slider')
    if (anneeSlider === null) {
      return
    }
    anneeSlider.noUiSlider.updateOptions({
      reange: {
        min: data.anneemin,
        max: data.anneemax
      }
    })
  }

  async loadModels() {
    const marqueId = this.form.querySelector('select[name="marque[]"]').value;
    const url = '/modeles/fetch?marqueId=' + marqueId; // New route for fetching models

    const response = await fetch(url, {
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    });

    if (response.status >= 200 && response.status < 300) {
      const data = await response.json();
      this.updateModelsSelect(data); // Update the 'modele' select box
    } else {
      console.error(response);
    }
  }

  updateModelsSelect(models) {
    const modeleSelect = this.form.querySelector('select[name="modele[]"]');
    modeleSelect.innerHTML = ''; // Clear existing options

    models.forEach(model => {
      const option = document.createElement('option');
      option.value = model.id;
      option.text = model.nom;
      modeleSelect.add(option);
    });
  }
}