<?php
/**
 * @service ESPANOLAserverRestClient
 */
class ESPANOLAserverRestClient{
    /**
     * The WSDL URI
     *
     * @var string
     */
    public static $_WsdlUri='http://80.38.86.3:1111/servicios/server.php?WSDL';
    /**
     * The PHP SoapClient object
     *
     * @var object
     */
    public static $_Server=null;
    /**
     * The endpoint URI
     *
     * @var string
     */
    public static $_EndPoint='http://80.38.86.3:1111/servicios/server.php';

    /**
     * Send a SOAP request to the server
     *
     * @param string $method The method name
     * @param array $param The parameters
     * @return mixed The server response
     */
    public static function _Call($method,$param){
        $keys=array_keys($param);
        $i=-1;
        $len=sizeof($keys);
        while(++$i<$len)
            $method=str_replace(" ".$keys[$i]."/",urlencode($param[$keys[$i]])."/",$method);
        $context = stream_context_create(array(
        	'http' => array(
        	'header'  => "Authorization: Basic " . base64_encode("test:test")
        	)
        ));
        return file_get_contents(self::$_EndPoint.$method,false,$context);
    }

    /**
     * @return ValoresFinales
     */
    public function getValoresFinales(){
        return json_decode(self::_Call('/getValoresFinales/',Array(
        )));
    }
}

/**
 * @pw_element float $ALF
 * @pw_element float $LRF
 * @pw_element float $SF
 * @pw_element float $ALFMI
 * @pw_element float $ALFMA
 * @pw_element float $LRFMI
 * @pw_element float $LRFMA
 * @pw_element float $SFMI
 * @pw_element float $SFMA
 * @pw_complex ValoresFinales
 */
class ValoresFinales{
	/**
	 * @var float
	 */
	public $ALF;
	/**
	 * @var float
	 */
	public $LRF;
	/**
	 * @var float
	 */
	public $SF;
	/**
	 * @var float
	 */
	public $ALFMI;
	/**
	 * @var float
	 */
	public $ALFMA;
	/**
	 * @var float
	 */
	public $LRFMI;
	/**
	 * @var float
	 */
	public $LRFMA;
	/**
	 * @var float
	 */
	public $SFMI;
	/**
	 * @var float
	 */
	public $SFMA;
}

