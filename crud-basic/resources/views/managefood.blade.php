<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container mb-5">
        <div class="row mt-5">
            <div class="col-12">
                <h3>
                    จัดการข้อมูลอาหาร
                </h3>
                @if (session('success-add'))
                    <script>
                        alert('{{ session('success-add') }}');
                    </script>
                @endif
                @if (session('success_delete'))
                    <script>
                        alert('{{ session('success_delete') }}');
                    </script>
                @endif
            </div>
            <div class="col-12 text-end">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    เพิ่มข้อมูล
                </button>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ภาพ</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">ราคา</th>
                            <th scope="col">แก้ไข</th>
                            <th scope="col">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($foods as $key => $item)
                            <tr>
                                <th scope="col">
                                    {{ $key + 1 }}
                                </th>
                                <td scope="col">
                                    <img src="{{ asset('assets/imgfood/' . $item->img_food) }}" alt=""
                                        width="100" height="70">
                                </td>
                                <td scope="col">
                                    {{ $item->name_food }}</td>
                                <td scope="col">
                                    {{ $item->price_food }}
                                </td>
                                <td scope="col">
                                    <a href="{{ route('edit_data', $item->id) }}" class="btn btn-warning">แก้ไข</a>
                                </td>
                                <td>
                                    <a href="{{ route('delete', $item->id) }}" class="btn btn-danger"
                                        onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')">ลบ</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $foods->links() }}
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มข้อมูลอาหาร</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="{{ route('add_food') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <label for="img">รูปภาพอาหาร</label>
                                    <input type="file" name="img" id="img" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <label for="name">ชื่ออาหาร</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <label for="price">ราคา</label>
                                    <input type="text" name="price" id="price" class="form-control" required>
                                </div>
                                <div class="col-12 mt-2">
                                    <input type="submit" class="form-control btn btn-success" value="เพิ่มข้อมูล">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
