var modal = document.getElementById("miModal");

var cerrarModal = document.getElementsByClassName("cerrar")[0];



function abrirModal() {

    modal.style.display = "block"
}


 cerrarModal.addEventListener("click",function() {
    modal.style.display = "none";
  });
  // Si el usuario hace clic fuera de la ventana, se cierra.
  window.addEventListener("click",function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  });

