document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('loginForm');
    const loadingDiv = document.getElementById('loading');
    const errorDiv = document.getElementById('error-message');

    const validUsername = 'TESTE';
    const validPassword = '12345';

    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        loadingDiv.style.display = 'block';

        setTimeout(() => {
            if (username === validUsername && password === validPassword) {

                loadingDiv.style.display = 'none';
                alert('Login bem-sucedido!');

            } else {

                loadingDiv.style.display = 'none';
                errorDiv.textContent = 'Usuário ou senha incorretos!';
                errorDiv.style.display = 'block';
                alert('Usuário ou senha incorretos!');
            }
        }, 5000);
    });
});