document.getElementById('planificacion').onchange = function(){
        location.href="/user/planesUsuario/"+document.getElementById('planificacion').value;
    };