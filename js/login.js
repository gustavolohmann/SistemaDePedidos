
const login_ = document.querySelector(".login_");
const container_login = document.querySelector(".container_login");
if (login_) {
    login_.addEventListener("submit", (e) => {

        e.preventDefault();

        const form = new FormData(login_);

        const url = "http://localhost:8000/config/login.php";

        const metodo = "POST";

        const req = new XMLHttpRequest();

        req.open(metodo, url, true);

        req.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                const req_text = req.responseText;
                const json_resp = JSON.parse(req_text);

                if (json_resp["success"]) {

                    window.location.assign("http://localhost:8000/templates/index.php");
                }
                if (json_resp["error"]) {
                    container_login.innerHTML += json_resp["error"];
                }

            }
        }
        req.send(form);
    });
}


