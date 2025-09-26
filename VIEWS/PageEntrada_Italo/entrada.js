
document.getElementById("btnEntrar").addEventListener("click", verificarIdade);

function verificarIdade() {
  const dia = parseInt(document.getElementById("dia").value, 10);
  const mes = parseInt(document.getElementById("mes").value, 10);
  const ano = parseInt(document.getElementById("ano").value, 10);

  // Verifica se todos os campos foram preenchidos
  if (!dia || !mes || !ano) {
    alert("Por favor, preencha sua data de nascimento completa!");
    return;
  }

  // Cria a data de nascimento no formato correto (mês - 1 pois Date usa 0-11)
  const nascimento = new Date(ano, mes - 1, dia);

  // Valida se a data digitada é real
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
    alert("Acesso liberado! 🍹");
    // Redirecione para sua página principal
    window.location.href = "index.html";
  } else {
    alert("Desculpe, você precisa ter pelo menos 18 anos para acessar.");
  }
}

