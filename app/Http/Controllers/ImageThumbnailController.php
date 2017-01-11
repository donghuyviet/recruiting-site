<?php
/**
 * Created by PhpStorm.
 * User: Trung Luong
 * Date: 12/24/2016
 * Time: 1:09 AM
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


class ImageThumbnailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request,$url = '',$width = ''){

        //$params = Request::all();
        // 出力する画像サイズの指定
        //$width = $params["width"];
        //$url = $params["url"];
        $path_info = pathinfo($url);
        $url = "file/".md5($url).".".$path_info['extension'];

// 元画像のファイルサイズを取得
        list($image_w, $image_h) = getimagesize($url);

//元画像の比率を計算し、高さを設定
        $proportion = $image_w / $image_h;
        $height = $width / $proportion;
//高さが幅より大きい場合は、高さを幅に合わせ、横幅を縮小
        if($proportion < 1){
            $height = $width;
            $width = $width * $proportion;
        }

// サイズを指定して、背景用画像を生成
        $canvas = imagecreatetruecolor($width, $height);

// ファイル名から、画像インスタンスを生成
        $exploded = explode('.',$url);
        $ext = $exploded[count($exploded) - 1];
        if (preg_match('/jpg|jpeg/i',$ext))
            $image=imagecreatefromjpeg($url);
        else if (preg_match('/png/i',$ext))
            $image=imagecreatefrompng($url);
        else if (preg_match('/gif/i',$ext))
            $image=imagecreatefromgif($url);
        else if (preg_match('/bmp/i',$ext))
            $image=imagecreatefrombmp($url);
        else
            return 0;

// 背景画像に、画像をコピーする
        imagecopyresampled($canvas,  // 背景画像
            $image,   // コピー元画像
            0,        // 背景画像の x 座標
            0,       // 背景画像の y 座標
            0,        // コピー元の x 座標
            0,        // コピー元の y 座標
            $width,   // 背景画像の幅
            $height,  // 背景画像の高さ
            $image_w, // コピー元画像ファイルの幅
            $image_h  // コピー元画像ファイルの高さ
        );

// 画像を出力する
        imagejpeg($canvas,           // 背景画像
            NULL,    // 出力するファイル名（省略すると画面に表示する）
            100                // 画像精度（この例だと100%で作成）
        );

// メモリを開放する
        imagedestroy($canvas);

    }
}