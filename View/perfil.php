<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil - Agenda de Receitas</title>

    <!-- Caminho relativo para o CSS -->
    <link rel="stylesheet" href="/templates/css/perfil.css">
</head>

<body>

    <!-- Cabeçalho Principal -->
    <header class="header">
        <h1>Agenda de Receitas</h1>
        <nav>
            <a href="agenda.html">Receitas</a>
            <a href="perfil.html">Meu Perfil</a>
        </nav>
    </header>

    <main class="container">

        <!-- Informações Visuais do Perfil -->
        <section class="perfil">
            <div class="foto-perfil">
                <!-- A imagem fica ajustada perfeitamente dentro do círculo -->
                <img src="https://via.placeholder.com/150" alt="">
                
                <!-- Caso o usuário não tenha enviado foto, você pode usar um texto/ícone fallback: -->
                <!-- 👤 -->
            </div>

            <h2>Nome do Usuário</h2>
            <p class="email">usuario@email.com</p>
        </section>

        <!-- Formulário: Editar Dados do Perfil -->
        <section class="config-box">
            <h2>Editar Perfil</h2>

            <form action="#" method="POST" enctype="multipart/form-data">
                <label for="foto_perfil">Alterar Foto de Perfil</label>
                <input type="file" id="foto_perfil" name="foto_perfil" accept="image/*">

                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Seu nome cadastrado" required>

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Seu e-mail cadastrado" required>

                <button type="submit" class="btn">Salvar Alterações</button>
            </form>
        </section>

        <!-- Formulário: Mudar Senha -->
        <section class="config-box">
            <h2>Alterar Senha</h2>

            <form action="#" method="POST">
                <label for="senha_atual">Senha Atual</label>
                <input type="password" id="senha_atual" name="senha_atual" placeholder="Digite sua senha atual" required>

                <label for="nova_senha">Nova Senha</label>
                <input type="password" id="nova_senha" name="nova_senha" placeholder="Digite a nova senha" required>

                <label for="confirmar_senha">Confirmar Nova Senha</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha" placeholder="Confirme a nova senha" required>

                <button type="submit" class="btn">Atualizar Senha</button>
            </form>
        </section>

        <!-- Zona de Exclusão de Conta -->
        <section class="config-box zona-perigo">
            <h2>Excluir Conta</h2>
            <p>Atenção: Ao excluir sua conta, todas as suas receitas salvas serão apagadas permanentemente.</p>

            <form action="#" method="POST">
                <button type="submit" class="btn-perigo">Excluir Minha Conta</button>
            </form>
        </section>


    </main>

</body>
</html>