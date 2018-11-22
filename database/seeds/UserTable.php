<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
$data=array(
[
'name' => 'admin',
'email' => 'admin@admin.com',
'password'=> \hash::make('admin'),
'created_at'=> new DateTime,
'updated_at'=> new DateTime,

]

);

    }
}
