<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function create(Request $course_id)
    {
        $chapters = Chapter::where('course_id',$course_id->course)->get();
        $data = view('components.admin.course.modal.lesson.add', compact('chapters'))->render();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        if ($request->lesson_type === "video") {
            $lesson = Lesson::create(
                array_merge(
                    $request->all(),
                    ['sort' => Lesson::where('chapter_id', $request->chapter_id)->max('sort') + 1 ?? 0]
                )
            );

            $data = $lesson->lessonVideo()->create(
                $request->all([
                    'video_path'
                ])
            );
        }

        if ($request->ajax()) {
            session()->flash('success', 'Thêm bài học thành công');
            return response()->json(['success' => true], 201);
        }
        return redirect()
            ->back()
            ->with('success', 'Thêm bài học thành công');
    }

    public function destroy($lesson)
    {
        $data = Lesson::destroy($lesson);
        return response()->json(null, 200);
    }

    public function update(Request $request, Lesson $lesson)
    {
        if ($request->lesson_type === "video") {
            $lesson->update($request->all());
            $lesson->lessonVideo()
                ->update(
                    $request->all(['video_path'])
                );
        }

        if ($request->ajax()) {
            session()->flash('success', 'Sửa bài học thành công');
            return response()->json(['success' => true], 201);
        }
        return redirect()
            ->back()
            ->with('success', 'Sửa bài học thành công');
    }

    public function show(Request $request, Lesson $lesson)
    {
        $chapters = Course::findOrFail($request->course)->chapters;
        $data = view('components.admin.course.modal.lesson.edit', compact('lesson', 'chapters'))->render();
        return response()->json($data, 200);
    }

    public function showSort(Chapter $chapter)
    {
        $data = view('components.admin.course.modal.lesson.sort', compact('chapter'))->render();
        return response()->json($data, 201);
    }

    public function sort(Request $request)
    {
        foreach ($request->lessons as $key => $lesson_id) {
            $lesson = Lesson::findOrFail($lesson_id);
            $lesson->sort = $key;
            $lesson->save();
        }
        if ($request->ajax()) {
            session()->flash('success', 'sắp xếp thành công');
            return response()->json(['success' => true], 201);
        }
        return redirect()
            ->back()
            ->with('success', 'sắp xếp thành công');
    }
}
