let notifications = document.querySelector('.notifications');
    let success = document.getElementById('success');
    let error = document.getElementById('error');
    let warning = document.getElementById('warning');
    let info = document.getElementById('info');
    
    function createToast(type, icon, title, text){
        let newToast = document.createElement('div');
        newToast.innerHTML = `
            <div class="toast ${type}">
                <i class="${icon}"></i>
                <div class="content">
                    <div class="title">${title}</div>
                    <span>${text}</span>
                </div>
                <i class="fa-solid fa-xmark" onclick="(this.parentElement).remove()"></i>
            </div>`;
        notifications.appendChild(newToast);
        newToast.timeOut = setTimeout(
            ()=>newToast.remove(), 5000
        )
    }
    success.onclick = function(){
        let type = 'success';
        let icon = 'fa-solid fa-circle-check';
        let title = 'Tudo certo!';
        let text = 'Todas as informações foram cadastradas corretamente.';
        createToast(type, icon, title, text);
    }
    error.onclick = function(alert){
        let type = 'error';''
        let icon = 'fa-solid fa-circle-exclamation';
        let title = 'Erro!';
        let text = 'O Codigo está invalido, tente novamente';
        createToast(type, icon, title, text);
    }
    warning.onclick = function(){
        let type = 'warning';
        let icon = 'fa-solid fa-triangle-exclamation';
        let title = 'Erro parcial!';
        let text = 'Por favor, verifique as suas informações.';
        createToast(type, icon, title, text);
    }
    info.onclick = function(){
        let type = 'info';
        let icon = 'fa-solid fa-circle-info';
        let title = 'Bem-vindo!';
        let text = 'Seja bem-vindo a plataforma!';
        createToast(type, icon, title, text);
    }