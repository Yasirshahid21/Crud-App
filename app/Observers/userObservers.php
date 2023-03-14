<?php

namespace App\Observers;

use App\Models\{User, Student, StudentCourse};
use Illuminate\Support\Facades\DB;

class userObservers
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
        $id = $user->id;
        $students = Student::where('user_id', $id)->get();
        foreach ($students as $student) {
            foreach ($student->courses as $course) {
                StudentCourse::where('course_id', $course->id)->where('student_id', $student->id)->delete();
            }
        }
        Student::find($student->id)->delete();
        // return redirect(route('user.index'))->with('success','Delete user successfully');
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
