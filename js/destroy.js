//destroi sessao
const destroy_ = document.querySelector(".destroy_sessio_form");
if (destroy_) {

    destroy_.addEventListener("submit", async (e) => {
        e.preventDefault();
        const form_session = new FormData(destroy_);
        const url = "http://localhost:8000/config/destroy.php";
        const obj_send = {
            method: "POST",
            body: form_session
        }
        const req = await fetch(url, obj_send);
        const res = await req.json();

        if (res["finaliza_sessao"]) {
            window.location.assign("http://localhost:8000/templates/login.php");
        }

    })
}
