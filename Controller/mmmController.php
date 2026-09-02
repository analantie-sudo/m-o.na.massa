<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../Model/User.php';
require_once __DIR__ . '/../Model/Recipe.php';

class mnmController
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function cadastrar(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $fullname = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['senha'] ?? '';
            $confirmPassword = $_POST['confirmar_senha'] ?? '';

            if (
                empty($fullname) ||
                empty($email) ||
                empty($password)
            ) {
                die('Preencha todos os campos.');
            }

            if ($password !== $confirmPassword) {
                die('As senhas não coincidem.');
            }

            $sucesso = User::create(
                $fullname,
                $email,
                $password
            );

            if ($sucesso) {

                $usuario = User::findByEmail($email);

                if (!$usuario) {
                    die('Usuário cadastrado, mas não foi possível encontrar os dados.');
                }

                $_SESSION['user_id'] = $usuario['id'];
                $_SESSION['user_fullname'] = $usuario['user_fullname'];
                $_SESSION['user_email'] = $usuario['email'];

                header('Location: ../View/agenda.php');
                exit();
            }

            echo 'Erro ao cadastrar usuário.';
        }
    }

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = trim($_POST['email'] ?? '');
            $password = $_POST['senha'] ?? '';

            $user = User::findByEmail($email);

            if (
                $user &&
                password_verify($password, $user['password'])
            ) {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_fullname'] = $user['user_fullname'];
                $_SESSION['user_email'] = $user['email'];

                header('Location: ../View/agenda.php');
                exit();
            }

            echo 'E-mail ou senha incorretos.';
        }
    }

    public function logout(): void
    {
        $_SESSION = [];
        session_destroy();

        header('Location: ../View/index.entrar.php');
        exit();
    }

    public function criarReceita(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $userid_fk = $_SESSION['user_id'] ?? null;

            $title = trim($_POST['titulo'] ?? '');
            $ingredients = trim($_POST['ingredientes'] ?? '');
            $preparation = trim($_POST['modo_preparo'] ?? '');

            if (!$userid_fk) {
                die('Você precisa estar logado para salvar receitas.');
            }

            if (
                empty($title) ||
                empty($ingredients) ||
                empty($preparation)
            ) {
                die('Preencha todos os campos da receita.');
            }

            $imagePath = null;

            if (
                isset($_FILES['foto']) &&
                $_FILES['foto']['error'] === UPLOAD_ERR_OK
            ) {

                $extensao = strtolower(
                    pathinfo(
                        $_FILES['foto']['name'],
                        PATHINFO_EXTENSION
                    )
                );

                $extensoesPermitidas = [
                    'jpg',
                    'jpeg',
                    'png',
                    'webp'
                ];

                if (!in_array($extensao, $extensoesPermitidas)) {
                    die('Formato de imagem não permitido.');
                }

                $nomeImagem = uniqid() . '.' . $extensao;

                $pasta = __DIR__ .
                    '/../storage/uploads/images/';

                if (!is_dir($pasta)) {
                    mkdir($pasta, 0777, true);
                }

                $destino = $pasta . $nomeImagem;

                if (
                    move_uploaded_file(
                        $_FILES['foto']['tmp_name'],
                        $destino
                    )
                ) {

                    $imagePath =
                        'storage/uploads/images/' .
                        $nomeImagem;
                }
            }

            $sucesso = Recipe::create(
                $title,
                $ingredients,
                $preparation,
                $imagePath,
                $userid_fk
            );

            if ($sucesso) {
                header(
                    'Location: ../View/agenda.php?status=sucesso'
                );
                exit();
            }

            echo 'Erro ao salvar a receita.';
        }
    }

    public function listarReceitas(): array
    {
        $userid_fk = $_SESSION['user_id'] ?? null;

        if (!$userid_fk) {
            return [];
        }

        return Recipe::getByUser($userid_fk);
    }

    public function deletarReceita(int $id): void
    {
        if (!isset($_SESSION['user_id'])) {
            die('Usuário não está logado.');
        }

        $userid_fk = $_SESSION['user_id'];

        Recipe::delete(
            $id,
            $userid_fk
        );

        header(
            'Location: ../View/agenda.php?status=deletado'
        );

        exit();
    }

    public function editarPerfil(): void
    {
        if (!isset($_SESSION['user_id'])) {
            die('Você precisa estar logado.');
        }

        $id = $_SESSION['user_id'];

        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');

        if (
            empty($nome) ||
            empty($email)
        ) {
            die('Preencha todos os campos.');
        }

        // FOTO DE PERFIL
        $profileImage = null;

        if (
            isset($_FILES['foto_perfil']) &&
            $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK
        ) {

            $extensao = strtolower(
                pathinfo(
                    $_FILES['foto_perfil']['name'],
                    PATHINFO_EXTENSION
                )
            );

            $extensoesPermitidas = [
                'jpg',
                'jpeg',
                'png',
                'webp'
            ];

            if (!in_array($extensao, $extensoesPermitidas)) {
                die('Formato de imagem não permitido.');
            }

            $nomeImagem = uniqid('perfil_') . '.' . $extensao;

            $pasta = __DIR__ .
                '/../storage/uploads/profile/';

            if (!is_dir($pasta)) {
                mkdir($pasta, 0777, true);
            }

            $destino = $pasta . $nomeImagem;

            if (
                move_uploaded_file(
                    $_FILES['foto_perfil']['tmp_name'],
                    $destino
                )
            ) {

                $profileImage =
                    'storage/uploads/profile/' .
                    $nomeImagem;
            }
        }

        $sucesso = User::updateProfile(
            $id,
            $nome,
            $email,
            $profileImage
        );

        if ($sucesso) {

            $_SESSION['user_fullname'] = $nome;
            $_SESSION['user_email'] = $email;

            header(
                'Location: ../View/perfil.php?status=atualizado'
            );

            exit();
        }

        echo 'Erro ao atualizar o perfil.';
    }

    public function alterarSenha(): void
    {
        if (!isset($_SESSION['user_id'])) {
            die('Você precisa estar logado.');
        }

        $id = $_SESSION['user_id'];

        $senhaAtual = $_POST['senha_atual'] ?? '';
        $novaSenha = $_POST['nova_senha'] ?? '';
        $confirmarSenha = $_POST['confirmar_senha'] ?? '';

        $usuario = User::findById($id);

        if (!$usuario) {
            die('Usuário não encontrado.');
        }

        if (
            !password_verify(
                $senhaAtual,
                $usuario['password']
            )
        ) {
            die('A senha atual está incorreta.');
        }

        if ($novaSenha !== $confirmarSenha) {
            die('As novas senhas não coincidem.');
        }

        if (empty($novaSenha)) {
            die('Digite uma nova senha.');
        }

        $sucesso = User::updatePassword(
            $id,
            $novaSenha
        );

        if ($sucesso) {

            header(
                'Location: ../View/perfil.php?status=senha_atualizada'
            );

            exit();
        }

        echo 'Erro ao alterar a senha.';
    }

    public function excluirConta(): void
    {
        if (!isset($_SESSION['user_id'])) {
            die('Você precisa estar logado.');
        }

        $id = $_SESSION['user_id'];

        Recipe::deleteByUser($id);
        User::delete($id);

        $_SESSION = [];
        session_destroy();

        header(
            'Location: ../View/index.entrar.php?status=conta_excluida'
        );

        exit();
    }
}


$controller = new mnmController();


if (isset($_POST['acao'])) {

    switch ($_POST['acao']) {

        case 'cadastrar':
            $controller->cadastrar();
            break;

        case 'login':
            $controller->login();
            break;

        case 'criarReceita':
            $controller->criarReceita();
            break;

        case 'logout':
            $controller->logout();
            break;

        case 'deletarReceita':

            $id = (int) ($_POST['id'] ?? 0);

            if ($id > 0) {
                $controller->deletarReceita($id);
            }

            break;

        case 'editarPerfil':
            $controller->editarPerfil();
            break;

        case 'alterarSenha':
            $controller->alterarSenha();
            break;

        case 'excluirConta':
            $controller->excluirConta();
            break;
    }
}