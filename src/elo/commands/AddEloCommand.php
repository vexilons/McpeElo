<?php

namespace elo\commands;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use elo\Elo;
use pocketmine\utils\TextFormat as TF;
use pocketmine\Player;

class AddEloCommand extends PluginCommand {

   private $main;

	public function __construct(Elo $main, $name) {
		parent::__construct($name, $main);
		$this->main = $main;
		$this->setPermission("addelo.command");
	}

	public function execute(CommandSender $sender, $currentAlias, array $args) {
          if($this->testPermission($sender)){

           if(!isset($args[0])){
             $sender->sendMessage(TF::RED."Use: /addelo <player> <elo>");
              }
    
            if(isset($args[0])){
              $name = $args[0];
              if(isset($args[1])){
                 $lol = $args[1];
                  $elo = (int)$lol;
                   $this->main->addElo($name, $elo);
                    $sender->sendMessage(Elo::prefix.TF::GREEN."Successfully added ".$elo." From elo to player ".$name);
                }
           }
       }
   }
}
