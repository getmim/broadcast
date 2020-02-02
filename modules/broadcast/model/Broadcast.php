<?php
/**
 * Broadcast
 * @package broadcast
 * @version 0.0.1
 */

namespace Broadcast\Model;

class Broadcast extends \Mim\Model
{

    protected static $table = 'broadcast';

    protected static $chains = [];

    protected static $q = ['text'];
}