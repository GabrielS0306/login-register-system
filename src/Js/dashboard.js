const toggleTheme = document.getElementById('toggleTheme');
const body = document.body;
const logout = document.querySelector('.logout');

toggleTheme.addEventListener('click', () => {
    body.classList.toggle('dark');

    if (body.classList.contains('dark')) {
        toggleTheme.textContent = "☀️";
    } else {
        toggleTheme.textContent = "🌙";
    }
});

logout.addEventListener('click', () => {
    alert("Sessão encerrada.");
    window.location.href = "login.html";
});
