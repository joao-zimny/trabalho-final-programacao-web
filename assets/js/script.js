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
///////////////////////////////////////
