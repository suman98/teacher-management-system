<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $faker;

    public function __construct(Faker $faker){

    	$this->faker = $faker->create();
		$this->faker->addProvider(new \Bezhanov\Faker\Provider\Educator($this->faker));
    }

    public function run()
    {
        	
       foreach(range(1,100) as $i){


	       	DB::table('courses')->insert([
	       		'faculty_id'=>DB::table('faculties')->get()->random()->id,
	       		'name'=>$this->faker->course,
	        ]);


       }
     
    }
}
