import './bootstrap';

import 'intl-tel-input/build/css/intlTelInput.css';
import intlTelInput from 'intl-tel-input';

// Set the path to flags.webp and globe.webp in your CSS
const input = document.querySelector("#phone");
intlTelInput(input, {
    utilsScript: "/path/to/utils.js" // include the utils script if necessary
});

