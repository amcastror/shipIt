<?php namespace Kattatzu\ShipIt;

class QuotationItem
{

    /**
     * @var array atributos del item
     */
    private $data = [];

    /**
     * Constructor
     *
     * @param null $response
     */
    public function __construct($response = null)
    {
        if ($response) {
            $this->data = [
                "courier" => $response->courier->name,
                "delivery_time" => $response->days,
                // "interval" => $response->days,
                "pv" => $response->volumetric_weight,
                "total" => $response->price
            ];
        }
    }

    /**
     * Retorna los datos del item en un array
     *
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }

    /**
     * Retorna un atributo del item
     *
     * @param $varName
     * @return mixed|null
     */
    public function __get($varName)
    {
        return isset($this->data[$varName]) ? $this->data[$varName] : null;
    }

}