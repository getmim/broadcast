<?php
/**
 * BroadcastContactGroup
 * @package broadcast
 * @version 0.0.1
 */

namespace Broadcast\Model;

class BroadcastContactGroup extends \Mim\Model
{

    protected static $table = 'broadcast_contact_group';

    protected static $chains = [];

    protected static $q = ['name'];
}