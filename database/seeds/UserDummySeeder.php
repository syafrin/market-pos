<?php

use Illuminate\Database\Seeder;

class UserDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new \App\User;
        $user1->username = "gery";
        $user1->level ="staf";
        $user1->name = "Gery Santoso";
        $user1->email = "gery@mail.com";
        $user1->password = \Hash::make("gery123");
        $user1->save();

        // $user2 = new \App\User;
        // $user2->username = "dita";
        // $user2->level ="staf";
        // $user2->name = "Dita Susanti";
        // $user2->email = "dita@mail.com";
        // $user2->password = \Hash::make("dita");
        // $user2->save();

        // $user3 = new \App\User;
        // $user3->username = "dika";
        // $user3->level = "staf";
        // $user3->name = "Dika Cahyani";
        // $user3->email = "dika@mail.com";
        // $user3->password = \Hash::make("dika");
        // $user3->save();
        // $this->command->info("User dibuat");
    }
}
