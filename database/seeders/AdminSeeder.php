<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Category;
use App\Models\News;
use App\Models\Ad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.php artisan db:seed --class=AdminSeeder
     */
    public function run(): void
    {
        
        
        \DB::table('roles')->insert(
            [
                ['name' => 'admin'],
                
            ]
        );
       
       
        \DB::table('categories')->insert(
            [
                ['name' => 'Sports', 'slug' => 'Sports','user_id' => '1'],
                
            ]
        );
       
        $admin = new User();
  
        $admin->name='Admin';
        $admin->email='admin@admin.com';
        $admin->password=Hash::make('admin');//password
        $admin->role_id ='1';
        $admin->status ='1';
        $admin->save();
       
       
       
    }
}