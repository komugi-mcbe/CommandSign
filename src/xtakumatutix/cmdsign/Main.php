<?php

namespace xtakumatutix\cmdsign;

use pocketmine\plugin\PluginBase;

Class Main extends PluginBase 
{
    public function onEnable() 
    {
        $this->getLogger()->notice("読み込み完了 - ver.".$this->getDescription()->getVersion());
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
    }
}