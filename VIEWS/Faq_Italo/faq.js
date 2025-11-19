const observerOptions = {
    threshold: 0.15,
    rootMargin: '0px 0px -50px 0px'
};

const fadeInObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

const helpLinksObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const links = entry.target.querySelectorAll('a');
            links.forEach((link, index) => {
                setTimeout(() => {
                    link.style.opacity = '1';
                    link.style.transform = 'translateX(0)';
                }, index * 100); // Delay de 100ms entre cada link
            });
        }
    });
}, observerOptions);

document.addEventListener('DOMContentLoaded', () => {
    
    // Animação do header
    const header = document.querySelector('header');
    if (header) {
        header.style.opacity = '0';
        header.style.transform = 'translateY(-20px)';
        header.style.transition = 'all 0.8s ease-out';
        
        setTimeout(() => {
            header.style.opacity = '1';
            header.style.transform = 'translateY(0)';
        }, 100);
    }

    const mainTitle = document.querySelector('.help-content h1');
    if (mainTitle) {
        mainTitle.style.opacity = '0';
        mainTitle.style.transform = 'translateY(30px)';
        mainTitle.style.transition = 'all 1s ease-out 0.3s';
        fadeInObserver.observe(mainTitle);
    }

    const searchBox = document.querySelector('.caixa-de-texto');
    if (searchBox) {
        searchBox.style.opacity = '0';
        searchBox.style.transform = 'scale(0.9) translateY(20px)';
        searchBox.style.transition = 'all 0.8s ease-out 0.5s';
        fadeInObserver.observe(searchBox);
    }

    const bgImage = document.querySelector('.background-image img');
    if (bgImage) {
        bgImage.style.opacity = '0';
        bgImage.style.transition = 'opacity 2s ease-out 0.8s';
        
        setTimeout(() => {
            bgImage.style.opacity = '0.2';
        }, 800);
    }

    const helpLinksContainer = document.querySelector('.help-links');
    if (helpLinksContainer) {
        const links = helpLinksContainer.querySelectorAll('a');
        
        links.forEach(link => {
            link.style.opacity = '0';
            link.style.transform = 'translateX(-30px)';
            link.style.transition = 'all 0.6s ease-out';
        });
        
        helpLinksObserver.observe(helpLinksContainer);
    }


    const footer = document.querySelector('footer');
    if (footer) {
        footer.style.opacity = '0';
        footer.style.transform = 'translateY(30px)';
        footer.style.transition = 'all 0.9s ease-out';
        fadeInObserver.observe(footer);
    }

    const helpLinks = document.querySelectorAll('.help-links a');
    helpLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(10px)';
            this.style.borderColor = '#444';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
            this.style.borderColor = '#222';
        });
    });

    const submitButton = document.querySelector('.caixa-de-texto button');
    if (submitButton) {
        submitButton.addEventListener('click', function(e) {
            e.preventDefault();
            
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);

            const input = document.querySelector('.caixa-de-texto input');
            if (input && input.value.trim() !== '') {
                const originalText = this.textContent;
                this.textContent = '✓';
                this.style.color = '#4CAF50';
                
                setTimeout(() => {
                    this.textContent = originalText;
                    this.style.color = '';
                    input.value = '';
                }, 2000);
            }
        });
    }

    const searchInput = document.querySelector('.caixa-de-texto input');
    if (searchInput) {
        searchInput.addEventListener('focus', function() {
            this.parentElement.style.boxShadow = '0 0 20px rgba(255, 255, 255, 0.1)';
            this.parentElement.style.transform = 'scale(1.02)';
        });
        
        searchInput.addEventListener('blur', function() {
            this.parentElement.style.boxShadow = 'none';
            this.parentElement.style.transform = 'scale(1)';
        });
    }
});

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

window.addEventListener('scroll', () => {
    const bgImage = document.querySelector('.background-image');
    if (bgImage) {
        const scrolled = window.pageYOffset;
        bgImage.style.transform = `translateY(${scrolled * 0.3}px)`;
    }
});