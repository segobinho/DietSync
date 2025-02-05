<?php
$titulo = "Registrar Dieta";
$page = "registrar-dieta";
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
require_once '../classes/controller/dieta-cont.class.php';
require_once '../classes/controller/usuario-cont.class.php';
$dieta = new DietaController();
$usuario = new UsuarioController();

$user_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_dieta = $_POST['nome_dieta'];
    $tipo_dieta = $_POST['tipo_dieta'];
    $calorias = $_POST['calorias'];
    $proteinas = $_POST['proteinas'];
    $carboidratos = $_POST['carboidratos'];
    $gorduras = $_POST['gorduras'];
    $data_dieta = $_POST['data_dieta'];
    $refeicao = $_POST['refeicao'];
    $alimentos_json = explode(',', $_POST['alimentos']);
    $alimentos = json_encode($alimentos_json);
    $quantidade = $_POST['quantidade'];
    $observacoes = $_POST['observacoes'];

    $dieta->AdicionarDieta($nome_dieta, $tipo_dieta, $calorias, $proteinas, $carboidratos, $gorduras, $data_dieta, $refeicao, $alimentos, $quantidade, $observacoes, $user_id);
}

$usuarios = $usuario->ObterTodosUsuarios();
?>

<div class="container" id="main">
    <h2>Formulário de Dieta</h2>

    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nome_dieta">Nome da Dieta</label>
                <input type="text" class="form-control" id="nome_dieta" name="nome_dieta" placeholder="Digite o nome da dieta">
            </div>
            <div class="form-group col-md-4">
                <label for="tipo_dieta">Tipo de Dieta</label>
                <input type="text" class="form-control" id="tipo_dieta" name="tipo_dieta" placeholder="Digite o tipo de dieta">
            </div>
            <div class="form-group col-md-4">
                <label for="quantidade">Quantidade</label>
                <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Digite a quantidade">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="calorias">Calorias</label>
                <input type="text" class="form-control" id="calorias" name="calorias" placeholder="Digite a quantidade de calorias">
            </div>
            <div class="form-group col-md-4">
                <label for="proteinas">Proteínas</label>
                <input type="text" class="form-control" id="proteinas" name="proteinas" placeholder="Digite a quantidade de proteínas">
            </div>
            <div class="form-group col-md-4">
                <label for="carboidratos">Carboidratos</label>
                <input type="text" class="form-control" id="carboidratos" name="carboidratos" placeholder="Digite a quantidade de carboidratos">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="gorduras">Gorduras</label>
                <input type="text" class="form-control" id="gorduras" name="gorduras" placeholder="Digite a quantidade de gorduras">
            </div>
            <div class="form-group col-md-4">
                <label for="data_dieta">Data da Dieta</label>
                <input type="date" class="form-control" id="data_dieta" name="data_dieta">
            </div>
            <div class="form-group col-md-4">
                <label for="refeicao">Refeição</label>
                <input type="text" class="form-control" id="refeicao" name="refeicao" placeholder="Digite a refeição">
            </div>
        </div>
        <div class="form-group">
            <label for="alimentos">Alimentos (separados por vírgula)</label>
            <textarea class="form-control" id="alimentos" name="alimentos" rows="3" placeholder="Digite os alimentos"></textarea>
        </div>
        <div class="form-group">
            <label for="observacoes">Observações</label>
            <textarea class="form-control" id="observacoes" name="observacoes" rows="3" placeholder="Digite as observações"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Enviar</button>
    </form>
</div>

<?php
include '../php/includes/footer.inc.php'
?>
</body>

</html>