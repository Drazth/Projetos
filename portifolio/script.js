let lastScrollTop = 0;
const navbar = document.getElementById('navbar');

window.addEventListener('scroll', function() {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
        // Rolando para baixo
        navbar.classList.add('hidden');
        
    } else {
        // Rolando para cima
        navbar.classList.remove('hidden');
        navbar.style.width = ''
    }
});

function toggleMenu() {
    navbar.classList.toggle('hidden');
    document.getElementById('navbar').style.width = '10%';
}

function proximo(evt) {
    // Remover 'active' das classes 'a' do elemento navbar

    var links = navbar.getElementsByTagName('a');
    for (var i = 0; i < links.length; i++) {
      links[i].classList.remove('active');
    }
  
    // Add 'active' na classe elemento (evt)
    evt.classList.add('active');
  }

// Adicione uma variável para armazenar a seção atual
let currentSection = null;

// Adicione uma função para verificar a seção atual
function checkSection() {
  const sections = document.querySelectorAll('section');
  const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  sections.forEach((section) => {
    const sectionTop = section.offsetTop;
    const sectionHeight = section.offsetHeight;

    if (scrollTop >= sectionTop && scrollTop < sectionTop + sectionHeight) {
      const sectionId = section.id;
      const link = navbar.querySelector(`a[href="#${sectionId}"]`);

      if (link) {
        // Remova o active das classes 'a' do elemento navbar
        var links = navbar.getElementsByTagName('a');
        for (var i = 0; i < links.length; i++) {
          links[i].classList.remove('active');
        }

        // Adicione o active na classe elemento (link)
        link.classList.add('active');

        // Atualize a seção atual
        currentSection = sectionId;
      }
    }
  });
}

// Adicione a função checkSection ao evento de rolagem
window.addEventListener('scroll', function() {
  let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  if (scrollTop > lastScrollTop) {
    // Rolando para baixo
    navbar.classList.add('hidden');
  } else {
    // Rolando para cima
    navbar.classList.remove('hidden');
    navbar.style.width = ''
  }

  checkSection();
});