// Show password
document.querySelectorAll(".pass").forEach(value => {
    value.addEventListener('click', showPassword => {

    let x = value.parentNode.parentNode.previousElementSibling;

if(x.type == 'password'){
    x.type = 'text';
} else if(x.type === 'text'){
    x.type = 'password';
 }
});
});