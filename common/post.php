<?php
require 'vendor/autoload.php';

use Pusher\Pusher;


$options = array(
    'cluster' => 'ap1',
    'useTLS' => true
);
$pusher = new Pusher(
    '236bffbd4eb963d806b8',
    'b5e74bd9007da1c83714',
    '1848710',
    $options
);

$data['message'] = 'hello world';
// Menulis log sebelum mengirim event
error_log('Mengirim event ke Pusher: ' . json_encode($data));
$pusher->trigger('my-channel', 'my-event', $data);
// Menulis log setelah event dikirim
error_log('Event telah dikirim ke saluran: my-channel, event: my-event');
