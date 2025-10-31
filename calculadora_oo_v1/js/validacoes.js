function validarFormulario(){
    const cxV1 = document.querySelector("#valor1");
    const cxV2 = document.querySelector("#valor2");
    const v1 = cxV1.value.trim();
    const v2 = cxV2.value.trim();

    const numRegex = /^\s*[+-]?\d+(?:[\.,]\d+)?\s*$/;

    if(!numRegex.test(v1)){
        alert("Por favor, insira um valor válido no primeiro campo.");
        return false;
    }else if(!numRegex.test(v2)){
        alert("Por favor, insira um valor válido no segundo campo.");
        return false;
    }else{
        return true;
    }
}