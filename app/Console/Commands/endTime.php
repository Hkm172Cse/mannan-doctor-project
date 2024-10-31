<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use App\Models\TimeSheet;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;

class endTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'endtime:endtime';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Close Automatic office time';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $autoEndTime = '17:00:00';
        $infoData = TimeSheet::where('end_time', null)->get();
        foreach($infoData as $data){
            TimeSheet::where('id', $data->id)->update([
                'end_time'=>$autoEndTime,
                'total_time'=>Helper::TimeDifference($data->start_time, $autoEndTime),
            ]); 
        }
    }
}
