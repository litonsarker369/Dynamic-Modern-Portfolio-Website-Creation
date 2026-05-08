document.addEventListener('DOMContentLoaded', function () {
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });

    const filterButtons = document.querySelectorAll('.btn-filter');
    const portfolioItems = document.querySelectorAll('.portfolio-item');

    if (filterButtons.length > 0) {
        filterButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                filterButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const filter = this.getAttribute('data-filter');

                portfolioItems.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = 'block';
                        item.style.animation = 'fadeIn 0.5s ease';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    }

    const toastEl = document.querySelector('.alert-success');
    if (toastEl) {
        setTimeout(() => {
            toastEl.style.transition = 'opacity 0.5s ease';
            toastEl.style.opacity = '0';
            setTimeout(() => toastEl.remove(), 500);
        }, 5000);
    }

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                const offset = 70;
                const top = target.getBoundingClientRect().top + window.pageYOffset - offset;
                window.scrollTo({ top, behavior: 'smooth' });
            }
        });
    });

    const navbar = document.querySelector('.navbar');
    if (navbar) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(15, 12, 41, 0.98)';
                navbar.style.boxShadow = '0 2px 20px rgba(0,0,0,0.3)';
            } else {
                navbar.style.background = 'rgba(15, 12, 41, 0.9)';
                navbar.style.boxShadow = 'none';
            }
        });
    }

    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    `;
    document.head.appendChild(style);
});
