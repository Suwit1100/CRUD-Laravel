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
            </div>
            <div class="col-12 text-end">
                <button class="btn btn-success">
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
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <td scope="col">ภาพ</td>
                            <td scope="col">ชื่อ</td>
                            <td scope="col">ราคา</td>
                            <td scope="col">แก้ไข</td>
                            <td scope="col">ลบ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
