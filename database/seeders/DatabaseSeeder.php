<?php

namespace Database\Seeders;

use App\Models\{DonationChannel,User};
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(['email' => env('ADMIN_EMAIL', 'admin@example.com')], ['name' => 'Shelter Admin','password' => Hash::make(env('ADMIN_PASSWORD', 'ChangeMe!12345'))]);
        foreach ([['KBZPay','Shelter Account','09XXXXXXXXX'],['CBPay','Shelter Account','09XXXXXXXXX'],['WaveMoney','Shelter Account','09XXXXXXXXX']] as $i => [$provider,$name,$number]) DonationChannel::updateOrCreate(['provider'=>$provider],['account_name'=>$name,'account_number'=>$number,'sort_order'=>$i,'is_active'=>true]);
    }
}
