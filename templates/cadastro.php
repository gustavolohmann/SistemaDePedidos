<?php
include_once("header.php");
?>

<div class="container_form_cliente">
    <div class="msn_alert_client"></div>
    <form class="form_cliente">
        <h1 id="titulo_form_1">Cadastro de cliente</h1>
        <div class="cad_cliente">
            <!--cad_cliente-->
            <div>
                <label for="nome_cliente">Razão Social:</label>
                <input type="text" name="nome_cliente" placeholder="Nome" required />
            </div>

            <div>
                <label for="CNPJ">CNPJ:</label>
                <input type="text" name="CNPJ" class="CNPJ" placeholder="CNPJ" required />
            </div>
            <div>
                <label for="Telefone">Telefone:</label>
                <input type="text" name="Telefone" placeholder="Telefone" required />
            </div>
            <div>
                <label for="Email">Email:</label>
                <input type="text" name="Email" placeholder="Email" required />
            </div>
            <!--fim cad_cliente-->
            <!--endereco-->
            <div>
                <label for="CEP">CEP:</label>
                <input type="text" name="CEP" placeholder="cep xxxxx-xxx" required />
            </div>
            <div>
                <label for="Cidade">Cidade:</label>
                <input type="text" name="Cidade" placeholder="Cidade" required />
            </div>
            <div>
                <label for="Rua">Endereço:</label>
                <input type="text" name="Rua" placeholder="Endereço" required />
            </div>
            <div>
                <label for="Estado">Estado:</label>
                <input type="text" name="Estado" placeholder="Estado" required />
            </div>

            <!--fim endereco-->
            <div class="submit">
                <button id="button_save_cliente" type="submit">Gravar</button>
            </div>
        </div>
    </form>
</div>
<?php
include_once("footer.php");
?>