<?php

namespace LEET;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\level\{Level,Position};
use pocketmine\math\Vector3;

class Wild extends PluginBase implements Listener {
	
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info("slashWild is enabled!");
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $param ) {
		switch(strtolower($cmd->getName())) {
		
			case "wild":
				if($sender->hasPermission("wild")) {
					if($sender instanceof Player) {
						
						$x = rand(1,999);
						$y = 128;
						$z = rand(1,999);
						
						$sender->teleport(new Position($x,$y,$z));
						$sender->sendTip("WILD");
						 
					}
					else {
						$sender->sendMessage("Only in-game!");
					}
				}
				else {
					$sender->sendMessage("You have no permission to use this command!");
				}
				return true;
			break;
		
		}
	}
	
	public function onDisable() {
		$this->getLogger()->info("slashWild has been disabled!");
	}
	
}
