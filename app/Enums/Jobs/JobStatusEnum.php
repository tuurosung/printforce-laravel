<?php

namespace App\Enums\Jobs;

use App\Traits\System\EnumTrait;

enum JobStatusEnum: string
{
    use EnumTrait;
    
    case PENDING = "pending";
    case PROCESSING = "processing";
    case COMPLETED = "completed";
    case CANCELED = "cancelled";

}
