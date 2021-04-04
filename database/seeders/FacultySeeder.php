<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
 
   
   		public function run()
    {
        
       $facultiesName = ['Science','Management','Humanities'];

       foreach ($facultiesName as $key => $value) {
     	
	       	DB::table('faculties')->insert([
	       	
	       		'name'=>$value,
	        ]);
       }
     
     
    }
}
