<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Receitas</title>

    <!-- Ajuste no caminho do CSS (sem a barra inicial para evitar erro 404 local) -->
    <link rel="stylesheet" href="/templates/css/agenda.css">
</head>

<body>

    <header class="header">
        <h1>Agenda de Receitas</h1>
        <nav>
        
            <a href="View/perfil.php">Meu Perfil</a>
        </nav>
    </header>

    <main class="container">

        <!-- Introdução -->
        <section class="intro">
            <h2>Organize suas receitas favoritas </h2>
            <p>
                Tenha suas receitas preferidas sempre por perto.
                Aqui você pode criar, guardar e organizar suas receitas
                de maneira simples e prática.
            </p>
        </section>

        <!-- Formulario Criar Receita -->
        <section class="receita-form">
            <h2>Adicionar nova receita</h2>

            <form action="agenda.php" method="POST" enctype="multipart/form-data">

                <label for="titulo">Nome da receita</label>
                <input
                    type="text"
                    id="titulo"
                    name="titulo"
                    placeholder="Ex: Bolo de chocolate"
                    required
                >

                <label for="categoria">Categoria</label>
                <select id="categoria" name="categoria" required>
                    <option value="">Selecione uma categoria</option>
                    <option value="doces">Doces</option>
                    <option value="salgados">Salgados</option>
                    <option value="massas">Massas</option>
                    <option value="bebidas">Bebidas</option>
                    <option value="outras">Outras</option>
                </select>

                <label for="ingredientes">Ingredientes</label>
                <textarea
                    id="ingredientes"
                    name="ingredientes"
                    placeholder="Digite os ingredientes..."
                    rows="4"
                    required
                ></textarea>

                <label for="modo-preparo">Modo de preparo</label>
                <textarea
                    id="modo-preparo"
                    name="modo_preparo"
                    placeholder="Digite o modo de preparo..."
                    rows="5"
                    required
                ></textarea>

                <label for="foto">Foto da receita</label>
                <input
                    type="file"
                    id="foto"
                    name="foto"
                    accept="image/*"
                >

                <button type="submit" class="btn">
                    + Adicionar receita
                </button>

            </form>
        </section>

        <!-- Receitas cadastradas -->
        <section class="minhas-receitas">
            <h2>Minhas receitas</h2>

            <div class="receitas-grid">

                <?php if (empty($_SESSION['receitas'])): ?>
                    <p class="sem-receitas">Nenhuma receita cadastrada ainda. Preencha o formulário acima para adicionar!</p>
                <?php else: ?>
                    <?php foreach ($_SESSION['receitas'] as $receita): ?>
                        <article class="receita-card">

                            <div class="foto-placeholder">
                                <?php echo $receita['icone']; ?>
                            </div>

                            <div class="receita-info">
                                <h3><?php echo $receita['titulo']; ?></h3>

                                <span class="categoria">
                                    <?php echo $receita['categoria']; ?>
                                </span>

                                <p><strong>Ingredientes:</strong> <?php echo nl2br($receita['ingredientes']); ?></p>

                                <button class="btn-secundario">
                                    Ver receita
                                </button>
                            </div>

                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </section>

    </main>

</body>
</html>