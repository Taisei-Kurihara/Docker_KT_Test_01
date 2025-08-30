<?php
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\App;

require __DIR__ . '/vendor/autoload.php';

class Chat implements MessageComponentInterface {
    public function onOpen(ConnectionInterface $conn) {}
    public function onMessage(ConnectionInterface $from, $msg) {
        $from->send("You said: $msg");
    }
    public function onClose(ConnectionInterface $conn) {}
    public function onError(ConnectionInterface $conn, \Exception $e) {}
}

$app = new App('0.0.0.0', 8080);
$app->route('/chat', new Chat, ['*']);
$app->run();
?>