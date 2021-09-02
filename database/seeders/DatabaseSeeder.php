<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\School;
use \App\Models\Student;
use \App\Models\Guardian;
use \App\Models\Classes;
use App\Models\CohortSession;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\GradeScale;
use App\Models\Permission;
use App\Models\Role;
use App\Models\SessionType;
use \App\Models\Year;
use \App\Models\Stream;
use App\Models\StudyMode;
use \App\Models\Subject;
use \App\Models\Term;
use \App\Models\SubjectFamily;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Add truncate to prevent exception from duplicate data
        // Permission::truncate();
        User::truncate();
        // School::truncate();
        // Guardian::truncate();
        // Student::truncate();

        Permission::factory(4)->create();
        Role::factory(4)->create();
        $user = User::factory(2)->create();

        $school = School::create([
            'name' => 'Siaya Township Secondary School',
            'county' => 'siaya',
            'subcounty' => 'Alego Usonga',
            'postal_address' => 'P.O Box 873',
            'postal_code' => '40600',
            'tel_number' => '+254700000000',
            'email' => 'info@siayatownshipsec.ac.ke'
        ]);


        $term = Term::create([
            'name' => 'Term One',
            'opening_date' => '2021-5-12',
            'closing_date' => '1993-7-12',
            'next_term_date' => '1993-8-2'
        ]);

        $sessiontype1 = SessionType::create([
            'name' => 'TERM',
        ]);
        $sessiontype2 = SessionType::create([
            'name' => 'SEMESTER',
        ]);

        $study1 = StudyMode::create([
            'name' => 'REGULAR'
        ]);

        $study2 =StudyMode::create([
            'name' => 'BOARDER'
        ]);

        $cohortsession = CohortSession::create([
            'session_type_id' => $sessiontype1->id,
            'name' => 'TERM 1 2021',
            'academic_year'=> '2021',
            'start_date' => '2021-08-01',
            'end_date' => '2021-11-12'
        ]);

        $exam = Exam::create([
            'name' => '1st Term Exam - 2021',
            'cohort_session_id' => $cohortsession->id
        ]);

        $grade = Grade::create([
            'name' => 'KNEC',
            'exam_id' => $exam->id
        ]);

        GradeScale::create([
            'grade_id' => $grade->id,
            'min_mark' => 80,
            'max_mark' => 100,
            'letter_grade' => 'A-',
            'grade_point' => 12,

        ]);



        $class1 = Classes::create([
            'cohort_session_id' => $cohortsession->id,
            'study_mode_id' => $study1->id,
            // 'year_id' => $year->id,
            // 'term_id' => $term->id,
            'name' => 'Form 1',
            'start_date' => '1993-6-12',
            'end_date' => '1993-6-12',
            'notes' =>'On going'

        ]);

        $class2 = Classes::create([
            'cohort_session_id' => $cohortsession->id,
            'study_mode_id' => $study2->id,
            // 'year_id' => $year->id,
            // 'term_id' => $term->id,
            'name' => 'Form 2',
            'start_date' => '1993-6-12',
            'end_date' => '1993-6-12',
            'notes' =>'On going'

        ]);

        $stream1 = Stream::create([
            // 'classes_id' => $class1->id,
            'name' => 'Blue',

        ]);



        $stream2 = Stream::create([
            // 'classes_id' => $class1->id,
            'name' => 'White',

        ]);


        $guardian2 = Guardian::create([
            'idnumber' => '29554433',
            'name' => 'Wamalwa Timothy John',
            'profession' => 'Lawyer',
            'tel_number' => '+254722000000',
            'email' => 'wamalwatimothy@gmail.com',
            'gender' => 'Male'

        ]);

        $guardian1 = Guardian::create([
            'idnumber' => '32354433',
            'name' => 'Awuor Pamela Atieno',
            'profession' => 'Teacher',
            'tel_number' => '+254722000000',
            'email' => 'pamelaawuor@gmail.com',
            'gender' => 'Female'

        ]);

        $subjfamily = SubjectFamily::create([
            'name' => 'Languages'
        ]);

        $subjfamily2 = SubjectFamily::create([
            'name' => 'Sciences'
        ]);




        Student::create([
            // 'school_id' => $school->id,
            'guardian_id' => $guardian2->id,
            'classes_id' => $class1->id,
            'adminno' => 'STS/001',
            // 'stream' => $stream1->id,
            'name' => 'Ochieng Emmanuel Odhiambo',
            'dob' => '1993-6-12',
            'enrollment' => '2021-6-23',
            'gender' => 'male',

        ]);

        Student::create([
            // 'school_id' => $school->id,
            'guardian_id' => $guardian1->id,
            'classes_id' => $class2->id,
            'adminno' => 'STS/002',
            // 'stream' => $stream2->id,
            'name' => 'Omondi Brenda Atieno',
            'dob' => '1994-6-12',
            'enrollment' => '2021-6-23',
            'gender' => 'female',


        ]);

        Subject::create([
            // 'classes_id' => $class1->id,
            'subject_family_id' => $subjfamily->id,
            // 'exam_id' => $exam->id,
            'code' => '100',
            'name'=> 'English'
        ]);

        Subject::create([
            // 'classes_id' => $class1->id,
            'subject_family_id' => $subjfamily->id,
            // 'exam_id' => $exam->id,
            'code' => '101',
            'name'=> 'Kiswahili'
        ]);
        Subject::create([
            // 'classes_id' => $class1->id,
            'subject_family_id' => $subjfamily->id,
            // 'exam_id' => $exam->id,
            'code' => '102',
            'name'=> 'French'
        ]);

        Subject::create([
            // 'classes_id' => $class1->id,
            'subject_family_id' => $subjfamily2->id,
            // 'exam_id' => $exam->id,
            'code' => '103',
            'name'=> 'Chemistry'
        ]);



    }
}
