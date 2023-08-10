/* 🌺🌺🌺🌺🌺🌺🌺🌺🌺🌺🌺🌺🌺🌺🌺🌺🌺🌺🌺🌺🌺🌺🌺🌺🌺🌺 */
/* Tools */

let f_name = document.getElementById('f_name');
let l_name = document.getElementById('l_name');
let e_mail = document.getElementById('e_mail');

let f_name_error = document.getElementById('f_name_error');
let l_name_error = document.getElementById('l_name_error');
let e_mail_error = document.getElementById('e_mail_error');

let f_name_error_after = window.getComputedStyle(f_name_error, "::after");
let f_name_error_before = window.getComputedStyle(f_name_error, "::before");

let l_name_error_after = window.getComputedStyle(l_name_error, "::after");
let l_name_error_before = window.getComputedStyle(l_name_error, "::before");

let e_mail_error_after = window.getComputedStyle(e_mail_error, "::after");
let e_mail_error_before = window.getComputedStyle(e_mail_error, "::before");

/* Verify */

f_name.addEventListener("textInput", f_name_Verify);
l_name.addEventListener("textInput", l_name_Verify);
e_mail.addEventListener("textInput", e_mail_Verify);

function validate() {
    if (f_name.value === '' || f_name.value === null){
        f_name.style.borderBottom = "3px solid red";
        f_name_error.style.setProperty('--display_f-name_after', 'block');
        f_name_error.style.setProperty('--display_f-name_before', 'block');
        f_name.focus();
        return false;
    }

    if (l_name.value === '' || l_name.value === null){
        l_name.style.borderBottom = "3px solid red";
        l_name_error.style.setProperty('--display_f-name_after', 'block');
        l_name_error.style.setProperty('--display_f-name_before', 'block');
        l_name.focus();
        return false;
    }

    if (e_mail.value === '' || e_mail.value === null){
        e_mail.style.borderBottom = "3px solid red";
        e_mail_error.style.setProperty('--display_f-name_after', 'block');
        e_mail_error.style.setProperty('--display_f-name_before', 'block');
        e_mail.focus();
        return false;
    }
}

function f_name_Verify()
{
    if(f_name.value.length > 2){
        f_name.style.borderBottom = "1px solid #999";
        f_name_error.style.setProperty('--display_f-name_after', 'none');
        f_name_error.style.setProperty('--display_f-name_before', 'none');
        return true;
    }
}

function l_name_Verify()
{
    if(l_name.value.length > 2){
        l_name.style.borderBottom = "1px solid #999";
        l_name_error.style.setProperty('--display_f-name_after', 'none');
        l_name_error.style.setProperty('--display_f-name_before', 'none');
        return true;
    }
}

function e_mail_Verify()
{
    if(e_mail.value.length > 7){
        e_mail.style.borderBottom = "1px solid #999";
        e_mail_error.style.setProperty('--display_f-name_after', 'none');
        e_mail_error.style.setProperty('--display_f-name_before', 'none');
        return true;
    }
}