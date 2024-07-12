const btn = document.querySelector('.btn');
const container = document.querySelector('.container');
const logo = document.getElementById('logo');
const toggle = document.querySelector('.toggle');

let darkModeEnabled = false; // Inicialmente o modo escuro está desativado

btn.onclick = function() {
    // Alterna a classe 'active' no botão e no container
    this.classList.toggle('active');
    container.classList.toggle('active');

    // Alterna o estado do modo escuro
    darkModeEnabled = !darkModeEnabled;

    // Chama a função para alterar a logo conforme o estado do modo escuro
    toggleLogoTheme();

    // Chama a função para alternar o tema conforme o estado do modo escuro
    toggleTheme();
}

function toggleTheme() {
    // Alterna a classe 'dark-mode' no toggle switch apenas quando o dark mode está ativado
    toggle.classList.toggle('dark-mode', darkModeEnabled);
}

function toggleLogoTheme() {
    // Defina os caminhos para as logos do tema claro e escuro
    const logoLightPath = '../assets/img/logo.png';
    const logoDarkPath = '../assets/img/logo-dark.png';

    // Alterne a src da logo com base no modo escuro ativado ou desativado
    if (darkModeEnabled) {
        logo.src = logoDarkPath;
    } else {
        logo.src = logoLightPath;
    }
}
