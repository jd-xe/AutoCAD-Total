/*document
  .getElementById("loginForm")
  .addEventListener("submit", async function (event) {
    event.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const loginError = document.getElementById("loginError");

    const response = await fetch("https://autocadtotal.com/auth/login", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ email, password }),
    });

    const data = await response.json();
    console.log("Respuesta del servidor:", data);

    if (data.success) {
      loginError.style.display = "none";
      window.location.href = data.redirect;
    } else {
      loginError.textContent = data.message;
      loginError.style.display = "block";
    }
  });
*/
