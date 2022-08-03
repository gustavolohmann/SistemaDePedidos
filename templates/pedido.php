<?php
include_once("header.php");
?>
<div class="container_form_pedido">
    <form class="form_pedido">
        <div class="constainer_pesquisa_cliente">
            <!--faz pesquisa no banco de dados-->
            <div class="hidden_modal_pedido">
                <button type="button" id="button_hidden_modal_pedido"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="container_search_on_db">
                <div class="first_child_search_on_db">
                    <input id="pesquisa_cliente" type="text" name="pesquisa_cliente" placeholder="Pesquisa por cliente" required />
                    <div class="buttonCliente">
                        <button type="button" id="button_cliente">Pesquisar</button>
                    </div>
                </div>
                <div class="second_search_on_db">
                    <input id="pesquisa_prestador" type="text" name="pesquisa_prestador" placeholder="Pesquisa por prestador" required />
                    <div class="buttonPrestador">
                        <button type="button" id="button_prestador">Pesquisar</button>
                    </div>
                </div>
                <!--fim pesquisa no banco de dados-->
                <div class="container_table_">
                    <!---Pesquisa nas tabelas cliente e prestador--->
                    <table class="table"></table>
                    <table class="tablePrestador"></table>
                </div>
                <!---Pesquisa nas tabelas cliente e prestador--->
            </div>
        </div>
        <div class="open_modal_inside_pedido">
            <button type="button" id="button_open_modal_inside_pedido"><i class="fa-solid fa-user-plus"></i></button>
        </div>
        <div class="pedido">

            <div class="data-inicio">
                <label for="dataInicio">Data de inicio:</label>
                <input required type="date" name="dataInicio" />
            </div>

            <div class="data-termino">
                <label for="dataFinal">Data de termino:</label>
                <input required type="date" name="dataFinal" />
            </div>

            <div class="valor-receber">
                <label for="ValoraReceber">Valor a receber:</label>
                <input required type="text" name="ValoraReceber" placeholder="Valor a receber" />
            </div>

            <div class="valor-pagar">
                <label for="ValoraPagar">Valor a pagar:</label>
                <input required type="text" name="ValoraPagar" placeholder="Valor a pagar" />
            </div>
            <div>
                <label for="local_servico">Local de serviço:</label>
                <input type="text" name="local_servico" placeholder="Informe o local de serviço">
            </div>
            <div>
                <label for="cep_pedido">Cep:</label>
                <input required type="text" name="cep_pedido" placeholder="Cep" />
            </div>
            <div>
                <label for="endereço_pedido">Endereço do serviço:</label>
                <input required type="text" name="endereço_pedido" placeholder="Endereço de serviço" />
            </div>
            <div>
                <label for="cidade_pedido">Cidade:</label>
                <input required type="text" name="cidade_pedido" placeholder="Cidade" />
            </div>
            <div>
                <label for="estado_pedido">Estado:</label>
                <input required type="text" name="estado_pedido" placeholder="Estado" />
            </div>
            <div>
                <label for="tipo_servico">Tipo de serviço:</label>
                <input required type="text" name="tipo_servico" placeholder="Qual o tipo de serviço" />
            </div>

            <div>
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" placeholder="Telefone (Esse campo não é obrigatorio)" />
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="text" name="email" placeholder="Email (Esse campo não é obrigatorio)" />
            </div>

            <div>
                <label for="descricao">Detalhes de pedido:</label>
                <textarea required id="detalhesPedido" name="descricao" id="descricao" placeholder="Digite os detalhes do serviço"></textarea>
            </div>

            <div class="button_pedido">
                <button type="submit" name="button_pedido">Gravar pedido</button>
            </div>

        </div>
    </form>
</div>
<?php
include_once("footer.php");
?>