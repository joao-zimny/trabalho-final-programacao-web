// Alterando placeholder da chave PIX
const select = document.getElementById("tipo-chave");
const input = document.getElementById("tipo-chave-input");

input.placeholder = "000.000.000-00";

select.addEventListener('change', () => {
    if (select.value === 'cpf') {
        input.placeholder = "000.000.000-00";
    }
    if (select.value === 'telefone') {
        input.placeholder = "(00) 99999-9999";
    }
});

// Validações
function validarValorDigitado() {
    const value = document.getElementById("valor").value;
    if (value === "") {
        alert("Digite algum valor!");
        return false;
    }
    if (+value <= 0) {
        alert("Digite um valor maior do que R$0!");
        return false;
    }
    return true;
}

function validarPix() {
    const tipoChave = document.getElementById("tipo-chave").value;
    const chaveDigitada = document.getElementById("tipo-chave-input").value;
    if (tipoChave === "" || chaveDigitada === "") {
        alert("Digite uma chave!");
        return false;
    }
    
    if (validarValorDigitado() == true) {
        return true;
    } else {
        return false;
    }
    // const value = document.getElementById("valor").value;
    // if (value === "") {
    //     alert("Digite algum valor!");
    //     return false;
    // }
    // if (+value <= 0) {
    //     alert("Digite um valor maior do que R$0!");
    //     return false;
    // }
    // return true;
}