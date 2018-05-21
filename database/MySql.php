<?php

class MySql {

    public $_conn;
    public $_query;
    public $_create;
    public $_read;
    public $_update;
    public $_delete;

    public function __construct() {
        $this->connection();
    }

    /* CRUD */

    public function query($query = null) {
        if ($query != null) {
            $this->_query = mysqli_query($this->_conn, $query);
            return $this->_query;
        } else {
            return false;
        }
    }

    public function create($tabela = null, $data = null) {
        if (is_array($data) && $tabela != null) {

            $campos = implode(',', array_keys($data));
            $valores = "'" . implode("','", array_values($data)) . "'";

            $sql = "INSERT INTO $tabela ($campos) VALUES ($valores)";

            $this->_insert = mysqli_query($this->_conn, $sql);
            return $this->_insert;
        } else {
            return false;
        }
    }
    public function create_id($tabela = null, $data = null) {
        if (is_array($data) && $tabela != null) {

            $campos = implode(',', array_keys($data));
            $valores = "'" . implode("','", array_values($data)) . "'";

            $sql = "INSERT INTO $tabela ($campos) VALUES ($valores)";

            $this->_insert = mysqli_query($this->_conn, $sql);

            if ($this->_insert) {
                return mysqli_insert_id($this->_conn);
            } else {
                return $this->_insert;
            }
        } else {
            return false;
        }
    }
    public function update($tabela = null, $id = null, $data = null) {
        if ($tabela != null && $id != null && is_array($data)) {

            $str = '';
            $i = 0;

            foreach ($data as $key => $item) {
                if ($i > 0) {
                    $str .= ',';
                }
                $str .= $key . "='" . $item . "'";
                $i++;
            }

            $sql = "UPDATE $tabela SET $str WHERE id=" . $id;
            $this->_update = mysqli_query($this->_conn, $sql);
            return $this->_update;
        } else {
            return false;
        }
    }
    public function delete($tabela = null, $id = null) {
        if ($tabela != null && $id != null) {
            $sql = "DELETE FROM $tabela WHERE id = " . $id;
            $this->_delete = $this->query($sql);
            return $this->_delete;
        } else {
            return false;
        }
    }
    /* END CRUD */
    private function connection() {
        $this->_conn = mysqli_connect(HOST, USER, PASS, DATA);

        if ($this->_conn) {
            mysqli_query($this->_conn, 'set names UTF8');
            mysqli_query($this->_conn, 'SET character_set_connection=utf8');
            mysqli_query($this->_conn, 'SET character_set_client=utf8');
            mysqli_query($this->_conn, 'SET character_set_results=utf8');
            mysqli_query($this->_conn, 'SET FOREIGN_KEY_CHECKS = 0');
            return $this->_conn;
        } else {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
    }
}
