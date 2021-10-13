//Archivo de funciones de JavaScript, Cuidado con moverle mucho!!!

function confirmar() {
    if (confirm("Va a eliminar un registro, ¿está usted seguro?")) {
        return true;
    }
    return false;
}

function confirmarModificar(){
    if (confirm("Va a Modificar un registro, ¿está usted seguro?")) {
        return true;
    }
    return false;
}

