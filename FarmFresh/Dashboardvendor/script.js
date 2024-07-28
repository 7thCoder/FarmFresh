document.addEventListener('DOMContentLoaded', function () {
    const accordions = document.querySelectorAll('.accordion');
  
    accordions.forEach(accordion => {
      const header = accordion.querySelector('.accordion-header');
  
      header.addEventListener('click', function () {
        accordion.classList.toggle('active');
        const content = accordion.querySelector('.accordion-content');
        if (accordion.classList.contains('active')) {
          content.style.display = 'block';
        } else {
          content.style.display = 'none';
        }
      });
    });
  });
  