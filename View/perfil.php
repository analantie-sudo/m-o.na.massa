<?php

session_start();

require_once __DIR__ . '/../Model/User.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.entrar.php');
    exit();
}

$usuario = User::findById($_SESSION['user_id']);

if (!$usuario) {
    session_destroy();
    header('Location: index.entrar.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Meu Perfil - Agenda de Receitas</title>

    <link rel="stylesheet" href="../templates/css/perfil.css">

</head>

<body>

    <header class="header">

        <h1>Agenda de Receitas</h1>

        <nav>

            <a href="agenda.php">Receitas</a>

            <a href="perfil.php">Meu Perfil</a>

        </nav>

    </header>


    <main class="container">


        <!-- INFORMAÇÕES DO PERFIL -->

        <section class="perfil">

            <div class="foto-perfil">

                <img 
                    src="https://via.placeholder.com/150" 
                    alt="Foto de perfil"
                >

            </div>


            <h2>
                <?= htmlspecialchars($usuario['user_fullname']) ?>
            </h2>


            <p class="email">
                <?= htmlspecialchars($usuario['email']) ?>
            </p>

        </section>



        <!-- EDITAR PERFIL -->

        <section class="config-box">

            <h2>Editar Perfil</h2>

            <form 
                action="../Controller/mmmController.php" 
                method="POST" 
                enctype="multipart/form-data"
            >

                <input 
                    type="hidden" 
                    name="acao" 
                    value="editarPerfil"
                >


                <label for="foto_perfil">
                    Alterar Foto de Perfil
                </label>

                <input 
                    type="file" 
                    id="foto_perfil" 
                    name="foto_perfil" 
                    accept="image/*"
                >


                <label for="nome">
                    Nome
                </label>

                <input 
                    type="text" 
                    id="nome" 
                    name="nome"
                    value="<?= htmlspecialchars($usuario['user_fullname']) ?>"
                    placeholder="Seu nome cadastrado"
                    required
                >


                <label for="email">
                    E-mail
                </label>

                <input 
                    type="email" 
                    id="email" 
                    name="email"
                    value="<?= htmlspecialchars($usuario['email']) ?>"
                    placeholder="Seu e-mail cadastrado"
                    required
                >


                <button type="submit" class="btn">
                    Salvar Alterações
                </button>

            </form>

        </section>



        <!-- ALTERAR SENHA -->

        <section class="config-box">

            <h2>Alterar Senha</h2>

            <form 
                action="../Controller/mmmController.php" 
                method="POST"
            >

                <input 
                    type="hidden" 
                    name="acao" 
                    value="alterarSenha"
                >


                <label for="senha_atual">
                    Senha Atual
                </label>

                <input 
                    type="password" 
                    id="senha_atual" 
                    name="senha_atual"
                    placeholder="Digite sua senha atual"
                    required
                >


                <label for="nova_senha">
                    Nova Senha
                </label>

                <input 
                    type="password" 
                    id="nova_senha" 
                    name="nova_senha"
                    placeholder="Digite a nova senha"
                    required
                >


                <label for="confirmar_senha">
                    Confirmar Nova Senha
                </label>

                <input 
                    type="password" 
                    id="confirmar_senha" 
                    name="confirmar_senha"
                    placeholder="Confirme a nova senha"
                    required
                >


                <button type="submit" class="btn">
                    Atualizar Senha
                </button>

            </form>

        </section>



        <!-- EXCLUIR CONTA -->

        <section class="config-box zona-perigo">

            <h2>Excluir Conta</h2>

            <p>
                Atenção: Ao excluir sua conta, todas as suas
                receitas salvas serão apagadas permanentemente.
            </p>


            <form 
                action="../Controller/mmmController.php" 
                method="POST"
            >

                <input 
                    type="hidden" 
                    name="acao" 
                    value="excluirConta"
                >


                <button type="submit" class="btn-perigo">
                    Excluir Minha Conta
                </button>

            </form>

        </section>


        <!-- SAIR -->

        <section class="config-box">

            <h2>Sair da conta</h2>

            <form 
                action="../Controller/mmmController.php" 
                method="POST"
            >

                <input 
                    type="hidden" 
                    name="acao" 
                    value="logout"
                >


                <button type="submit" class="btn-secundario">
                    Sair
                </button>

            </form>

        </section>


    </main>

</body>

</html>