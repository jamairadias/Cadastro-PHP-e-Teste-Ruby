Dado('que eu acesso a url') do
    visit 'http://localhost/cadastro/usuarios.php'
  end
  
  Quando('faço cadastro com {string} e {string}') do |nome, email|
    @nome = nome
    @email = email
    CadastroPage.new.faz_cadastro(nome, email)
  end
  
  Então('exibe a mensagem de sucesso {string}') do |mensagem|
    expect(page).to have_content 'Usuário cadastrado com sucesso!'
    sleep(4)
  end
  
  Então('o nome e email do usuário cadastrado {string} e {string}') do |nome, email|
    expect(page).to have_content @nome
    expect(page).to have_content @email
  end