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
    $trail->parent('dashboard');
    $trail->push('Find Jobs', route('hub.jobs'));
});
Breadcrumbs::for('jobs.manage', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Manage Jobs', route('hub.jobs.manage'));
});
Breadcrumbs::for('jobs.create', function ($trail) {
    $trail->parent('jobs.manage');
    $trail->push('Create Job', route('hub.jobs.create'));
});

// Calendar
Breadcrumbs::for('calendar', function ($trail) {
    $trail->push('Calendar', route('hub.calendar'));
});