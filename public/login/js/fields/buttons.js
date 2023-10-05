
import ButtonManager from '../../../../assets/js/utils/button-manager/ButtonManager.js';
import Loader from '../../../../assets/js/utils/Loader.js';
import inputs from './inputs.js';
import Request from '../../../../assets/js/utils/Request.js';
import { paths } from '../../../../assets/js/utils/paths.js';

/**
 * Handles the click event of the login button.
 * @param {Function} _callback - The callback function to be called after login.
 */
const btnLoginClick = async (_callback) => {
    Loader.showLoading()

    const fields = {
        username: inputs.username.valueGet(),
        password: inputs.password.valueGet(),
    }

    // Prepare the request data
    const requestData = {
        controller: 'Login_Controller',
        method: 'validateUserLogin',
        params: fields
    }

    // Send a GET request to validate the user login
    const response = await Request.send('GET', requestData, true)

    if (response.state) {
        Loader.close()

        // Redirect to the app page
        window.location.href = paths.app
    }
}
const btnLogin = new ButtonManager('main-wrapper', 'btn-login', btnLoginClick)
btnLogin.onClick() // Enable onClick

const buttons = {
    btnLogin,
}

export default buttons
