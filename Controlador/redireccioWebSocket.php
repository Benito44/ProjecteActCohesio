<?php
require dirname(__DIR__) .  '/vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

class GameServer implements MessageComponentInterface {
    protected $clients;
    protected $roles;


    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->roles = [];
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "Nuevo cliente conectado: {$conn->resourceId}\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        // Verificar si el mensaje es para iniciar el juego
        if ($msg === "Iniciar juego") {
            
            $userRole = isset($this->roles[$from->resourceId]) ? $this->roles[$from->resourceId] : null;
            
            // Redirigir según el rol del usuario
            if ($userRole === 'admin') {
                // No hacer nada para el administrador
            } elseif ($userRole === 'profe') {
                $from->send("redireccion: profe.html"); // Redirigir al profesor
            } elseif ($userRole === 'alumno') {
                $from->send("redireccion: alumnes.php"); // Redirigir al alumno
            }
        } else {
            // Almacenar el rol del usuario cuando se conecta
            $this->roles[$from->resourceId] = $msg;
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "Cliente desconectado: {$conn->resourceId}\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Error: {$e->getMessage()}\n";
        $conn->close();
    }
}

// Iniciar el servidor WebSocket
$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new GameServer()
        )
    ),
    8080
);

echo "Servidor WebSocket iniciado en el puerto 8080\n";

$server->run();

include "../Vista/Iniciar.php";
