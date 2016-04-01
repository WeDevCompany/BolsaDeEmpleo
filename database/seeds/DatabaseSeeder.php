<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();
        $this->call(OurUsersSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(WorkCentersSeeder::class);
        $this->call(CyclesProfFamiliesSeeder::class);
        //$this->call(InformaticaSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(JobOffersSeeder::class);
        $this->call(OfferTagsSeeder::class);
        $this->call(TeacherProfFamiliesSeeder::class);
        $this->call(SubjectTeachersSeeder::class);
        $this->call(TutorsSeeder::class);
        $this->call(StudentCyclesSeeder::class);
        $this->call(SubcriptionsSeeder::class);
        $this->call(SentEmailsSeeder::class);
        $this->call(CommentsSeeder::class);
        $this->call(VerifiedSeeder::class);
    	Model::reguard();
    }
}
