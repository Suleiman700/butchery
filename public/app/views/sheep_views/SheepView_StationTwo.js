
export default class SheepView_StationTwo {

    app = undefined

    viewSettings = {
        title: 'תחנה 2',
        viewId: 'sheep.stationTwo',
        showChangeJobBtn: true,
        showChangeAccountBtn: true,
    }

    flags = {
        barcodeEntered: false,
        radioChecked: false,
    }

    constructor(_app) {
        this.app = _app
    }

    async html() {
        // --------------- [ Functions ] ---------------
        const action_DisableRadios = (_option) => {
            const radios = viewDiv.querySelectorAll('#radios input[type="radio"]')
            if (_option) {
                for (let i = 0; i < radios.length; i++) {
                    radios[i].disabled = true
                }
            }
            else {
                for (let i = 0; i < radios.length; i++) {
                    radios[i].removeAttribute('disabled')
                }
            }
        }

        const action_disableSubmitBtn = (_option) => {
            const submitBtn = viewDiv.querySelector('#btn-submit')
            if (_option) {
                submitBtn.disabled = true
            }
            else {
                submitBtn.removeAttribute('disabled')
            }
        }

        const viewDiv = document.createElement('div')
        viewDiv.innerHTML = `
            <div id="${this.viewSettings.viewId}">
                <div class="position-relative overflow-hidden d-flex align-items-center justify-content-center">
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <div class="w-100">
                            <div class="row d-flex justify-content-center text-center">
                                <div class="col-12 col-md-6">
                                    <h4>תחנה 2</h4>
                                    <div class="mb-0">
                                        <div class="card-body">
                                            <div class="col-12 pt-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card shadow text-center">
                                                            <div class="card-body">
                                                                <div class="form-group row mt-3" dir="rtl">
                                                                    <div class="input-group mb-3">
                                                                        <label for="input-knife-barcode" class="col-4 col-form-label">סריקת סקין</label>
                                                                        <input type="text" class="form-control" id="input-knife-barcode">
                                                                        <div class="input-group-prepend">
                                                                            <button class="btn btn-primary" id="btn-search-knife-barcode">חיפוש</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 my-3">
                                                                    <div class="btn-group row d-flex" id="radios">
                                                                        <div class="col-4">
                                                                            <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off">
                                                                            <label class="btn btn-secondary" for="option1">Option 1</label>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                                                                            <label class="btn btn-secondary" for="option2">Option 2</label>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off">
                                                                            <label class="btn btn-secondary" for="option3">Option 3</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button class="btn btn-primary" id="btn-submit">סיום</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center my-3">
                                <div class="col-md-8 col-lg-6 text-center" id="view-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `

        // Disable all radios
        action_DisableRadios(true)

        // Disable submit button
        action_disableSubmitBtn(true)

        // Event listener for knife barcode input
        viewDiv.querySelector('#input-knife-barcode').addEventListener('input', () => {
            action_DisableRadios(true)
            action_disableSubmitBtn(true)
        })

        // Event listener for knife barcode
        viewDiv.querySelector('#btn-search-knife-barcode').addEventListener('click', () => {
            // Check if barcode is entered
            const barcode = viewDiv.querySelector('#input-knife-barcode').value
            if (barcode.length > 0 ) {
                // Check if knife barcode exists in database
                // action_DisableRadios(false)
            }
            else {
                action_DisableRadios(true)
                Swal.fire({
                    icon: 'warning',
                    title: 'שגיאה',
                    text: 'יש לסרוק מספר סקין',
                    confirmButtonText: 'סגור',
                })
            }
        })

        // Show developer button if enabled
        if (this.app.settings.enableDeveloperTools) {
            const btnDeveloper = document.createElement('button')
            btnDeveloper.classList.add('btn', 'btn-danger')
            btnDeveloper.textContent = 'DEVELOPER'
            btnDeveloper.addEventListener('click', () => {
                this.developerModeHTML(viewDiv)
            })
            viewDiv.appendChild(btnDeveloper)
        }

        return viewDiv
    }


    developerModeHTML(_viewDiv) {
        const developerDiv = document.createElement('div')
        developerDiv.innerHTML = `
            <div class="col-12">
                <p>Random barcode</p>
                <button class="btn btn-secondary btn-sm" id="btn-simulate-random-ear">Simulate random ear scan</button>
                <button class="btn btn-secondary btn-sm" id="btn-simulate-random-knife">Simulate random knife scan</button>
            </div> 
            <hr />
            <div class="col-12">
                <p>Manual barcode</p>
                <div class="form-group d-flex">
                    <label for="input-ear" class="col-4 col-form-label">Ear barcode</label>
                    <div class="col-8">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="input-simulate-manual-ear">
                            <button class="btn btn-secondary btn-sm" id="btn-simulate-manual-ear">Simulate</button>
                        </div>
                    </div>                                                                
                </div>
                <div class="form-group d-flex">
                    <label for="input-ear" class="col-4 col-form-label">Knife barcode</label>
                    <div class="col-8">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="input-simulate-manual-knife">
                            <button class="btn btn-secondary btn-sm" id="btn-simulate-manual-knife">Simulate</button>
                        </div>
                    </div>                                                                
                </div>
            </div> 
        `

        // Event listeners
        developerDiv.querySelector('#btn-simulate-random-ear').addEventListener('click', () => {
            _viewDiv.querySelector(`#input-ear`).value = 'random'
        })
        developerDiv.querySelector('#btn-simulate-random-knife').addEventListener('click', () => {
            _viewDiv.querySelector(`#input-knife`).value = 'random'
        })
        developerDiv.querySelector('#btn-simulate-manual-ear').addEventListener('click', () => {
            _viewDiv.querySelector(`#input-ear`).value = developerDiv.querySelector('#input-simulate-manual-ear').value
        })
        developerDiv.querySelector('#btn-simulate-manual-knife').addEventListener('click', () => {
            _viewDiv.querySelector(`#input-knife`).value = developerDiv.querySelector('#input-simulate-manual-knife').value
        })

        Swal.fire({
            title: 'Developer Mode',
            html: developerDiv,
            confirmButtonText: 'close'
        })
    }
}
