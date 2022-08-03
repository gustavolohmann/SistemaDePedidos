//modal da pagina de pedido
//.class_animation_modal_search_client
const constainer_pesquisa_cliente = document.querySelector(".constainer_pesquisa_cliente");
const button_open_modal_inside_pedido = document.getElementById("button_open_modal_inside_pedido");
function open_modal() {
    constainer_pesquisa_cliente.classList.add("class_animation_modal_search_client");
}
if (button_open_modal_inside_pedido) {
    button_open_modal_inside_pedido.addEventListener("click", open_modal);
}

function hidden_modal() {
    constainer_pesquisa_cliente.classList.remove("class_animation_modal_search_client");
}

if (button_hidden_modal_pedido) {
    button_hidden_modal_pedido.addEventListener("click", hidden_modal);
}
//pesquisa um cliente
const data = document.getElementById("pesquisa_cliente");
const table = document.querySelector(".table");
const button_cliente = document.getElementById("button_cliente");
async function search_client() {

    if (data.value) {
        const url = "../config/procura.php";
        const obj_send = {
            method: "POST",
            body: new URLSearchParams({
                data: data.value,
            })
        }
        const req = await fetch(url, obj_send);
        const res = await req.json();
        if (res) {
            table.innerHTML = res;
        }
    }
    if (!data.value) {
        table.innerHTML = "<div class='error_search_client'><p>Não foi possível localizar nenhum cliente</p></div>";
    }

}
if (button_cliente) {
    button_cliente.addEventListener("click", search_client);
}
/*---Fim pesquisa pedido---*/

/*---Faz pesquisa na tabela prestador---*/
const data_prestador = document.getElementById("pesquisa_prestador");
const button_prestador = document.getElementById("button_prestador");
const tablePrestador = document.querySelector(".tablePrestador");
async function pesquisaPrestador() {

    if (data_prestador.value) {
        const url = "../config/procura_prestador.php";
        const obj_send = {
            method: "POST",
            body: new URLSearchParams({
                dataPrestador: data_prestador.value,
            })
        }

        const req = await fetch(url, obj_send);
        const res = await req.json();
        if (res) {
            tablePrestador.innerHTML = res;
        }
    }
    if (!data_prestador.value) {
        tablePrestador.innerHTML = "<div class='error_search_client'><p>Não foi possível localizar nenhum prestador</p></div>";
    }
}
if (data_prestador) {
    button_prestador.addEventListener("click", pesquisaPrestador);
}
/* fim do codigo de pesquisa */


