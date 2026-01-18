document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("editarUsuarioModal");
  const form = document.getElementById("formEditarUsuario");

  document.querySelectorAll(".editar-usuario").forEach((button) => {
    button.addEventListener("click", async () => {
      const userId = button.dataset.id;

      const response = await fetch(`usuario/getUserById&id=${userId}`);
      const usuario = await response.json();

      if (usuario.error) {
        alert(usuario.error);
        return;
      }

      form.usuario_id.value = usuario.usuario_id;
      form.nombres.value = usuario.nombres;
      form.apellidos.value = usuario.apellidos;
      form.email_editar.value = usuario.email;
      form.telefono.value = usuario.telefono;
    });
  });

  // Enviar formulario
  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(form);
    const response = await fetch(
      `usuario/actualizar&id=${formData.get("usuario_id")}`,
      {
        method: "POST",
        body: formData,
      }
    );

    if (response.ok) {
      alert("Usuario actualizado correctamente");
      location.reload();
    } else {
      alert("Error al actualizar el usuario");
    }
  });
});
