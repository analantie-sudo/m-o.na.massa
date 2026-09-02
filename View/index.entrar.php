<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Agenda de Receitas</title>

    <link rel="stylesheet" href="/templates/css/index.entrar.css">
</head>

<body>

    <header class="header">
        <h1>Agenda de Receitas</h1>
    </header>

    <main class="container cadastro-container">

        <section class="cadastro-box">

            <h2>Acesse sua conta</h2>

            <p>
                Entre para acessar suas receitas salvas 
                e organizar seu cardápio.
            </p>

            <form action="View/agenda.php" method="POST">
                
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

                <button type="submit" class="btn">
                     Entrar
                </button>

            </form>

            <p class="login-link">
                Ainda não possui uma conta?
                <a href="../index.php"> Cadastrar-se</a> 
            </p>

        </section>

    </main>

</body>
</html>