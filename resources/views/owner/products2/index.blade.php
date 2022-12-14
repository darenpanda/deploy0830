<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <!DOCTYPE html>
    <html lang="ja">
  
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>食品表示ラベル印刷画面</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
        <link href="app.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <div class="container-fluid">
            <h2>食品表示ラベル印刷画面</h2>
            <div class="row">
                <div class="col-sm-6">
                    <form id="person" action="">
                        <div class="form-group">
                            <label for="">商品名</label>
                            <textarea type="text" class="form-control" name="section" id="section" rows="3">
  黒ゴマチーズカンパーニュ</textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="">材料</label>
                            <div class="col-6">
                                <input type="text" class="form-control col-xs-12" name="FirstKana" id="FirstKana" value="きい">
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="LastKana" id="LastKana" value="たいちろう" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="">氏名（漢字）</label>
                            <div class="col-6">
                                <input type="text" class="form-control " name="FirstName" id="FirstName" value="紀伊" />
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="LastName" id="LastName" value="太一郎" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">連絡先</label>
                            <div>
                                <textarea type="text" class="form-control" name="address" id="address" rows="6">
    〒100-8111
    東京都千代田区千代田1-1
    ロイヤルパレスパークビル 15F
    電話: 03-1111-1111(代表) FAX: 03-2222-2222
    携帯: 090-3333-3333
    mail: kii-taichiro@dummy.lo.go.jp</textarea>
                            </div>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-primary" id="submit" style="width:100px; margin-right:15px">印　刷</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-6">
                    <table class="preview">
                        <tbody>
                            <tr>
                                <td id="origin">
                                    <img class="logo" alt="">
                                    <p class="section"></p>
                                    <div class="Name">
                                        <div style="float:left; margin-right:5mm">
                                            <p class="FirstKana" />
                                            <p class="KanaSpan" />
                                            <p class="FirstName" />
                                        </div>
                                        <div style="float:left">
                                            <p class="LastKana" />
                                            <p class="KanaSpan" />
                                            <p class="LastName" />
                                        </div>
                                    </div>
                                    <p class="address" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
    
                //// 入力項目の更新に応じてプレビューも変更
                $('input,textarea').on('keyup', function () {
                    updatePreview();
                })
            
            
                <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <x-flash-message status="session('status')" />
                <div class="p-2 mt-4 flex justify-end w-full">
                  <button onclick="location.href='{{ route('owner.products.create')}}'" class="mb-4 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規登録</button>
                </div>
テスト
            
            
                //// 印刷ボタンクリック時（印刷画面をオープンする）
                $('#submit').on('click', function (e) {
                    e.preventDefault();
                    var url = 'dashboard3.blade.php';
                    window.open(url);
                })
    
                // 画面初期化処理
                updatePreview();
    
            })
    
            // プレビューの更新処理
            function updatePreview() {
    
                // 各欄の更新処理
                $(".logo").attr("src", "logo.png");
                $(".section").html($("#section").val().replace(/\n/g, '<br>'));
                $(".FirstKana").html($("#FirstKana").val());
                $(".FirstName").html($("#FirstName").val());
                $(".LastKana").html($("#LastKana").val());
                $(".LastName").html($("#LastName").val());
                $(".address").html($("#address").val().replace(/\n/g, '<br>'));
    
                // 部署の行数（１～３行）によって行間隔を整える
                var tmp = $("#section").val().match(/\n/g);
                var cnt = tmp ? tmp.length : 0;
                if (cnt < 1) {
                    $(".section").css("font-size", "8.5pt");
                    $(".section").css("top", "14.6mm");
                    $(".Name").css("top", "21.0mm");
                } else if (cnt == 1) {
                    $(".section").css("font-size", "8.5pt");
                    $(".section").css("top", "13.6mm");
                    $(".Name").css("top", "22.0mm");
                } else if (cnt > 1) {
                    $(".section").css("font-size", "8pt");
                    $(".section").css("top", "12.9mm");
                    $(".Name").css("top", "22.8mm");
                }
            }
        </script>
    </body>
    
    </html>
    



    
   </x-app-layout>
