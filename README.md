# sincronica_teste
Teste para vaga

# Como configurar
Importar o SQL e colocar toda a pasta API no endereço configurado pelo servidor para rodar o PHP (localhost no meu caso)

# Como testar
O projeto ainda carece de um front-end, porém, o CRUD baseado em webservices com a interface REST já está operando e para testá-lo basta abrir o Postman e realizar os requests via POST com os códigos JSON que se encontram dentro do arquivo rest.txt.
Exemplo: Para testar o create basta abrir o arquivo create.php no Postman, copiar o código em JSON que se encontra logo abaixo da palavra 'create' e encaminhá-lo via POST que a linha com os respectivos dados será criada. A mesma lógica serve para o update e para o delete. O arquivo read basta ser aberto sem passar nenhuma variável que trará todos os dados do banco.

# Pendências
Criar uma interface front-end utilizando jQuery para os dados sejam modificados no banco de dados sem a necessidade de utilizar o Postman e nem de recarregar a página para que cada dado seja alterado.
