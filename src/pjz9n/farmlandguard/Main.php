<?php

/**
 * Copyright (c) 2020 PJZ9n.
 *
 * This file is part of FarmlandGuard.
 *
 * FarmlandGuard is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * FarmlandGuard is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with FarmlandGuard. If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace pjz9n\farmlandguard;

use pocketmine\block\Dirt;
use pocketmine\block\Farmland;
use pocketmine\event\block\BlockFormEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener
{
    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function guardFarmland(BlockFormEvent $event): void
    {
        $block = $event->getBlock();
        $newState = $event->getNewState();
        $event->setCancelled($block instanceof Farmland && $newState instanceof Dirt);
    }
}
