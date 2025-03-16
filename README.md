<h1>Sistema de cadastro de alunos, turmas e matrículas</h1>

<h2>🛠 Requisitos</h2>
<ul>
    <li>
        PHP 8.1 ou superior
    </li>
    <li>
        Composer 2.2 ou superior
    </li>
    <li>
        Node.js 18+ e npm 9+
    </li>
    <li>
        Banco de dados MySQL ou PostgreSQL rodando
    </li>
    <li>
        Extensões PHP necessárias:
        <ul>
            <li>
                pdo
            </li>
            <li>
                pdo_mysql (para MySQL) ou pdo_pgsql (para PostgreSQL)
            </li>
            <li>openssl</li>
            <li>mbstring</li>
            <li>tokenizer</li>
            <li>ctype</li>
            <li>json</li>
            <li>intl <span style="color: gray;">(necessário para formatação de números e datas)</span></li>
            <li>bcmath</li>
        </ul>
    </li>
</ul>
💡 Certifique-se de que seu ambiente possui todas as dependências antes de
continuar

<h2>📃 Clonar o Repositório</h2>
<p>

    git clone https://github.com/kabratz/LaravelCursosEAlunos.git
</p>


<h2>⚙️ Setups Iniciais</h2>
<h3>📄 Copiar arquivo .env</h3>
<p>

    cp .env.example .env

</p>


<h3>🔧 Conectar banco de dados</h3>

<p>
    Edite o arquivo .env e altere as configurações do banco de dados para a sua
    conexão:

    DB_CONNECTION=
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=

💡 Caso use PostgreSQL, altere DB_CONNECTION=pgsql.
</p>


<h3>📦 Instalar Dependências</h3>

<h4>Dependências do composer</h4>
<p>

    composer install

</p>

<h4>Dependências do npm</h4>

<p>

    npm install

</p>


<h2>🔑 Configurações do Laravel</h2>
<h3>Gerar Chave da Aplicação</h3>
<p>

    php artisan key:generate

</p>


<h3>Criar as Tabelas no Banco de Dados</h3>

<p>

    php artisan migrate

</p>


<h2>🚀 Rodar o Sistemas</h2>
<p>
    Em uma aba do terminal:
    <br>

    php artisan serve --host=0.0.0.0 & npm run dev

</p>
💡 Isso inicia o backend e o frontend no mesmo terminal.
<br>
<br>
Acesse no navegador: http://127.0.0.1:8000

<h2>👤 Criar Usuário para Acesso</h2>

<p>
    Para criar um usuário no banco de dados, execute:

    php artisan tinker
</p>
<p>
    Dentro do tinker, execute:

    use App\Models\User;

    User::create([
    'name' => 'Nome do Usuário',
    'email' => 'usuario@exemplo.com',
    'password' => bcrypt('senha123'),
    ]);

</p>

<p>
    Agora, faça login com o e-mail e senha cadastrados.

</p>