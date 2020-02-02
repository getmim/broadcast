<?php
/**
 * Broadcast
 * @package broadcast
 * @version 0.0.2
 */

namespace Broadcast\Library;

use Broadcast\Model\{
    Broadcast as BCast,
    BroadcastContactGroup as BCGroup,
    BroadcastContactGroupChain as BCGChain
};
use LibWorker\Library\Worker;

class Broadcast
{
    static function created(int $id): void{
        $broadcast = BCast::getOne(['id'=>$id]);
        if(!$broadcast)
            return;

        $w_router = ['toolBroadcastWorkerAdder', ['id'=>$broadcast->id]];
        $w_name   = 'broadcast-item-adder-' . $broadcast->id;

        Worker::add($w_name, $w_router, [], time());
    }
}