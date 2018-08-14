<?php

return [

    'menu'          => [
        'home'      => 'Início',
        'admin'     => 'Administrar',
        'profile'   => 'Perfil',
        'logout'    => 'Sair'
    ],

    'welcome'       => '<strong>Olá, :name</strong>.<br>O que vamos fazer hoje?',

    'profile'       => [
        'title'     => 'Alterar os meus dados',
        'name'      => 'Nome',
        'email'     => 'E-mail',
        'password'  => 'Senha atual',
        'npassword' => 'Nova senha',
        'cpassword' => 'Confirmação da nova senha',
        'change'    => 'Alterar',
        'success'   => 'Alterações feitas com sucesso!',
        'failed'    => 'As alterações não foram feitas.',

        'error'     => [
            'name'              => 'Insira um nome válido.',
            'email'             => 'Insira um e-mail válido.',
            'email_unique'      => 'O endereço de e-mail já está sendo utilizado.',
            'npassword'         => 'Insira uma nova senha válida.',
            'invalid_npassword' => 'A nova senha não pode ser igual a senha atual.',
            'cpassword'         => 'As senhas não coincidem.',
            'password'          => 'Insira sua senha atual.',
            'invalid_password'  => 'Senha atual inválida.'
        ]
    ],

    'admin'         => [
        'see_users'     => 'Ver usuários',
        'see_deleted'   => 'Ver deletados',
        'name'          => 'Nome',
        'email'         => 'E-mail',
        'is_admin'      => 'Admin?',
        'actions'       => 'Ações',
        'see'           => 'Ver',
        'change'        => 'Editar',
        'erase'         => 'Deletar',
        'restore'       => 'Restaurar',
        'empty'         => 'Nada para mostrar.',

        'edit'          => [
            'title'     => 'Editando dados de :name',
            'name'      => 'Nome',
            'email'     => 'E-mail',
            'password'  => 'Senha',
            'edit'      => 'Editar',
            'data_fail' => 'Falha ao obter os dados de usuário.',
            'success'   => 'Os dados do usuário foram alterados com sucesso.',
            'failed'    => 'Não foi possível alterar os dados do usuário.'
        ],

        'delete'        => [
            'title'         => 'Deletando dados de :name',
            'confirmation'  => 'Você realmente deseja apagar os dados de :name?',
            'yes'           => 'Sim',
            'no'            => 'Não',
            'data_fail'     => 'Falha ao obter os dados de usuário.',
            'success'       => 'Registro deletado com sucesso.'
        ]
        
    ]

];