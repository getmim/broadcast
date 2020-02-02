<?php
/**
 * CliController
 * @package broadcast
 * @version 0.0.2
 */

namespace Broadcast\Controller;

use Cli\Library\Bash;
use Broadcast\Model\{
    Broadcast as BCast,
    BroadcastContact as BContact,
    BroadcastContactGroup as BCGroup,
    BroadcastContactGroupChain as BCGChain,
    BroadcastItem as BItem
};
use LibWorker\Library\Worker;
use LibSms\Library\Sms;

class CliController extends \Cli\Controller
{
    public function itemAdderAction(){
        $broadcast = BCast::getOne(['id'=>$this->req->param->id]);
        if(!$broadcast)
            return Bash::json(['error'=>false, 'data'=>'Not found']);

        BItem::createByGroup($broadcast);
        $total = BItem::count(['broadcast'=>$broadcast->id]);
        BCast::set(['total'=>$total], ['id'=>$broadcast->id]);

        $time = strtotime($broadcast->time) + 1;

        $last_id = 0;
        while(true){
            $cond  = [
                'broadcast' => $broadcast->id,
                'id'        => ['__op', '>', $last_id]
            ];
            $items = BItem::get($cond, 25, 1, ['id'=>true]);
            if(!$items)
                break;

            foreach($items as $item){
                $workers[] = [
                    'name'   => 'broadcast-item-' . $item->id,
                    'router' => ['toolBroadcastItemRun', ['id'=>$item->id]],
                    'data'   => [],
                    'time'   => $time
                ];
                $last_id = $item->id;
            }

            Worker::addMany($workers);
            sleep(1);
        }

        Bash::json(['error'=>false, 'data'=>'Success']);
    }

    public function itemRunAction(){
        $item = BItem::getOne([
            'id'     => $this->req->param->id,
            'status' => 2
        ]);
        if(!$item)
            return Bash::json(['error'=>false, 'data'=>'Not found']);

        $bcast = BCast::getOne([
            'id'     => $item->broadcast,
            'status' => [1,2]
        ]);
        if(!$bcast)
            return Bash::json(['error'=>false, 'data'=>'Broadcast not found']);

        $contact = BContact::getOne(['id'=>$item->contact, 'status'=>1]);
        if(!$contact)
            return Bash::json(['error'=>false, 'data'=>'Contact not found']);

        $success = true;
        $reason  = null;
        $sent    = null;

        if(!Sms::send($contact->phone, $bcast->text)){
            $reason  = Sms::lastError();
            $success = false;
        }else{
            $sent    = date('Y-m-d H:i:s');
        }

        $bcast_set = [
            'status' => 2
        ];
        if($success)
            $bcast_set['sent'] = ['__inc', 1];
        else
            $bcast_set['fail'] = ['__inc', 1];

        BCast::set($bcast_set, ['id'=>$bcast->id]);

        $bcast = BCast::getOne(['id'=>$bcast->id]);
        if($bcast->total <= ($bcast->sent + $bcast->fail))
            BCast::set(['status'=>3], ['id'=>$bcast->id]);

        $item_set = [
            'status' => $success ? 3 : 1,
            'reason' => $reason,
            'sent'   => $sent
        ];
        BItem::set($item_set, ['id'=>$item->id]);

        Bash::json(['error'=>false, 'data'=>( $reason ?? 'Success' )]);
    }
}