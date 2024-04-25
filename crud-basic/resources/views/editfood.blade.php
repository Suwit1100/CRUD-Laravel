<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>แก้ไขข้อมูล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container mb-5">
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h3>แก้ไขข้อมูล</h3>
                @if (session('success-update'))
                    <script>
                        alert('{{ session('success-update') }}');
                    </script>
                @endif
            </div>
        </div>
        <div class="col-12">
            <form action="{{ route('update_data') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 text-center">
                        <p>ภาพเดิม</p>
                        <img src="{{ asset('assets/imgfood/' . $food->img_food) }}" alt="" width="200"
                            height="150">
                        <input type="hidden" name="old_img" value="{{ $food->img_food }}">
                        <input type="hidden" name="id" value="{{ $food->id }}">
                    </div>
                    <div class="col-12">
                        <label for="img">รูปภาพอาหาร</label>
                        <input type="file" name="img" id="img" class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="name">ชื่ออาหาร</label>
                        <input type="text" name="name" id="name" class="form-control" required
                            value="{{ $food->name_food }}">
                    </div>
                    <div class="col-12">
                        <label for="price">ราคา</label>
                        <input type="text" name="price" id="price" class="form-control" required
                            value="{{ $food->price_food }}">
                    </div>
                    <div class="col-12 mt-2">
                        <input type="submit" class="form-control btn btn-success" value="อัปเดตข้อมูล">
                        <a href="{{ route('view_manage') }}" class="form-control btn btn-white">กลับ</a>
                    </div>

                </div>
            </form>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
