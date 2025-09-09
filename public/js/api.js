const API_BASE = "http://page-ong/index.php";

async function apiRequest(metodoEjecutar, data = {}) {
    const res = await fetch(`${API_BASE}/${metodoEjecutar}`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data)
    });
    return res.json();
}


async function getSede(filter = "") {
    return apiRequest("get", { filter });
}

async function insertSede(sede) {
    return apiRequest("insert", sede);
}

async function updateSede(sede) {
    return apiRequest("update", sede);
}

async function deleteSede(codSede) {
    return apiRequest("delete", { cod_sede: codSede });
}
