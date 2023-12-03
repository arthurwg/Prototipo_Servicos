function fixaBarra() {
    var barra = document.getElementById("listagem-barra");
  
    if (barra) {
      var sticky = barra.offsetTop;
  
      window.onscroll = function() {
        fixa();
      };
  
      function fixa() {
        if (window.scrollY >= sticky) {
          barra.classList.add("fixado");
        } else {
          barra.classList.remove("fixado");
        }
      }
    } else {
      console.error("Elemento com ID 'listagem-barra' não encontrado.");
    }
  }
