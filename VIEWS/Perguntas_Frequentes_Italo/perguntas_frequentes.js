const observerOptions = {
    threshold: 0.1,
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

const sequentialObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const questions = entry.target.querySelectorAll('.question-block');
            questions.forEach((question, index) => {
                setTimeout(() => {
                    question.style.opacity = '1';
                    question.style.transform = 'translateX(0)';
                }, index * 150); 
            });
        }
    });
}, observerOptions);

document.addEventListener('DOMContentLoaded', () => {
    
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

    const container = document.querySelector('.container');
    if (container) {
        container.style.opacity = '0';
        container.style.transform = 'scale(0.95) translateY(30px)';
        container.style.transition = 'all 1s ease-out 0.3s';
        
        setTimeout(() => {
            container.style.opacity = '1';
            container.style.transform = 'scale(1) translateY(0)';
        }, 300);
    }

    const title = document.querySelector('.container h1');
    if (title) {
        title.style.opacity = '0';
        title.style.transform = 'translateY(-20px)';
        title.style.transition = 'all 0.8s ease-out 0.6s';
        
        setTimeout(() => {
            title.style.opacity = '1';
            title.style.transform = 'translateY(0)';
        }, 600);
    }

    const containerContent = document.querySelector('.container');
    if (containerContent) {
        const allParagraphs = Array.from(containerContent.querySelectorAll('p, br'));
        const questions = [];
        let currentBlock = [];

        allParagraphs.forEach(el => {
            if (el.tagName === 'BR') {
                if (currentBlock.length > 0) {
                    questions.push(currentBlock);
                    currentBlock = [];
                }
            } else if (el.querySelector('strong') || el.textContent.trim().length > 0) {
                currentBlock.push(el);
            }
        });

        if (currentBlock.length > 0) {
            questions.push(currentBlock);
        }

        questions.forEach((block, index) => {
            const wrapper = document.createElement('div');
            wrapper.className = 'question-block';
            wrapper.style.opacity = '0';
            wrapper.style.transform = 'translateX(-30px)';
            wrapper.style.transition = 'all 0.6s ease-out';
            
            block.forEach(el => {
                if (el.parentNode === containerContent) {
                    wrapper.appendChild(el);
                }
            });
            
            if (index === 0) {
                const firstParagraph = containerContent.querySelector('p');
                if (firstParagraph && firstParagraph.parentNode === containerContent) {
                    containerContent.insertBefore(wrapper, firstParagraph);
                } else {
                    containerContent.appendChild(wrapper);
                }
            } else {
                containerContent.appendChild(wrapper);
            }
        });

        sequentialObserver.observe(containerContent);
    }

    setTimeout(() => {
        const questionBlocks = document.querySelectorAll('.question-block');
        questionBlocks.forEach(block => {
            block.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(10px)';
                this.style.backgroundColor = 'rgba(255, 255, 255, 0.03)';
            });
            
            block.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
                this.style.backgroundColor = 'transparent';
            });
        });
    }, 2000);

    const footer = document.querySelector('footer');
    if (footer) {
        footer.style.opacity = '0';
        footer.style.transform = 'translateY(20px)';
        footer.style.transition = 'all 0.8s ease-out';
        fadeInObserver.observe(footer);
    }

    const questions = document.querySelectorAll('p strong');
    questions.forEach(question => {
        const paragraph = question.parentElement;
        
        paragraph.addEventListener('mouseenter', function() {
            question.style.color = '#fff';
            question.style.letterSpacing = '0.5px';
        });
        
        paragraph.addEventListener('mouseleave', function() {
            question.style.color = '';
            question.style.letterSpacing = '';
        });
    });

    const allParagraphs = document.querySelectorAll('.container p');
    allParagraphs.forEach(p => {
        if (!p.querySelector('strong')) {
            p.addEventListener('mouseenter', function() {
                this.style.paddingLeft = '20px';
                this.style.borderLeft = '3px solid rgba(255, 255, 255, 0.3)';
            });
            
            p.addEventListener('mouseleave', function() {
                this.style.paddingLeft = '0';
                this.style.borderLeft = 'none';
            });
        }
    });
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
    const scrolled = window.pageYOffset;
    const container = document.querySelector('.container');
    
    if (container && scrolled > 100) {
        container.style.boxShadow = '0 20px 60px rgba(255, 255, 255, 0.05)';
    } else if (container) {
        container.style.boxShadow = '0 10px 40px rgba(0, 0, 0, 0.3)';
    }
});

window.addEventListener('load', () => {
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.5s ease-out';
    
    setTimeout(() => {
        document.body.style.opacity = '1';
    }, 100);
});