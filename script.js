document.addEventListener("DOMContentLoaded", () => {
  // Función para alternar entre la vista de nota corta y larga
  document.querySelectorAll(".toggle-nota").forEach((button) => {
    button.addEventListener("click", () => {
      const notaCorta = button.previousElementSibling.previousElementSibling;
      const notaLarga = button.previousElementSibling;

      // Alternar clases para mostrar/ocultar la nota completa
      notaCorta.classList.toggle("d-none");
      notaLarga.classList.toggle("d-none");

      // Cambiar el texto del botón
      button.textContent = notaLarga.classList.contains("d-none")
        ? "Leer más"
        : "Leer menos";
    });
  });

  // Validación de los formularios
  const agregarForm = document.getElementById("agregarnota");
  const editarForm = document.getElementById("editarNotaForm");

  const validarFormulario = (form) => {
    form.addEventListener("submit", (event) => {
      const name = form.querySelector("#name, #Nombre").value.trim();
      const username = form.querySelector("#username, #UserName").value.trim();
      const nota = form.querySelector("#nota, #Nota").value.trim();

      // Validaciones de campo vacío y longitud mínima
      if (name === "" || username === "" || nota === "") {
        alert("Todos los campos son obligatorios.");
        event.preventDefault();
        return;
      }
      if (name.length < 3) {
        alert("El nombre debe tener al menos 3 caracteres.");
        event.preventDefault();
        return;
      }
      if (username.length < 3) {
        alert("El username debe tener al menos 3 caracteres.");
        event.preventDefault();
        return;
      }
      if (nota.length < 10) {
        alert("La nota debe tener al menos 10 caracteres.");
        event.preventDefault();
        return;
      }
      if (nota.length > 500) {
        alert("La nota debe de tener menos de 500 caracteres");
        event.preventDefault();
        return;
      }
    });
  };

  // Aplica la validación si el formulario existe en la página
  if (agregarForm) validarFormulario(agregarForm);
  if (editarForm) validarFormulario(editarForm);
});
