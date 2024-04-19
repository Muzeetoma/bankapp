<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Carbon\Carbon;

class TimeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = User::findorfail(7);

        $time = $user->updated_at;

        $unixTimestamp = is_numeric($time) ? $time : strtotime($time);

        print("User: ".$unixTimestamp);

        $currentDateTime = $unixTimestamp;
        $currentTimestamp = time();
        $fiveMinutesAgo = $currentTimestamp - (5 * 60);

        $isExpired = $currentDateTime > $fiveMinutesAgo;

        print("\n Time: ".($isExpired ? 'true' : 'false'));
    }
}
