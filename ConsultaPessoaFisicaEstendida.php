<?php
require_once 'sws_extensao.php';
require_once 'sws_cdc_PessoaFisicaEstendida.php';

$credenciais        = new Credenciais();
$credenciais->Email = 'seu email aqui';
$credenciais->Senha = 'sua senha aqui';

$pfEstendida                = new PessoaFisicaEstendida();
$pfEstendida->Credenciais   = $credenciais;
$pfEstendida->Documento     = '99999999999';

$cdc = new CDC();
$pfEstendida = $cdc->getPessoaFisicaEstendida($pfEstendida);


echo "<pre>";
echo "\n\n-----------------------   INFORMACOES GERAIS   -----------------------\n\n\n";

# PRINT PROPRIEDADES DO OBJETO
echo 'Documento:        ' . $pfEstendida->Documento . "\n";
echo 'Nome:             ' . $pfEstendida->Nome . "\n";
echo 'Mensagem:         ' . $pfEstendida->Mensagem . "\n";
echo 'Status:           ' . $pfEstendida->Status . "\n";


echo "\n----------------------------------------------------------------------\n\n\n";

#print endereco

foreach($pfEstendida->Enderecos as $Endereco){
    echo 'Tipo              : ' . $Endereco->Tipo . "\n";
    echo 'Logradouro		: ' . $Endereco->Logradouro . "\n";
    echo 'Numero			: ' . $Endereco->Numero . "\n";
    echo 'Complemento		: ' . $Endereco->Complemento . "\n";
    echo 'Bairro			: ' . $Endereco->Bairro . "\n";
    echo 'Cidade			: ' . $Endereco->Cidade . "\n";
    echo 'Estado			: ' . $Endereco->Estado . "\n";
    echo 'CEP               : ' . $Endereco->CEP . "\n";
    echo 'DataAtualizacao   : ' . $Endereco->DataAtualizacao . "\n";
    echo 'Codigo IBGE		: ' . $Endereco->CodigoIBGE . "\n";
}

echo "</pre>";
# PRINT TODOS ELEMENTOS (TESTE)
print_r($pfEstendida);
?>
