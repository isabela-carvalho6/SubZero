document.getElementById('cadastroBarForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const nome = document.getElementById('nome').value.trim();
            const email = document.getElementById('email').value.trim();
            const cep = document.getElementById('cep').value.trim();
            const tipo = document.getElementById('tipo').value.trim();
            const senha = document.getElementById('senha').value.trim();
            const mensagem = document.getElementById('mensagem');

            if (!nome || !email || !cep || !tipo || !senha) {
                mensagem.textContent = "Preencha todos os campos!";
                mensagem.style.color = "#ff5555";
                mensagem.style.display = "block";
                return;
            }

            mensagem.textContent = "Cadastro realizado com sucesso!";
            mensagem.style.color = "#23b7d9";
            mensagem.style.display = "block";

            setTimeout(() => {
                mensagem.style.display = "none";
                document.getElementById('cadastroBarForm').reset();
            }, 2000);
        });
 