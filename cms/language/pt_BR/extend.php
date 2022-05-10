<?php

return [

    'extend' => 'Avançado',

    'fields'      => 'Campos personalizados',
    'fields_desc' => 'Criar campos adicionais',

    'pagetypes'      => 'Tipos de páginas',
    'pagetypes_desc' => 'Cria tipo de página diferente',

    'variables'      => 'Variáveis do site',
    'variables_desc' => 'Criar Metadados adicionais',

    'create_field'         => 'Criar novo campo',
    'editing_custom_field' => 'Editando campo &ldquo;%s&rdquo;',
    'nofields_desc'        => 'Ainda sem campos',

    'create_variable'  => 'Criar nova variável',
    'editing_variable' => 'Editando variável &ldquo;%s&rdquo;',
    'novars_desc'      => 'Ainda sem variáveis',

    'create_pagetype'  => 'Criar novo tipo de pagina',
    'editing_pagetype' => 'Editando o tipo de página &ldquo;%s&rdquo;',

    // form fields
    'type'             => 'Tipo',
    'type_explain'     => 'O tipo de conteúdo que você quer adicionar.',
    'notypes_desc'     => 'Ainda sem páginas',

    'pagetype'         => 'Tipo de página',
    'pagetype_explain' => 'O tipo de página que você deseja adicionar este campo a.',

    'field'         => 'Campo',
    'field_explain' => 'Tipo de entrada HTML',

    'key'         => 'Chave única',
    'key_explain' => 'A chave única do seu campo',
    'key_missing' => 'Por favor insira uma chave única',
    'key_exists'  => 'Chave já utilizada',

    'label'         => 'Etiqueta',
    'label_explain' => 'Nome legível para seu campo',
    'label_missing' => 'Insira uma etiqueta',

    'attribute_type'                => 'Tipos de arquivo',
    'attribute_type_explain'        => 'Insira os tipos de arquivos a aceitar, separe por virgula, deixe vazio para todos.',

    // images
    'attributes_size_width'         => 'Largura máxima da imagem',
    'attributes_size_width_explain' => 'Imagens serão redimensionadas caso sejam maiores',

    'attributes_size_height'         => 'Altura máxima da imagem',
    'attributes_size_height_explain' => 'Imagens serão redimensionadas caso sejam maiores',

    // custom vars
    'name'                           => 'Nome',
    'name_explain'                   => 'Um nome único',
    'name_missing'                   => 'Por favor insira um nome único',
    'name_exists'                    => 'O nome já está em uso',

    'value'             => 'Valor',
    'value_explain'     => 'Os dados que deseja armazenar (até 64kb)',
    'value_code_snipet' => 'Snippet para inserir ao template:<br>
		<code>' . e('<?php echo site_meta(\'%s\'); ?>') . '</code>',

    // messages
    'variable_created'  => 'Sua variável foi criada',
    'variable_updated'  => 'Sua variável foi atualiza',
    'variable_deleted'  => 'Sua variable foi deletada',

    'pagetype_created' => 'Seu tipo de página foi criado',
    'pagetype_updated' => 'Seu tipo de página foi atualizado',
    'pagetype_deleted' => 'Seu tipo de página foi deletado',

    'field_created' => 'Seu campo foi criado',
    'field_updated' => 'Seu campo foi atualizado',
    'field_deleted' => 'Seu campo foi removido'

];
