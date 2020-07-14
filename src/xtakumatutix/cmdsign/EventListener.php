<?php

namespace xtakumatutix\cmdsign;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\block\Block;
use pocketmine\level\Level;
use pocketmine\tile\Tile;
use pocketmine\tile\Sign;

class EventListener implements Listener 
{
    private $Main;

    public function __construct(Main $Main)
    {
        $this->Main = $Main;
    }

    public function onTap(PlayerInteractEvent $event)
    {
        $player = $event->getPlayer();
        $tile = $event->getBlock()->getLevel()->getTile($event->getBlock());
        if ($tile instanceof Sign) {
            if ($tile->getLine(0) == 'cmd') {
                $cmd = $tile->getLine(1);
                $this->Main->getServer()->dispatchCommand($player, $cmd);
            }
        }
    }
}