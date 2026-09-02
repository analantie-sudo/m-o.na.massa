<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Agenda de Receitas</title>

    <link rel="stylesheet" href="templates/css/index.css">
</head>

<body>

    <header class="header">
        <h1>Agenda de Receitas</h1>
    </header>

    <main class="container cadastro-container">

        <section class="cadastro-box">

            <h2>Crie sua conta</h2>

            <p>
                Cadastre-se para organizar suas receitas favoritas
                em um só lugar.
            </p>

            <form action="Controller/mmmController.php" method="POST">
                
                <input type="hidden" name="acao" value="cadastrar">

                <label for="nome">Nome</label>
                <input 
                    type="text"
                    id="nome"
                    name="nome"
                    placeholder="Digite seu nome"
                    required
                >

                <label for="email">E-mail</label>
                <input 
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Digite seu e-mail"
                    required
                >

                <label for="senha">Senha</label>
                <input 
                    type="password"
                    id="senha"
                    name="senha"
                    placeholder="Digite sua senha"
                    required
                >

                <label for="confirmar-senha">Confirmar senha</label>
                <input 
                    type="password"
                    id="confirmar-senha"
                    name="confirmar_senha"
                    placeholder="Confirme sua senha"
                    required
                >

                <button type="submit" class="btn">
                    Criar conta
                </button>

            </form>

            <p class="login-link">
                Já possui uma conta?
                <a href="View/index.entrar.php">Entrar</a>
            </p>

        </section>

    </main>

</body>
</html>