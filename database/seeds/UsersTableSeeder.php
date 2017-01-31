<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class UsersTableSeeder extends Seeder
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
            'name'=>'Fernando',
            'last_name'=>'Sialer Ayala',
            'email'=>'alexis_s309@hotmail.com'
            'password'=>bcrypt('admin');
            'type'=>'admin',
            'active'=>1,
            'address'=>'3 de octubre 575'
        ]);
        User::insert($data)
    }
}
