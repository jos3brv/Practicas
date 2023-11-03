<?php

namespace MiNamespace;

require_once 'DataBase.php';

class Productos extends DataBase
{
    protected $response = [];

    public function __construct(string $nombreBD = 'marketzone', $host = 'localhost', $user = 'root', $password = '123456789')
    {
        parent::__construct($nombreBD, $host, $user, $password);
    }

    public function add($object): void
    {
   
        $query = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param('sssssssi', $object->nombre, $object->marca, $object->modelo, $object->precio, $object->detalles, $object->unidades, $object->imagen, $object->eliminado);


        if ($stmt->execute()) {
            $this->response = ['message' => 'Producto agregado correctamente'];
        } else {
            $this->response = ['error' => 'Error al agregar el producto: ' . $stmt->error];
        }
    }

    public function delete(string $id): void
    {
    
        $query = "DELETE FROM productos WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            $this->response = ['message' => 'Producto eliminado correctamente'];
        } else {
            $this->response = ['error' => 'Error al eliminar el producto: ' . $stmt->error];
        }
    }

    public function search(string $query): void
    {
    
        $result = $this->conexion->query($query);

        if ($result) {
            $this->response = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $this->response = ['error' => 'Error en la búsqueda: ' . $this->conexion->error];
        }
    }

    public function update($object) {
        $query = "UPDATE productos SET nombre = ?, marca = ?, modelo = ?, precio = ?, detalles = ?, unidades = ?, imagen = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($query);

        if ($stmt) {
            $stmt->bind_param('sssssssi', $object->nombre, $object->marca, $object->modelo, $object->precio, $object->detalles, $object->unidades, $object->imagen, $object->id);
            $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $this->response = "Producto actualizado exitosamente.";
    } else {
        $this->response = "No se pudo actualizar el producto.";
    }

    $stmt->close();
} else {
    $this->response = "Error en la consulta SQL.";
}

    }

    public function single(string $id): void
    {

        $query = "SELECT * FROM productos WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $this->response = $result->fetch_assoc();
        } else {
            $this->response = ['error' => 'Error al obtener el producto: ' . $stmt->error];
        }
    }

    public function singleByName(string $name): void
    {

        $query = "SELECT * FROM productos WHERE nombre = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param('s', $name);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $this->response = $result->fetch_assoc();
        } else {
            $this->response = ['error' => 'Error al obtener el producto: ' . $stmt->error];
        }
    }

    public function getResponse(): string
    {
        return json_encode($this->response);
    }
}

?>