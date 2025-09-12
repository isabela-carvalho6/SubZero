document.getElementById("btnEntrar").addEventListener("click", verificarIdade);

function verificarIdade() {
  const dia = document.getElementById("dia").value;
  const mes = document.getElementById("mes").value;
  const ano = document.getElementById("ano").value;

  if (!dia || !mes || !ano) {
    alert("Por favor, preencha sua data de nascimento completa!");
    return;
  }

  const hoje = new Date();
  const nascimento = new Date(`${ano}-${mes}-${dia}`);
  let idade = hoje.getFullYear() - nascimento.getFullYear();
  const m = hoje.getMonth() - nascimento.getMonth();

  if (m < 0 || (m === 0 && hoje.getDate() < nascimento.getDate())) {
    idade--;
  }

  if (idade >= 18) {
    alert("Acesso liberado! 🍹");
    window.location.href = ""; // redireciona para a página principal
  } else {
    alert("Desculpe, você precisa ter pelo menos 18 anos para acessar.");
  }
}
