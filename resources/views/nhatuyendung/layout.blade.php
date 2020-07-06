<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="../../../../favicon.ico">
  <base href="{{asset('')}}">
  <title>Tuyển Dụng STU</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="ungvien/layout.css">
  <!-- Custom styles for this template -->
  <link href="navbar-top-fixed.css" rel="stylesheet">
</head>

<body class="bg-white">

  <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color:hsl(180, 100%, 93%);">
    <a class="navbar-brand" href=""><img id="logo" src="logo.png"></a>
  </nav>

  <div class="container-fluid" id="container-fluid1">
    <div class="row">
      <div class="col-sm-3 scroll bg-white fixed-top list-group" style="margin-top: 76px;">
        <?php  if(!Auth::guard('nhatuyendung')->check()) { ?>
          <div class="card border-0 list-group-item">     
            <form class="form-signin " action="nhatuyendungdangnhap" method="POST">
              <input type="hidden" name="_token" value="{{csrf_token()}}"/>
              <h3 class="form-signin-heading ">Đăng nhập</h3>
              <label for="inputEmail" class="sr-only">Email </label>
              <input type="email" id="inputEmail" name="email"  style="margin-bottom: 3px;" class="form-control border-0" placeholder="Email" required autofocus>
              <label for="inputPassword" class="sr-only">Mật khẩu</label>
              <input type="password" name="password" id="inputPassword" class="form-control border-0" placeholder="Mật khẩu" required>
              <div class="list-inline">
                <div class="checkbox list-inline-item">
                  <label>
                    <input type="checkbox" value="remember-me">Ghi nhớ  |</label>
                </div>
                <a class="list-inline-item">
                  Quên mật khẩu
                </a>
               
              </div>

              <button type=" submit" class="btn btn-info">Đăng nhập</button>
            </form>     
          </div>
        <?php } else{?>
          <div class="card list-group-item border-0">
            <div class="row no-gutters ">
              <div class="col-auto">
                <img src="//placehold.it/64" class="img-fluid" alt="">
              </div>
              <div class="col">
                <div class="card-block px-2">

                  <p class="card-text"> <a href="" style="color:#6C757D;"><?php echo Auth::guard('nhatuyendung')->user()->tencongty; ?></a></p>

                  <p class="card-text"> <a href="nhatuyendung/thoat" style="color:#6C757D;">Thoát</a></p>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <a href="nhatuyendung/quanlytaikhoan" class="list-group-item border-0"><div >
          <img src="upload\img\layout\search.svg">Thông tin công ty   
        </div></a>
        <a href="nhatuyendung\dangtintuyendung" class="list-group-item border-0"><div >
          <img src="upload\img\layout\search.svg">Đăng tin tuyển dụng
        </div></a>
        <a href="nhatuyendung\tindadang" class="list-group-item border-0"><div >
          <img src="upload\img\layout\search.svg">Tin đã đăng
        </div></a>
        <a href="nhatuyendung\thongtinungvien" class="list-group-item border-0"><div >
          <img src="upload\img\layout\search.svg">Thông tin ứng viên
        </div></a>
        <a href="nhatuyendung\timkiem" class="list-group-item border-0"><div >
          <img src="upload\img\layout\search.svg">Tìm Ứng Viên   
        </div></a>
        <a href="nhatuyendung\ungviendaluu" class="list-group-item border-0"><div >
          <img src="upload\img\layout\search.svg">Ứng viên đã lưu
        </div></a>
        <a href="" class="list-group-item border-0"><div >
          <img src="upload\img\layout\search.svg">Thông tin hồ sơ   
        </div></a>
        


      </div>

      <div class="col-3 bg-white"></div>

      <div class="col-9 bg-white w-100">
         @yield('content')

  <!--     <div class="row">

       <div class="col-sm-10 offset-sm-1 text-center">
            <div class="card">
              <div class="card-header bg-white">

                <div class="row">
                  <div class="col-6 text-left text-info">
                    CHỈNH SỬA THÔNG TIN CÁ NHÂN
                  </div>
                  <div class="col-6 text-right">
                    (*)Thông tin bắt buộc nhập
                  </div>
                </div>




              </div>
              <div class="card-body"><form>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">Họ tên: *</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="inputEmail3">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="example-date-input" class="col-4 col-form-label">Ngày sinh: *</label>
                  <div class="col-8">
                    <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                  </div>
                </div>

                <fieldset class="form-group ">
                  <div class="row">
                    <legend class="col-form-label col-sm-4 pt-0">Giới tính: *</legend>
                    <div class="col-sm-8 text-left"><div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                      <label class="form-check-label" for="inlineRadio1">Nam</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                      <label class="form-check-label" for="inlineRadio2">Nữ </label>
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group ">
                <div class="row">
                  <legend class="col-form-label col-sm-4 pt-0">Tình trạng hôn nhân: *</legend>
                  <div class="col-sm-8 text-left"><div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                    <label class="form-check-label" for="inlineRadio1">Độc thân</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Đã có gia đình</label>
                  </div>
                </div>
              </div>
            </fieldset>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-4 col-form-label">Địa chỉ hiện tại: *</label>
              <div class="col-sm-8">
                <input type="email" class="form-control" id="inputEmail3">
              </div>
            </div>


            <div class="form-group row">
              <label for="exampleSelect1" class="col-sm-4 col-form-label">Tỉnh/thành phố: *</label>
              <div class="col-sm-8">
                <select class="form-control" id="exampleSelect1" >
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select></div>
              </div>
              <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary w-25">Lưu</button>
                </div>
              </div>
            </form>
          </div>
         </div>
        

        </div>
      </div>-->




      @if(count($errors)>0)
      <div class="alert alert-warning list-inline-item" role="alert"> 
        @foreach($errors->all() as $err)
        {{$err}}<br>
        @endforeach
      </div>
      @endif

      <div class="bg-white w-100" id="container2">
        <div class="row">
          <div class="col-sm-3">
            <img src="logo.png" class="d-block w-100" alt="...">
          </div>
          <div class="col-sm-3 ">
            <ul class="list-unstyled">
              <li>Từ Chí Thành</li>
              <li>Phạm Ngọc Thạch</li>
            </ul>                
          </div>
          <div class="col-sm-3">

          </div>
          <div class="col-sm-3">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>






    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      
      @yield('script')
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>
      
    </body>
    </html>