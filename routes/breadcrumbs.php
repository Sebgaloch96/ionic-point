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
    $trail->push('Find Jobs', route('hub.jobs'));
});
Breadcrumbs::for('jobs.create', function ($trail) {
    $trail->push('Create Job', route('hub.jobs.create'));
});
Breadcrumbs::for('jobs.manage', function ($trail) {
    $trail->push('Manage Jobs', route('hub.jobs.manage'));
});

// Calendar
Breadcrumbs::for('calendar', function ($trail) {
    $trail->push('Calendar', route('hub.calendar'));
});