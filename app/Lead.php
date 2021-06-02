<?php
require_once __DIR__ . '/Connection.php';

class Lead extends Connection
{
    private $lang;
    private $code;
    private $name;
    private $phone;
    private $email;
    private $city;
    private $company;
    private $job;
    private $source;
    private $medium;
    private $campaign;

    public function __construct($input = array())
    {
        parent::__construct();
        $this->__set('lang',    $input['lang']);
        $this->__set('code',    $input['code']);
        $this->__set('name',    utf8_decode(utf8_encode($input['inputName'])));
        $this->__set('city',    utf8_decode(utf8_encode($input['inputCity'])));
        $this->__set('company', utf8_decode(utf8_encode($input['inputCompany'])));
        $this->__set('job',     utf8_decode(utf8_encode($input['inputJob'])));
        $this->__set('phone',   $input['inputPhone']);
        $this->__set('email',   $input['inputEmail']);
        $this->__set('source',  $input['source']);
        $this->__set('medium',  $input['medium']);
        $this->__set('campaign',$input['campaign']);
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        //->TODO: Implement __set() method.
        if (property_exists($this, $name)) {
            unset($this->$name);
            $this->$name = $value;
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        // TODO: Implement __get() method.
        if (property_exists($this, $name)) {
            return $this->$name;
        } else {
            return false;
        }
    }


    public function store()
    {
        try {
            $db = Connection::getConnection();
            $insert = $db->prepare('INSERT INTO leads (
                         nombre,
                         telefono,
                         email,
                         ciudad,
                         empresa,
                         puesto,
                         utm_source,
                         utm_medium,
                         utm_campain,
                         created_at,
                         promotion_code
                      )
                      VALUES ( 
                          :nombre,
                          :telefono,
                          :email,
                          :ciudad,
                          :empresa,
                          :puesto,
                          :utm_source,
                          :utm_medium,
                          :utm_campain, 
                          :created_at,
                          :promotion_code)');
            $insert->bindValue(':nombre',        $this->__get('name'));
            $insert->bindValue(':telefono',      $this->__get('phone'));
            $insert->bindValue(':email',         $this->__get('email'));
            $insert->bindValue(':ciudad',        $this->__get('city'));
            $insert->bindValue(':empresa',       $this->__get('company'));
            $insert->bindValue(':puesto',        $this->__get('job'));
            $insert->bindValue(':utm_source',    $this->__get('source'));
            $insert->bindValue(':utm_medium',    $this->__get('medium'));
            $insert->bindValue(':utm_campain',   $this->__get('campaign'));
            $insert->bindValue(':created_at',    date('Y-m-d  H:i:s'));
            $insert->bindValue(':promotion_code',$this->__get('code'));
            $insert->execute();
            return $db->lastInsertId();
        }
        catch(PDOException $e){
            return $e->getMessage();
        }
    }
}