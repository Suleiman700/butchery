export default class SheepView_StationSelection {

    pageSettings = {
        title: 'בחיר תחנה',
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
                                        <img src="../assets/images/icons/sheep.png" width="100" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center text-center">
                                <div class="col-md-8 col-lg-6">
                                    <h4>Station Selection</h4>
                                    <hr />
                                    <div class="mb-0">
                                        <div class="card-body">
                                            <div class="col-12 pt-3">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                                        <div class="card shadow text-center">
                                                            <div class="text-center">
                                                                <img class="card-img img-fluid-top p-2" src="../assets/images/icons/factory.png" style="width: 100px;" alt="...">
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title">תחנה 1</h5>
                                                                <button class="btn btn-primary mt-3 stationSelection" data-view="sheep.stationOne">בחר תחנה</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                                        <div class="card shadow text-center">
                                                            <div class="text-center">
                                                                <img class="card-img img-fluid-top p-2" src="../assets/images/icons/factory.png" style="width: 100px;" alt="...">
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title">תחנה 2</h5>
                                                                <button class="btn btn-primary mt-3 stationSelection" data-view="sheep.stationTwo">בחר תחנה</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                                        <div class="card shadow text-center">
                                                            <div class="text-center">
                                                                <img class="card-img img-fluid-top p-2" src="../assets/images/icons/factory.png" style="width: 100px;" alt="...">
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title">תחנה 3</h5>
                                                                <button class="btn btn-primary mt-3 stationSelection" data-view="sheep.stationThree">בחר תחנה</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                                        <div class="card shadow text-center">
                                                            <div class="text-center">
                                                                <img class="card-img img-fluid-top p-2" src="../assets/images/icons/factory.png" style="width: 100px;" alt="...">
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title">תחנה 4</h5>
                                                                <button class="btn btn-primary mt-3 stationSelection" data-view="sheep.stationFour">בחר תחנה</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                                        <div class="card shadow text-center">
                                                            <div class="text-center">
                                                                <img class="card-img img-fluid-top p-2" src="../assets/images/icons/factory.png" style="width: 100px;" alt="...">
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title">תחנה 5</h5>
                                                                <button class="btn btn-primary mt-3 stationSelection" data-view="sheep.stationFive">בחר תחנה</button>
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
                                <div class="col-md-8 col-lg-6 text-center">
                                    <hr />
                                    <button type="button" class="btn btn-outline-primary mx-2" id="btn-change-job">Change job</button>
                                    <button type="button" class="btn btn-outline-primary" id="btn-logout">Switch account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `

        const buttonsSelectionStation = parent.querySelectorAll('.stationSelection')
        buttonsSelectionStation.forEach(button => {
            // Get the view to set from the data-view attribute
            const viewToSet = button.getAttribute('data-view');

            button.addEventListener('click', () => {
                // Set the view and render it
                this.app.setCurrentView(viewToSet);
                this.app.renderView();
            })
        })

        const btnTest = parent.querySelector('#btn-logout')
        btnTest.addEventListener('click', () => {
            console.log('clicked')
        })

        const btnChangeJob = parent.querySelector('#btn-change-job')
        btnChangeJob.addEventListener('click', () => {
            this.app.setCurrentView('jobSelection')
            this.app.renderView()
        })

        return parent
    }
}
