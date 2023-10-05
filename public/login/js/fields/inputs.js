// Import the InputManager class from the specified file path
import InputManager from '../../../../assets/js/utils/input-manager/InputManager.js';

// Create instances of InputManager for the username and password fields
const username = new InputManager('main-wrapper', 'input-username');
const password = new InputManager('main-wrapper', 'input-password');

// Store the instances in an object for easy access
const inputs = {
    username,
    password
};

// Export the inputs object for use in other modules
export default inputs;
