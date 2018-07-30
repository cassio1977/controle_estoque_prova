Contactamax prova de Laravel v1.1:

Versões Utilizadas no Projeto: 
Composer 1.6.5
Laravel 5.3
PHP 7.1.20
MySql 8.0.12
Materialize Framework

Instruções de acesso: 
1)Baixe o repositório.
2)Mova os arquivos para sua pasta de projetos descompactando se necessário.
3)Rodar as seeders para popular a base de dados com artisan no prompt de comando no diretório da aplicação.
4)Rodar o PHP artisan Serve pra iniciar o servidor
5)Dados para login:
        'email'=>admin@gmail.com
        'password'=>159753
		
Instruções de Uso: 
1) Ao efetuar o login o usuário acessa a página de produtos, onde estarão com destaque vermelho os que possuem estoque inferior a 100.
2) Além das funções do CRUD dos produtos, estarão visíveis os botões para movimentação de estoque.
3) Ao acessar os botões o usuário estará movimentando o inventário com registros de entrada e saída, poderá usar o campo obs para informar nota fiscal etc...
4) Será possível  emitir relatórios da movimentação de estoque com filtros opcionais de período sku e movimentos ralizados pela API.
5)Foram criadas as APIs que respondem aos end points:
listagem:
get: http://127.0.0.1:8000/api/get_all
Traz toda a movimentação de estoque.

Entrada de estoque: Tipo E
Post: http://127.0.0.1:8000/api/adicionar-produtos
{
    "sku": "2",
    "quantidade": "100",
    "tipo": "e",
    "api": "s",
    "obs": "APIteste",
    "data": "2018-07-30 00:00:00",
    "user": "Cassio"
}

Saída de Estoque: Tipo S
http://127.0.0.1:8000/api/baixar-produtos
{
    "sku": "4",
    "quantidade": "2",
    "tipo": "s",
    "api": "s",
    "obs": "APIteste",
    "data": "2018-07-30 00:00:00",
    "user": "Cassio"
}

Todas as funcionalidades e validações foram testadas e estão em conforme com o especificado no projeto.

