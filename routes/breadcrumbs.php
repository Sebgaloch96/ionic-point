<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
/**
 * Breadcrumbs for the hub area only
 */

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('hub.dashboard'));
});

// Jobs
Breadcrumbs::for('jobs', function ($trail) {
    $trail->push('Jobs', route('hub.jobs'));
});

// Calendar
Breadcrumbs::for('calendar', function ($trail) {
    $trail->push('Calendar', route('hub.calendar'));
});