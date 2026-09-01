<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Minhas Receitas</title>

    <link rel="stylesheet" href="templates/css/agenda.css">
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

        <!-- Introdução -->

        <section class="intro">

            <h2>Organize suas receitas favoritas 🍰</h2>

            <p>
                Tenha suas receitas preferidas sempre por perto.
                Aqui você pode criar, guardar e organizar suas receitas
                de maneira simples e prática.
            </p>

        </section>


        <!-- Criar receita -->

        <section class="receita-form">

            <h2>Adicionar nova receita</h2>

            <form>

                <label for="titulo">
                    Nome da receita
                </label>

                <input
                    type="text"
                    id="titulo"
                    placeholder="Ex: Bolo de chocolate"
                    required
                >


                <label for="categoria">
                    Categoria
                </label>

                <select id="categoria">

                    <option value="">
                        Selecione uma categoria
                    </option>

                    <option value="doces">
                        Doces
                    </option>

                    <option value="salgados">
                        Salgados
                    </option>

                    <option value="massas">
                        Massas
                    </option>

                    <option value="bebidas">
                        Bebidas
                    </option>

                    <option value="outras">
                        Outras
                    </option>

                </select>


                <label for="ingredientes">
                    Ingredientes
                </label>

                <textarea
                    id="ingredientes"
                    placeholder="Digite os ingredientes..."
                    rows="5"
                ></textarea>


                <label for="modo-preparo">
                    Modo de preparo
                </label>

                <textarea
                    id="modo-preparo"
                    placeholder="Digite o modo de preparo..."
                    rows="6"
                ></textarea>


                <label for="foto">
                    Foto da receita
                </label>

                <input
                    type="file"
                    id="foto"
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

                <article class="receita-card">

                    <div class="foto-placeholder">
                        🍰
                    </div>

                    <div class="receita-info">

                        <h3>Bolo de chocolate</h3>

                        <span class="categoria">
                            Doces
                        </span>

                        <p>
                            Uma receita simples e deliciosa
                            para o café da tarde.
                        </p>

                        <button class="btn-secundario">
                            Ver receita
                        </button>

                    </div>

                </article>


                <article class="receita-card">

                    <div class="foto-placeholder">
                        🍝
                    </div>

                    <div class="receita-info">

                        <h3>Macarrão ao molho</h3>

                        <span class="categoria">
                            Massas
                        </span>

                        <p>
                            Macarrão com molho caseiro
                            fácil e rápido.
                        </p>

                        <button class="btn-secundario">
                            Ver receita
                        </button>

                    </div>

                </article>

            </div>

        </section>

    </main>

</body>
</html>