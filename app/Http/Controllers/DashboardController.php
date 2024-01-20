<?php

namespace App\Http\Controllers;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Color\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;

class DashboardController extends Controller
{
  public function index()
  {
    return view('pages.dashboard.index', [
      'title' => 'Dashboard',
    ]);
  }

  public function qrcode()
  {
    $google2fa = new Google2FA();

    $user                   = Auth::user();
    $user->google2fa_secret = $google2fa->generateSecretKey();
    $user->save();

    $qrCodeUrl = $google2fa->getQRCodeUrl(
      $user->name,
      $user->email,
      $user->google2fa_secret
    );

    $writer = new PngWriter();

    $qrCode = QrCode::create($qrCodeUrl)
      ->setEncoding(new Encoding('UTF-8'))
      ->setErrorCorrectionLevel(ErrorCorrectionLevel::Low)
      ->setSize(300)
      ->setMargin(10)
      ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
      ->setForegroundColor(new Color(0, 0, 0))
      ->setBackgroundColor(new Color(255, 255, 255));

    $result = $writer->write($qrCode);

    return view('pages.dashboard.qrcode', [
      'title'        => 'Scan QRCode',
      'qrcode_image' => $result->getDataUri(),
    ]);
  }

  public function verifikasi(Request $request)
  {
    $user = Auth::user();

    $google2fa = new Google2FA();

    $valid = $google2fa->verifyKey($user->google2fa_secret, $request->secret, 8);

    return redirect()->route('dashboard')->with('success', $valid ? 'Valid' : 'Invalid');
  }
}
