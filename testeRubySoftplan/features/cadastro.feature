#language:pt

Funcionalidade: Cadastro de um usuário 
    Para que eu possa realizar o cadastro de um usuário 
    Sendo um usuário da url
    Posso cadastrar nome e email

Contexto: Cadastro de novo usuário
    Dado que eu acesso a url


Cenario: Usuário com nome e email válidos
   
    Quando faço cadastro com "Teste2" e "teste2@gmail.com" 
    Então exibe a mensagem de sucesso "Usuário cadastrado com sucesso!"
    E o nome e email do usuário cadastrado "Teste2" e "teste2@gmail.com" 
