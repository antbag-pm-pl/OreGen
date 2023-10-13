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
    $randomOre = mt_rand(1, 140);

    if ($randomOre <= 50) {
        $oreBlock = VanillaBlocks::COAL_ORE();
    } elseif ($randomOre <= 90) {
        $oreBlock = VanillaBlocks::IRON_ORE();
    } elseif ($randomOre <= 120) {
        $oreBlock = VanillaBlocks::GOLD_ORE();
    } elseif ($randomOre <= 130) {
        $oreBlock = VanillaBlocks::DIAMOND_ORE();
    } elseif ($randomOre <= 135) {
        $oreBlock = VanillaBlocks::EMERALD_ORE();
    } elseif ($randomOre <= 137) {
        $oreBlock = VanillaBlocks::LAPIS_LAZULI_ORE();
    } elseif ($randomOre <= 138) {
        $oreBlock = VanillaBlocks::REDSTONE_ORE();
    } elseif ($randomOre <= 139) {
        $oreBlock = VanillaBlocks::COPPER_ORE();
    } else {
        $oreBlock = VanillaBlocks::NETHER_QUARTZ_ORE();
    }

    if ($oreBlock !== null) {
        $event->cancel();
        $world->setBlock($block->getPosition(), $oreBlock);
    }
  }
}
