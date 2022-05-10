# UCMS

U-CMS é um CMS simples baseado no projeto descontinuado do AnchorCMS, aproveitando parcialmente de código fonte com atualizações.

## Requisitos

- PHP 7.2+
    - curl
    - mcrypt
    - gd
    - pdo\_mysql or pdo\_sqlite
- MySQL 5.6+ (MySQL 5.7 recommended)

## Instalação

1. Verifique se possui os requisitos.
2. Download do projeto e 
3. Envie os arquivos desconpactados para o servidor no local correto.
4. Verifique se há permisões em  `content` and `cms/config` estão setadas em `0775` e todos os arquivos pertençam ao usuário web. (chown -R www-data:www-data)
5. Criar um banco de dados. Nomeie-o como desejar.
6. Navegue até a pasta onde esta o sistema.
7. Siga passo a passo do instalador.
8. Para segurança remova a pasta `install` quando terminar.
9. É necessário criar manualmente a view com o código a seguir, trocando {{prefix}} pelo prefixo,o padrao é cms_

CREATE VIEW {{prefix}}v_destaques AS SELECT p.id, p.slug, p.description, p.created, p.status, p.author, p.category,p.updated FROM {{prefix}}posts AS p INNER join {{prefix}}categories AS c WHERE p.category = c.id AND c.slug = 'destaques';
