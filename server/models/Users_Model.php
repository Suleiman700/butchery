<?php

class Users_Model extends Model
{
    function __construct()
    {
        $this->db = new DB();
        $this->table = "users";
    }

    /**
     * Filter the data based on the given search parameters
     * @param array $_params
     * @param array $array_search
     * @return array|string
     */
    public function filter($_params = [], $array_search = [])
    {
        $array_search = array(
            'id' => ['i'],
            'username' => ['s'],
        );
        return parent::filter($_params, $array_search);
    }


    private function createDefaultColumns(array $_yourColumns): array
    {
        $defaultColumns = [
            'username' => ['s', isset($_yourColumns['username'])?$_yourColumns['username']:''],
            'password' => ['s', isset($_yourColumns['password'])?$_yourColumns['password']:''],
        ];

        return $defaultColumns;
    }

}

?>
