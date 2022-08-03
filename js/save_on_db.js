/*---Guarda no banco de dados todos os dados de cliente---*/
const form_cliente = document.querySelector(".form_cliente");
const msn_alert_client = document.querySelector(".msn_alert_client");
if (form_cliente) {
    form_cliente.addEventListener("submit", async (e) => {
        e.preventDefault();

        const form_client = new FormData(form_cliente);

        const obj_send = {
            method: "POST",
            body: form_client
        }
        const url = "http://localhost:8000/config/index.php";

        const req = await fetch(url, obj_send);
        const res = await req.json();
        if (res["error"]) {
            msn_alert_client.innerHTML = res["error"];
        }
        if (res["Success"]) {
            msn_alert_client.innerHTML = res["Success"];
        }

    });
}
/*---Fim Guarda no banco de dados todos os dados de cliente---*/


/*---Guarda no banco de dados todos os dados de prestador---*/
const msn_alert = document.querySelector(".msn_alert");
const form_prestador = document.querySelector(".form_prestador");
if (form_prestador) {
    form_prestador.addEventListener("submit", async (e) => {
        e.preventDefault();

        const form = new FormData(form_prestador);

        const obj_send = {
            method: "POST",
            body: form
        }

        const url = "http://localhost:8000/config/cadastro_prestador.php";

        const req = await fetch(url, obj_send);
        const res = await req.json();
        if (res["error"]) {
            msn_alert.innerHTML = res["error"];
        }
        if (res["Success"]) {
            msn_alert.innerHTML = res["Success"];
        }

    });
}
/*---fim Gurda no banco de dados todos os dados de prestador---*/


// salvar no banco de dados todas as informaçoes de pedido
const form_pedido = document.querySelector(".form_pedido");
const container_form_pedido = document.querySelector(".container_form_pedido");
if (form_pedido) {
    form_pedido.addEventListener("submit", async (e) => {

        e.preventDefault();

        const FormPedido = new FormData(form_pedido);

        const url = "../config/cadastro_pedido.php";

        const obj_send = {
            method: "POST",
            body: FormPedido
        }
        const req = await fetch(url, obj_send);
        const res = await req.json();
        if (res["Success"]) {
            form_pedido.reset();
            container_form_pedido.innerHTML += res["Success"];
        }
    });
}

