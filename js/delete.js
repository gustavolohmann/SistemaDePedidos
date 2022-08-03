async function form_delete(id) {

    const url = "../config/finaliza_pedido.php";
    const obj_send = {
        method: "POST",
        body: new URLSearchParams({
            id: id
        })
    }
    const req = await fetch(url, obj_send);
    const res = await req.json();
}