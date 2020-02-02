<?php
/**
 * BroadcastItem
 * @package broadcast
 * @version 0.0.1
 */

namespace Broadcast\Model;

use Broadcast\Model\{
    BroadcastContact as BContact,
    BroadcastContactGroupChain as BCGChain
};

class BroadcastItem extends \Mim\Model
{

    protected static $table = 'broadcast_item';

    protected static $chains = [];

    protected static $q = [];

    static function createByGroup(object $broadcast): bool{
        $table = self::getTable();
        $chain = BCGChain::getTable();
        $contt = BContact::getTable();

        $id    = $broadcast->id;
        $group = $broadcast->target;

        $sql = "
            INSERT INTO `$table` ( `broadcast`, `contact`)
                SELECT '$id', `bc`.`id`
                    FROM `$contt` `bc`
                    JOIN `$chain` `bcgc`
                        ON `bc`.`id` = `bcgc`.`contact`
                WHERE
                    `bc`.`status` = 1
                    AND `bcgc`.`group` = $group";

        return !!self::query($sql);
    }
}