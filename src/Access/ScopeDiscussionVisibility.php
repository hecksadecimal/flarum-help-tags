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

use Flarum\User\User;
use Illuminate\Database\Eloquent\Builder;

class ScopeDiscussionVisibility
{
    /**
     * @param User    $actor
     * @param Builder $query
     */
    public function __invoke(User $actor, Builder $query)
    {
        if (!$actor->isGuest()) {
            $query->orWhere('discussions.user_id', $actor->id);
        }

        $query->orWhere('discussions.show_to_all', true);
    }
}
