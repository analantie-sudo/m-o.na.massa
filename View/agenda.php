<?php

session_start();

require_once __DIR__ . '/../Model/Recipe.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.entrar.php');
    exit();
}

$receitas = Recipe::getByUser($_SESSION['user_id']);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Minhas Receitas</title>

    <link rel="stylesheet" href="../templates/css/agenda.css">
</head>

<body>

    <header class="header">

        <h1>Agenda de Receitas</h1>

        <nav>
            <a href="perfil.php">Meu Perfil</a>
        </nav>

    </header>


    <main class="container">

        <section class="intro">

            <h2>Organize suas receitas favoritas</h2>

            <p>
                Tenha suas receitas preferidas sempre por perto.
                Aqui você pode criar, guardar e organizar suas receitas
                de maneira simples e prática.
            </p>

        </section>


        <!-- FORMULÁRIO DE NOVA RECEITA -->

        <section class="receita-form">

            <h2>Adicionar nova receita</h2>

            <form
                action="../Controller/mmmController.php"
                method="POST"
                enctype="multipart/form-data"
            >

                <input
                    type="hidden"
                    name="acao"
                    value="criarReceita"
                >


                <label for="titulo">
                    Nome da receita
                </label>

                <input
                    type="text"
                    id="titulo"
                    name="titulo"
                    placeholder="Ex: Bolo de chocolate"
                    required
                >


                <label for="ingredientes">
                    Ingredientes
                </label>

                <textarea
                    id="ingredientes"
                    name="ingredientes"
                    placeholder="Digite os ingredientes..."
                    rows="4"
                    required
                ></textarea>


                <label for="modo-preparo">
                    Modo de preparo
                </label>

                <textarea
                    id="modo-preparo"
                    name="modo_preparo"
                    placeholder="Digite o modo de preparo..."
                    rows="5"
                    required
                ></textarea>


                <label for="foto">
                    Foto da receita
                </label>

                <input
                    type="file"
                    id="foto"
                    name="foto"
                    accept="image/*"
                >


                <button
                    type="submit"
                    class="btn"
                >
                    + Adicionar receita
                </button>

            </form>

        </section>


        <!-- RECEITAS CADASTRADAS -->

        <section class="minhas-receitas">

            <h2>Minhas receitas</h2>

            <div class="receitas-grid">

                <?php if (empty($receitas)): ?>

                    <p class="sem-receitas">
                        Nenhuma receita cadastrada ainda.
                        Preencha o formulário acima para adicionar!
                    </p>

                <?php else: ?>

                    <?php foreach ($receitas as $receita): ?>

                        <article class="receita-card">

                            <div class="foto-placeholder">

                                <?php if (!empty($receita['image'])): ?>

                                    <img
                                        src="../<?= htmlspecialchars($receita['image']) ?>"
                                        alt="<?= htmlspecialchars($receita['title']) ?>"
                                    >

                                <?php else: ?>

                                    🍴

                                <?php endif; ?>

                            </div>


                            <div class="receita-info">

                                <h3>
                                    <?= htmlspecialchars($receita['title']) ?>
                                </h3>


                                <p>

                                    <strong>
                                        Ingredientes:
                                    </strong>

                                    <br>

                                    <?= nl2br(
                                        htmlspecialchars(
                                            $receita['ingredients']
                                        )
                                    ) ?>

                                </p>


                                <p>

                                    <strong>
                                        Modo de preparo:
                                    </strong>

                                    <br>

                                    <?= nl2br(
                                        htmlspecialchars(
                                            $receita['preparation']
                                        )
                                    ) ?>

                                </p>

                            </div>

                        </article>

                    <?php endforeach; ?>

                <?php endif; ?>

            </div>

        </section>

    </main>

</body>

</html>
