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
    ]
];