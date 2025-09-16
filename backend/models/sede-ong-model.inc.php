<?php

class SedeOngModel {

    /**
     * get
     * Permite obtener todos los registros
     * de la tabla sede_ong
     * @param string $xfilter Parámetro opcional 
     * que define el filtro a aplicar
     * @return array
     */

    public function get($xfilter = "") {
        $aFilter = json_decode($xfilter,true) ?? [];
        $aResponse = [];
        $sql = "SELECT * FROM sede_ong";

        // if (strcmp($aFilter["filter"], "") != 0)
        //     $sql .= " WHERE " . $aFilter["filter"] . " ";
        
        if (is_array($aFilter) && isset($aFilter["filter"]) && !empty($aFilter["filter"])) {
            $sql .= " WHERE " . $aFilter["filter"] . " ";
        }
        
        $sql .= " ORDER BY cod_sede ASC";

        $objDB = new DataBase();

        if (!$objDB->getEstadoConexion()) {
            $aResponse["estado"] = "ERROR";
            $aResponse["mensaje"] = $objDB->getMensajeError();
            return $aResponse;
        }

        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "Cargar Sede";
        $aResponse["datos"] = $objDB->getQuery($sql);

        $objDB->close();
        return $aResponse;

    }

    
    /**
     * insert
     * Permite insertar un registro en la tabla de sede_ong
     * @param string $aDatos Array asociativo con los datos a insertar
     * @return array Resultado de la ejecución
     */

    public function insert($xdatos) {
        $aDatos = json_decode($xdatos, true);
        $aResponse = [];

        if ($aDatos === null) {
            return [
                "estado" => "Error",
                "mensaje" => "JSON invalido. Revisa el cuerpo de la peticion."
            ];
        }           

        // $sql = "INSERT INTO sede_ong(
        //             cod_ciudad, direccion, telefono, cod_director)
        //         VALUES (
        //             '" . $aDatos["cod_ciudad"] . "',
        //             '" . $aDatos["direccion"] . "',
        //             '" . $aDatos["telefono"] . "',
        //             '" . $aDatos["cod_director"] . "'
        //         )";
        $sql = "CALL insert_sede_ong(
                '" . $aDatos["cod_ciudad"] . "',
                '" . $aDatos["direccion"] . "',
                '" . $aDatos["telefono"] . "',
                '" . $aDatos["cod_director"] . "'
                )";
        
        $objDB = new DataBase();

        if (!$objDB->getEstadoConexion() ) {
            $aResponse["estado"] = "Error";
            $aResponse["mensaje"] = $objDB->getMensajeError();
            return $aResponse;
        }

        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "La sede se dio de alta satisfactoriamente";
        $aResponse["datos"] = $objDB->execute($sql);

        $objDB->close();
        return $aResponse;
    }

    /**
     * update
     * Permite actualizar un registro de la tabla categorias.
     * @param array $aDatos
     * @return array
     */
    public function update($xdatos) {
        $aDatos = json_decode($xdatos, true);
        $aResponse = [];

        $sql = "UPDATE
                    sede_ong
                SET
                    direccion = '" . $aDatos["direccion"] . "',
                    telefono = '" . $aDatos["telefono"] . "',
                    cod_ciudad = '" . $aDatos["cod_ciudad"] . "',
                    cod_director = '" .$aDatos["cod_director"] ."'
                WHERE
                    sede_ong.cod_sede = ". $aDatos["cod_sede"];
        //var_dump($sql); //Codigo para ver que valores me esta tomando la variable
        $objDB = new DataBase();

        if (!$objDB->getEstadoConexion() ) {
            $aResponse["estado"] = "Error";
            $aResponse["mensaje"] = $objDB->getMensajeError();
            return $aResponse;
        }

        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "Actualizar sede";
        $aResponse["datos"] = $objDB->execute($sql);
        $objDB->close();
        return $aResponse;

    }

    /**
     * delete
     * Permite eliminar un registro de la tabla sede_ong
     * @param string $xdatos JSON con el id a eliminar
     * @return array
     */
    public function delete($xdatos) {
        $aDatos = json_decode($xdatos, true);
        $aResponse = [];

        if ($aDatos === null || !isset($aDatos["cod_sede"])) {
            return [
                "estado" => "Error",
                "mensaje" => "JSON inválido o falta el parámetro cod_sede"
            ];
        }

        $sql = "DELETE FROM sede_ong WHERE cod_sede = " . intval($aDatos["cod_sede"]);

        $objDB = new DataBase();

        if (!$objDB->getEstadoConexion()) {
            $aResponse["estado"] = "Error";
            $aResponse["mensaje"] = $objDB->getMensajeError();
            return $aResponse;
        }

        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "Eliminar sede";
        $aResponse["datos"] = $objDB->execute($sql);

        $objDB->close();
        return $aResponse;
    }

}

?>