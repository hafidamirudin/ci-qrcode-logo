<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'third_party/endroid_qrcode/autoload.php';
		
		use Endroid\QrCode\ErrorCorrectionLevel;
		//use Endroid\QrCode\LabelAlignment;
		use Endroid\QrCode\QrCode;
		//use Endroid\QrCode\Response\QrCodeResponse;
		
class Welcome extends CI_Controller {

	public function index()
	{	
		
		$datanya = "Hafid Amirudin - Diskominfo";
		$data['qr_name'] =$this->create_qr($datanya);
		
		$this->load->view('welcome_message', $data);
	}
	
	function create_qr($datanya){
			// Create a basic QR code
		$data = $datanya;
		$qrCode = new QrCode($data);
		$qrCode->setSize(250);

		// Set advanced options
		$qrCode->setWriterByName('png');
		$qrCode->setMargin(10);
		$qrCode->setEncoding('UTF-8');
		$qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH);
		$qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
		$qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
		$qrCode->setLogoPath('assets/logo_tala_black2.png');
		$qrCode->setLogoWidth(80);
		$qrCode->setValidateResult(false);

		// Directly output the QR code
		//header('Content-Type: '.$qrCode->getContentType());
		//echo $qrCode->writeString();

		// Save it to a file
		//$filename = time().'.png';
		$filename = "qrcode.png";
		$qrCode->writeFile('assets/'.$filename);
		return $filename;
		
		//echo $file_name;
		//$qrCode->writeFile('assets/qrcode_'.time().'.png');

		// Create a response object
		//$response = new QrCodeResponse($qrCode);
		
	}
}
