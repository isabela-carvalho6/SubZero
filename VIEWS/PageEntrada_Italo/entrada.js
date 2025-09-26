
document.getElementById("btnEntrar").addEventListener("click", verificarIdade);

function verificarIdade() {
  const dia = parseInt(document.getElementById("dia").value, 10);
  const mes = parseInt(document.getElementById("mes").value, 10);
  const ano = parseInt(document.getElementById("ano").value, 10);

 
  if (!dia || !mes || !ano) {
    alert("Por favor, preencha sua data de nascimento completa!");
    return;
  }


  const nascimento = new Date(ano, mes - 1, dia);

 
  if (nascimento.getDate() !== dia || nascimento.getMonth() !== mes - 1 || nascimento.getFullYear() !== ano) {
    alert("Data de nascimento inválida!");
    return;
  }

  const hoje = new Date();
  let idade = hoje.getFullYear() - nascimento.getFullYear();
  const m = hoje.getMonth() - nascimento.getMonth();

  if (m < 0 || (m === 0 && hoje.getDate() < nascimento.getDate())) {
    idade--;
  }

  if (idade >= 18) {
    alert("Acesso liberado! Aproveite com moderação.");

    window.location.href = "index.html";
  } else {
    alert("Desculpe, você precisa ter pelo menos 18 anos para acessar.");
  }
}

