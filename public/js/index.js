import { getSede } from './api.js';
document.addEventListener('DOMContentLoaded', () => { 
    const btnAgregar = document.getElementById('btnAgregar'); 
    const modalElement = document.getElementById('modal'); 
    const sedeModal = new bootstrap.Modal(modalElement); 
    const tablaSedeBody = document.querySelector('#tablaSede tbody');

    function cargarFormulario(sede) {
        document.getElementById('cod_sede').value = sede.cod_sede;
        document.getElementById('cod_ciudad').value = sede.cod_ciudad;
        document.getElementById('direccion').value = sede.direccion;
        document.getElementById('telefono').value = sede.telefono;
        document.getElementById('cod_director').value = sede.cod_director;
    }


    document.getElementById('form-sede').addEventListener('submit', async (e) => {
        e.preventDefault();

        const sede = {
            cod_sede: document.getElementById('cod_sede').value,
            cod_ciudad: document.getElementById('cod_ciudad').value,
            direccion: document.getElementById('direccion').value,
            telefono: document.getElementById('telefono').value,
            cod_director: document.getElementById('cod_director').value
        };

        const res = sede.cod_sede
            ? await updateSede(sede)
            : await insertSede(sede);

        if (res.estado === "success") {
            sedeModal.hide();
            cargarSedes();
            e.target.reset();
            document.getElementById('cod_sede').value = "";
        } else {
            alert("Error al guardar la sede.");
        }
    });


    btnAgregar.addEventListener('click', () => { 
        sedeModal.show(); });

        function renderizarTabla(sedes) { 
            tablaSedeBody.innerHTML = '';

            if (sedes.length > 0) {
                sedes.forEach(sede => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                    <td>${sede.cod_sede}</td>
                    <td>${sede.cod_ciudad}</td>
                    <td>${sede.direccion}</td>
                    <td>${sede.telefono}</td>
                    <td>${sede.cod_director}</td>
                    <td>
                        <button class="btn btn-sm btn-primary btn-editar" data-id="${sede.cod_sede}">Editar</button>
                        <button class="btn btn-sm btn-danger btn-eliminar" data-id="${sede.cod_sede}">Eliminar</button>
                    </td>
                    `;
                    tablaSedeBody.appendChild(row);
                });
            } else {
                tablaSedeBody.innerHTML = '<tr><td colspan="6">No hay sedes para mostrar.</td></tr>';
            }

        }

        function cargarSedes() { 
            
            tablaSedeBody.addEventListener('click', async (event) => {
            const editarBtn = event.target.closest('.btn-editar');
            const eliminarBtn = event.target.closest('.btn-eliminar');

            if (editarBtn) {
                const codSede = editarBtn.dataset.id;
                const sede = await getSede(codSede);
                if (sede.estado === "success") {
                cargarFormulario(sede.datos[0]);
                sedeModal.show();
                }
            }

            if (eliminarBtn) {
                const codSede = eliminarBtn.dataset.id;
                if (confirm("¿Estás seguro de que querés eliminar esta sede?")) {
                const res = await deleteSede(codSede);
                if (res.estado === "success") {
                    cargarSedes();
                } else {
                    alert("Error al eliminar la sede.");
                }
                }
            }
            });
            getSede() 
            .then(data => { 
                if (data.estado === "success") { renderizarTabla(data.datos); 

                } else { 
                    renderizarTabla([]); 
                } 
            }) 
            .catch(error => { 
                console.error('Error al cargar las sedes:', error); 
                tablaSedeBody.innerHTML = '<tr><td colspan="6">Error al conectar con el servidor.</td></tr>'; 
            });
        }

    cargarSedes(); 

});