
export default class SheepView_InitScan {

    pageSettings = {
        title: 'סריקה ראשונה',
        showChangeJobBtn: true,
        showChangeAccountBtn: true
    }

    constructor() {
    }

    async html() {
        const parent = document.createElement('div')
        parent.innerHTML = `
            <div class="page-wrapper" id="main-wrapper">
                <div class="position-relative overflow-hidden min-vh-100 d-flex align-items-center justify-content-center">
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
                                    <hr />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `

        return parent
    }
}
