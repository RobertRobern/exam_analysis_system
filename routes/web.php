<?php

use App\Http\Controllers\GuardianController;
use App\Http\Controllers\MarksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
    // return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboardv1');
})->middleware(['auth'])->name('dashboardv1');

require __DIR__.'/auth.php';

// Route::get('/dashboardv1', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboardv1');
// Route::get('/grade', [App\Http\Controllers\GradeController::class, 'index'])->name('grade');
Route::get('/teachers', [App\Http\Controllers\TeacherController::class, 'index'])->name('teachers');


// SCHOOL
Route::get('/school', [App\Http\Controllers\SchoolController::class, 'index'])->name('school');
// Route::get('/add-school', [App\Http\Controllers\SchoolController::class, 'addSchool'])->name('school.add');
Route::get('/edit-school/{id}', [App\Http\Controllers\SchoolController::class, 'editSchool'])->name('school.edit');
Route::get('/delete-school/{id}', [App\Http\Controllers\SchoolController::class, 'deleteSchool'])->name('school.delete');

//POST
Route::post('/save-school', [App\Http\Controllers\SchoolController::class, 'saveSchool'])->name('school.save');
Route::post('/update-school', [App\Http\Controllers\SchoolController::class, 'updateSchool'])->name('school.update');

//GUARDIAN
Route::get('/guardian', [App\Http\Controllers\GuardianController::class, 'index'])->name('guardian');
Route::get('/edit-guardian/{id}', [App\Http\Controllers\GuardianController::class, 'editGuardian'])->name('guardian.edit');
Route::get('/delete-guardian/{id}', [App\Http\Controllers\GuardianController::class, 'deleteGuardian'])->name('guardian.delete');

// POST
Route::post('/save-guardian', [App\Http\Controllers\GuardianController::class, 'saveGuardian'])->name('guardian.save');
Route::post('/update-guardian', [App\Http\Controllers\GuardianController::class, 'updateGuardian'])->name('guardian.update');

// STUDENT
Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->name('student');
Route::get('/edit-student/{id}', [App\Http\Controllers\StudentController::class, 'editStudent'])->name('student.edit');
Route::get('/delete-student/{id}', [App\Http\Controllers\StudentController::class, 'deleteStudent'])->name('student.delete');

// POST
Route::post('/save-student', [App\Http\Controllers\StudentController::class, 'saveStudent'])->name('student.save');
Route::post('/update-student', [App\Http\Controllers\StudentController::class, 'updateStudent'])->name('student.update');

// sessionType
Route::get('/sessiontype', [App\Http\Controllers\SessionTypeController::class, 'index'])->name('sessiontype');
Route::get('/edit-sessiontype/{id}', [App\Http\Controllers\SessionTypeController::class, 'editSessionType'])->name('sessiontype.edit');
Route::get('/delete-sessiontype/{id}', [App\Http\Controllers\SessionTypeController::class, 'deleteSessionType'])->name('sessiontype.delete');

// POST
Route::post('/save-sessiontype', [App\Http\Controllers\SessionTypeController::class, 'saveSessionType'])->name('sessiontype.save');
Route::post('/update-sessiontype', [App\Http\Controllers\SessionTypeController::class, 'updateSessionType'])->name('sessiontype.update');

// cohortsession
Route::get('/cohortsession', [App\Http\Controllers\CohortSessionController::class, 'index'])->name('cohortsession');
Route::get('/edit-cohortsession/{id}', [App\Http\Controllers\CohortSessionController::class, 'editCohortSession'])->name('cohortsession.edit');
Route::get('/delete-cohortsession/{id}', [App\Http\Controllers\CohortSessionController::class, 'deleteCohortSession'])->name('cohortsession.delete');

// POST
Route::post('/save-cohortsession', [App\Http\Controllers\CohortSessionController::class, 'saveCohortSession'])->name('cohortsession.save');
Route::post('/update-cohortsession', [App\Http\Controllers\CohortSessionController::class, 'updateCohortSession'])->name('cohortsession.update');

// classes
Route::get('/classes', [App\Http\Controllers\ClassesController::class, 'index'])->name('classes');
Route::get('/edit-classes/{id}', [App\Http\Controllers\ClassesController::class, 'editClasses'])->name('classes.edit');
Route::get('/delete-classes/{id}', [App\Http\Controllers\ClassesController::class, 'deleteClasses'])->name('classes.delete');

// POST
Route::post('/save-classes', [App\Http\Controllers\ClassesController::class, 'saveClasses'])->name('classes.save');
Route::post('/update-classes', [App\Http\Controllers\ClassesController::class, 'updateClasses'])->name('classes.update');

// studymode
Route::get('/studymode', [App\Http\Controllers\StudyModeController::class, 'index'])->name('studymode');
Route::get('/edit-studymode/{id}', [App\Http\Controllers\StudyModeController::class, 'editStudyMode'])->name('studymode.edit');
Route::get('/delete-studymode/{id}', [App\Http\Controllers\StudyModeController::class, 'deleteStudyMode'])->name('studymode.delete');

// POST
Route::post('/save-studymode', [App\Http\Controllers\StudyModeController::class, 'saveStudyMode'])->name('studymode.save');
Route::post('/update-studymode', [App\Http\Controllers\StudyModeController::class, 'updateStudyMode'])->name('studymode.update');

// stream
Route::get('/stream', [App\Http\Controllers\StreamController::class, 'index'])->name('streams');
Route::get('/edit-stream/{id}', [App\Http\Controllers\StreamController::class, 'editStream'])->name('stream.edit');
Route::get('/delete-stream/{id}', [App\Http\Controllers\StreamController::class, 'deleteStream'])->name('stream.delete');

// POST
Route::post('/save-stream', [App\Http\Controllers\StreamController::class, 'saveStream'])->name('stream.save');
Route::post('/update-stream', [App\Http\Controllers\StreamController::class, 'updateStream'])->name('stream.update');

// gradescale
Route::get('/gradescale', [App\Http\Controllers\GradeScaleController::class, 'index'])->name('gradescale');
Route::get('/edit-gradescale/{request}/{id}', [App\Http\Controllers\GradeScaleController::class, 'editGradeScale'])->name('gradescale.edit');
Route::get('/delete-gradescale/{id}', [App\Http\Controllers\GradeScaleController::class, 'deleteGradeScale'])->name('gradescale.delete');

// POST
Route::post('/save-gradescale', [App\Http\Controllers\GradeScaleController::class, 'saveGradeScale'])->name('gradescale.save');
Route::post('/update-gradescale', [App\Http\Controllers\GradeScaleController::class, 'updateGradeScale'])->name('gradescale.update');

// grades
Route::get('/grade/{id}', [App\Http\Controllers\GradeController::class, 'findGradeScale'])->name('grade.find');
Route::get('/grade', [App\Http\Controllers\GradeController::class, 'index'])->name('grade');
Route::get('/edit-grade/{id}', [App\Http\Controllers\GradeController::class, 'editGrade'])->name('grade.edit');
Route::get('/delete-grade/{id}', [App\Http\Controllers\GradeController::class, 'deleteGrade'])->name('grade.delete');

// POST
Route::post('/save-grade', [App\Http\Controllers\GradeController::class, 'saveGrade'])->name('grade.save');
Route::post('/update-grade', [App\Http\Controllers\GradeController::class, 'updateGrade'])->name('grade.update');

// subject
Route::get('/subject', [App\Http\Controllers\SubjectController::class, 'index'])->name('subjects');
Route::get('/edit-subject/{id}', [App\Http\Controllers\SubjectController::class, 'editSubject'])->name('subject.edit');
Route::get('/delete-subject/{id}', [App\Http\Controllers\SubjectController::class, 'deleteSubject'])->name('subject.delete');

// POST
Route::post('/save-subject', [App\Http\Controllers\SubjectController::class, 'saveSubject'])->name('subject.save');
Route::post('/update-subject', [App\Http\Controllers\SubjectController::class, 'updateSubject'])->name('subject.update');


// subjectFamily
Route::get('/subj-family', [App\Http\Controllers\SubjectFamilyController::class, 'index'])->name('subj-family');
Route::get('/edit-subjectfamily/{id}', [App\Http\Controllers\SubjectFamilyController::class, 'editSubjectFamily'])->name('subjectfamily.edit');
Route::get('/delete-subjectfamily/{id}', [App\Http\Controllers\SubjectFamilyController::class, 'deleteSubjectFamily'])->name('subjectfamily.delete');

// POST
Route::post('/save-subjectfamily', [App\Http\Controllers\SubjectFamilyController::class, 'saveSubjectFamily'])->name('subjectfamily.save');
Route::post('/update-subjectfamily', [App\Http\Controllers\SubjectFamilyController::class, 'updateSubjectFamily'])->name('subjectfamily.update');

// exam
Route::get('/exam', [App\Http\Controllers\ExamController::class, 'index'])->name('exam');
Route::get('/edit-exam/{id}', [App\Http\Controllers\ExamController::class, 'editExam'])->name('exam.edit');
Route::get('/delete-exam/{id}', [App\Http\Controllers\ExamController::class, 'deleteExam'])->name('exam.delete');

// POST
Route::post('/save-exam', [App\Http\Controllers\ExamController::class, 'saveExam'])->name('exam.save');
Route::post('/update-exam', [App\Http\Controllers\ExamController::class, 'updateExam'])->name('exam.update');

// marks
Route::get('/search-mark', [App\Http\Controllers\MarksController::class, 'search'])->name('search.mark');
Route::get('/mark', [App\Http\Controllers\MarksController::class, 'index'])->name('mark');
Route::get('/edit-mark/{id}', [App\Http\Controllers\MarksController::class, 'editMark'])->name('mark.edit');
Route::get('/delete-mark/{id}', [App\Http\Controllers\MarksController::class, 'deleteMark'])->name('mark.delete');

// POST
Route::post('/save-mark', [App\Http\Controllers\MarksController::class, 'saveMark'])->name('mark.save');
Route::post('/update-mark', [App\Http\Controllers\MarksController::class, 'updateMark'])->name('mark.update');
