<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<div id="reviews" class="tube-card p-5">
    <h3 class="text-lg font-semibold mb-3"> Tất cả đánh giá ({{ count($cou->commentCourses) }}) </h3>

    <div class="flex space-x-5 mb-8">
        <div class="lg:w-1/4 w-full">
            <div class="bg-blue-100 space-y-1 py-5 rounded-md border border-blue-200 text-center shadow-xs">
                <h1 class="text-5xl font-semibold"> 4.8</h1>
                <div class="flex justify-center">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star" class="text-gray-300"></ion-icon>
                </div>
                <h5 class="mb-0 mt-1 text-sm"> Course Rating</h5>
            </div>
        </div>
        <!-- progress -->
        <div class="w-2/4 hidden lg:flex flex-col justify-center space-y-5">

            <div class="w-full h-2.5 rounded-lg bg-gray-300 shadow-xs relative">
                <div class="w-11/12 h-full rounded-lg bg-gray-800"> </div>
            </div>
            <div class="w-full h-2.5 rounded-lg bg-gray-300 shadow-xs relative">
                <div class="w-4/5 h-full rounded-lg bg-gray-800"> </div>
            </div>
            <div class="w-full h-2.5 rounded-lg bg-gray-300 shadow-xs relative">
                <div class="w-3/5 h-full rounded-lg bg-gray-800"> </div>
            </div>
            <div class="w-full h-2.5 rounded-lg bg-gray-300 shadow-xs relative">
                <div class="w-3/6 h-full rounded-lg bg-gray-800"> </div>
            </div>
            <div class="w-full h-2.5 rounded-lg bg-gray-300 shadow-xs relative">
                <div class="w-1/3 h-full rounded-lg bg-gray-800"> </div>
            </div>

        </div>
        <!-- stars -->
        <div class="w-1/4 hidden lg:flex flex-col justify-center space-y-2">

            <div class="flex justify-center items-center">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <span class="ml-2"> 95 %</span>
            </div>
            <div class="flex justify-center items-center">
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <span class="ml-2"> 85 %</span>
            </div>
            <div class="flex justify-center items-center">
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <span class="ml-2"> 60 %</span>
            </div>
            <div class="flex justify-center items-center">
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <span class="ml-2"> 50 %</span>
            </div>
            <div class="flex justify-center items-center">
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star" class="text-gray-300"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <span class="ml-2"> 35 %</span>
            </div>

        </div>
    </div>

    <div class="space-y-4 my-5">
        @foreach ($cou->commentCourses as $i)
            <li>
                <a href="#">

                    <div class="drop_content">
                        <span class="time-ago">{{ $i->created_at }}</span>
                        <p> <strong>{{ DB::table('users')->where('id', '=', $i->user_id)->first()->name }}</strong>
                            <br><i class="fa-solid fa-bullhorn"></i>
                            <span class="text-link">{{ $i->comment }} </span>
                        </p>
                    </div>
            <li class="flex items-center">
                <span class="avg bg-yellow-500 mr-2 px-2 rounded text-white font-semiold"> 4.9 </span>
                <div class="star-rating text-yellow-200">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-half"></ion-icon>
                </div>
            </li>
            </a>
            </li>
        @endforeach

    </div>
    <div>
        {{-- {{ route('commentcourse.store') }} --}}
        <form action="{{ route('commentcourse.store') }}" method="post">
            @csrf
            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                <div class="d-flex flex-start w-100">
                    <input type="hidden" name="course_id" value="{{ $cou->id }}">
                    <textarea style="border: 1px solid rgba(92, 88, 88, 0.562)" name="comment" id="textAreaExample"
                        placeholder="Đánh giá khóa học..."></textarea>
                </div>
                <div class="float-end mt-2 pt-1">
                    <button class="btn btn-primary" type="submit">Gửi</button>
                </div>
            </div>
        </form>
    </div>

    <div class="flex justify-center mt-9">
        <a href="#" class="bg-gray-50 border hover:bg-gray-100 px-4 py-1.5 rounded-full text-sm">Xem thêm đánh
            giá
            ..</a>
    </div>

</div>
