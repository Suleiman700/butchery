
export default class View_JobSelection {

    viewSettings = {
        title: 'סוג עבודה',
        showChangeJobBtn: true,
        showChangeAccountBtn: true
    }

    constructor(_app) {
        this.app = _app
    }

    async html() {
        const parent = document.createElement('div')
        parent.innerHTML = `
            <div class="page-wrapper" id="main-wrapper">
                <div class="position-relative overflow-hidden min-vh-100 d-flex align-items-center justify-content-center">
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <div class="w-100">
                            <div class="row d-flex justify-content-center">
                                <div class="col-12 text-center">
                                    <div class="col-sm-12 text-center logo-img">
                                        <img src="../assets/images/logos/butchery.png" width="180" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center text-center">
                                <div class="col-md-8 col-lg-6">
                                    <h4>Job Selection</h4>
                                    <div class="mb-0">
                                        <div class="card-body">
                                            <div class="col-12 pt-3">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="card shadow text-center">
                                                            <div class="text-center">
                                                                <img class="card-img img-fluid-top p-2" src="../assets/images/icons/sheep.png" style="width: 100px;" alt="...">
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title">Sheep</h5>
                                                                <button class="btn btn-primary mt-3" id="btn-choose-sheep">בחר</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="card shadow text-center">
                                                            <div class="text-center">
                                                                <img class="card-img img-fluid-top p-2" src="../assets/images/icons/cow.png" style="width: 100px;" alt="...">
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title">Cow</h5>
                                                                <button class="btn btn-primary mt-3" id="btn-choose-cow">בחר</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-8 col-lg-6 text-center" id="view-footer">
                                    <hr />
                                    <button class="btn btn-outline-primary" id="btn-logout">שינוי משתמש</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `

        const btnChooseSheep = parent.querySelector('#btn-choose-sheep')
        btnChooseSheep.addEventListener('click', () => {
            this.app.setCurrentView('sheepStationSelection')
            this.app.renderView()
        })

        const btnChooseCow = parent.querySelector('#btn-choose-cow')
        btnChooseCow.addEventListener('click', () => {
            this.app.setCurrentView('cowStationSelection')
            this.app.renderView()
        })

        return parent
    }
}
