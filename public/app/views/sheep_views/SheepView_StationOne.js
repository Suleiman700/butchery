
export default class SheepView_StationOne {

    app = undefined

    viewSettings = {
        title: 'סריקה ראשונה',
        viewId: 'sheep.stationOne',
        showChangeJobBtn: true,
        showChangeAccountBtn: true,
    }

    constructor(_app) {
        this.app = _app
    }

    async html() {
        const viewDiv = document.createElement('div')
        viewDiv.innerHTML = `
            <div id="${this.viewSettings.viewId}">
                <div class="position-relative overflow-hidden d-flex align-items-center justify-content-center">
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <div class="w-100">
                            <div class="row d-flex justify-content-center text-center">
                                <div class="col-12 col-md-6">
                                    <h4>סריקה ראשונה</h4>
                                    <div class="mb-0">
                                        <div class="card-body">
                                            <div class="col-12 pt-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card shadow text-center">
                                                            <div class="card-body" dir="rtl">
                                                                <div class="form-group row">
                                                                    <label for="input-ear" class="col-4 col-form-label">סריקת אוזן</label>
                                                                    <div class="col-8">
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text"><i class="fa fa-ear-listen"></i></span>
                                                                            <input type="text" class="form-control" id="input-ear">
                                                                        </div>
                                                                    </div>                                                                
                                                                </div>
                                                                <div class="form-group row mt-3">
                                                                    <label for="input-knife" class="col-4 col-form-label">סריקת סקין</label>
                                                                    <div class="col-8">
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text"><i class="fa fa-cut"></i></span>
                                                                            <input type="text" class="form-control" id="input-knife">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button class="btn btn-primary">סיום</button>
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
