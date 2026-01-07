const passwordField = document.getElementById("passwordRegister");
const togglePassword = document.getElementById("togglePassword");
const togglePasswordIcon = document.getElementById("togglePasswordIcon");

togglePassword.addEventListener("click", () => {
    const isPassword = passwordField.type === "password";
    passwordField.type = isPassword ? "text" : "password";
    togglePasswordIcon.classList.toggle("bi-eye");
    togglePasswordIcon.classList.toggle("bi-eye-slash");
});

// Validar contraseña y confirmación
const confirmPasswordField = document.getElementById("confirmPassword");
const passwordError = document.getElementById("passwordError");
const submitButton = document.getElementById("submitButton");

function validatePassword() {
    const password = passwordField.value;
    const confirmPassword = confirmPasswordField.value;

    // Requisitos: letra mayúscula, número y carácter especial
    const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$/;
    const isValid = passwordRegex.test(password);
    const passwordsMatch = password === confirmPassword;

    if (isValid && passwordsMatch) {
        passwordError.style.display = "none";
        submitButton.disabled = false;
    } else {
        passwordError.style.display = "block";
        submitButton.disabled = true;
    }
}

passwordField.addEventListener("input", validatePassword);
confirmPasswordField.addEventListener("input", validatePassword);