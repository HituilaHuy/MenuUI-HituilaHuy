<?php

namespace MenuAuto;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;

use jojoe77777\FormAPI\SimpleForm;

class Main extends PluginBase {

	public function onEnable() :void { }
	
	public function onCommand(CommandSender $player, Command $command, string $label, array $args) : bool {
		if(strtolower($command->getName()) === "auto"){
			if($sender instanceof Player){
				$this->OpenMenu($sender);
			}else $sender->sendMessage("use command ingame !!");
		}
	    return true;
	}

	public function OpenMenu(Player $sender):void{
		$form = new SimpleForm(function (Player $sender, ?int $data){
			if(is_null($data)) return;
			switch($data){
				case 0:
				$cmd = "autofeed on";
				$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
				break;
				case 1:
				$cmd = "autosell on";
				$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
				break;
				
			}
		});
		$form->setTitle("§l§a♦ §6MenuAuto §a♦");
		$form->setContent("§l§a+ Chọn để bật chế độ Auto !");
		$form->addButton("§l§e• §aAuto Feed §l§e•");
		$form->addButton("§l§e• §aAuto Sell §l§e•");
   		$form->addButton("§l§cThoát");
		$form->sendToPlayer($sender);
	}
}
