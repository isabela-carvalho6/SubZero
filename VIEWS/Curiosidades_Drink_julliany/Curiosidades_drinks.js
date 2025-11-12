 document.querySelectorAll('.drink-row').forEach(function(row) {
            row.addEventListener('mouseenter', function() {
                row.style.background = '#181818';
                row.style.transition = 'background 0.3s';
            });
            row.addEventListener('mouseleave', function() {
                row.style.background = 'transparent';
            });
        });

        // Exemplo de JS: alerta ao clicar no nome do drink
        document.querySelectorAll('.drink-info h2').forEach(function(title) {
            title.style.cursor = 'pointer';
            title.addEventListener('click', function() {
                alert('Você clicou em "' + title.textContent + '"!');
            });
        });