class Loader {
    constructor() {}

    /**
     * Show loader
     * @param _title {string} E.g. Please wait
     * @param _description {string} E.g. Please wait while getting data...
     */
    showLoading(_title='נא להמתין', _description='...טוען נתונים') {
        Swal.fire({
            title: '',
            html: `
                <div style="background-color: #fff; padding: 20px; text-align: center;">
                    <h3>${_title}</h3>
                    <h6 class="text-muted">${_description}</h6>
                    <section class="mt-2"><span class="fa fa-circle-notch fa-spin fa-2x"> </span></section>
                </div>`
            ,
            backdrop: 'rgba(0,0,0,0.5)',
            allowOutsideClick: false,
            showConfirmButton: false,
        });
    }

    close() {
        Swal.close()
    }
}

export default new Loader()
