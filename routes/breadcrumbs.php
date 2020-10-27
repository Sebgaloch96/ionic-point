<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
/**
 * Breadcrumbs for the hub area only
 */

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('hub.dashboard'));
});