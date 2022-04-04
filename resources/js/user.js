const form = document.getElementById('form');
const inputs = document.querySelectorAll('#form input');

const expresiones = {
    identification: /^[a-zA-Z0-9\_\-]{9,16}$/, // Letras, numeros, guion y guion_bajo
	name: /^[a-zA-ZÀ-ÿ\s]{1,30}$/, // Letras y espacios, pueden llevar acentos.
    last_name: /^[a-zA-ZÀ-ÿ\s]{1,30}$/, // Letras y espacios, pueden llevar acentos.
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	phone: /^\d{8}$/, //  8 numeros.
    city: /^[a-zA-Z0-9\_\-]{1,16}$/, // Letras, numeros, guion y guion_bajo
    address: /^[a-zA-Z0-9\_\-]{1,255}$/, // Letras, numeros, guion y guion_bajo
    contract_number: /^[a-zA-Z0-9\_\-]{1,20}$/, // Letras, numeros, guion y guion_bajo
    contract_year: /^\d{1,3}$/, //  1 a 3 numeros.
    experience: /^\d{1,3}$/ //  1 a 3 numeros.
}

const formValidation = (e) => {
	switch(e.target.name){
        case "identification":
            console.log('"Skbhjb"');
        break;
    }
}

inputs.forEach((input) => {
	input.addEventListener('keyup', formValidation);
	input.addEventListener('blur', formValidation);
});
