document.addEventListener('DOMContentLoaded', function() {
    const backButton = document.querySelector('.back-button');
    
    backButton.addEventListener('click', function(e) {
        e.preventDefault();
        alert('Voltando para a página anterior...');
        // window.history.back(); // Descomente se quiser que funcione de verdade
    });
});
