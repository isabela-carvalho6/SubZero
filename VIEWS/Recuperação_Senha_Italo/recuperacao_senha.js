// Configuração do Intersection Observer
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

// Observer para fade in
const fadeInObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observer para animação sequencial das seções
const sequentialObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const sections = entry.target.querySelectorAll('.policy-section');
            sections.forEach((section, index) => {
                setTimeout(() => {
                    section.style.opacity = '1';
                    section.style.transform = 'translateX(0) scale(1)';
                }, index * 100); // Delay de 100ms entre cada seção
            });
        }
    });
}, observerOptions);

// Inicialização das animações
document.addEventListener('DOMContentLoaded', () => {
    // Animação do header
    const header = document.querySelector('header');
    if (header) {
        header.style.opacity = '0';
        header.style.transform = 'translateY(-30px)';
        header.style.transition = 'all 0.9s cubic-bezier(0.4, 0, 0.2, 1)';

        setTimeout(() => {
            header.style.opacity = '1';
            header.style.transform = 'translateY(0)';
        }, 100);
    }

    // Animação do container com bounce effect (scale + translateY)
    const container = document.querySelector('.container');
    if (container) {
        container.style.opacity = '0';
        container.style.transform = 'scale(0.9) translateY(50px)';
        container.style.transition = 'all 1.2s cubic-bezier(0.34, 1.56, 0.64, 1) 0.3s';

        setTimeout(() => {
            container.style.opacity = '1';
            container.style.transform = 'scale(1) translateY(0)';
        }, 300);
    }

    // Animação do título principal
    const mainTitle = document.querySelector('.container h1');
    if (mainTitle) {
        mainTitle.style.opacity = '0';
        mainTitle.style.transform = 'translateY(-30px) scale(0.9)';
        mainTitle.style.transition = 'all 1s cubic-bezier(0.34, 1.56, 0.64, 1) 0.6s';

        setTimeout(() => {
            mainTitle.style.opacity = '1';
            mainTitle.style.transform = 'translateY(0) scale(1)';
        }, 600);
    }

    // Agrupar seções de recuperação (igual ao politicas.js)
    const containerContent = document.querySelector('.container');
    if (containerContent) {
        const allElements = Array.from(containerContent.querySelectorAll('p, ul, br'));
        const sections = [];
        let currentSection = [];
        let skipFirst = true; // Pular título e data

        allElements.forEach((el, index) => {
            // Pular os dois primeiros parágrafos (título está em h1)
            if (skipFirst && el.tagName === 'P' && index < 3) {
                return;
            }
            skipFirst = false;

            if (el.tagName === 'BR') {
                if (currentSection.length > 0) {
                    sections.push(currentSection);
                    currentSection = [];
                }
            } else {
                currentSection.push(el);
            }
        });

        if (currentSection.length > 0) {
            sections.push(currentSection);
        }

        // Criar wrappers para cada seção (usando .policy-section)
        sections.forEach((section, index) => {
            const wrapper = document.createElement('div');
            wrapper.className = 'policy-section';
            wrapper.style.opacity = '0';
            wrapper.style.transform = 'translateX(-40px) scale(0.95)';
            wrapper.style.transition = 'all 0.7s cubic-bezier(0.34, 1.56, 0.64, 1)';
            wrapper.setAttribute('data-section', index + 1);

            // Criar container interno para conteúdo
            const contentWrapper = document.createElement('div');
            contentWrapper.className = 'section-content';

            section.forEach(el => {
                if (el.parentNode === containerContent) {
                    contentWrapper.appendChild(el);
                }
            });

            wrapper.appendChild(contentWrapper);
            containerContent.appendChild(wrapper);
        });

        // Observar para animar as seções
        sequentialObserver.observe(containerContent);
    }

    // Efeitos interativos nas seções
    setTimeout(() => {
        const sections = document.querySelectorAll('.policy-section');
        sections.forEach(section => {

            section.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(10px) scale(1.01)';
                this.style.backgroundColor = 'rgba(255, 255, 255, 0.04)';
            });

            section.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0) scale(1)';
                this.style.backgroundColor = 'transparent';
            });
        });
    }, 2000);

    // Efeito de highlight nos títulos das seções
    const strongElements = document.querySelectorAll('.section-content p strong');
    strongElements.forEach(strong => {
        strong.addEventListener('mouseenter', function() {
            this.style.letterSpacing = '1.5px';
            this.style.color = '#fff';
            this.style.textShadow = '0 0 25px rgba(255, 255, 255, 0.4)';
        });

        strong.addEventListener('mouseleave', function() {
            this.style.letterSpacing = '0.8px';
            this.style.color = '';
            this.style.textShadow = 'none';
        });
    });

    // Animar listas com efeito cascata
    const lists = document.querySelectorAll('.section-content ul');
    lists.forEach(list => {
        const items = list.querySelectorAll('li');
        items.forEach((item, idx) => {
            item.style.opacity = '0';
            item.style.transform = 'translateX(-20px)';
            item.style.transition = `all 0.5s ease-out ${idx * 0.1}s`;
        });

        const listObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const items = entry.target.querySelectorAll('li');
                    items.forEach(item => {
                        item.style.opacity = '1';
                        item.style.transform = 'translateX(0)';
                    });
                    listObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });

        listObserver.observe(list);
    });

    // Criar indicador de segurança animado
    const createSecurityIndicator = () => {
        const indicator = document.createElement('div');
        indicator.className = 'security-indicator';
        indicator.innerHTML = `
            <div class="security-icon"></div>
            <div class="security-text">
                <div class="security-title">Suas informações estão protegidas</div>
                <div class="security-subtitle">Usamos criptografia de ponta a ponta</div>
            </div>
        `;

        const containerEl = document.querySelector('.container');
        if (containerEl) {
            containerEl.appendChild(indicator);
            setTimeout(() => {
                indicator.style.opacity = '1';
                indicator.style.transform = 'translateY(0)';
            }, 1200);
        }
    };

    createSecurityIndicator();

    // Animação do footer
    const footer = document.querySelector('footer');
    if (footer) {
        footer.style.opacity = '0';
        footer.style.transform = 'translateY(30px)';
        footer.style.transition = 'all 0.9s ease-out';
        fadeInObserver.observe(footer);
    }
});

// Scroll suave
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

// Efeito parallax no scroll
let ticking = false;
window.addEventListener('scroll', () => {
    if (!ticking) {
        window.requestAnimationFrame(() => {
            const scrolled = window.pageYOffset;
            const container = document.querySelector('.container');
            const lockIcon = document.querySelector('.lock-icon');

            if (container) {
                if (scrolled > 100) {
                    container.style.boxShadow = '0 30px 80px rgba(255, 255, 255, 0.04)';
                } else {
                    container.style.boxShadow = '0 15px 50px rgba(0, 0, 0, 0.4)';
                }
            }

            if (lockIcon) {
                lockIcon.style.transform = `translateY(${scrolled * 0.08}px) rotate(${scrolled * 0.06}deg)`;
            }

            ticking = false;
        });
        ticking = true;
    }
});

// Loading suave
window.addEventListener('load', () => {
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.6s ease-out';
    setTimeout(() => {
        document.body.style.opacity = '1';
    }, 50);
});