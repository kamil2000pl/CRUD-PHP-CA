function category_name_validation() {
    'use strict';
    var category_name = document.getElementById("category_name");
    var category_value = document.getElementById("category_name").value;
    var category_length = category_value.length;
    if (category_length < 3 || category_length > 20) {
        document.getElementById('catname_err').innerHTML = 'Value must not be less than 3 characters and greater than 20 characters';
        document.getElementById('catname_err').style.color = "#FF0000";
        userid_name.focus();
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
        userid_name.focus();
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
        userid_name.focus();
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
        userid_name.focus();
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