function category_name_validation() {
    'use strict';
    var category_name = document.getElementById("category_name");
    var category_value = document.getElementById("category_name").value;
    var category_length = category_value.length;
    if (category_length < 3 || category_length > 20) {
        document.getElementById('catname_err').innerHTML = 'Value must not be less than 3 characters and greater than 20 characters';
        document.getElementById('catname_err').style.color = "#FF0000";
    }
    else {
        document.getElementById('catname_err').innerHTML = 'Valid name';
        document.getElementById('catname_err').style.color = "#00AF33";
    }
}

function switch_validation() {
    'use strict';
    var switch_type = document.getElementById("switch");
    var switch_value = document.getElementById("switch").value;
    var switch_length = switch_value.length;
    if (switch_length < 3 || switch_length > 25) {
        document.getElementById('switch_err').innerHTML = 'Value must not be less than 3 characters and greater than 25 characters';
        document.getElementById('switch_err').style.color = "#FF0000";
    }
    else {
        document.getElementById('switch_err').innerHTML = 'Valid switch';
        document.getElementById('switch_err').style.color = "#00AF33";
    }
}


function name_validation() {
    'use strict';
    var name = document.getElementById("name");
    var name_value = document.getElementById("name").value;
    var name_length = name_value.length;
    if (name_length < 3 || name_length > 25) {
        document.getElementById('name_err').innerHTML = 'Value must not be less than 3 characters and greater than 25 characters';
        document.getElementById('name_err').style.color = "#FF0000";
    }
    else {
        document.getElementById('name_err').innerHTML = 'Valid name';
        document.getElementById('name_err').style.color = "#00AF33";
    }
}

function price_validation() {
    'use strict';
    var price = document.getElementById("price");
    var price_value = document.getElementById("price").value;
    if (price_value < 0.01 || price_value > 1000) {
        document.getElementById('price_err').innerHTML = 'Value must not be less than 0.01 and greater than 1000';
        document.getElementById('price_err').style.color = "#FF0000";
    }
    else {
        document.getElementById('price_err').innerHTML = 'Valid price';
        document.getElementById('price_err').style.color = "#00AF33";
    }
}

function category_validation() {
    'use strict';
    var only_numbers = '^[0-9]*$';
    var category = document.getElementById("category_select");
    var category_value = document.getElementById("category_select").value;
    if (category_value === "" || !category_value.match(only_numbers) ) {
        document.getElementById('category_select_err').innerHTML = 'You must select a category';
        document.getElementById('category_select_err').style.color = "#FF0000";
        country_name.focus();
    }
    else {
        document.getElementById('category_select_err').innerHTML = 'Category selected.';
        document.getElementById('category_select_err').style.color = "#00AF33";
    }
}

function username_validation() {
    'use strict';
    var username = document.getElementById("username");
    var username_value = document.getElementById("username").value;
    var username_length = username_value.length;
    if (username_length < 3 || username_length > 25) {
        document.getElementById('username_err').innerHTML = 'Username must not be less than 3 characters and greater than 25 characters';
        document.getElementById('username_err').style.color = "#FF0000";
    }
    else {
        document.getElementById('username_err').innerHTML = 'Valid username';
        document.getElementById('username_err').style.color = "#00AF33";
    }
}

function password_validation() {
    'use strict';
    var letters_numbers_speccial_chars = '^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})';
    var password = document.getElementById("password");
    var password_value = document.getElementById("password").value;
    var password_length = password_value.length;
    if (password_value === "" || !password_value.match(letters_numbers_speccial_chars)) {
        document.getElementById('password_err').innerHTML = 'Password must contain a lowercase character, an uppercase character, a special character and be atleast 8 characters long';
        document.getElementById('password_err').style.color = "#FF0000";
    }
    else {
        document.getElementById('password_err').innerHTML = 'Valid password';
        document.getElementById('password_err').style.color = "#00AF33";
    }
}

function passwordlogin_validation() {
    'use strict';
    var passwordlogin = document.getElementById("passwordlogin");
    var passwordlogin_value = document.getElementById("passwordlogin").value;
    var passwordlogin_length = passwordlogin_value.length;
    if (passwordlogin_value === null || passwordlogin_value === "") {
        document.getElementById('passwordlogin_err').innerHTML = 'Please enter a password';
        document.getElementById('passwordlogin_err').style.color = "#FF0000";
    }
    else {
        document.getElementById('passwordlogin_err').innerHTML = '';
    }
}

function contactname_validation() {
    'use strict';
    var contactname = document.getElementById("contactname");
    var contactname_value = document.getElementById("contactname").value;
    var contactname_length = contactname_value.length;
    if (contactname_length < 3 || contactname_length > 25) {
        document.getElementById('contactname_err').innerHTML = 'Name must not be less than 3 characters and greater than 25 characters';
        document.getElementById('contactname_err').style.color = "#FF0000";
    }
    else {
        document.getElementById('contactname_err').innerHTML = 'Valid Name';
        document.getElementById('contactname_err').style.color = "#00AF33";
    }
}

function contactemail_validation() {
    'use strict';
    var emailregex = '^[^@\s]+@[^@\s]+\.[^@\s]+$';
    var contactemail = document.getElementById("contactemail");
    var contactemail_value = document.getElementById("contactemail").value;
    var contactemail_length = contactemail_value.length;
    if (contactemail_value === "" || !contactemail_value.match(emailregex)) {
        document.getElementById('contactemail_err').innerHTML = 'Email must be valid';
        document.getElementById('contactemail_err').style.color = "#FF0000";
    }
    else {
        document.getElementById('contactemail_err').innerHTML = 'Valid Email';
        document.getElementById('contactemail_err').style.color = "#00AF33";
    }
}

function contactmessage_validation() {
    'use strict';
    var contactmessage = document.getElementById("contactmessage");
    var contactmessage_value = document.getElementById("contactmessage").value;
    var contactmessage_length = contactmessage_value.length;
    if (contactmessage_length < 20 || contactmessage_length > 1000) {
        document.getElementById('contactmessage_err').innerHTML = 'Message must not be less than 20 characters and greater than 1000 characters';
        document.getElementById('contactmessage_err').style.color = "#FF0000";
    }
    else {
        document.getElementById('contactmessage_err').innerHTML = 'Valid Message';
        document.getElementById('contactmessage_err').style.color = "#00AF33";
    }
}