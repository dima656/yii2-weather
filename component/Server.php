<?php
/**
 *
 */
namespace app\commands;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Yii;

/**
 * Class Server
 * @package app\components
 */
class Server implements MessageComponentInterface {

    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;

    }

    /**
     * @param ConnectionInterface $conn
     */
    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "Новое соединение ({$conn->resourceId})\n";
    }

    /**
     * @param ConnectionInterface $from
     * @param string              $msg
     */
    public function onMessage(ConnectionInterface $from, $msg) {
        // Принимаем сообщение от клиента
        echo "{$from->resourceId} say: {$msg}\n";

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                // Делаем рассылку всем клиентам
                if ($msg === 'Hello!') {
                    $client->send('Hi!');
                }
            }
        }
    }

    /**
     * @param ConnectionInterface $conn
     */
    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "Пользователь {$conn->resourceId} отключился\n";
    }

    /**
     * @param ConnectionInterface $conn
     * @param \Exception          $e
     */
    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Произошла ошибка: {$e->getMessage()}\n";
        $conn->close();
    }
}