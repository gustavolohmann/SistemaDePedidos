<?php
include_once("header.php");
?>
<div class="container_prestador">
    <div class="msn_alert"></div>
    <form class="form_prestador">
        <h1 id="titulo_form_prestador">Cadastro de prestador</h1>
        <div class="cad_prestador">
            <div>
                <label for="nome_prestador">Nome:</label>
                <input type="text" name="nome_prestador" required placeholder="Nome">
            </div>

            <div>
                <label for="documento">Documento:</label>
                <input type="text" name="documento" required placeholder="Documento">
            </div>

            <div>
                <label for="Telefone_prestador">Telefone:</label>
                <input type="text" name="Telefone_prestador" required placeholder="Telefone">
            </div>

            <div>
                <label for="Email_prestador">Email:</label>
                <input type="text" name="Email_prestador" required placeholder="Email">
            </div>
            <!--endeceço -->
            <div>
                <label for="cep_prestador">CEP:</label>
                <input type="text" name="cep_prestador" required placeholder="cep xxxxx-xxx">
            </div>

            <div>
                <label for="cidade_prestador">Cidade:</label>
                <input type="text" name="cidade_prestador" required placeholder="Cidade">
            </div>

            <div>
                <label for="rua_prestador">Rua:</label>
                <input type="text" name="rua_prestador" required placeholder="Rua">
            </div>

            <div>
                <label for="estado_prestador">Estado:</label>
                <input type="text" name="estado_prestador" required placeholder="Estado">
            </div>
            <div class="button_prestador">
                <button id="button_prestador_save" type="submit">Gravar</button>
            </div>
        </div>
    </form>
</div>
<?php
include_once("footer.php");
?>