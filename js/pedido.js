// pesquisa dentro de uma arquivo php table_pedido 
const tbody_table_pedido = document.querySelector(".tbody_table_pedido");
if (tbody_table_pedido) {
    async function table_pedido_home() {
        const obj_send = {
            method: "POST"
        }
        const url = "../config/table_pedido.php";
        const req = await fetch(url, obj_send);
        const res = await req.json();

        if (res) {
            tbody_table_pedido.innerHTML = res;
        }
    }
    table_pedido_home();
}

/*---passa valores para dentro do select status de pagamento---*/
const ContainerModal = document.querySelector(".container_modal");
const fecha_modal = document.querySelector("#fecha_modal");

function openModal() {
    ContainerModal.classList.add("classOpenModal");
}
function hidden() {
    ContainerModal.classList.remove("classOpenModal");
}
if (fecha_modal) { fecha_modal.addEventListener("click", hidden) }


const ContentModal = document.querySelector(".modal");
async function modal(id_pedido) {
    openModal();

    // const urls = {}
    const url = "../config/select_pedido.php";
    const obj_send = {
        method: "POST",
        body: new URLSearchParams({
            id: id_pedido
        })
    }
    const req = await fetch(url, obj_send);

    const res = await req.json();
    if (res) {
        ContentModal.innerHTML = res;
    }
}
/*
    Modal de mudança de horario
*/
const container_modal_finaliza = document.querySelector(".container_modal_finaliza");
const hidden_modal_finaliza_pedido = document.getElementById("hidden_modal_finaliza_pedido");

function open_menu_finaliza_pedido(id) {
    let input_finaliza = document.getElementById("input_finaliza").value = id;
    container_modal_finaliza.classList.add("anamtion_hidden_container_modal_finaliza");
}
function hidden_menu_finaliza_pedido() {
    container_modal_finaliza.classList.remove("anamtion_hidden_container_modal_finaliza");
}
if (hidden_modal_finaliza_pedido) {
    hidden_modal_finaliza_pedido.addEventListener("click", hidden_menu_finaliza_pedido);
}

const container_change_time = document.querySelector(".container_change_time");
const container_msn_datetime = document.querySelector(".container_msn_datetime");

if (container_change_time) {
    container_change_time.addEventListener("submit", async (e) => {
        e.preventDefault();
        const form_hora = new FormData(container_change_time);
        const url = "../config/insert_data_pedido.php";

        const obj_send = {
            method: "POST",
            body: form_hora
        }
        const req = await fetch(url, obj_send);
        const res = await req.json();
        if (res["Success"]) {
            container_msn_datetime.innerHTML = res["Success"];
        }
    });

}





