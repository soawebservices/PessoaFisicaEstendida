<?php
	
	class CDC extends WebService
	{
		/* URL de Test-Drive */
		const URI_LOCATION      = 'http://www.soawebservices.com.br/webservices/test-drive/cdc/cdc.asmx';
		const URI_LOCATION_WSDL = 'http://www.soawebservices.com.br/webservices/test-drive/cdc/cdc.asmx?WSDL';

		/* URL de Producao */
		/*
		const URI_LOCATION      = 'http://www.soawebservices.com.br/webservices/producao/cdc/cdc.asmx';
		const URI_LOCATION_WSDL = 'http://www.soawebservices.com.br/webservices/producao/cdc/cdc.asmx?WSDL';
		*/
		
		private $_traceEnabled  = 1;
		
		public function __construct()
		{
			$options = array
			(
				'location' => CDC::URI_LOCATION,
		        'trace'    => $this->_traceEnabled,
				'style'    => SOAP_RPC,
		        'use'      => SOAP_ENCODED,
			);
			
			parent::__construct(CDC::URI_LOCATION_WSDL, $options);
		}
		
		public function getPessoaFisicaEstendida(PessoaFisicaEstendida $pfnfe)
		{
			$result = $this->callMethod('PessoaFisicaEstendida', array('parameters' => Util::objectToArray($pfnfe)));
			return Util::arrayToObject($result->{$this->getLastCalledMethod() . 'Result'}, $pfnfe);
		}
	}

	class Credenciais
	{
		public $Email;
		public $Senha;
	}

	class PessoaFisicaEstendida extends ClassMap
	{
		public $Documento;
		public $Nome;
		public $Mensagem;
		public $Status;
		
		public function __construct()
		{
			parent::__construct(array(
				'Documento'          => 'string',
                'Nome'               => 'string',
                'NomeMae'            => 'string',
                'DataNascimento'     => 'string',
                'Escolaridade'       => 'string',
                'Sexo'               => 'string',
                'Enderecos'          => 'string',
                'Telefones'          => 'Telefone',
                'Emails'             => 'Email',
                'Enderecos'          => 'Endereco',
                'RendaPresumida'     => 'string',
                'Cargo'              => 'string',
                'Mensagem'           => 'string',
				'Status'             => 'boolean'
			));
		}
	}

class Endereco extends ClassMap
{
    public $Tipo;
    public $Logradouro;
    public $Numero;
    public $Complemento;
    public $Bairro;
    public $Cidade;
    public $Estado;
    public $CEP;
    public $GeoLocalizacao;
    public $DataAtualizacao;
    public $CodigoIBGE;

    public function __construct()
    {
        parent::__construct(array(
            'Tipo' => 'string',
            'Logradouro' => 'string',
            'Numero' => 'string',
            'Complemento' => 'string',
            'Bairro' => 'string',
            'Cidade' => 'string',
            'Estado' => 'string',
            'CEP' => 'string',
            'GeoLocalizacao' => 'GeoLocalizacao',
            'DataAtualizacao' => 'string',
            'CodigoIBGE' => 'string'
        ));
    }
}
class Telefone extends ClassMap
{
    public $TipoTelefone;
    public $Numero;
    public $Ramal;
    public $Complemento;
    public $DataAtualizacao;

    public function __construct()
    {
        parent::__construct(array(
            'TipoTelefone' => 'string',
            'Numero' => 'string',
            'Numero' => 'string',
            'Complemento' => 'string',
            'DataAtualizacao' => 'string'
        ));
    }
}
class Email extends ClassMap
{
    public $Email;

    public function __construct()
    {
        parent::__construct(array(
            'Email' => 'string'
        ));
    }
}
?>
