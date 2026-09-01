<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Meu Perfil - Agenda de Receitas</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <header class="header">

        <h1>Agenda de Receitas</h1>

        <nav>
            <a href="receitas.html">Receitas</a>
            <a href="perfil.html">Meu Perfil</a>
        </nav>

    </header>


    <main class="container">

        <section class="perfil">

            <div class="foto-perfil">
                👤
            </div>

            <h2>Carla Beatriz</h2>

            <p class="email">
                carla@email.com
            </p>

            <button class="btn">
                Editar perfil
            </button>

        </section>


        <section class="estatisticas">

            <div class="estatistica">

                <strong>12</strong>

                <span>
                    Receitas
                </span>

            </div>


            <div class="estatistica">

                <strong>5</strong>

                <span>
                    Doces
                </span>

            </div>


            <div class="estatistica">

                <strong>4</strong>

                <span>
                    Salgados
                </span>

            </div>

        </section>


        <section class="minhas-receitas">

            <h2>Minhas receitas</h2>

            <div class="receitas-grid">

                <article class="receita-card">

                    <div class="foto-placeholder">
                        🧁
                    </div>

                    <div class="receita-info">

                        <h3>Cupcake</h3>

                        <span class="categoria">
                            Doces
                        </span>

                        <button class="btn-secundario">
                            Ver receita
                        </button>

                    </div>

                </article>


                <article class="receita-card">

                    <div class="foto-placeholder">
                        🍕
                    </div>

                    <div class="receita-info">

                        <h3>Pizza caseira</h3>

                        <span class="categoria">
                            Salgados
                        </span>

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