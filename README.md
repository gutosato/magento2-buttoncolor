# magento2-buttoncolor
## Descrição
- Módulo desenvolvido para adicionar uma funcionalidade que altera a cor de todos os botões do e-commerce do lojista executando apenas um comando de console do magento, o comando precisa de 2 paramentros que é o a cor em hexadecimal e a store_id, caso a store id seja inválida a cor será configurada para o scope 'default', caso a cor seja inválida uma mensagem irá alertar o usuário sobre o erro.
## Exemplo do comando
```ssh
php bin/magento color-change --color 'FFFFFF' --store 1
```
- No parametro ```--color``` é passado o valor da cor em hexadecima e no paramentro ```--store``` o id da loja.

## Instalacao
- Para fazer a instalação do modulo basta executar os seguintes comandos abaixo.
```ssh
composer config repositories.module-buttoncolor vcs "git@github.com:gutosato/magento2-buttoncolor.git"
composer require hibrido/module-buttoncolor:^1
```
