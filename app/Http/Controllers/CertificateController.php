<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\User;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CertificateController extends Controller
{


    public function index(Request $request)
    {
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);
        $user->lessons()->syncWithoutDetaching([
            $request->id_lesson => ['status' => true],
        ]);
        $lessonIds = $user->lessons()->where('course_id', $request->course_id)->pluck('id')->toArray();

        $lessons = $user->lessons()
            ->whereIn('lesson_id', $lessonIds)
            ->get();

        $statusCounts = $lessons->groupBy('pivot.status')
            ->map(function ($group) {
                return $group->count();
            });

        $trueCount = $statusCounts->get(true, 0);

        $totalLessons = count($lessonIds);
        //
        $str = rand();
        $result = md5($str);
        $string = substr($result, 0, 10);

        $token = $string . "-" . $user_id . "-" . $request->course_id . "-";
        // $categories = Category::all();
        if ($trueCount == $totalLessons) {
            Certificate::create([
                'user_id' => $user_id,
                'course_id' => $request->course_id, 'photo' => 'kosong',
                'completed_date' => date("Y-m-d"),
                'token' => $token . date("Y-m-d"),

            ]);
            $exist_certificates = Certificate::where('user_id', $user_id)->where('course_id', $request->course_id)->first();
            return redirect()->back()->with('existCertificates', $exist_certificates);
        } else {
            return redirect()->back()->with('status', 'Mohon selesaikan course terlebih dahulu');
        }
    }

    public function download(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $course =     Course::findOrFail($request->course_id);
        $namaCertificate = $user->name . "-" . $course->title;
        $certificate = Certificate::where('course_id',  $request->course_id)
            ->where('user_id', Auth::id())
            ->first();
        $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->loadView('member.certificate.download', compact('certificate'))->setPaper('a4', 'landscape');

        // return $pdf->download('test.pdf');
        return $pdf->stream($namaCertificate . ".pdf");
    }
}


// Route::get('/pdf-testing', function () {
//     $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
//         ->loadView('certificates')->setPaper('a4', 'landscape');
//     // return $pdf->download('pdf_file.pdf');
//     return $pdf->stream();
// });

// Route::get('pdf', function () {
//     return view('certificates');
// });
