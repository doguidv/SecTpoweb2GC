"use strict"
const URL = "api/SecTpoweb2GCiPOLLETTI/";
let infopes = [];

let form = document.querySelector('#infop-form');
form.addEventListener('submit', insertTask);


/**
 * Obtiene todas las tareas de la API REST
 */
async function getAll() {
    try {
        let response = await fetch(URL);
        if (!response.ok) {
            throw new Error('Recurso no existe');
        }
        tasks = await response.json();

        showTasks();
    } catch(e) {
        console.log(e);
    }
}

/**
 * Inserta la tarea via API REST
 */
async function insertTask(e) {
    e.preventDefault();
    
    let data = new FormData(form);
    let task = {
        embarcado: data.get('embarcado'),
        tipo_embarcacion: data.get('tipo_embarcacion'),
        equipo_pesca: data.get('equipo_pesca'),
        carnada: data.get('carnada'),
        pesca: data.get('pesca'),
        Detalles_Pesca: data.get('Detalles_Pesca'),
        id_localidad_fk: data.get('id_localidad_fk'),
  
    };

    try {
        let response = await fetch(URL, {
            method: "POST",
            headers: { 'Content-Type': 'application/json'},
            body: JSON.stringify(task)
        });
        if (!response.ok) {
            throw new Error('Error del servidor');
        }

        let nTask = await response.json();

        // inserto la tarea nuevo
        tasks.push(nTask);
        showTasks();

        form.reset();
    } catch(e) {
        console.log(e);
    }
} 

async function deleteTask(e) {
    e.preventDefault();
    try {
        let id = e.target.dataset.task;
        let response = await fetch(URL + id, {method: 'DELETE'});
        if (!response.ok) {
            throw new Error('Recurso no existe');
        }

        // eliminar la tarea del arreglo global
        tasks = tasks.filter(task => task.id != id);
        showTasks();
    } catch(e) {
        console.log(e);
    }
}

function showTasks() {
    let ul = document.querySelector("#infop-list");
    ul.innerHTML = "";
    for (const infopes of infop) {

        let html = `
            <li class=''>
                <span> <b>${infop.tipo_embarcacion}</b> - ${infop.equipo_pesca} (prioridad ${infop.carnada}) </span>
                <div class="ml-auto">
                     </div>
            </li>
        `;

        ul.innerHTML += html;
    }

    // asigno event listener para los botones
    const btnsDelete = document.querySelectorAll('a.btn-delete');
    for (const btnDelete of btnsDelete) {
        btnDelete.addEventListener('click', deleteTask);
    }
}

getAll();