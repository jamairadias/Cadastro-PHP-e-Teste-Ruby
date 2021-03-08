class CadastroPage
    include Capybara::DSL
    def faz_cadastro(nome, email)
        find('input[name=nome]').set nome
        sleep(2)
        find('input[name=email]').set email
        sleep(2)
        click_button 'Salvar'
    end
end
  