//fazendo a seta do menu (botão de abrir) fucionar. Abre e fecha o menu
document.getElementById('open-btn').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('open-sidebar');
})

//fazendo o botão de logout funcionar. Quando clicado, direciona o usuário à página principal (index.html)
document.getElementById("logout-btn").addEventListener("click", function() {
    window.location.href = "index.html";
});