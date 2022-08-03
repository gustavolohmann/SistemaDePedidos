const _pesquisa_relatorio = document.querySelector("._pesquisa_relatorio");
const msn_error_report = document.querySelector(".msn_error_report");
if (_pesquisa_relatorio) {
    _pesquisa_relatorio.addEventListener("submit", async (e) => {
        e.preventDefault();

        const form_report = new FormData(_pesquisa_relatorio);

        const obj_send = {
            method: "POST",
            body: form_report
        }

        const url = "../config/relatorio.php";
        const req = await fetch(url, obj_send);
        const res = await req.json();

        if (res["error"]) {
            msn_error_report.innerHTML = res["error"];
        }
    });

}


