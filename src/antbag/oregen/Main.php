<?php

namespace antbag\oregen;

use pocketmine\plugin\PluginBase;
use pocketmine\event\block\BlockFormEvent;
use pocketmine\block\VanillaBlocks;
use pocketmine\utils\Config;

class Main extends PluginBase {

  public function onEnable(): void {
    $this->saveDefaultConfig();
    $config = $this->getConfig();
  }

  public function BlockUpdate(BlockFormEvent $event) {
    $block = $event->getBlock();
    $world = $block->getPosition()->getWorld();
    $randomOre = mt_rand(1, 10);
    
    $config = $this->getConfig();
    
    
    if ($randomOre <= 3) {
        $coalOreChance = $config->get("coal-ore-chance");
        $ironOreChance = $config->get("iron-ore-chance");
        $goldOreChance = $config->get("gold-ore-chance");
        
        $oreType = mt_rand(1, $coalOreChance + $ironOreChance + $goldOreChance);
        
        if ($oreType <= $coalOreChance) {
            $oreBlock = VanillaBlocks::COAL_ORE();
        } elseif ($oreType <= $coalOreChance + $ironOreChance) {
            $oreBlock = VanillaBlocks::IRON_ORE();
        } else {
            $oreBlock = VanillaBlocks::GOLD_ORE();
        }
        
        // Set the new ore block at the same position as the original block
        $world->setBlock($block->getPosition(), $oreBlock);
        
        // Cancel the event to prevent default block formation
        $event->cancel();
    }
  }
}
