/**
 * @property {HTMLElement} pagination
 * @property {HTMLElement} content
 * @property {HTMLElement} sorting
 * @property {HTMLFormElement} form
 * @property {number} page
 * @property {boolean} moreNav
 */
export default class Filter {

    /**
     * @param {HTMLElement|null} element
     */
    constructor(element) {
        if (element === null) {
            return
        }
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
        this.sorting.addEventListener('click', aClickListener)
        this.pagination.addEventListener('click', aClickListener)
        this.form.querySelectorAll('input').forEach(input => {
            input.addEventListener('change', this.loadForm.bind(this))
        })
        this.form.querySelectorAll('select').forEach(select => {
          select.addEventListener('change', this.loadForm.bind(this))
      })

    }

    async loadForm() {
        const data = new FormData(this.form)
        const url = new URL(this.form.getAttribute('action') || window.location.href)
        const params = new URLSearchParams()
        data.forEach((value, key) => {
            params.append(key, value)
        })
        return this.loadUrl(url.pathname + '?' + params.toString())
    }

    async loadUrl(url) {
        //this.showLoader()
        const ajaxUrl = url + '&ajax=1'
        const response = await fetch(ajaxUrl, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        if (response.status >= 200 && response.status < 300) {
            const data = await response.json()
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

    updatePrix([prixmin, prixmax]) {
        const prixSlider = document.getElementById('prix-slider')
        if (prixSlider === null) {
            return
        }
        prixSlider.noUiSlider.updateOptions({
            reange: {
                min: [prixmin],
                max: [prixmax]
            }
        })
    }

    updateKm([kmmin, kmmax]) {
        const kmSlider = document.getElementById('km-slider')
        if (kmSlider === null) {
            return
        }
        kmSlider.noUiSlider.updateOptions({
            reange: {
                min: [kmmin],
                max: [kmmax]
            }
        })
    }

    updateAnnee([anneemin, anneemax]) {
        const anneeSlider = document.getElementById('annee-slider')
        if (anneeSlider === null) {
            return
        }
        anneeSlider.noUiSlider.updateOptions({
            reange: {
                min: [anneemin],
                max: [anneemax]
            }
        })
    }
}