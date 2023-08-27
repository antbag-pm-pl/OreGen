<?php

namespace antbag\oregen;

use pocketmine\plugin\PluginBase;
use pocketmine\event\block\BlockFormEvent;
use pocketmine\block\VanillaBlocks;

class Main extends PluginBase {

  public function onEnable(): void {
  }

  public function BlockUpdate(BlockFormEvent $event) {
    $block = $event->getBlock();
    $world = $block->getPosition()->getWorld();
    $randomOre = mt_rand(1, 10);
    
    if ($randomOre <= 3) {
      $oreType = mt_rand(1, 3);
      $oreBlock = null;
      switch ($oreType) {
        case 1:
          $oreBlock = VanillaBlocks::COAL_ORE();
        break;
        case 2:
          $oreBlock = VanillaBlocks::IRON_ORE();
        break;
        case 3:
          $oreBlock = VanillaBlocks::GOLD_ORE();
        break;
      }
      if ($oreBlock !== null) {
        $world->setBlock($block->getPosition(), $oreBlock);
      }
    }
  }
}
