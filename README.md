<h1>Sistema de cadastro de alunos, turmas e matrículas</h1>

<p>Sistema desenvolvido como trabalho de conclusão do curso de Pós Graduação Full-Stack da PUC-RS Online</p>

<br>
<h2>Para rodar o sistema</h2>

<h3>Clonar o repositório</h3>
<p>

    git clone https://github.com/kabratz/LaravelCursosEAlunos.git    
</p>

<hr>

<h3>Requisitos</h3>

Ter PHP, composer e npm instalados na máquina.
Ter um banco de dados rodando.

<hr>

<h3>Setups Iniciais</h3>
<hr>

<h4>Copiar env</h4>
<p>

    cp .env.example .env

    
</p>

<hr>

<h4>Alterar os dados do banco para seu banco local</h4>

<p>
    Devem ser alterados os seguintes dados (com sua conexão) dentro do arquivo <code>.env</code>.

    DB_CONNECTION=
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
</p>

<hr>

<h4>Instalar dependências</h4>

<h5>Dependências do composer</h5>
<p>

    composer install
    
</p>

<h5>Dependências do npm</h5>

<p>
    
    npm install
    
</p>

<hr>

<h3>Configurações do laravel</h3>

<p>

    php artisan key:generate
    
</p>

<hr>

<h3>Rodar criação das tabelas no banco de dados</h3>

<p>

    php artisan migrate
    
</p>
<hr>

<h3>Rodar população inicial do banco de dados</h3>
<p>
    Esse comando irá popular as tabelas: brands, categories e users

    php artisan db:seed

</p>

<hr>

<h3>Rodar os comandos que sobem o servidor</h3>
<p>
    Em uma aba do terminal:
    <br>
    
    php artisan serve
</p>
<p>
    <br>
    Acessar link gerado pelo comando acima (default http://127.0.0.1:8000/)
</p>


<p>
    Em outra aba (manter a anterior aberta):
    
    npm run dev
</p>

<h3>Criar usuário para acesso</h3>

<p>
    Para criar um usuário no banco de dados, podem ser rodados os seguintes comandos:
    
    php artisan tinker
</p>
<p>
    Criar o seu usuário pelo comando abaixo (alterando dados para os seus)

    
        use App\Models\User;

        User::create([
            'name' => 'Nome do Usuário',
            'email' => 'usuario@exemplo.com',
            'password' => bcrypt('senha123'),
        ]);

    
</p>
