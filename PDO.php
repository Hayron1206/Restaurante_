<?php

// Verifica se estamos no modo de desenvolvimento
putenv('APP_ENV=development');
if (getenv('APP_ENV') !== 'development') {
    die("Acesso bloqueado. O script só pode ser executado em modo de desenvolvimento.");
}

// Credenciais de conexão
$host = 'localhost'; // Altere conforme necessário
$user = 'root'; // Altere conforme necessário
$password = ''; // Altere conforme necessário


// Conectar ao MySQL usando PDO
try {
    $pdo = new PDO("mysql:host=$host;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão ao MySQL estabelecida com sucesso.\n";
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

// Diretório onde os arquivos SQL estão localizados
$sqlDirectory = 'storage';
$sqlFiles = glob("$sqlDirectory/*.sql");

// Exibe os arquivos SQL disponíveis para o usuário
echo "Selecione o arquivo SQL a ser executado:\n";
foreach ($sqlFiles as $index => $file) {
    echo "$index: " . basename($file) . "\n";
}

// Lê a escolha do usuário
$selectedIndex = (int)readline("Digite o número do arquivo: ");
if (!isset($sqlFiles[$selectedIndex])) {
    die("Arquivo inválido selecionado.\n");
}

$selectedFile = $sqlFiles[$selectedIndex];

// Lê o conteúdo do arquivo SQL
$sql = file_get_contents($selectedFile);
if ($sql === false) {
    die("Erro ao ler o arquivo: $selectedFile\n");
}

// Executa as instruções SQL
try {
    $pdo->exec($sql);
    echo "Arquivo SQL executado com sucesso: $selectedFile\n";
} catch (PDOException $e) {
    die("Erro ao executar o SQL: " . $e->getMessage() . "\n");
}

// Fecha a conexão
$pdo = null;
?>
