<?php

namespace App\Traits;

use App\Models\AdminLog;

trait  AdminLogs
{
    public function adminLog($action): string
    {
        return AdminLog::create([
            'action' => $action,
            'admin_id' => auth('admin')->id(),
        ]);
    }
}
