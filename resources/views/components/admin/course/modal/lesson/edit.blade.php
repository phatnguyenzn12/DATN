<form action="{{ route('admin.lesson.put', $lesson->id) }}" class="has-validation-ajax" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <p class="text-danger errors system"></p>

    <div class="form-group">
        <label>Tên bài học</label>
        <input type="text" class="form-control" placeholder="Nhập tên bài học" name="title"
            value="{{ $lesson->title }}">
        <p class="text-danger errors title"></p>
    </div>
    <div class="form-group">
        <label>Chương học</label>
        <select name="chapter_id" id="section_id" class="form-control">
            @foreach ($chapters as $chapter)
                <option value="{{ $chapter->id }}" @selected($chapter->id == $lesson->chapter_id ? true : '')>{{ $chapter->title }}</option>
            @endforeach
        </select>
        <p class="text-danger errors section_id"></p>
    </div>

    <div class="form-group">
        <label>Nội dung</label>
        <textarea name="content" class="form-control" placeholder="Nhập nội dung">{{ $lesson->content }}</textarea>
    </div>

    @if ($lesson->lesson_type == 'video')
        <div class="form-group">
            <label>Đường dẫn video</label>
            <input type="text" name="video" placeholder="https://www.youtube.com/watch?v=sLq57LTJ8VU"
                value="{{ $lesson->lessonVideo->video_path }}" class="form-control">
            <p class="text-danger errors video_url"></p>
        </div>
    @else
        <div class="d-flex align-content-center justify-content-around">
            <div class="form-group">
                <label>Tìm kiếm các câu hỏi</label>
                <input type="text" class="form-control search-quiz" placeholder="Tìm kiếm câu hỏi...">
            </div>
            <div class="form-group">
                <label>Tìm kiếm câu hỏi theo Thẻ</label>
                <input type="text" class="form-control search-quiz" placeholder="Tìm kiếm câu hỏi...">
            </div>
        </div>

        <table class="table" id="style-11" data-scroll="true" data-wheel-propagation="true"
            style="max-height: 400px;overflow-y:auto;display: block">
            <thead>
                <tr>
                    <th style="width:5%">
                        <p>Chọn</p>
                    </th>
                    <th>
                        <p>Câu hỏi</p>
                    </th>
                    <th>
                        <p>Thẻ</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label class="checkbox">
                            <input type="checkbox" value="" name="quizs[]">
                            <span></span></label>
                    </td>
                    <td class="font-weight-bold title">sdasdasd</td>
                    <td class="font-weight-bold">JAVASCRIPT</td>
                </tr>
                <tr>
                    <td>
                        <label class="checkbox">
                            <input type="checkbox" value="" name="quizs[]">
                            <span></span></label>
                    </td>
                    <td class="font-weight-bold title">sdasdasd</td>
                    <td class="font-weight-bold">PHP</td>
                </tr>

            </tbody>
        </table>
        <p class="text-danger errors quizs"></p>
    @endif

    <button class="btn btn-success d-block m-auto">Cập nhật bài học</button>
</form>
