<?php

/*
 * This file is part of askvortsov/flarum-help-tags
 *
 *  Copyright (c) 2021 Alexander Skvortsov.
 *
 *  For detailed copyright and license information, please view the
 *  LICENSE file that was distributed with this source code.
 */

namespace Hecksadecimal\FlarumHelpTags\Access;

use Flarum\User\Access\AbstractPolicy;
use Flarum\User\User;

class GlobalPolicy extends AbstractPolicy
{
    public function can(User $actor, string $ability)
    {
        if ($ability === 'viewForum' && $actor->can('startDiscussion')) {
            return $this->forceAllow();
        } elseif ($ability === 'reply' && $actor->can('startDiscussion')) {
            return $this->forceAllow();
        }

        if ($ability === 'reply' && $actor->can('startDiscussion')) {
            return $this->forceAllow();
        }
    }
}
