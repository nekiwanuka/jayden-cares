(() => {
  if (window.lucide) window.lucide.createIcons();

  const revealItems = document.querySelectorAll('.section-heading, .feature-media-card, .service-media-card, .service-detail, .team-card, .tip-card, .step, .contact-tile, .final-cta-box');
  if (revealItems.length && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    const revealObserver = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -35px' });
    revealItems.forEach((item, index) => {
      item.classList.add('reveal-ready');
      item.style.transitionDelay = `${Math.min(index % 4, 3) * 70}ms`;
      revealObserver.observe(item);
    });
  }

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
    nav.querySelectorAll('.submenu-toggle').forEach(button => button.addEventListener('click', () => {
      const dropdown = button.closest('.nav-dropdown');
      const expanded = button.getAttribute('aria-expanded') === 'true';
      nav.querySelectorAll('.nav-dropdown.open').forEach(openDropdown => {
        openDropdown.classList.remove('open');
        openDropdown.querySelector('.submenu-toggle').setAttribute('aria-expanded', 'false');
      });
      if (!expanded && dropdown) {
        dropdown.classList.add('open');
        button.setAttribute('aria-expanded', 'true');
      }
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

  const internshipPopup = document.querySelector('[data-internship-popup]');
  if (internshipPopup) {
    let popupSeen = false;
    try {
      popupSeen = window.sessionStorage.getItem('jayden_internship_popup_seen') === 'true';
    } catch (error) {
      popupSeen = false;
    }

    const showInternshipPopup = () => {
      if (popupSeen || typeof internshipPopup.showModal !== 'function') return;
      popupSeen = true;
      try {
        window.sessionStorage.setItem('jayden_internship_popup_seen', 'true');
      } catch (error) {
        popupSeen = true;
      }
      internshipPopup.showModal();
    };

    internshipPopup.querySelector('[data-internship-popup-close]').addEventListener('click', () => internshipPopup.close());
    internshipPopup.addEventListener('click', event => {
      if (event.target === internshipPopup) internshipPopup.close();
    });

    if (cookieConsent && !cookieConsent.hidden) {
      cookieConsent.addEventListener('click', event => {
        if (!event.target.closest('[data-cookie-choice]')) return;
        window.setTimeout(showInternshipPopup, 1200);
      });
    } else {
      window.setTimeout(showInternshipPopup, 4000);
    }
  }
})();
