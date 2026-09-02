(() => {
  if (window.lucide) window.lucide.createIcons();

  const toggle = document.querySelector('.nav-toggle');
  const nav = document.getElementById('mainNav');
  if (toggle && nav) {
    toggle.addEventListener('click', () => {
      const open = toggle.getAttribute('aria-expanded') === 'true';
      toggle.setAttribute('aria-expanded', String(!open));
      nav.classList.toggle('open', !open);
      document.body.classList.toggle('nav-open', !open);
    });
    nav.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
      toggle.setAttribute('aria-expanded', 'false');
      nav.classList.remove('open');
      document.body.classList.remove('nav-open');
    }));
  }

  const slider = document.querySelector('[data-slider]');
  if (slider) {
    const slides = Array.from(slider.querySelectorAll('[data-slide]'));
    const dots = Array.from(slider.querySelectorAll('[data-slide-to]'));
    const previous = slider.querySelector('[data-slide-prev]');
    const next = slider.querySelector('[data-slide-next]');
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    let activeIndex = 0;
    let timer;

    const showSlide = index => {
      activeIndex = (index + slides.length) % slides.length;
      slides.forEach((slide, slideIndex) => {
        const isActive = slideIndex === activeIndex;
        slide.classList.toggle('is-active', isActive);
        slide.setAttribute('aria-hidden', String(!isActive));
      });
      dots.forEach((dot, dotIndex) => {
        const isActive = dotIndex === activeIndex;
        dot.classList.toggle('is-active', isActive);
        dot.setAttribute('aria-current', String(isActive));
      });
    };

    const stopAutoplay = () => window.clearInterval(timer);
    const startAutoplay = () => {
      stopAutoplay();
      if (!reduceMotion) timer = window.setInterval(() => showSlide(activeIndex + 1), 6500);
    };

    dots.forEach(dot => dot.addEventListener('click', () => {
      showSlide(Number(dot.dataset.slideTo));
      startAutoplay();
    }));
    if (previous) {
      previous.addEventListener('click', () => {
        showSlide(activeIndex - 1);
        startAutoplay();
      });
    }
    if (next) {
      next.addEventListener('click', () => {
        showSlide(activeIndex + 1);
        startAutoplay();
      });
    }
    slider.addEventListener('keydown', event => {
      if (event.key === 'ArrowLeft') showSlide(activeIndex - 1);
      if (event.key === 'ArrowRight') showSlide(activeIndex + 1);
    });
    slider.addEventListener('mouseenter', stopAutoplay);
    slider.addEventListener('mouseleave', startAutoplay);
    slider.addEventListener('focusin', stopAutoplay);
    slider.addEventListener('focusout', startAutoplay);
    document.addEventListener('visibilitychange', () => document.hidden ? stopAutoplay() : startAutoplay());
    startAutoplay();
  }

  document.querySelectorAll('.faq-item button').forEach(button => {
    button.addEventListener('click', () => {
      const item = button.closest('.faq-item');
      const expanded = button.getAttribute('aria-expanded') === 'true';
      button.setAttribute('aria-expanded', String(!expanded));
      item.classList.toggle('open', !expanded);
      const sign = button.querySelector('b');
      if (sign) sign.textContent = expanded ? '+' : '−';
    });
  });

  document.querySelectorAll('form.site-form').forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault();
        form.classList.add('validated');
        const firstInvalid = form.querySelector(':invalid');
        if (firstInvalid) firstInvalid.focus();
        return;
      }
      const button = form.querySelector('button[type="submit"]');
      if (button) {
        button.disabled = true;
        button.dataset.originalText = button.textContent;
        button.textContent = 'Sending…';
      }
    });
  });

  const cookieConsent = document.querySelector('[data-cookie-consent]');
  if (cookieConsent) {
    let cookieChoice = '';
    try {
      cookieChoice = window.localStorage.getItem('jayden_cookie_choice') || '';
    } catch (error) {
      cookieChoice = '';
    }

    if (!cookieChoice) {
      cookieConsent.hidden = false;
      document.body.classList.add('cookie-open');
    }

    cookieConsent.querySelectorAll('[data-cookie-choice]').forEach(button => {
      button.addEventListener('click', () => {
        try {
          window.localStorage.setItem('jayden_cookie_choice', button.dataset.cookieChoice);
        } catch (error) {
          // The banner can still be dismissed when browser storage is unavailable.
        }
        cookieConsent.hidden = true;
        document.body.classList.remove('cookie-open');
      });
    });
  }
})();
