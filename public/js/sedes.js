import APIs from "./apis.js";

const api = new APIs();

// Obtener todas las sedes
async function cargarSedes() {
    const response = await api.call("/backend/sedes.php/get", {}, "GET");
    if (response.estado === "success") {
        console.log(response.datos); // array de sedes
    } else {
        console.error(response.mensaje);
    }
}

// Crear una sede
async function crearSede(nuevaSede) {
    const response = await api.call("/backend/sedes.php/insert", nuevaSede, "POST", true);
    console.log(response);
}