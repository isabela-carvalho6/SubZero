const inputs = [
    document.getElementById("dia"),
    document.getElementById("mes"),
    document.getElementById("ano")
];
const btn = document.getElementById("btnEntrar");

const aviso = document.createElement("div");
aviso.id = "aviso";
document.body.appendChild(aviso);

function mostrarAviso(mensagem, tipo = "erro") {
    aviso.textContent = mensagem;
    aviso.className = `mostrar ${tipo}`;
    setTimeout(() => {
        aviso.classList.remove("mostrar");
    }, 4000);
}

inputs.forEach((input, index) => {
    input.addEventListener("keydown", (e) => {
        if (e.key === "Enter") {
            e.preventDefault();
            if (index < inputs.length - 1) {
                inputs[index + 1].focus();
            } else {
                verificarIdade();
            }
        }
    });
});

btn.addEventListener("click", verificarIdade);

function verificarIdade() {
    const dia = parseInt(inputs[0].value, 10);
    const mes = parseInt(inputs[1].value, 10);
    const ano = parseInt(inputs[2].value, 10);

    if (!dia || !mes || !ano) {
        mostrarAviso("Por favor, preencha sua data de nascimento completa!", "aviso");
        return;
    }

    const nascimento = new Date(ano, mes - 1, dia);
    if (
        nascimento.getDate() !== dia ||
        nascimento.getMonth() !== mes - 1 ||
        nascimento.getFullYear() !== ano
    ) {
        mostrarAviso("Data de nascimento inválida!", "erro");
        return;
    }

    const hoje = new Date();
    let idade = hoje.getFullYear() - nascimento.getFullYear();
    const m = hoje.getMonth() - nascimento.getMonth();
    if (m < 0 || (m === 0 && hoje.getDate() < nascimento.getDate())) {
        idade--;
    }

    if (idade >= 18) {
        mostrarAviso("Acesso liberado! Aproveite com moderação", "sucesso");
        setTimeout(() => {
            window.location.href = "../Home_Italo/home.html";
        }, 2000);
    } else {
        mostrarAviso("Desculpe, você precisa ter pelo menos 18 anos para acessar", "erro");
    }
}
